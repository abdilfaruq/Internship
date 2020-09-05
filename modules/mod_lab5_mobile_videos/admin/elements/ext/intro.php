<?php
defined('JPATH_BASE') or die;
if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);

jimport('joomla.form.formfield');

class JFormFieldIntro extends JFormField {
		
		/////////////////////////////////////////////////////
        protected $type = 'Intro';
		/////////////////////////////////////////////////////
        protected function getInput() {
				 return  $this->description;
        }
}