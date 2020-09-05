<?php
defined('JPATH_BASE') or die;
if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);

jimport('joomla.form.formfield');

class JFormFieldJed extends JFormField {
		
		/////////////////////////////////////////////////////
        protected $type = 'Jed';
		/////////////////////////////////////////////////////
        protected function getInput() {
					
				 return  '<a href = "'.$this->element['url'].'" target="_blank">'.JText::_('LAB5_JEDLINK_TXT').'</a>	';
        }
}