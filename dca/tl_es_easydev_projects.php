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
 * Table tl_es_easydev_projects
 */
$GLOBALS['TL_DCA']['tl_es_easydev_projects'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
        'ctable'                      => array('tl_es_easydev_tables'),
		'enableVersioning'            => true,
        #'switchToEdit'                => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
            'panelLayout'             => 'filter;sort,search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title', 'folder'),
			'format'                  => '%s <span style="color: #999;">[%s]</span>'
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
                'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif',
                'attributes'          => 'class="contextmenu"'
            ),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			),
            'compilemodule' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['compilemodule'],
                'href'                => 'key=compilemodule',
                'icon'                => "/system/modules/$strModule/assets/img/compile-notcompiled.png",
            ),
            'editmodules' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['editmodules'],
                'href'                => 'table=tl_es_easydev_tables',
                'icon'                => "system/modules/$strModule/assets/img/modules.png",
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
		'default'                     => '{title_legend},title,folder,description;{license_legend},author,copyright,package,license;{settings_legend:hide},compatibility,templates,beclasses,feclasses,languages;'
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
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['title'],
			'exclude'                 => true,
            'search'                  => true,
            'sort'                    => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
        'folder' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['folder'],
            'exclude'                 => true,
            'search'                  => true,
            'sort'                    => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'description' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['description'],
            'exclude'                 => true,
            'search'                  => true,
            'sort'                    => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'long'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'author' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['author'],
            'exclude'                 => true,
            'filter'                  => true,
            'search'                  => true,
            'sort'                    => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'copyright' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['copyright'],
            'exclude'                 => true,
            'filter'                  => true,
            'search'                  => true,
            'sort'                    => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'package' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['package'],
            'exclude'                 => true,
            'search'                  => true,
            'sort'                    => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'license' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['license'],
            'exclude'                 => true,
            'filter'                  => true,
            'search'                  => true,
            'sort'                    => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'compatibility' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['compatibility'],
            'exclude'                 => true,
            'filter'                  => true,
            'search'                  => true,
            'sort'                    => true,
            'inputType'               => 'select',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_projects']['compatibility'],
            'eval'                    => array('includeBlankOption' => true, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'beclasses' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['beclasses'],
            'exclude'                 => true,
            'sort'                    => true,
            'inputType'               => 'listWizard',
            'eval'                    => array('tl_class' => 'long clr'),
            'sql'                     => "text NOT NULL"
        ),
        'feclasses' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['feclasses'],
            'exclude'                 => true,
            'sort'                    => true,
            'inputType'               => 'listWizard',
            'eval'                    => array('tl_class' => 'long clr'),
            'sql'                     => "text NOT NULL"
        ),
        'templates' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['templates'],
            'exclude'                 => true,
            'sort'                    => true,
            'inputType'               => 'listWizard',
            'eval'                    => array('tl_class' => 'long clr'),
            'sql'                     => "text NOT NULL"
        ),
        'languages' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_projects']['languages'],
            'exclude'                 => true,
            'sort'                    => true,
            'inputType'               => 'listWizard',
            'eval'                    => array('tl_class' => 'long clr'),
            'sql'                     => "text NOT NULL"
        )
	)
);
