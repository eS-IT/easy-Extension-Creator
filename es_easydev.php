<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   eS_easyDev
 * @author    Patrick Froch <patrick.froch@easySolutionsIT.de>
 * @license   GPL
 * @copyright e@sy Solutions IT 2013
 */


/**
 * Namespace
 */
#namespace eS_easyDev;

#use Contao\BackendTemplate;

/**
 * Class es_easydev
 *
 * @copyright  e@sy Solutions IT 2013
 * @author     Patrick Froch <patrick.froch@easySolutionsIT.de>
 * @package    Devtools
 */
class es_easydev extends \BackendModule{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'es_easydev_template';


    /**
     * Pfad der Erweiterung
     * (wird in makeModule() erweitert)
     * @var string
     */
    private $strBasePath = 'system/modules';


    /**
     * Pfad zu den Vorlagen.
     * @var string
     */
    private $strSnippetsPath = 'system/modules/es_easydev/templates/snippets';


    /**
     * Data-Array with Settings
     * @var array
     */
    private $arrModuleData = array();


    /**
     * Name der Erweiterng
     * @var string
     */
    private $strExtName = '';


    /**
     * Name des Ordners der Erweiterung (unter system/modules).
     * @var string
     */
    private $strFolder = '';


    /**
	 * Generate the module
	 */
	protected function compile(){
	}


    public function compileModule($dc){
        $this->import('es_easydev_util');
        $this->Template             = new BackendTemplate($this->strTemplate);
        $this->Template->headline   = $GLOBALS['TL_LANG']['tl_es_easydev_projects']['compilemodule'][1];
        $this->Template->content    = $this->makeModule($dc->id);
        return $this->Template->parse();
    }


    /* =============== */
    /* Modul erstellen */
    /* =============== */

    /**
     * Erstellt die Erweiterung.
     * @param $intId
     * @return string
     */
    private function makeModule($intId){
        $strContent         = '';
        $this->arrModuleData= $this->es_easydev_util->loadProjectData($intId);
        $this->strBasePath  = $this->Environment->documentRoot . '/' . $this->strBasePath;
        $this->strBasePath .= '/' . $this->arrModuleData['project'][0]['folder'];
        $this->strFolder    = $this->arrModuleData['project'][0]['folder'];
        $this->strExtName   = $this->arrModuleData['project'][0]['title'];
        $strContent        .= $this->es_easydev_util->genHeadline('Erstelle Verzeichnisse');
        $strContent        .= $this->makeFolder();
        $strContent        .= $this->es_easydev_util->genHeadline('Erstelle config.php');
        $strContent        .= $this->parseConfig();
        $strContent        .= $this->es_easydev_util->genHeadline('Kopiere zusätzliche Dateien');
        $strContent        .= $this->copyFiles();
        $strContent        .= $this->es_easydev_util->genHeadline('Templates erstellen');
        $strContent        .= $this->makeTemplates();
        $strContent        .= $this->es_easydev_util->genHeadline('Sprachpakete erstellen');
        $strContent        .= $this->makeLanguages();
        $strContent        .= $this->es_easydev_util->genHeadline('Klassen erstellen');
        $strContent        .= $this->makeClasses();
        $strContent        .= $this->es_easydev_util->genHeadline('DataContainerArrays erstellen');
        $strContent        .= $this->makeDcas();

        if($this->arrModuleData['project'][0]['compatibility'] == '211x'){
            $strContent        .= $this->es_easydev_util->genHeadline('database.sql erstellen');
            $strContent        .= $this->makeDatabase();
        }

        // result
        $strContent .= $this->es_easydev_util->genResult($strContent);

        return $strContent;
    }


