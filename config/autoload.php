<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'ContentCsvTable' => 'system/modules/table_from_csv/elements/ContentCsvTable.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_csvtable' => 'system/modules/table_from_csv/templates',
));
