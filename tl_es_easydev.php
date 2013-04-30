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

/**
 * Class tl_es_easydev
 *
 * @copyright  e@sy Solutions IT 2013
 * @author     Patrick Froch <patrick.froch@easySolutionsIT.de>
 * @package    Devtools
 */
class tl_es_easydev extends \BackendModule
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = '';


	/**
	 * Generate the module
	 */
	protected function compile(){
	}


    /**
     * child_record_callback: Gibt den Titel des Datensatzes zurueck.
     * @param array
     * @return string
     */
    public function cbListDatasets($arrRow){
        return $arrRow['title'];
    }


    /**
     * save_callback: Gibt das erste Zeichen zurueck, noetig, da bei Arrays mit Keys von 0 - ...
     * fuer den Schluessel ebenfalls der Wert genommen wird.
     * @param $varValue
     * @param $dc
     * @return string
     */
    public function cbGetFirstChar($varValue, $dc){
        return substr($varValue, 0, 1);
    }


    /**
     * load_callback: Gibt das erste Zeichen zurueck, noetig, da bei Arrays mit Keys von 0 - ...
     * fuer den Schluessel ebenfalls der Wert genommen wird.
     * @param $varValue
     * @param $dc
     * @return string
     */
    public function cbGetSetting($varValue, $dc){
        return $GLOBALS['EASYDEV']['tl_es_easydev_tables'][$dc->field][$varValue];
    }
}
