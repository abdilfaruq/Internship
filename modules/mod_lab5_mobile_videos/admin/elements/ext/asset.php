<?php
/**
 * @name : Lab5 - jPowerTools
 * @package     Joomla.Plugin
 * @subpackage  System.jpowertools
 *
 * @author	:	Lab5 - Dennis Riegelsberger
 * @authorUrl	:	http://lab5.ch
 * @authorEmail	:	info@lab5.ch
 * @copyright	:	(C) Lab5 - Dennis Riegelsberger. All rights reserved.
 * @copyrightUrl	:	http://lab5.ch
 * @license	:	GNU General Public License version 2 or later;
 * @licenseUrl	:	http://www.gnu.org/licenses/gpl-2.0.html
 * @project	:	http://lab5.ch/blog
 * @release	:	1.x
 * @file-ver	:	1.0.0
 */
 
defined('_JEXEC') or die;

jimport('joomla.form.formfield');
JHtml::_('behavior.framework', true);

class JFormFieldAsset extends JFormField {
	
		/////////////////////////////////////////////////////
        protected $type = 'Asset';
		/////////////////////////////////////////////////////

        protected function getInput() {
              
                //return '<script src="'.JURI::root().$this->element['path'].'script.js"></script>';
                //JFactory::getDocument()->addStyleSheet(JURI::root().$this->element['path'].'style.css');  
				$csspath = str_replace( JPATH_ROOT.DIRECTORY_SEPARATOR, '', __DIR__ ).'/m/style.css'; 
				$csspath = JURI::root(false).str_replace( DIRECTORY_SEPARATOR, '/', $csspath ); 
                JFactory::getDocument()->addStyleSheet( $csspath );  
        }
}