    /**
     * Erstellt die Verzeichnisse.
     * @return string
     */
    private function makeFolder(){
        $strContent = '';

        // Verzeichnis der Erweiterung anlegen
        $strFolder  = $this->strBasePath;
        $strContent.= $this->es_easydev_util->makeDir($strFolder);

        // Unterordner anlegen
        foreach($GLOBALS['EASYDEV']['es_easydev']['folder'] as $strFolder){
            $strFolder  = $this->strBasePath . '/' . $strFolder;
            $strContent.= $this->es_easydev_util->makeDir($strFolder);
        }

        return $strContent;
    }


    /**
     * Erstellt die config/config.php.
     * @return string
     */
    private function parseConfig(){
        $this->loadLanguageFile('snippets');
        $strInputFile       = $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/config.php';
        $strOutputFile      = $this->strBasePath . '/config/config.php';
        $arrData['config']  = '';

        foreach($this->arrModuleData['table'] as $arrTable){
            $strTemp = $GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['config'];

            foreach($arrTable as $strKey => $strVale){
                $strVale = $this->es_easydev_util->serialToList($strVale);
                $strTemp = str_replace('{{table::' . $strKey . '}}', $strVale, $strTemp);
                $strTemp = str_replace("', ''''),", "'),", $strTemp); // Falls keine Kindtabellen vorhanden sind, Leerstring entfernen!
            }

            $arrData['config'] .= $strTemp . "\n";
        }
        return $this->es_easydev_util->parseFile($strInputFile, $strOutputFile, $arrData, 'table');
    }


    /**
     * Kopiert die zusaetzlichen Dateien.
     * @return string
     */
    private function copyFiles(){
        $strContent = '';

        // Hooks aufrufen, um zusaetzliche Dateien zu kopieren.
        $this->es_easydev_util->runHooks('easydev_copyfiles', $this->strBasePath);

        // Default-Icon kopieren
        $strSource  = $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/default.png';
        $strDest    = $this->strBasePath . '/assets/img/default.png';
        $strContent.= $this->es_easydev_util->copyFile($strSource, $strDest);

        // .htaccess copieren
        $strSource  = $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/.htaccess';
        $strDest    = $this->strBasePath . '/assets/.htaccess';
        $strContent.= $this->es_easydev_util->copyFile($strSource, $strDest);

        return $strContent;
    }


    /**
     * Erstellt die Templates.
     * @return string
     */
    private function makeTemplates(){
        $strContent = '';

        // Templates fuer die Tabellen erstellen
        foreach($this->arrModuleData['table'] as $arrTable){
            $strDest    = $this->strBasePath . '/templates/' . $arrTable['table_name'] . '.html5';
            $strContent.= $this->copyTemplates($strDest);
        }

        // zusaetzliche Templates erstellen
        $strContent.= $this->copyAdditionalTemplates('templates');

        // Templates fuer zusaetzliche Klassen kopieren
        $strContent.= $this->copyAdditionalTemplates('beclasses');
        $strContent.= $this->copyAdditionalTemplates('feclasses', 'template_fe.html5');

        // Hooks ausfuehren
        $arrUserTemplates = $this->es_easydev_util->runHooks('easydev_maketemplates', $this->strBasePath);
        if(is_array($arrUserTemplates)){
            foreach($arrUserTemplates as $arrTemplates){
                if(is_array($arrTemplates)){
                    foreach($arrTemplates as $arrFiles){
                        if(is_array($arrFiles) && count($arrFiles) == 2){
                            $strSource  = $arrFiles[0];
                            $strDest    = $arrFiles[1];
                            $strContent.=$this->copyTemplates($strDest, null, $strSource);
                        }
                    }
                }
            }
        }

        return $strContent;
    }


    /**
     * Kopiert die zusaetzlichen Templates einer Art (z.B. fuer beclasses oder feclasses).
     * @param $strKind
     * @param string $strFile
     * @return string
     */
    private function copyAdditionalTemplates($strKind, $strFile = 'template_be.html5'){
        $strContent             = '';
        $arrAdditionalTemplates = @unserialize($this->arrModuleData['project'][0][$strKind]);

        if(is_array($arrAdditionalTemplates) && count($arrAdditionalTemplates) && $arrAdditionalTemplates[0] != ''){
            foreach($arrAdditionalTemplates as $strTemplate){
                $strDest    = $this->strBasePath . '/templates/' . $strTemplate . '.html5';
                $strContent.= $this->copyTemplates($strDest, $strFile);
            }
        }

        return $strContent;
    }


