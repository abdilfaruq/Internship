<?php
/*
		/////////////////////////////////////////
		# Package Information: #
		/////////////////////////////////////////
		
				name : Lab5 Mobile Videos Module
				creationDate	:	2011-12-01
				author	:	Lab5 - Dennis Riegelsberger
				authorUrl	:	http://lab5.ch
				authorEmail	:	info@lab5.ch
				copyright	:	(C) Lab5 - Dennis Riegelsberger
				copyrightUrl	:	http://lab5.ch
				license	:	GNU/GPL
				licenseUrl	:	http://www.gnu.org/licenses/gpl.html
				project	:	http://lab5.ch/blog
				release	:	1.0.0
				file-ver	:	1.0.0

		/////////////////////////////////////////
*/
/*
		/////////////////////////////////////////
		//super-uber-thanks for this file to michael gilkes
		//http://michaelgilkes.info/2012/12/04/
		//key-tip-to-making-a-single-installer-for-joomla-extension/
		/////////////////////////////////////////
*/
// no direct access
defined('_JEXEC') or die('Restricted access');

class mod_lab5_mobile_videosInstallerScript
{
		private $source_file_name = 'mod_lab5_mobile_videos.j16-j30.xml';
		private $dest_file_name 	= 'mod_lab5_mobile_videos.xml';
		
    function preflight($route, $adapter) {}
     
    function install($adapter) {}
 
    function update($adapter) {}
 
    function uninstall($adapter) {}
 
    function postflight($route, $adapter)
    {
        if (stripos($route, 'install') !== false || stripos($route, 'update') !== false)
        {
            return $this->fixManifest($adapter);
        }
    }
     
    private function fixManifest($adapter)
    {
				
        $filesource = $adapter->get('parent')->getPath('extension_root').'/'.$this->source_file_name;
        $filedest = $adapter->get('parent')->getPath('extension_root').'/'.$this->dest_file_name;
         
        if (!(JFile::move($filesource, $filedest)))
        {
            JLog::add(JText::_('JLIB_FILESYSTEM_ERROR_WARNFS_ERR02').'Failed to move(rename) file from '.$this->source_file_name. ' to '.$this->dest_file_name, JLog::WARNING, 'jerror');
             
            if (class_exists('JError'))
            {
                JError::raiseWarning(1, 'JInstaller::install: '.'Failed to move(rename) file from '.$this->source_file_name. ' to '.$this->dest_file_name );
            }
            else
            {
                throw new Exception('JInstaller::install: '.'Failed to move(rename) file from '.$this->source_file_name. ' to '.$this->dest_file_name );
            }
            return false;
        }
				
        return true;
    }
}
?>