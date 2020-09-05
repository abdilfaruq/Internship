<?php

    /**
* @title		video slider module
* @website		http://www.joombest.com
* @copyright	Copyright (C) 2016 joombest.com. All rights reserved.
* @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
    */
	
    // no direct access
    defined('_JEXEC') or die('Restricted access');  
	
    class spVideoslidSliderHelper
    {
        public $name = 'Element';
        public $uniqid   = 'Videoslid';
        public $fieldname;
        public $params;
        public function setOptions()
        {
            $html = array();
           
            $html[] = array(
                'title'=>'Video name',
                'tip'=>'Slide title',
                'tipdesc'=>'images alt',
                'class'=>$this->uniqid.'-slider-title-li',
                'attrs'=>'',
                'fieldname'=>'title',
                'html'=>'<input ref="title" type="text"  value="'.$this->params['title'].'"   
                name="jform[params]['.$this->fieldname.']['.$this->uniqid.'][title][]">'
            );
			
			$html[] = array(
                'title'=>'Link',
                'tip'=>'Link',
                'tipdesc'=>'Images Link',
                'class'=>''.$this->uniqid.'-slider-item-li',
                'attrs'=>'',
                'fieldname'=>'Link',
                'html'=>'<textarea  name="jform[params]['.$this->fieldname.']['.$this->uniqid.'][Link][]">'.$this->params['Link'].'</textarea>'
			);
            $html[] = array(
                'title'=>'State',
                'tip'=>'Set State',
                'tipdesc'=>'Published or unpublished slide item',
                'class'=>''.$this->uniqid.'-slider-item-li',
                'attrs'=>'',
                'fieldname'=>'text',
                'html'=>'
                <select class="sp-state" name="jform[params]['.$this->fieldname.']['.$this->uniqid.'][state][]">
                <option value="published" '.(($this->params['state']=='published')?'selected':'').' >Published</option>
                <option value="unpublished"  '.(($this->params['state']=='unpublished')?'selected':'').'>Un Published</option>
                </select>'
            );
				
            return $html;
        }


        public function styleSheet()
        {

            return '';

        }


        public function JavaScript()
        {

            return '';

        }


        public function display($helper)
        {
            return $this->params;
        }
}