    /**
     * Kopiert ein Template.
     * @param $strDest
     * @param string $strFile
     * @return string
     */
    private function copyTemplates($strDest, $strFile = 'template_be.html5', $strSource = false){
        $strSource  = ($strSource != false) ? $strSource : $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/' . $strFile;
        return $this->es_easydev_util->copyFile($strSource, $strDest);
    }


    /**
     * Erstellt die Language-Files.
     * @return string
     */
    private function makeLanguages(){
        $this->loadLanguageFile('snippets');
        $strContent = '';
        $arrLang    = @unserialize($this->arrModuleData['project']['languages']);

        if(!is_array($arrLang) || !in_array('de', $arrLang)){
            $arrLang[] = 'de';
        }

        foreach($arrLang as $strLang){
            // Ordner fuer die Sprache erstellen
            $strFolder = $this->strBasePath . '/languages/' . $strLang;
            $strContent.= $this->es_easydev_util->makeDir($strFolder);

            // default.php kopieren
            $strSource  = $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/default.php';
            $strDest    = $this->strBasePath . '/languages/' . $strLang . '/default.php';
            $strContent.= $this->es_easydev_util->copyFile($strSource, $strDest);

            // modules.php kopieren
            $strSource              = $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/modules.php';
            $strDest                = $this->strBasePath . '/languages/' . $strLang . '/modules.php';
            $arrData['languages']   = '';

            foreach($this->arrModuleData['table'] as $arrTable){
                $strTemp = $GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['languages'];

                foreach($arrTable as $strKey => $strVale){
                    $strTemp = str_replace('{{table::' . $strKey . '}}', $strVale, $strTemp);
                }

                $arrData['languages'] .= $strTemp . "\n";
            }

            $strContent.= $this->es_easydev_util->parseFile($strSource, $strDest, $arrData, 'table');

            // Tabellen-Dateien kopieren
            $strSource  = $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/languages_tab.php';

            foreach($this->arrModuleData['table'] as $arrTable){
                $strDest        = $this->strBasePath . '/languages/' . $strLang . '/' . $arrTable['table_name'] . '.php';
                $strFieldList   = '';

                // Daten der Felder zusammenstellen
                if(is_array($this->arrModuleData) &&
                    array_key_exists('fields', $this->arrModuleData) &&
                    is_array($this->arrModuleData['fields']) &&
                    array_key_exists($arrTable['id'], $this->arrModuleData['fields']) &&
                    is_array($this->arrModuleData['fields'][$arrTable['id']])
                ){
                    foreach($this->arrModuleData['fields'][$arrTable['id']] as $arrFields){
                        if(array_key_exists('table_name', $arrTable) && array_key_exists('fieldname', $arrFields) && array_key_exists('title', $arrFields)){
                            $strDescription = (array_key_exists('description', $arrFields)) ? $arrFields['description'] : '';
                            $strFieldList  .= '$GLOBALS["TL_LANG"]["' . $arrTable['table_name'] . '"]["' . $arrFields['fieldname'] . '"] ' . "\t\t" . '= array("' . $arrFields['title'] . '", "' . $strDescription . '");' . "\n";
                        }
                    }
                }

                $strContent .= $this->es_easydev_util->parseFile($strSource, $strDest, array('language::fieldlist' => $strFieldList));
            }
        }

        return $strContent;
    }


