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
 * BACK END MODULES
 *
 * Back end modules are stored in a global array called "BE_MOD". You can add
 * your own modules by adding them to the array.
 *
 * $GLOBALS['BE_MOD'] = array
 * (
 *    'group_1' => array
 *    (
 *       'module_1' => array
 *       (
 *          'tables'       => array('table_1', 'table_2'),
 *          'callback'     => 'ClassName',
 *          'key'          => array('Class', 'method'),
 *          'icon'         => 'path/to/icon.gif',
 *          'stylesheet'   => 'path/to/stylesheet.css',
 *          'javascript'   => 'path/to/javascript.js'
 *       )
 *    )
 * );
 *
 * Not all of the keys mentioned above (like "tables", "key", "callback" etc.)
 * have to be set. Take a look at the system/modules/core/config/config.php
 * file to see how back end modules are configured.
 */
$GLOBALS['BE_MOD']['system']['es_easydev_projects'] = array(
    'tables'        => array('tl_es_easydev_projects', 'tl_es_easydev_tables', 'tl_es_easydev_fields'),
    'icon'          => "system/modules/$strModule/assets/img/projects.png",
    'compilemodule' => array('es_easydev', 'compileModule')
);


/**
 * FRONT END MODULES
 *
 * Front end modules are stored in a global array called "FE_MOD". You can add
 * your own modules by adding them to the array.
 *
 * $GLOBALS['FE_MOD'] = array
 * (
 *    'group_1' => array
 *    (
 *       'module_1' => 'ModuleClass1',
 *       'module_2' => 'ModuleClass2'
 *    )
 * );
 *
 * The keys (like "module_1") are the module names, which are e.g. stored in the
 * database and used to find the corresponding translations. The values (like
 * "ModuleClass1") are the names of the classes, which will be loaded when the
 * module is rendered. The class "ModuleClass1" has to be stored in a file
 * named "ModuleClass1.php" in your module folder.
 */


/**
 * CONTENT ELEMENTS
 *
 * Content elements are stored in a global array called "TL_CTE". You can add
 * your own content elements by adding them to the array.
 *
 * $GLOBALS['TL_CTE'] = array
 * (
 *    'group_1' => array
 *    (
 *       'cte_1' => 'ContentClass1',
 *       'cte_2' => 'ContentClass2'
 *    )
 * );
 *
 * The keys (like "cte_1") are the element names, which are e.g. stored in the
 * database and used to find the corresponding translations. The values (like
 * "ContentClass1") are the names of the classes, which will be loaded when the
 * element is rendered. The class "ContentClass1" has to be stored in a file
 * named "ContentClass1.php" in your module folder.
 */


/**
 * BACK END FORM FIELDS
 *
 * Back end form fields are stored in a global array called "BE_FFL". You can
 * add your own form fields by adding them to the array.
 *
 * $GLOBALS['BE_FFL'] = array
 * (
 *    'input'  => 'FieldClass1',
 *    'select' => 'FieldClass2'
 * );
 *
 * The keys (like "input") are the field names, which are e.g. stored in the
 * database and used to find the corresponding translations. The values (like
 * "FieldClass1") are the names of the classes, which will be loaded when the
 * field is rendered. The class "FieldClass1" has to be stored in a file named
 * "FieldClass1.php" in your module folder.
 */


/**
 * FRONT END FORM FIELDS
 *
 * Front end form fields are stored in a global array called "TL_FFL". You can
 * add your own form fields by adding them to the array.
 *
 * $GLOBALS['TL_FFL'] = array
 * (
 *    'input'  => 'FieldClass1',
 *    'select' => 'FieldClass2'
 * );
 *
 * The keys (like "input") are the field names, which are e.g. stored in the
 * database and used to find the corresponding translations. The values (like
 * "FieldClass1") are the names of the classes, which will be loaded when the
 * field is rendered. The class "FieldClass1" has to be stored in a file named
 * "FieldClass1.php" in your module folder.
 */


