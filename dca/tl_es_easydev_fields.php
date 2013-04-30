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
 * Table tl_es_easydev_fields
 */
$GLOBALS['TL_DCA']['tl_es_easydev_fields'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
        'ptable'                      => 'tl_es_easydev_tables',
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
            'headerFields'            => array('title', 'dataContainer', 'ptable', 'ctable'),
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
				'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['show'],
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
		'default'                     => '{title_legend},title,fieldtype,description,fieldname,fieldkind,fieldlength,defaultvalue;' .
                                         '{settings_legend:hide},allownull,fieldexclude,fieldfilter,fieldsearch,fieldsort;' .
                                         '{eval_legend},tlclass,style,mandatory,doNotSaveEmpty,alwaysSave,isunique,encrypt,doNotCopy,isBoolean,hideInput,doNotShow,disabled,readonly;' .
                                         '{eval_text_legend:hide},helpwizard,rgxp,cols,rows,wrap,rte,nospace,allowHtml,preserveTags,decodeEntities,spaceToUnderscore,datepicker;' .
                                         '{eval_select_legend:hide},size,multiple,chosen,submitOnChange,includeBlankOption,blankOptionLabel,findInSet;' .
                                         '{options_legend:hide},fieldoptions;' .
                                         '{eval_file_legend:hide},trailingSlash,files,filesOnly,extensions,path,itemfieldType;' .
                                         '{eval_frontend_legend:hide},feEditable,feGroup,feViewable;' .
                                         '{callbacks_legend:hide},optionscallback,inputfieldcallback,loadcallback,savecallback;'
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
			'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
        'fieldname' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['fieldname'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'description' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['description'],
            'exclude'                 => true,
            'search'                  => true,
            'sort'                    => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'long'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'fieldtype' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['fieldtype'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_fields']['fieldtype'],
            'eval'                    => array('mandatory'=>true, 'alwaysSave' => true, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'fieldkind' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['fieldkind'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_fields']['fieldkind'],
            'eval'                    => array('mandatory'=>true, 'alwaysSave' => true, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'fieldlength' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['fieldlength'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50', 'rgxp' => 'digit'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'defaultvalue' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['defaultvalue'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "text NOT NULL"
        ),
        'allownull' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['allownull'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'fieldexclude' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['fieldexclude'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'default'                 => 1,
            'eval'                    => array('tl_class' => 'w50 m12', 'alwasySave' => true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'fieldfilter' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['fieldfilter'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'default'                 => 1,
            'eval'                    => array('tl_class' => 'w50 m12', 'alwasySave' => true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'fieldsearch' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['fieldsearch'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'default'                 => 1,
            'eval'                    => array('tl_class' => 'w50 m12', 'alwasySave' => true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'fieldsort' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['fieldsort'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'default'                 => 1,
            'eval'                    => array('tl_class' => 'w50 m12', 'alwasySave' => true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'fieldoptions' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['fieldoptions'],
            'exclude'                 => true,
            'inputType'               => 'optionWizard',
            'eval'                    => array('tl_class' => 'long'),
            'sql'                     => "text NOT NULL"
        ),

        // Callbacks
        'optionscallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['optionscallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'inputfieldcallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['inputfieldcallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'loadcallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['loadcallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'savecallback' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['savecallback'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),

        // Eval-Settings
        'helpwizard' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['helpwizard'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'mandatory' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['mandatory'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'rgxp' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['rgxp'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_fields']['rgxp'],
            'eval'                    => array('alwaysSave' => true, 'tl_class' => 'w50', 'includeBlankOption' => true),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'cols' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['cols'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50', 'rgxp' => 'digit'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'rows' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['rows'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50', 'rgxp' => 'digit'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'wrap' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['wrap'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_fields']['wrap'],
            'eval'                    => array('alwaysSave' => true, 'tl_class' => 'w50', 'includeBlankOption' => true),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'multiple' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['multiple'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'size' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['size'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50', 'rgxp' => 'digit'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'style' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['style'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'rte' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['rte'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_fields']['rte'],
            'eval'                    => array('alwaysSave' => true, 'tl_class' => 'w50', 'includeBlankOption' => true),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'submitOnChange' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['submitOnChange'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'nospace' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['nospace'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'allowHtml' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['allowHtml'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'preserveTags' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['preserveTags'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'decodeEntities' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['decodeEntities'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'doNotSaveEmpty' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['doNotSaveEmpty'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'alwaysSave' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['alwaysSave'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'spaceToUnderscore' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['spaceToUnderscore'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'isunique' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['isunique'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'encrypt' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['encrypt'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'trailingSlash' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['trailingSlash'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'files' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['files'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'filesOnly' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['filesOnly'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'extensions' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['extensions'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'path' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['path'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'itemfieldType' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['itemfieldType'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_fields']['itemfieldType'],
            'eval'                    => array('alwaysSave' => true, 'tl_class' => 'w50', 'includeBlankOption' => true),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'includeBlankOption' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['includeBlankOption'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'blankOptionLabel' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['blankOptionLabel'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'default'                 => '-',
            'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'chosen' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['chosen'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'findInSet' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['findInSet'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'datepicker' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['datepicker'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'default'                 => '',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'feEditable' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['feEditable'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'feGroup' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['feGroup'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_fields']['feGroup'],
            'eval'                    => array('alwaysSave' => true, 'tl_class' => 'w50', 'includeBlankOption' => true),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'feViewable' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['feViewable'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'doNotCopy' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['doNotCopy'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'hideInput' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['hideInput'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'doNotShow' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['doNotShow'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'isBoolean' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['isBoolean'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'disabled' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['disabled'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'readonly' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['readonly'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class' => 'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'tlclass' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_es_easydev_fields']['tlclass'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'options'                 => $GLOBALS['EASYDEV']['tl_es_easydev_fields']['tlclass'],
            'eval'                    => array('tl_class' => 'long', 'multiple' => true),
            'sql'                     => "varchar(255) NOT NULL default ''"
        )
	)
);
