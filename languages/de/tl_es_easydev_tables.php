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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['title']                = array('Title', 'Bitte geben Sie den Titel des Moduls ein.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['table_name']           = array('Tabellenname', 'Bitte geben Sie den Namen der Tabelle ein. Der Name sollte mit tl_ beginnen!');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['description']          = array('Beschreibung', 'Bitte geben Sie die Beschreibung der Tabelle ein.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['sortingfields']        = array('Sortierfelder ', 'Bitte geben Sie die Sortierfelder ein.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['sortingmode']          = array('Sortierungsmodus ', 'Bitte wählen Sie den Sortierungsmodus aus.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['headerfields']         = array('Header-Felder ', 'Bitte geben Sie die Header-Felder ein.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['labelfields']          = array('Beschriftungsfelder', 'Bitte geben Sie die Beschriftungsfelder ein.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['labelformat']          = array('Format-String', 'Bitte geben Sie den Format-String  ein.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['labelcallback']        = array('label_callback', 'Bitte geben Sie den Namen der label_callback-Methode ein.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['panellayout']          = array('Paneellayout', 'Bitte geben Sie den String für das Paneellayout ein.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['sortingflag']          = array('Sortierflag', 'Bitte wählen Sie den Sortierflag aus.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['dataContainer']        = array('Data Container', 'Bitte wählen Sie den Data Container-Typ aus.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['ptable']               = array('Elterntabelle', 'Bitte geben Sie die Elterntabelle ein.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['ctable']               = array('Kindtabellen', 'Bitte geben Sie die Kindtabellen ein.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['validFileTypes']       = array('Dateitypen', 'Kommagetrennte Liste gültiger Dateiendungen (nur für Dateibäume).');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['uploadScript']         = array('Dateiname für das UploadScript', 'Dateiname des FancyUpload-Skripts im Ordner `system/config` (ohne Dateiendung).');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['closed']               = array('Tabelle schießen', 'Verbietet das Anlegen neuer Datensätze in der Tabelle.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['notEditable']          = array('Bearbeitung sperren', 'Verbietet das Bearbeiten der Tabelle.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['switchToEdit']         = array('Speichern und Bearbeiten', 'Aktiviert die "Speichern und Bearbeiten"-Schaltfläche beim Anlegen eines neuen Datensatzes (nur Sortierungsmodus 4).');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['enableVersioning']     = array('Versionierung', 'Aktiviert das Anlegen einer neuen Version beim Speichern eines Datensatzes.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['doNotCopyRecords']     = array('Kinddatensätze nicht kopieren', 'Verhindert die Duplizierung der Kinddatensätze, wenn ein Datensatz der Elterntabelle dupliziert wird.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['doNotDeleteRecords']   = array('Kinddatensätze nicht löschen', 'Verhindert die Löschung der Kinddatensätze, wenn ein Datensatz der Elterntabelle gelöscht wird.');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['onloadcallback']       = array('onload_callback', 'Bitte geben Sie den Namen der onload_callback-Methode ein. (Die Methode wird immer in der Klasse der Tabelle angelegt, so dass kein Klassenname angegeben wird!)');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['onsubmitcallback']     = array('onsubmit_callback', 'Bitte geben Sie den Namen der onsubmit_callback-Methode ein. (Die Methode wird immer in der Klasse der Tabelle angelegt, so dass kein Klassenname angegeben wird!)');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['ondeletecallback']     = array('ondelete_callback', 'Bitte geben Sie den Namen der ondelete_callback-Methode ein. (Die Methode wird immer in der Klasse der Tabelle angelegt, so dass kein Klassenname angegeben wird!)');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['oncutcallback']        = array('oncut_callback', 'Bitte geben Sie den Namen der oncut_callback-Methode ein. (Die Methode wird immer in der Klasse der Tabelle angelegt, so dass kein Klassenname angegeben wird!)');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['oncopycallback']       = array('oncopy_callback', 'Bitte geben Sie den Namen der oncopy_callback-Methode ein. (Die Methode wird immer in der Klasse der Tabelle angelegt, so dass kein Klassenname angegeben wird!)');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['childrecordcallback']  = array('child_record_callback', 'Bitte geben Sie den Namen der child_record_callback-Methode ein. (Die Methode wird immer in der Klasse der Tabelle angelegt, so dass kein Klassenname angegeben wird!)');
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['groupcallback']        = array('group_callback', 'Bitte geben Sie den Namen der group_callback-Methode ein. (Die Methode wird immer in der Klasse der Tabelle angelegt, so dass kein Klassenname angegeben wird!)');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['title_legend']     = 'Title';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['sorting_legend']   = 'Sortierung';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['label_legend']     = 'Beschriftung';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['callback_legend']  = 'Callbacks';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['settings_legend']  = 'Einstellungen';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['new'][0]           = 'Neues Modul';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['new'][1]           = 'Ein neues Modul erstellen';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['show'][0]          = 'Moduldetails';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['show'][1]          = 'Details des Moduls  ID %s anzeigen';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['edit'][0]          = 'Modul bearbeiten';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['edit'][1]          = 'Modul ID %s bearbeiten';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['copy'][0]          = 'Modul duplizieren';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['copy'][1]          = 'Modul ID %s duplizieren';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['delete'][0]        = 'Modul löschen';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['delete'][1]        = 'Modul ID %s löschen';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['editfields'][0]    = 'Felder bearbeiten';
$GLOBALS['TL_LANG']['tl_es_easydev_tables']['editfields'][1]    = 'Felder des Moduls ID %s bearbeiten';