    /**
     * Erstellt die FE- und Be-Klassen.
     * @return string
     */
    private function makeClasses(){
        $strContent = '';
        $strSourceBe= $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/class_be.php';
        $strSourceFe= $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/class_fe.php';

        // Klassen der Tabellen anlegen und Callbacks einfuegen
        foreach($this->arrModuleData['table'] as $rowTable){
            if($rowTable['table_name'] != ''){
                $strCallbacks   = $this->es_easydev_util->genCallbacks($rowTable);
                $strCallbacks  .= $this->es_easydev_util->genFieldCallbacks($this->arrModuleData['fields'][$rowTable['id']]);
                $arrTags        = array('project::be_class_name' => $rowTable['table_name'], 'table::callbacks' => $strCallbacks);
                $strDest        = $this->strBasePath . '/'. $rowTable['table_name'] . '.php';
                $strContent    .= $this->es_easydev_util->parseFile($strSourceBe, $strDest, $arrTags);
            }
        }

        // zusaetzliche Backend-Klassen anlegen
        $arrBeClasses   = unserialize($this->arrModuleData['project'][0]['beclasses']);
        foreach($arrBeClasses as $strBeClass){
            if($strBeClass != ''){
                $arrTags    = array('project::be_class_name' => $strBeClass);
                $strDest    = $this->strBasePath . '/'. $strBeClass . '.php';
                $strContent.= $this->es_easydev_util->parseFile($strSourceBe, $strDest, $arrTags);
            }
        }

        // zusaetzliche Frontend-Klassen anlegen
        $arrFeClasses   = unserialize($this->arrModuleData['project'][0]['feclasses']);
        foreach($arrFeClasses as $strFeClass){
            if($strFeClass != ''){
                $arrTags    = array('project::fe_class_name' => $strFeClass);
                $strDest    = $this->strBasePath . '/'. $strFeClass . '.php';
                $strContent.= $this->es_easydev_util->parseFile($strSourceFe, $strDest, $arrTags);
            }
        }

        return $strContent;
    }


    /**
     * Erstellt die dcas.
     * @return string
     */
    private function makeDcas(){
        $this->loadLanguageFile('snippets');
        $strContent = '';

        if($this->arrModuleData['project'][0]['compatibility'] == ''){
            $strSourceBe= $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/dca.php';
        } else {
            $strSourceBe= $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/dca' . $this->arrModuleData['project'][0]['compatibility'] . '.php';
        }

        foreach($this->arrModuleData['table'] as $arrTable){
            $strDest    = $this->strBasePath . '/dca/'. $arrTable['table_name'] . '.php';
            $arrData    = $this->genFields($arrTable['id']);
            $arrData   += $this->genTable($arrTable);
            $arrData   += $arrTable;
            $strContent.= $this->es_easydev_util->parseFile($strSourceBe, $strDest, $arrData, 'table', "\n");
        }

        return $strContent;
    }


