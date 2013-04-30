<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package Es_easydev
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'eS_easyDev',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'tl_es_easydev_fields'      => 'system/modules/es_easydev/tl_es_easydev_fields.php',
	'tl_es_easydev_projects'    => 'system/modules/es_easydev/tl_es_easydev_projects.php',
	'tl_es_easydev_tables'      => 'system/modules/es_easydev/tl_es_easydev_tables.php',
	'es_easydev'                => 'system/modules/es_easydev/es_easydev.php',
	'tl_es_easydev'             => 'system/modules/es_easydev/tl_es_easydev.php',
    'es_easydev_util'           => 'system/modules/es_easydev/es_easydev_util.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'es_easydev_template' => 'system/modules/es_easydev/templates',
));
