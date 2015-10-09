<?php

/**
 * CSV Table Content Element for Contao CMS (Copyright (c) 2005-2015 Leo Feyer)
 *
 * Copyright (c) 2015 Andreas Fieger
 *
 * @license LGPL-3.0+
 */


/**
 * Content element "csvtable".
 *
 * @author Andreas Fieger <https://github.com/fiedsch>
 */
class ContentCsvTable extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_csvtable';


	/**
	 * Return if the data file does not exist
	 * @return string
	 */
	public function generate()
	{


		if ($this->sourcefile == '')
		{
		  return ''; 
		}

		$objFile = \FilesModel::findByUuid($this->sourcefile);

		if ($objFile === null)
		{
			if (!\Validator::isUuid($this->singleSRC))
			{
				return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
			}

			return '';
		}

		if (!is_file(TL_ROOT . '/' . $objFile->path))
		{
			return '';
		}

		$this->sourcefile = $objFile->path;

		return parent::generate();
	}


	/**
	 * Generate the content element
	 */
	protected function compile()
	{

	  try {

	    $file = new \File($this->sourcefile, true); 

	    if (!$file->exists()) {
	      
	      throw new \Exception(sprintf('Datei \'%s\' exitiert nicht!', $this->sourcefile));
	      
	    }
	    
	    $filecontent = $file->getContent();
	    
	    $data = trimsplit("\n", $filecontent);

	    // Kopfzeile
	    
	    $header_columns = str_getcsv(array_shift($data), ';'); // ';' mit $this->inputFieldSeparator konfigurierbar machen
	    
	    $this->Template->header_columns = $header_columns;
	    
	    // Daten
	    
	    $row_data = array();
	    
	    foreach($data as $row) {
	      
	      $row_data[] = str_getcsv($row, ';');
	      
	    }
	    
	    $this->Template->row_data = $row_data;
	    
	  } catch (\Exception $e) {

	    // Eintrag in Contao Log ?

	  }

	}
}
