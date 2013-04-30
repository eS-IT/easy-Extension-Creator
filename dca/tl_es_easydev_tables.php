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
 * Table tl_es_easydev_tables
 */
$GLOBALS['TL_DCA']['tl_es_easydev_tables'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
        'ptable'                      => 'tl_es_easydev_projects',
        'ctable'                      => array('tl_es_easydev_fields'),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
                'pid' => 'index'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
            'mode'                    => 4,
            'fields'                  => array('title'),
            'headerFields'            => array('title', 'author', 'folder'),
            'panelLayout'             => 'filter;sort,search,limit',
            'child_record_callback'   => array('tl_es_easydev', 'cbListDatasets'),
            'flag'                    => 1
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
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
                'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif',
                'attributes'          => 'class="contextmenu"'
            ),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			),
            'editfields' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['editfields'],
                'href'                => 'table=tl_es_easydev_fields',
                'icon'                => 'system/modules/es_easydev/assets/img/fields.png',
                'attributes'          => 'class="contextmenu"'
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
		'default'                     => '{title_legend},title,table_name,dataContainer,description;{settings_legend},ptable,ctable,validFileTypes,uploadScript,closed,notEditable,enableVersioning,switchToEdit,doNotCopyRecords,doNotDeleteRecords;{sorting_legend},sortingfields,headerfields,sortingmode,sortingflag,panellayout;{label_legend},labelfields,labelformat;{callback_legend},onloadcallback,onsubmitcallback,ondeletecallback,oncutcallback,oncopycallback,labelcallback,groupcallback,childrecordcallback;'
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
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
        'pid' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
        'table_name' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['table_name'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'dataContainer' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['dataContainer'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_tables']['dataContainer'],
            'eval'                    => array('mandatory'=>true, 'alwaysSave' => true),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'description' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['description'],
            'exclude'                 => true,
            'search'                  => true,
            'sort'                    => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'long'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'ptable' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['ptable'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'long'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'ctable' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['ctable'],
            'exclude'                 => true,
            'inputType'               => 'listWizard',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'long'),
            'sql'                     => "text NOT NULL"
        ),
        'validFileTypes' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['validFileTypes'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'uploadScript' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['uploadScript'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'closed' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['closed'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'notEditable' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['notEditable'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'switchToEdit' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['switchToEdit'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'enableVersioning' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['enableVersioning'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'doNotCopyRecords' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['doNotCopyRecords'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'doNotDeleteRecords' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['doNotDeleteRecords'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'sortingmode' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['sortingmode'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_tables']['sortingmode'],
            'save_callback'           => array(array('tl_es_easydev', 'cbGetFirstChar')),
            'load_callback'           => array(array('tl_es_easydev', 'cbGetSetting')),
            'eval'                    => array('mandatory'=>true, 'tl_class' => 'w50', 'alwaysSave' => true),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'sortingfields' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['sortingfields'],
            'exclude'                 => true,
            'inputType'               => 'listWizard',
            'eval'                    => array('maxlength'=>255),
            'sql'                     => "text NOT NULL"
        ),
        'sortingflag' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['sortingflag'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_tables']['sortingflag'],
            'eval'                    => array('mandatory'=>true, 'tl_class' => 'w50', 'alwaysSave' => true),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'headerfields' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['headerfields'],
            'exclude'                 => true,
            'inputType'               => 'listWizard',
            'eval'                    => array('maxlength'=>255),
            'sql'                     => "text NOT NULL"
        ),
        'labelfields' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['labelfields'],
            'exclude'                 => true,
            'inputType'               => 'listWizard',
            'eval'                    => array('maxlength'=>255),
            'sql'                     => "text NOT NULL"
        ),
        'labelformat' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['labelformat'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'default'                 => '%s <span style="color: #b3b3b3;">%s</span>',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'long', 'allowHtml' => true, 'alwaysSave' => true),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'labelcallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['labelcallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'panellayout' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['panellayout'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'default'                 => 'filter;sort,search,limit',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'long'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'onloadcallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['onloadcallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'onsubmitcallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['onsubmitcallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'ondeletecallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['ondeletecallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'oncutcallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['oncutcallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'oncopycallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['oncopycallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'childrecordcallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['childrecordcallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'groupcallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_tables']['groupcallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        )
	)
);