/**
 * PAGE TYPES
 *
 * Page types are stored in a global array called "TL_PTY". You can add your own
 * page types by adding them to the array.
 *
 * $GLOBALS['TL_PTY'] = array
 * (
 *    'type_1' => 'PageType1',
 *    'type_2' => 'PageType2'
 * );
 *
 * The keys (like "type_1") are the field names, which are e.g. stored in the
 * database and used to find the corresponding translations. The values (like
 * "PageType1") are the names of the classes, which will be loaded when the
 * page is rendered. The class "PageType1" has to be stored in a file named
 * "PageType1.php" in your module folder.
 */


/**
 * MODEL MAPPINGS
 *
 * Model names are usually built from the table names, e.g. "tl_user_group"
 * becomes "UserGroupModel". There might be situations, however, where you need
 * to specify a custom mapping, e.g. when you are using nested namespaces.
 *
 * $GLOBALS['TL_MODELS'] = array
 * (
 *    'tl_user'       => 'Vendor\Application\UserModel',
 *    'tl_user_group' => 'Vendor\Application\UserGroupModel'
 * );
 *
 * You can register your mappings in the config.php file of your extension.
 */


/**
 * MAINTENANCE MODULES
 *
 * Maintenance modules are stored in a global array called "TL_MAINTENANCE". You
 * can add your own maintenance modules by adding them to the array.
 *
 * $GLOBALS['TL_MAINTENANCE'] = array
 * (
 *    'ClearCache',
 *    'RebuildSearchIndex'
 * );
 *
 * Take a look at the system/modules/core/classes/PurgeData.php file to see how
 * maintenance modules are set up. The class "ClearCache" has to be stored in a
 * file named "ClearCache.php" in your module folder.
 */


/**
 * PURGE JOBS
 *
 * Purge jobs are stored in a global array called "TL_PURGE". You can add your
 * own purge jobs by adding them to the array.
 *
 * $GLOBALS['TL_PURGE'] = array
 * (
 *    'job_1' => array
 *    (
 *       'tables' => array
 *       (
 *          'index' => array
 *          (
 *             'callback' => array('Automator', 'purgeSearchTables'),
 *             'affected' => array('tl_search', 'tl_search_index')
 *          ),
 *       )
 *   );
 *
 * There are three categories: "tables" stores jobs which truncate database
 * tables, "folders" stores jobs which purge folders and "custom" stores jobs
 * which only trigger a callback function.
 */


/**
 * CRON JOBS
 *
 * Cron jobs are stored in a global array called "TL_CRON". You can add your own
 * cron jobs by adding them to the array.
 *
 * $GLOBALS['TL_CRON'] = array
 * (
 *    'monthly' => array
 *    (
 *       array('Automator', 'purgeImageCache')
 *    ),
 *    'weekly'   => array(),
 *    'daily'    => array(),
 *    'hourly'   => array(),
 *    'minutely' => array()
 * );
 *
 * Note that this is rather a command scheduler than a cron job, which does not
 * guarantee an exact execution time. You can replace the command scheduler with
 * a real cron job though.
 */


/**
 * HOOKS
 *
 * Hooks are stored in a global array called "TL_HOOKS". You can register your
 * own functions by adding them to the array.
 *
 * $GLOBALS['TL_HOOKS'] = array
 * (
 *    'hook_1' => array
 *    (
 *       array('MyClass', 'myPostLogin'),
 *       array('MyClass', 'myPostLogout')
 *    )
 * );
 *
 * Hooks allow you to add functionality to the core without having to modify the
 * source code by registering callback functions to be executed on a particular
 * event. For more information see https://contao.org/manual.html.
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][]         = array('es_easydev_util', 'replaceMyInsertTags');


/**
 * HOOKS für easyDev
 *
 * $GLOBALS['TL_HOOKS']['easydev_copyfiles'] = array('KLASSE', 'METHODE');
 * =======================================================================
 * Wird vor dem Kopieren der zusätzlichen Dateien ausgeführt, erhält den Pfad zum Verzeichnis der Erweiterung
 * und erwartet keinen Rückgabewert. Kann genutzt werden, um zusätzlich eigene Dateien zu kopieren.
 *
 * $GLOBALS['TL_HOOKS']['easydev_maketemplates'] = array('KLASSE', 'METHODE');
 * ===========================================================================
 * Wird verwendet, um zusätzliche Templates zu in die Erweiterung zu integrieren, erhält den Pfad zum
 * Verzeichnis der Erweiterung und erwartet ein Array mit folgendem Aufbau als Rueckgabewert:
 * $return = array(
 *      array('PFADzurQUELLDATEI', 'PFADzurZIELDATEI'),
 *      array('PFADzurQUELLDATEI', 'PFADzurZIELDATEI'),
 * );
 */


