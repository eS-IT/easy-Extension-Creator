<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   {{project::package}}
 * @author    {{project::author}}
 * @license   {{project::license}}
 * @copyright {{project::copyright}}
 */


/**
 * Namespace
 */
#namespace {{project::package}};

/**
 * Class {{project::be_class_name}}
 *
 * @copyright  e@sy Solutions IT 2013
 * @author     Patrick Froch <patrick.froch@easySolutionsIT.de>
 * @package    {{project::package}}
 */
class {{project::be_class_name}} extends \BackendModule{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = '{{project::be_class_name}}';


	/**
	 * Generate the module
	 */
	protected function compile(){

	}
    {{table::callbacks}}
}