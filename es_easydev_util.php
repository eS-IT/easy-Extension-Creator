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
class es_easydev_util extends \BackendModule{


    /**
     * Pfast zu den Modulen
     * @var string
     */
    private $strModulesPath = 'system/modules';


    /**
     * Pfad der Erweiterung
     * (wird in makeModule() erweitert)
     * @var string
     */
    private $strBasePath = '';


    /**
     * Data-Array with Settings
     * @var array
     */
    private $arrModuleData = array();


    /**
     * Name des Ordners der Erweiterung (unter system/modules).
     * @var string
     */
    private $strFolder = '';


    protected function compile(){}


    /* =============== */
    /* Grundfunktionen */
    /* =============== */

    /**
     * Kopiert ein File von $strSource nach $strDest.
     * @param $strSource
     * @param $strDest
     * @return string
     */
    public function copyFile($strSource, $strDest){
        clearstatcache();
        if(!is_file($strDest)){
            $rtnCp      = copy($strSource, $strDest);
            return $this->genTestOutput($strDest, $rtnCp);
        } else {
            return $this->genOutput($strDest, 'normal');
        }
    }


    /**
     * Erstellt einen Ordner, falls nicht vorhanden.
     * @param $strFolder
     * @return string
     */
    public function makeDir($strFolder){
        clearstatcache();
        if(!is_dir($strFolder)){
            mkdir($strFolder);
            clearstatcache();
            $rtn = (is_dir($strFolder));
            return $this->genTestOutput($strFolder, $rtn);
        } else {
            return $this->genOutput($strFolder);
        }
    }


    /**
     * Parset ein Input-File und schreibt das Resultat in Output-File.
     * @param $strInputFile
     * @param $strOutputFile
     * @param array $arrTags
     * @return string
     */
    public function parseFile($strInputFile, $strOutputFile, $arrTags = array(), $strPrefix = '', $strPostfix = ''){
        clearstatcache();
        if(!is_file($strOutputFile)){
            $strFileContent = file_get_contents($strInputFile);

            // zu erst die uebergebenen Tags ersetzten, dann replaceInsertTags aufrufen!
            $strFileContent = $this->replaceMyTags($strFileContent, $arrTags, $strPrefix, $strPostfix);
            $strFileContent = $this->replaceMyInsertTags($strFileContent, $strPostfix);
            file_put_contents($strOutputFile, $strFileContent);

            clearstatcache();
            if(is_file($strOutputFile) && file_get_contents($strOutputFile) == $strFileContent){
                $rtn = true;
            } else {
                $rtn = false;
            }

            return $this->genTestOutput($strOutputFile, $rtn);
        } else {
            return  $this->genOutput($strOutputFile);
        }
    }


    /* ================ */
    /* Hooks ausfuehren */
    /* ================ */

    /**
     * Ruft die Hooks auf.
     * @param $strHook
     * @param null $varParam
     * @return array|bool
     */
    public function runHooks($strHook, $varParam = null){
        if(array_key_exists($strHook, $GLOBALS['TL_HOOKS'])){
            $arrReturn = array();

            foreach($GLOBALS['TL_HOOKS'][$strHook] as $arrHook){
                if(is_array($arrHook) && count($arrHook) == 2){
                    $strClass   = $arrHook[0];
                    $strMethode = $arrHook[1];
                    $this->import($strClass);
                    $arrReturn[] = $this->$strClass->$strMethode($varParam);
                }
            }

            return $arrReturn;
        }

        return false;
    }


    /* ============== */
    /* Daten auslesen */
    /* ============== */

    /**
     * Laedt die Project-, Tabellen- und Felddaten.
     * @param $intId
     */
    public function loadProjectData($intId){
        $this->arrModuleData['project'] = $this->getProjectData($intId);
        $this->arrModuleData['table']   = $this->getModulData($intId);
        $this->arrModuleData['fields']  = $this->getFieldData($this->arrModuleData['table']);
        $this->strBasePath              = $this->Environment->documentRoot . '/' . $this->strModulesPath;
        $this->strBasePath             .= '/' . $this->arrModuleData['project'][0]['folder'];
        return $this->arrModuleData;
    }


    /**
     * Laedt die Daten des Projects aus der DB.
     * @param $intId
     * @return array
     */
    private function getProjectData($intId){
        return $this->getData($intId, 'id', 'tl_es_easydev_projects');
    }


    /**
     * Leadt alle Tabellen eines Projekts aus der DB.
     * @param $intId
     * @return array
     */
    private function getModulData($intId){
        return $this->getData($intId, 'pid', 'tl_es_easydev_tables');
    }


