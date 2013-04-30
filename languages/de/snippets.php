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
 * LANGUAGES
 */
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['languages']              = "\$GLOBALS['TL_LANG']['MOD']['{{table::table_name}}'] = array('{{table::title}}', '{{table::description}}');";


/**
 * CONFIG
 */
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['config']                 = "\$arrTemp['{{project::package}}']['{{table::table_name}}'] = array(
    'tables'    => array('{{table::table_name}}', '{{table::ctable}}'),
    'icon'      => 'system/modules/{{project::folder}}/assets/img/default.png'
);";


/**
 * DATABASE.SQL
 */
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['database']['sql']                    = "

-- --------------------------------------------------------
 
--
-- Table `{{table::table_name}}`
--
 
CREATE TABLE `{{table::table_name}}` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
{{table::sql}}  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------";


/**
 * DCA
 */

// config
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['dataContainer']          = "'dataContainer'               => '{{table::dataContainer}}',";                                   // Table | File | Folder
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['enableVersioning']       = "'enableVersioning'            => {{table::enableVersioning}},";                                  // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['closed']                 = "'closed'                      => {{table::closed}},";                                            // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['notEditable']            = "'notEditable'                 => {{table::notEditable}},";                                       // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['switchToEdit']           = "'switchToEdit'                => {{table::switchToEdit}},";                                      // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['doNotCopyRecords']       = "'doNotCopyRecords'            => {{table::doNotCopyRecords}},";                                  // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['doNotDeleteRecords']     = "'doNotDeleteRecords'          => {{table::doNotDeleteRecords}},";                                // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['ptable']                 = "'ptable'                      => '{{table::ptable}}',";                                          // str1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['ctable']                 = "'ctable'                      => array({{table::ctable}}),";                                     // 'str1', 'str2', ...

// list - sorting
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['sortingmode']            = "'mode'                    => {{table::sortingmode}},";                                           // 1 - 6
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['sortingfields']          = "'fields'                  => array({{table::sortingfields}}),";                                // str1, str2, ...
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['sortingflag']            = "'flag'                    => {{table::sortingflag}},";                                           // 1 - 12
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['headerfields']           = "'headerFields'            => array({{table::headerfields}}),";                                   // 'str1', 'str2', ...
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['panellayout']            = "'panelLayout'             => '{{table::panellayout}}',";                                         // filter;sort,search,limit
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['childrecordcallback']    = "'child_record_callback'   => array('{{table::table_name}}', '{{table::childrecordcallback}}'),"; // 1. Klasse der Tabelle, 2. Name der Methode

// list - label
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['labelfields']            = "'fields'                  => array({{table::labelfields}}),";                                    // 'str1', 'str2', ...
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['labelformat']            = "'format'                  => '{{table::labelformat}}',";                                         // %s <span style="color: #b3b3b3;">%s</span>   (Prozentzeichen mit einfuegen!!!)
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['table']['labelcallback']          = "'label_callback'          => array('{{table::table_name}}', '{{table::labelcallback}}'),";       // 1. Klasse der Tabelle, 2. Name der Methode

// fields - definitions
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['fields']['definitions']           = "%s";                                                                                             // alle Field-Strings (mit allen Einstellungen!)
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['fields']['definition']            = "\t\t'{{fields::fieldname}}' => array
		(
		    'label'                   => &\$GLOBALS['TL_LANG']['{{table::table_name}}']['{{fields::fieldname}}'],
%s
		)";                                                                                                                                                                             // 1. alle Einstellungen

// fields - settings
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['fieldexclude']           = "'exclude'                 => {{fields::fieldexclude}},";                                         // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['fieldtype']              = "'inputType'               => '{{fields::fieldtype}}',";                                            // text | select | textarea | ...
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['fieldfilter']            = "'filter'                  => {{fields::fieldfilter}},";                                          // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['fieldsearch']            = "'search'                  => {{fields::fieldsearch}},";                                          // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['fieldsort']              = "'sort'                    => {{fields::fieldsort}},";                                            // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['defaultvalue']           = "'default'                 => {{fields::defaultvalue}},";                                         // var1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['fieldoptions']           = "'options'                 => array({{fields::fieldoptions}}),";                                  // unserialize() -> key, value -> array('KEY', 'VALUE'), array('KEY', 'VALUE'), ...

// fields - callbacks
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['optionscallback']        = "'options_callback'        => array('{{table::table_name}}', '{{fields::fieldname}}'),";          // str1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['loadcallback']           = "'load_callback'           => array(array('{{table::table_name}}','{{fields::fieldname}}')),";    // str1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['inputfieldcallback']     = "'input_field_callback'    => array(array('{{table::table_name}}','{{fields::fieldname}}')),";    // str1

