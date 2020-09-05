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
 * @license	:	GNU General Public License v 2 or later;
 * @licenseUrl	:	http://www.gnu.org/licenses/gpl-2.0.html
 * @project	:	http://lab5.ch/blog
 * @release	:	1.x
 * @file-ver	:	1.0.0
 */
 
defined('_JEXEC') or die;
jimport('joomla.form.formfield');

class JFormFieldAbout extends JFormField {

	protected $type = 'About';

	protected function getInput() {
		
		
		$configfile = JPATH_ROOT.'/'.$this->element['extensionpath'].'/'.$this->element['extension'].'.xml';
		$xml = simplexml_load_file($configfile);
		$ver = $xml->version;
		$id = strtoupper($this->element['extension']);
							
		return "<div class='descarea'><h1>".JText::_($id)."<small> ver. ".$xml->version."</small></h1>
					<p class='projectwebsite'><a href='".$xml->project."' target='_blank'>Learn more at the ".JText::_($id.'_SHORTNAME')." project website.</a></p>
					<p class='smaller license'>".JText::_($id.'_SHORTNAME')." is released under the <a target='_blank' href='".$xml->licenseUrl."'>".$xml->license.".</a></p>
					
					<div class='descriptionbox'> "
					//<p>Description :</p>
					.JText::_($id.'_DESCRIPTION').'
					</div>
					
					<img height="30" width="auto" src="'.JUri::root(true).'/'.$this->element['extensionpath'].'/admin/elements/ext/m/lab5.jpg" border="0" style="clear:both; float:none; margin:20px 0px;">
					' . JText::_($id.'_CREDITS') . '
					</div>
					';
	}
	//protected function getLabel() { }
}
