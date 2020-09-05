<?php
defined('JPATH_BASE') or die;
if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);

jimport('joomla.form.formfield');

class JFormFieldInthemaking extends JFormField {
		
		/////////////////////////////////////////////////////
        protected $type = 'Inthemaking';
		/////////////////////////////////////////////////////
        protected function getInput() {
				 return  'This feature is planed to be realized.';
        }
}