// fields - sql
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['sql']                    = "{{fields::sql}}";

// fields - eval
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['field']['eval']                   = "'eval'                    => array({{fields::eval}})";                                           // eval-strings
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['tlclass']                 = "'tl_class' => {{fields::tlclass}}";                                                              // str1, str2, ...
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['style']                   = "'style' => '{{fields::style}}'";                                                                 // str1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['mandatory']               = "'mandatory' => {{fields::mandatory}}";                                                           // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['doNotSaveEmpty']          = "'doNotSaveEmpty' => {{fields::doNotSaveEmpty}}";                                                 // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['alwaysSave']              = "'alwaysSave' => {{fields::alwaysSave}}";                                                         // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['isunique']                  = "'unique' => {{fields::isunique}}";                                                                 // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['encrypt']                 = "'encrypt' => {{fields::encrypt}}";                                                               // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['doNotCopy']               = "'doNotCopy' => {{fields::doNotCopy}}";                                                           // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['isBoolean']               = "'isBoolean' => {{fields::isBoolean}}";                                                           // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['hideInput']               = "'hideInput' => {{fields::hideInput}}";                                                           // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['doNotShow']               = "'doNotShow' => {{fields::doNotShow}}";                                                           // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['disabled']                = "'disabled' => {{fields::disabled}}";                                                             // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['readonly']                = "'readonly' => {{fields::readonly}}";                                                             // true | false

// fields - eval - select
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['size']                    = "'size' => {{fields::size}}";                                                                     // int1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['multiple']                = "'multiple' => {{fields::multiple}}";                                                             // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['submitOnChange']          = "'submitOnChange' => {{fields::submitOnChange}}";                                                 // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['chosen']                  = "'chosen' => {{fields::submitOnChange}}";                                                        // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['includeBlankOption']      = "'includeBlankOption' => {{fields::includeBlankOption}}";                                         // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['blankOptionLabel']        = "'blankOptionLabel' => '{{fields::blankOptionLabel}}'";                                           // str1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['findInSet']               = "'findInSet' => {{fields::findInSet}}";                                                           // true | false

// fields - eval - text
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['helpwizard']              = "'helpwizard' => {{fields::helpwizard}}";                                                         // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['rgxp']                    = "'rgxp' => '{{fields::rgxp}}'";                                                                   // str1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['cols']                    = "'cols' => {{fields::cols}}";                                                                     // int1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['rows']                    = "'rows' => {{fields::rows}}";                                                                     // int1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['wrap']                    = "'wrap' => {{fields::wrap}}";                                                                     // str1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['rte']                     = "'rte' => '{{fields::rte}}'";                                                                     // str1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['nospace']                 = "'nospace' => {{fields::nospace}}";                                                               // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['allowHtml']               = "'allowHtml' => {{fields::allowHtml}}";                                                           // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['preserveTags']            = "'preserveTags' => {{fields::preserveTags}}";                                                     // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['decodeEntities']          = "'decodeEntities' => {{fields::decodeEntities}}";                                                 // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['spaceToUnderscore']       = "'spaceToUnderscore' => {{fields::spaceToUnderscore}}";                                           // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['datepicker']              = "'datepicker' => {{fields::datepicker}}";                                                         // true | false

// fields - eval - file
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['trailingSlash']           = "'trailingSlash' => {{fields::trailingSlash}}";                                                   // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['files']                   = "'files' => {{fields::files}}";                                                                   // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['filesOnly']               = "'filesOnly' => {{fields::filesOnly}}";                                                           // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['extensions']              = "'extensions' => '{{fields::extensions}}'";                                                       // str1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['path']                    = "'path' => '{{fields::path}}'";                                                                   // str1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['itemfieldType']           = "'itemfieldType' => '{{fields::itemfieldType}}'";                                                 // str1

// fields - eval - frontend
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['feEditable']              = "'feEditable' => {{fields::feEditable}}";                                                         // true | false
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['feGroup']                 = "'feGroup' => '{{fields::feGroup}}'";                                                             // str1
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['eval']['feViewable']              = "'feViewable' => {{fields::feViewable}}";                                                         // true | false


/**
 * CALLBACKS
 */