    /**
     * Laedt die Daten der Felder fuer alle Module des Projekts.
     * @param $arrTables
     * @return array
     */
    private function getFieldData($arrTables){
        $arrModuleData = array();

        if(is_array($arrTables) && count($arrTables)){
            foreach($arrTables as $arrRow){
                $arrTmp     = $this->getData($arrRow['id'], 'pid', 'tl_es_easydev_fields');
                $arrModuleData[$arrRow['id']]  = $arrTmp;
            }
        }

        return $arrModuleData;
    }


    /**
     * Laedt einen Datensatz aus der DB.
     * @param $id
     * @param $tab
     * @return array
     */
    private function getData($intId, $strField, $strTab){
        $this->import('Database');
        $query  = "SELECT * FROM `$strTab` WHERE `$strField` = $intId";
        $result = $this->Database->query($query);

        if($result->numRows){
            return $result->fetchAllAssoc();
        } else {
            return array();
        }
    }


    /* =============== */
    /* Output erzeugen */
    /* =============== */

    /**
     * Erstellt den Output des Moduls.
     * @param $strMsg
     * @return string
     */
    public function genTestOutput($strValue, $bolTest){
        if($bolTest == true){
            $strKind = 'success';
        } else {
            $strKind = 'error';
        }

        return $this->genOutput($strValue, $strKind);
    }


    /**
     * Erstellt die Ausgabe.
     * @param string $strValue
     * @param string $strKind
     * @param $intMethodeLayer
     * @param string $strMsg
     * @return string
     */
    public function genOutput($strValue = '', $strKind = 'normal', $intMethodeLayer = -1, $strMsg = ''){
        $this->loadLanguageFile('default');
        $arrBacktrace   = debug_backtrace();

        do{
            $intMethodeLayer++;
            $strClass       = $arrBacktrace[$intMethodeLayer]['class'];
            $strMethode     = $arrBacktrace[$intMethodeLayer]['function'];
        }while($GLOBALS['TL_LANG']['MSC']['easyDev']['output'][$strClass][$strMethode] == '' && $intMethodeLayer < 15);

        $strColor   = $this->getMsgColor($strKind);
        $strPrefix  = ($strKind != 'normal') ? strtoupper($strKind) . ': ' : 'SKIPED: ';
        $strMsg     = ($strMsg != '') ? $strMsg : sprintf($GLOBALS['TL_LANG']['MSC']['easyDev']['output'][$strClass][$strMethode][$strKind], $strValue);
        $strMsg     = $strPrefix . $strMsg;
        $strMsg     = str_replace($this->strBasePath, $this->strFolder . '/', $strMsg);
        $strMsg     = str_replace('//', '/', $strMsg);
        return "<li style='margin-bottom: 5px; color: $strColor;'>$strMsg</li>\n";
    }


    /**
     * Erstellt eine Ueberschrift.
     * @param $strMsg
     * @return string
     */
    public function genHeadline($strMsg){
        return "<li style='margin-bottom: 5px; color: #666966;'><h2>$strMsg</h2></li>\n";
    }


    /**
     * Erstellt die Ausgabe für das Resultat.
     * @param $strContent
     * @return mixed
     */
    public function genResult($strContent){
        if(substr_count($strContent, 'ERROR')){
            $strKind = 'error';
        } elseif(substr_count($strContent, 'SUCCESS')){
            $strKind = 'success';
        } else {
            $strKind = 'normal';
        }

        $strColor   = $this->getMsgColor($strKind);
        $strBgColor = $this->getMsgColor($strKind, true);
        $strFormat  = $GLOBALS['TL_LANG']['MSC']['easyDev']['output']['es_easydev_util']['result']['format'];
        $strText    = $GLOBALS['TL_LANG']['MSC']['easyDev']['output']['es_easydev_util']['result'][$strKind];
        return sprintf($strFormat, $strColor, $strColor, $strBgColor, $strText);
    }


    /**
     * Gibt den Farbwert fuer eine Meldung zurueck.
     * @param $strKind
     * @return string
     */
    private function getMsgColor($strKind, $bgcolor = false){
        switch($strKind){
            case 'warning':
                $strColor   = ($bgcolor) ? '#fff3dd' : '#c09853';
                break;
            case 'error':
                $strColor   = ($bgcolor) ? '#ffe6e5' : '#b94a48';
                break;
            case 'success':
                $strColor   = ($bgcolor) ? '#e5ffe6' : '#468847';
                break;
            case 'info':
                $strColor   = ($bgcolor) ? '#dff4ff' : '#3a87ad';
                break;

            default:
                $strColor   = ($bgcolor) ? '#eeeeee' : '#666966';
                break;
        }

        return $strColor;
    }

    /* =================== */
    /* Replace insert tags */
    /* =================== */