/**
 * AUTO ITEMS
 *
 * Auto items are stored in a global array called "TL_AUTO_ITEM". You can
 * register your own auto items by adding them to the array.
 *
 * $GLOBALS['TL_AUTO_ITEM'] = array('items', 'events');
 *
 * Auto items are keywords, which are used as parameters by certain modules.
 * When rebuilding the search index URLs, Contao needs to know about these
 * keywords so it can handle them properly.
 */


/**
 * es_easyDev - Einstellungen
 */

// Kompatibilitätseinstellungen
$GLOBALS['EASYDEV']['tl_es_easydev_projects']['compatibility'] = array(
    '211x'              => 'Contao 2.11.x'
);

// Sortiermode - Auswahl
$GLOBALS['EASYDEV']['tl_es_easydev_tables']['sortingmode'] = array(
    '0'                 => '0 Keine Sortierung',
    '1'                 => '1 Sortierung nach einem festen Feld',
    '2'                 => '2 Sortierung nach einem variablen Feld',
    '3'                 => '3 Sortierung anhand der Elterntabelle',
    '4'                 => '4 Darstellung der Kinddatensätze eines Elterndatensatzes (vgl. Stylesheets-Modul)',
    '5'                 => '5 Darstellung als Baum (vgl. Seitenstruktur)',
    '6'                 => '6 Sortierung der Kinddatensätze anhand eines Baumes (vgl. Artikelverwaltung)'
);

// Sortierflag - Auswahl
$GLOBALS['EASYDEV']['tl_es_easydev_tables']['sortingflag'] = array(
    1                   => '1 Aufsteigende Sortierung nach Anfangsbuchstabe',
    2                   => '2 Absteigende Sortierung nach Anfangsbuchstabe',
    3                   => '3 Aufsteigende Sortierung nach den ersten beiden Buchstaben',
    4                   => '4 Absteigende Sortierung nach den ersten beiden Buchstaben',
    5                   => '5 Aufsteigende Sortierung nach Tag',
    6                   => '6 Absteigende Sortierung nach Tag',
    7                   => '7 Aufsteigende Sortierung nach Monat',
    8                   => '8 Absteigende Sortierung nach Monat',
    9                   => '9 Aufsteigende Sortierung nach Jahr',
    10                  => '10 Absteigende Sortierung nach Jahr',
    11                  => '11 Aufsteigende Sortierung',
    12                  => '12 Absteigende Sortierung'
);

// DataContainer - Treiber
$GLOBALS['EASYDEV']['tl_es_easydev_tables']['dataContainer'] = array(
    'Table'             => 'Tabellen',
    'File'              => 'lokale Konfigurationsdatei',
    'Folder'            => 'Dateiverwaltung'
);

// Feldtypen
$GLOBALS['EASYDEV']['tl_es_easydev_fields']['fieldtype'] = array(
    'text'              => 'Textfeld',
    'password'          => 'Passwortfeld',
    'textarea'          => 'Textarea',
    'select'            => 'Drop-Down-Menü',
    'checkbox'          => 'Checkbox',
    'radio'             => 'Radio-Button',
    'radioTable'        => 'Tabelle mit Bildern und Radio-Buttons',
    'inputUnit'         => 'Textfeld mit Drop-Down-Menü zur Auswahl der Einheit',
    'trbl'              => 'Vier Textfelder mit Drop-Down-Menü zur Auswahl der Einheit',
    'chmod'             => 'CHMOD-Tabelle',
    'pageTree'          => 'Seitenbaum',
    'fileTree'          => 'Dateibaum',
    'tableWizard'       => 'Tabellenassistent',
    'listWizard'        => 'Listenassistent',
    'optionWizard'      => 'Optionsassistent',
    'moduleWizard'      => 'Modulassistent',
    'checkboxWizard'    => 'Checkbox-Assistent'
);

