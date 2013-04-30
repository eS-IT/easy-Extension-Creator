-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- --------------------------------------------------------
 
--
-- Table `tl_es_easydev_projects`
--
 
CREATE TABLE `tl_es_easydev_projects` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `folder` varchar(255) NOT NULL default '',
  `author` varchar(255) NOT NULL default '',
  `copyright` varchar(255) NOT NULL default '',
  `package` varchar(255) NOT NULL default '',
  `license` varchar(255) NOT NULL default '',
  `compatibility` varchar(255) NOT NULL default '',
  `templates` text NULL,
  `beclasses` text NULL,
  `feclasses` text NULL,
  `languages` text NULL,
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------
 
--
-- Table `tl_es_easydev_tables`
--
 
CREATE TABLE `tl_es_easydev_tables` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `sortingmode` varchar(255) NOT NULL default '',
  `sortingfields` text NULL,
  `labelfields` text NULL,
  `labelformat` varchar(255) NOT NULL default '',
  `labelcallback` varchar(255) NOT NULL default '',
  `panellayout` varchar(255) NOT NULL default '',
  `onloadcallback` varchar(255) NOT NULL default '',
  `onsubmitcallback` varchar(255) NOT NULL default '',
  `ondeletecallback` varchar(255) NOT NULL default '',
  `oncutcallback` varchar(255) NOT NULL default '',
  `oncopycallback` varchar(255) NOT NULL default '',
  `headerfields` text NULL,
  `childrecordcallback` varchar(255) NOT NULL default '',
  `sortingflag` varchar(255) NOT NULL default '',
  `dataContainer` varchar(255) NOT NULL default '',
  `ptable` varchar(255) NOT NULL default '',
  `ctable` text NULL,
  `closed` char(1) NOT NULL default '',
  `notEditable` char(1) NOT NULL default '',
  `switchToEdit` char(1) NOT NULL default '',
  `enableVersioning` char(1) NOT NULL default '',
  `doNotCopyRecords` char(1) NOT NULL default '',
  `doNotDeleteRecords` char(1) NOT NULL default '',
  `table_name` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `validFileTypes` varchar(255) NOT NULL default '',
  `uploadScript` varchar(255) NOT NULL default '',
  `groupcallback` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------
 
--
-- Table `tl_es_easydev_fields`
--
 
CREATE TABLE `tl_es_easydev_fields` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `fieldtype` varchar(255) NOT NULL default '',
  `fieldkind` varchar(255) NOT NULL default '',
  `fieldlength` varchar(255) NOT NULL default '',
  `defaultvalue` text NULL,
  `allownull` char(1) NOT NULL default '',
  `fieldexclude` char(1) NOT NULL default '',
  `fieldfilter` char(1) NOT NULL default '',
  `fieldsearch` char(1) NOT NULL default '',
  `fieldsort` char(1) NOT NULL default '',
  `fieldoptions` text NULL,
  `optionscallback` varchar(255) NOT NULL default '',
  `inputfieldcallback` varchar(255) NOT NULL default '',
  `loadcallback` varchar(255) NOT NULL default '',
  `savecallback` varchar(255) NOT NULL default '',
  `helpwizard` char(1) NOT NULL default '',
  `mandatory` char(1) NOT NULL default '',
  `rgxp` varchar(255) NOT NULL default '',
  `cols` varchar(255) NOT NULL default '',
  `rows` varchar(255) NOT NULL default '',
  `wrap` varchar(255) NOT NULL default '',
  `multiple` char(1) NOT NULL default '',
  `size` varchar(255) NOT NULL default '',
  `style` varchar(255) NOT NULL default '',
  `submitOnChange` char(1) NOT NULL default '',
  `nospace` char(1) NOT NULL default '',
  `allowHtml` char(1) NOT NULL default '',
  `preserveTags` char(1) NOT NULL default '',
  `decodeEntities` char(1) NOT NULL default '',
  `doNotSaveEmpty` char(1) NOT NULL default '',
  `alwaysSave` char(1) NOT NULL default '',
  `spaceToUnderscore` char(1) NOT NULL default '',
  `isunique` char(1) NOT NULL default '',
  `encrypt` char(1) NOT NULL default '',
  `trailingSlash` char(1) NOT NULL default '',
  `files` char(1) NOT NULL default '',
  `filesOnly` char(1) NOT NULL default '',
  `extensions` varchar(255) NOT NULL default '',
  `path` varchar(255) NOT NULL default '',
  `itemfieldType` varchar(255) NOT NULL default '',
  `includeBlankOption` char(1) NOT NULL default '',
  `blankOptionLabel` varchar(255) NOT NULL default '',
  `findInSet` char(1) NOT NULL default '',
  `datepicker` char(1) NOT NULL default '',
  `feEditable` char(1) NOT NULL default '',
  `feGroup` varchar(255) NOT NULL default '',
  `feViewable` char(1) NOT NULL default '',
  `doNotCopy` char(1) NOT NULL default '',
  `hideInput` char(1) NOT NULL default '',
  `doNotShow` char(1) NOT NULL default '',
  `isBoolean` char(1) NOT NULL default '',
  `disabled` char(1) NOT NULL default '',
  `readonly` char(1) NOT NULL default '',
  `rte` varchar(255) NOT NULL default '',
  `tlclass` varchar(255) NOT NULL default '',
  `fieldname` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------