    /**
     * Ersetzt Tags ohne den Aufruf von replaceInsterTags.
     * Dies kann sinnvoll sein, um ein Endlosschleife zu vermeiden, wenn InsertTags slebst wieder InsertTags enthalten.
     * Wenn $search = true ist, ist $arrData = array('INSERTTAG' => 'ERSETZUNG'),
     * sonst wird der Teil des arrModuleData erwartet, der die entsprechenden Daten enthaelt.
     * @param $string
     * @param $arrData
     * @return mixed
     */
    public function replaceMyTags($string, $arrData, $prefix = '', $postfix = ''){
        if(count($arrData) && $string != ''){

            if($prefix != '' && !substr_count($prefix, '::')){
                $prefix .= '::';
            }

            foreach($arrData as $tag => $replace){
                switch($tag){
                    case 'fieldoptions':
                    case 'tl_class':
                        $tmpValue   = @unserialize($replace);
                        $replace    = (is_array($tmpValue)) ? $replace : '';
                        break;

                    case 'fieldexclude':
                    case 'fieldfilter':
                    case 'fieldsearch':
                    case 'fieldsort':
                    case 'mandatory':
                    case 'doNotSaveEmpty':
                    case 'alwaysSave':
                    case 'unique':
                    case 'encrypt':
                    case 'doNotCopy':
                    case 'isBoolean':
                    case 'hideInput':
                    case 'doNotShow':
                    case 'disabled':
                    case 'readonly':
                    case 'multiple':
                    case 'submitOnChange':
                    case 'includeBlankOption':
                    case 'choosen':
                    case 'findInSet':
                    case 'helpwizard':
                    case 'nospace':
                    case 'allowHtml':
                    case 'preserveTags':
                    case 'decodeEntities':
                    case 'spaceToUnderscore':
                    case 'datepicker':
                    case 'enableVersioning':
                    case 'closed':
                    case 'notEditable':
                    case 'switchToEdit':
                    case 'doNotCopyRecords':
                    case 'doNotDeleteRecords':
                        $replace = ($replace == 0) ? 'false' : 'true';
                        break;
                }

                // replace tag
                $strTempPrefix  = (!substr_count($tag, '::')) ? $prefix : '';
                $string         = str_replace('{{' . $strTempPrefix . $tag . '}}', $this->serialToList($replace), $string);
            }
        }

        return $string;
    }


    /**
     * Ersetzt die Insert-Tags in den Dateivorlagen.
     * @param $strTag
     * @return bool
     */
    public function replaceMyInsertTags($strBuffer, $strAdd = ''){
        $tags = preg_split('/\{\{(([^\{\}]*|(?R))*)\}\}/', $strBuffer, -1, PREG_SPLIT_DELIM_CAPTURE);

        $strBuffer = '';

        for ($_rit=0; $_rit<count($tags); $_rit+=3){
            $strBuffer .= $tags[$_rit];
            $strTag = $tags[$_rit+1];

            // Skip empty tags
            if ($strTag == ''){
                continue;
            }

            // Run the replacement again if there are more tags (see #4402)
            if (strpos($strTag, '{{') !== false){
                $strTag = $this->replaceMyInsertTags($strTag, $strAdd);
            }

            $arrTag     = explode('::', $strTag);
            $strReplace = false;

            // Projektdaten laden
            $intId = $this->Input->get('id');

            if($intId){
                $this->loadProjectData($intId);
            }

            $intKey = 0;

            // Wenn im ersten Array kein Wert vorhanden ist, das Array mit der Id nehmen.
            while(is_array($this->arrModuleData[$arrTag[0]]) && !array_key_exists($intKey, $this->arrModuleData[$arrTag[0]])){
               if($intKey > 100){
                   break;
               }
               $intKey++;
            }

            // Insert-Tags ersetzen
            if(is_array($arrTag) && count($arrTag) == 2 && is_array($this->arrModuleData) && array_key_exists($arrTag[0], $this->arrModuleData) && array_key_exists($arrTag[1], $this->arrModuleData[$arrTag[0]][$intKey])){

                switch($strTag){
                    case 'table::enableVersioning':
                        $strReplace = ($this->arrModuleData[$arrTag[0]][$intKey][$arrTag[1]] == 0) ? 'false' : 'true';
                        break;

                    default:
                        $strReplace = $this->serialToList($this->arrModuleData[$arrTag[0]][$intKey][$arrTag[1]]);
                }
            }

            $strBuffer .=  $strReplace;
        }

        return $strBuffer;
    }