// Feldarten
$GLOBALS['EASYDEV']['tl_es_easydev_fields']['fieldkind'] = array(
    'int'               => 'Ganzzahl (int)',
    'decimal'           => 'Dezimal (decimal)',
    'float'             => 'Gleitkommazahl (float)',
    'varchar'           => 'Zeichenfolge mit variabler Länge (varchar)',
    'char'              => 'Zeichenfolge mit fester Länge (char)',
    'text'              => 'Text (text)',
    'timestamp'         => 'Zeit (timestamp)',
    'date'              => 'Datum (date)',
    'blob'              => 'Binary Large Objects (blob)'
);

// Regulaere-Ausdruecke
$GLOBALS['EASYDEV']['tl_es_easydev_fields']['rgxp'] = array(
    'digit'             => 'erlaubt nur numerische Zeichen',
    'alpha'             => 'erlaubt nur alphabetische Zeichen',
    'alnum'             => 'erlaubt nur alphanumerische Zeichen',
    'extnd'             => 'erlaubt alles außer #&()/',
    'prcnt'             => 'erlaubt Zahlen zwischen 0 und 100',
    'date'              => 'prüft auf ein gültiges Datum',
    'time'              => 'prüft auf eine gültige Uhrzeit',
    'datim'             => 'prüft auf ein gültiges Datum mit Uhrzeit',
    'email'             => 'prüft auf eine gültige E-Mail-Adresse',
    'friendly'          => 'prüft auf eine gültige E-Mail-Adresse im "friendly name format"',
    'url'               => 'prüft auf eine gültige URL',
    'phone'             => 'prüft auf eine gültige Telefonnummer'
);

// Zeilenumbruch
$GLOBALS['EASYDEV']['tl_es_easydev_fields']['wrap'] = array(
    'off'               => 'Zeilenumbruch ausschalten',
    'soft'              => 'Weicher Zeilenumbruch',
    'hard'              => 'Harter Zeilenumbruch'
);

// Rich Text Editor Konfiguration
$GLOBALS['EASYDEV']['tl_es_easydev_fields']['rte'] = array(
    'tinyMCE'           => 'tinyMCE verwenden',
    'tinyFlash'         => 'tinyFlash verwenden'
);

// Feldtyp fuer den Dateibaum
$GLOBALS['EASYDEV']['tl_es_easydev_fields']['itemfieldType'] = array(
    'checkbox'          => 'Checkbox - erlaubt die Auswahl mehrerer Dateien',
    'radio'             => 'Radio - erlaubt die Auswahl genau einer Datei'
);

// Felder-Gruppen fuer die FE-Bearbeitung
$GLOBALS['EASYDEV']['tl_es_easydev_fields']['feGroup'] = array(
    'personal'          => 'Persönliche Daten',
    'address'           => 'Adressdaten',
    'contact'           => 'Kontaktdaten',
    'login'             => 'Login-Daten (nur Tabelle tl_member)'
);

// Contao-CSS-Klasse
$GLOBALS['EASYDEV']['tl_es_easydev_fields']['tlclass'] = array(
    'w50'               => 'w50 - Setzt die Feldbreite auf 50% und floatet das Element (float:left).',
    'clr'               => 'clr - Hebt alle Floats auf.',
    'wizard'            => 'wizard - Verkürzt das Eingabefeld, damit genug Platz für den Wizard (z.B. Date Picker) ist.',
    'long'              => 'long - Lässt das Eingabefeld zwei Spalten umspannen.',
    'm12'               => 'm12 - Fügt dem Element einen oberen Abstand von 12 Pixeln hinzu (z.B. für einzelne Checkboxen)'
);


// Verzeichnisstruktur
$GLOBALS['EASYDEV']['es_easydev']['folder'] = array(
    'assets',
    'assets/css',
    'assets/img',
    'assets/js',
    'config',
    'dca',
    'languages',
    'templates'
);
