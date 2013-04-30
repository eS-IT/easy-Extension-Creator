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
 * Table {{table::table_name}}
 */
$GLOBALS['TL_DCA']['{{table::table_name}}'] = array
(

	// Config
	'config' => array
	(
		{{table::dataContainer}}
        {{table::enableVersioning}}
        {{table::ptable}}
        {{table::ctable}}
        {{table::closed}}
        {{table::notEditable}}
        {{table::validFileTypes}}
        {{table::uploadScript}}
        {{table::switchToEdit}}
        {{table::doNotCopyRecords}}
        {{table::doNotDeleteRecords}}
		/*'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
                'pid' => 'index'
			)
		)*/
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
            {{table::sortingmode}}
            {{table::sortingfields}}
            {{table::sortingflag}}
            {{table::headerfields}}
            {{table::panellayout}}
            {{table::childrecordcallback}}
		),
		'label' => array
		(
            {{table::labelfields}}
            {{table::labelformat}}
            {{table::labelcallback}}
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['{{table::table_name}}']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['{{table::table_name}}']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['{{table::table_name}}']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['{{table::table_name}}']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Edit
	'edit' => array
	(
		'buttons_callback' => array()
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(''),
		'default'                     => '{{palettes::default}}'
	),

	// Subpalettes
	'subpalettes' => array
	(
		''                            => ''
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			#'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
        'pid' => array
        (
            #'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
		'tstamp' => array
		(
			#'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
{{fields::definitions}}
	)
);