$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['label']               = '
    /**
     * Description:
     * Erstellt das Label.
     * @param      <array>     $row
     * @param      <string>    $label
     * @return     <string>
     */
    public function %s($row, $label){
        // Do something
        return $newLabel
    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['button']              = '
    /**
     * @param array $arrRow the current row
     * @param string $href the url of the embedded link of the button
     * @param string $label label text for the button
     * @param string $title title value for the button
     * @param string $icon url of the image for the button
     * @param array $attributes additional attributes for the button (fetched from the array key "attributes" in the DCA)
     * @param string $strTable the name of the current table
     * @param $arrRootIds array of the ids of the selected "page mounts" (only in tree view)
     * @param $arrChildRecordIds ids of the childs of the current record (only in tree view)
     * @param boolean $blnCircularReference determines if this record has a circular reference (used to prevent pasting of an cutted item from an tree into any of it`s childs).
     * @param string $strPrevious id of the previous entry on the same parent/child level. Used for move up/down buttons. Not for root entries in tree view.
     * @param string $strNext id of the next entry on the same parent/child level. Used for move up/down buttons. Not for root entries in tree view.
     */
    public function %s($arrRow, $href, $label, $title, $icon, $attributes, $strTable, $arrRootIds, $arrChildRecordIds, $blnCircularReference, $strPrevious, $strNext){
        // do something
        return \'<a href="\'.$this->addToUrl($href).\'" title="\'.specialchars($title).\'"\'.$attributes.\'>\'.$this->generateImage($icon, $label).\'</a> \';
    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['onload']              = '
    /**
     * Description:
     * Fuehrt eine Aktion bei der Initialisierung des DataContainer-Objekts aus.
     * @param      <object>        $dc        DataContainer
     */
    public function %s($dc){
        // do something ...
    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['onsubmit']            = '
    /**
     * Description:
     * Wird beim Abschicken eines Backend-Formulars ausgeführt.
     * @param      <object>        $dc        DataContainer
     */
    public function %s($dc){
        // do something ...
    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['ondelete']            = '
    /**
     * Description:
     * Wird ausgeführt bevor ein Datensatz aus der Datenbank entfernt wird.
     * @param      <object>        $dc        DataContainer
     */
    public function myOndeleteCallback($dc){
        // do something ...
    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['oncut']               = '
    /**
     * Description:
     * Wird ausgeführt nachdem ein Datensatz verschoben wurde. Hinzugefügt in Version 2.8.2.
     */
    public function %s(){
        // do something ...

    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['oncopy']              = '
    /**
     * Description:
     * Wird ausgeführt nachdem ein Datensatz dupliziert wurde. Hinzugefügt in Version 2.8.2.
     */
    public function %s(){
        // do something ...

    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['pastebutton']        = '
    /**
     * Description:
     * Ermöglicht individuelle Einfüge-Schaltflächen und wird z.B. in der Seitenstruktur verwenden,
     * um die Icons abhängig von den Benutzerrechten zu deaktivieren (erfordert eine zusätzliche
     * Prüfung mittels load_callback).
     *
     * @param DataContainer
     * @param array
     * @param string
     * @param boolean
     * @param array
     * @return string
     */
    public function %s(DataContainer $dc, $row, $table, $cr, $arrClipboard=false){
        // do something ...
        return $button;
    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['childrecord']        = '
    /**
     * Description:
     * Legt fest, wie die Kindelemente im "Parent View" dargestellt werden.
     *
     * @param       <array>     $row    die aktuelle Tabellenzeile
     * @return      <string>            formatierte Anzeige für den aktuellen Datensatz
     */
    public function %s($row){
        // do something ...
        // z.B.:
        //$label = $row[\'label\'];
        return $label;
    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['options']             = '
    /**
     * Options_callback: Liesst Elemente aus einer Tabelle aus und gibt das Array zurueck.
     * @param DataContainer $dc
     * @return array
     */
    public function %s(DataContainer $dc){
        $this->import(\'Database\');
        $query  = "SELECT * FROM `tl_TABELLENNAME` WHERE 1";
        $result = $this->Database->query($query);
        $arrData= array();

        if($result->numRows){

            while($result->next()){
                $arrData[$result->id] = $result->tstamp;
            }

            return $arrData;
        } else {
            return array("Keine Daten gefunden");
        }
    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['inputfield']         = '
    /**
     * Erstellt ein Fromularfeld
     * @param DataContainer $dc
     * @return string
     */
    public funktion %s(DataContainer $dc, $strLabel){
        // do something ..
        return $myField;
    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['load']                = '
    /**
     * load_callback: Wird bei der Initialisierung eines Formularfeldes ausgeführt. Ermöglicht z.B. das Laden eines Standardwertes.
     * @param $varValue
     * @param $dc
     * @return var
     */
    public function %s($varValue, DataContainer $dc) {
        // do somethig ...
        return $varValue
    }';

$GLOBALS['TL_LANG']['MSC']['easyDev']['snipets']['callback']['save']                = '
    /**
     * save_callback: Wird beim Abschicken eines Feldes ausgeführt. Ermöglicht z.B. das Hinzufügen einer individuellen Prüfung.
     * @param $varValue
     * @param $dc
     * @return var
     */
    public function %s($varValue, DataContainer $dc) {
            // do somethig ...
            return $varValue
    }';