    /**
     * Erzeugt das Array mit den InsertTags fuer die Felder.
     * @param $intId
     * @return array
     */
    private function genFields($intId){
        $strAllFields   = '';
        $strPalette     = '{main_legend}, ';

        foreach($this->arrModuleData['fields'][$intId] as $arrField){
            $strPalette    .= $arrField['fieldname'] . ', ';
            $arrOptFields   = array('select', 'checkbox', 'radio', 'optionWizard', 'checkboxWizard');
            $strField       = '';
            $strEval        = '';

            // Optionen loeschen, wenn leer oder flasche Feldtyp
            if(!in_array($arrField['fieldtype'], $arrOptFields) || $arrField['fieldoptions'] == 'a:0:{}'){
                unset($arrField['fieldoptions']);
            }

            // BlankLabel nur einfügen, wenn der Typ des Feld Select ist.
            if($arrField['fieldtype'] != 'select'){
                unset($arrField['blankOptionLabel']);
            }

            // Den Default-Wert mit Anführungszeichen umschlissen, wenn es ein String ist.
            if(array_key_exists('defaultvalue', $arrField) && $arrField['defaultvalue'] != '' && !is_int($arrField['defaultvalue']) && !is_bool($arrField['defaultvalue'])){
                $arrField['defaultvalue'] = "'" . $arrField['defaultvalue'] . "'";
            }

            // sql-String erzeugen
            $arrField['sql'] = $this->es_easydev_util->genSql($arrField, $this->arrModuleData['project'][0]['compatibility']);

            // eval fuer das Feld erzeugen
            foreach($GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval'] as $strKey => $strTag){
                if(array_key_exists($strKey, $arrField) && $arrField[$strKey] != ''){
                    $strTemp = $this->es_easydev_util->replaceMyTags($strTag, $arrField, 'fields') . ", ";

                    switch($strKey){
                        case 'tlclass':
                            $strEval .= "'" . str_replace("tl_class => ", "tl_class' => '",str_replace("'", '', substr(str_replace(',', '', $strTemp), 0, -1))) . "', ";
                            break;

                        default:
                            $strEval .= $strTemp;
                            break;
                    }
                }
            }

            // field-eval mit dem erzeugten eval-String ueberschreiben
            $arrField['eval']   = substr($strEval, 0, -2);

            // Feldeinstellungen
            foreach($GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field'] as $strKey => $strTag){
                if(array_key_exists($strKey, $arrField) && $arrField[$strKey] != ''){
                    $strField .= "\t\t\t" . $this->es_easydev_util->replaceMyTags($strTag, $arrField, 'fields') . "\n";
                }
            }

            $strField           = $this->es_easydev_util->replaceMyTags($strField, $this->arrModuleData['table'], 'table');
            $strFielddefinition = sprintf($GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['fields']['definition'], $strField) . ",\n";
            $strFielddefinition = $this->es_easydev_util->replaceMyTags($strFielddefinition, $arrField, 'fields');
            $strAllFields      .= $strFielddefinition;

        }

        $strPalette = substr($strPalette, 0, -2) . ';';

        return array('fields::definitions' => $strAllFields, 'palettes::default' => $strPalette);
    }


    /**
     * Erzeugt das Array mit den InsertTags fuer die Tabelle.
     * @param $arrTable
     * @return array
     */
    private function genTable($arrTable){
        $arrData = array();

        foreach($GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table'] as $strKey => $strTag){
            if(is_array($arrTable) && array_key_exists($strKey, $arrTable) && $arrTable[$strKey] != '' && $arrTable[$strKey] != '0' && $arrTable[$strKey] != 'a:1:{i:0;s:0:"";}'){
                $arrData['table::' . $strKey] = $strTag;
            } else {
                $arrData['table::' . $strKey] = '';
            }
        }

        return $arrData;
    }


    /**
     * Erstellt die database.sql
     * @return string
     */
    private function makeDatabase(){
        $strInput   = $this->Environment->documentRoot . '/' . $this->strSnippetsPath . '/database.sql';
        $strContent = '';

        if(is_array($this->arrModuleData) && array_key_exists('table', $this->arrModuleData)){
            $strDatabase = '';

            foreach($this->arrModuleData['table'] as $arrTable){
                $strSql = '';
                $intId  = $arrTable['id'];

                foreach($this->arrModuleData['fields'][$intId] as $arrField){
                    $strCompatibility   = (array_key_exists('compatibility', $arrTable)) ? $arrTable['compatibility'] : '';
                    $strSql            .= '  ' . $this->es_easydev_util->genSql($arrField, $strCompatibility, false) . "\n";
                }

                if($strSql != ''){
                    $arrReplace     = array('table_name' => $arrTable['table_name'], 'sql' => $strSql);
                    $strDatabase   .= $this->es_easydev_util->replaceMyTags($GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['database']['sql'],$arrReplace, 'table');
                }
            }

            if($strDatabase != ''){
                $strOutput  = $this->strBasePath . '/config/database.sql';
                $arrReplace = array('table::sql' => $strDatabase);
                $strContent.= $this->es_easydev_util->parseFile($strInput, $strOutput, $arrReplace);
            }
        }

        return $strContent;
    }
}