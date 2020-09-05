<?php
/**
 * @package 	Module Tribu Alert Popup
 * @version 	1.0.1
 * @author 		Tribu And Co - Alexandre RITTY
 * @copyright 	Copyright (C) 2014 tribu-and-co.fr All rights reserved.
 *  @license 	GNU/GPL http://www.gnu.org/copyleft/gpl.html
 **/

defined( "_JEXEC" ) or die( "Restricted access" );
JHtml::_('jquery.framework');

$catid= $params->get( 'catid', '');
$showpopup=false;
$articles=array();
if (($catid!=0) && ($catid!='') ){
	$db = JFactory::getDBO();
	$sql = "SELECT introtext,title FROM #__content WHERE catid = ".intval($catid)." AND state = 1 AND publish_up < NOW()  AND ( publish_down > NOW() OR EXTRACT(YEAR FROM publish_down)=0) ORDER BY ordering LIMIT 0,5" ;
	$db->setQuery($sql);
	$articles=$db->loadObjectlist();	
}

if (count($articles)>0){
	$doc = JFactory::getDocument(); 
	$doc->addStyleSheet( JURI::Root(true).'/modules/mod_tribualertpopup/style/infospop.css' );
	$doc->addScript( JURI::Root(true).'/modules/mod_tribualertpopup/js/infospop.js' );

	$moduleid= 'tcpopup'.$module->id;
	$doc->addScriptDeclaration( '
			jQuery( document ).ready(function(){
				initinfospop("'.$moduleid.'");
			});
		' );

	$mode=$params->get( 'mode', '0');
	if ( $mode!='1' ) //Auto popup active
	{
		$now=time();
		$session =JFactory::getSession();
		$lastopened=$session->get($moduleid, 0);
		$opentime=(int) $params->get( 'opentime', '0');

		$dateexpire=$now-$opentime*60;
		if ($lastopened<$dateexpire) { // si lastopened n'existe pas ou si il est expiré on le remet au time stamp courant -- ou si mode debug (show à chaque fois)
			$session->set($moduleid, $now);
			$doc->addScriptDeclaration( '
				jQuery( document ).ready(function(){
					showinfospop("'.$moduleid.'");
				});
				jQuery( window ).resize(function(){
					positionpop("'.$moduleid.'");
				});
			' );
		}
	}
	$css='';
	if ( $mode!='2' ) //with banner
	{
		$bannerTitle=$params->get( 'title', '');
		$bannerImg=$params->get('icon','');
		$bgcolor=$params->get( 'bgcolor', '#FF0000');
		$txcolor=$params->get( 'textcolor', '#FFFFFF');
		$css.=' 
		#banner_'.$moduleid.' {color:'.$txcolor.';background-color:'.$bgcolor.'}
		#banner_'.$moduleid.' p.infosbtn a {color:'.$bgcolor.';background-color:'.$txcolor.'}
		';
	}
	

	$bordercolor=$params->get( 'bordercolor', '#FF0000');
	$textcolorpop=$params->get( 'textcolorpop', '#FFFFFF');
	$css.=' 
		#infosfullscreen_'.$moduleid.' .infoscontent{border:2px solid '.$bordercolor.'}
		#infosfullscreen_'.$moduleid.' .infospoptools .btn{background:'.$bordercolor.';color:'.$textcolorpop.'}
	';
	
	$doc->addStyleDeclaration( $css );

	require( JModuleHelper::getLayoutPath( $module->module ) );
}

?>