    /**
     * Erstellt aus einem serialisierten Array eine kommagetrennte Liste.
     * @param $strSerial
     * @return string
     */
    public function serialToList($strSerial , $strGlue = '\', \''){
        $arrData = @unserialize($strSerial);
        $strList = '';

        if(is_array($arrData[0])){
            foreach($arrData as $arrValue){
                $strList .= "'" . $arrValue['value'] . "' => '" . $arrValue['label'] . "', ";
            }

            $strList = substr($strList, 0, -2);
            return $strList;
        } else {
            if(is_array($arrData)){
                $strList .= "'" . implode($strGlue, $arrData) . "'";
                return $strList;
            } else {
                return $strSerial;
            }
        }
    }


    /**
     * Erzeugt den SQL-String fuer ein Feld.
     * @param $arrField
     * @param $strCompatibility
     * @return string
     */
    public function genSql($arrField, $strCompatibility, $bolForDca = true){
        $arrNoLength    = array('text', 'timestamp', 'date', 'blob');

        if($bolForDca){
            $strSql = "'sql'                     => \"";
        } else {
            $strSql = '';
        }

        // Bei Kompatibilitaet zu Contao 2.11.x den SQL-String im DCA auskommentieren!
        if($strCompatibility == '211x' && $bolForDca){
            $strSql = '#' . $strSql;
        }

        // Feldname einfuegen, wenn eine database.sql erstellt wird
        if(!$bolForDca){
            $strSql = '`' . $arrField['fieldname'] . '` ';
        }

        // Feldart einfügen
        $strSql .= $arrField['fieldkind'];

        // Bei Feldern mit Laengenangabe, dies einfuegen.
        if(!in_array($arrField['fieldkind'], $arrNoLength)){
            $strSql .= '(' . $arrField['fieldlength'] . ') ';
        } else {
            $strSql .= ' ';
        }

        // Bei Feldern vom Typ integer 'unsigned' einfuegen, wenn die Laengenangabe kein Komma enthaelt.
        if($arrField['fieldkind'] == 'int' && substr_count($arrField['fieldlength'], ',') == 0){
            $strSql .= 'unsigned ';
        }

        // NULL oder NOT NULL einfuegen
        if($arrField['allownull']){
            $strSql .= 'NULL ';
        } else {
            $strSql .= 'NOT NULL ';
        }

        // Wenn der Feldtyp nicht text oder blob ist, einen Defaultwert einfuegen.
        if($arrField['fieldkind'] != 'text' && $arrField['fieldkind'] != 'blob'){
            $strDefault = ($arrField['defaultvalue'] != '') ? $arrField['defaultvalue'] : "";
            $strSql .= 'default ';

            // Defaultwert bei int ist 0, nicht '' (s. #1033)
            if($arrField['fieldkind'] == 'int' && ($strDefault == "''" || $strDefault == '')){
                $strDefault = "0";
            }

            // Defaultwert fuer checkbox muss '' sein nicht 0 (s. #1037)
            if($arrField['fieldtype'] == 'checkbox' && $strDefault == "0"){
                $strDefault = "";
            }

            // bei Strings und Leerenzeichenketten Anfuehrungszeichen einfuegen (s. #1032)
            if(($arrField['fieldkind'] == 'varchar' || $arrField['fieldkind'] == 'char') && !substr_count($strDefault, "'")){
                $strDefault = "'$strDefault'";
            }

            // Bei Leerstrings nur Anfuehrungszeichen einfuegen (s. #1072)
            if($strDefault == "''" || $strDefault == ''){
                $strDefault = "''";
            }

            $strSql .= $strDefault;
        }

        $strSql = rtrim($strSql);

        if($bolForDca){
            $strSql .= "\", ";
        } else {
            $strSql .= ',';
        }

        return $strSql;
    }


    /**
     * Erzeugt die Callbacks fuer die Felder einer Tabelle.
     * @param $arrData
     * @return string
     */
    public function genFieldCallbacks($arrData){
        $strData = '';

        // Tabellen-Callbacks erstellen
        if(is_array($arrData) && count($arrData)){
            foreach($arrData as $arrField){
                $strData .= $this->genCallbacks($arrField);
            }
        }

        return $strData;
    }


    /**
     * Erstellt den String mit den Callbacks.
     * @param $arrData
     * @return string
     */
    public function genCallbacks($arrData){
        $this->loadLanguageFile('snipets');
        $strData = '';

        // Tabellen-Callbacks erstellen
        if(is_array($arrData) && count($arrData)){
            foreach($arrData as $strKey => $strValue){
                if(substr_count($strKey, 'callback') && $strValue != ''){
                    $strKey = str_replace('callback', '', $strKey);
                    $strData .= "\n" . sprintf($GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback'][$strKey], $strValue);
                }
            }

        }

        return $strData;
    }
}