<?php

/**
 * CSV Table Content Element for Contao CMS (Copyright (c) 2005-2015 Leo Feyer)
 *
 * Copyright (c) 2015 Andreas Fieger
 *
 * @license LGPL-3.0+
 */


/**
 * Table tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['csvtable']  = '{type_legend},type,headline;{table_legend},sourcefile;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['sourcefile'] = array
  (
   'label'                   => &$GLOBALS['TL_LANG']['tl_content']['sourcefile'],
   'exclude'                 => true,
   'inputType'               => 'fileTree',
   'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>true, 'tl_class'=>'clr'),
   'sql'                     => "binary(16) NULL",
   );



