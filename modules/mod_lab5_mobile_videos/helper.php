<?php defined('_JEXEC') or die('Restricted access');  // no direct access
/**
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
/////////////////////////////////////////////////////////////////////////////////////////////
class modLab5_mobile_videosHelper  {
/////////////////////////////////////////////////////////////////////////////////////////////


	static $extensionname = 'Lab5 Mobile Videos';

 
////////////////////////////////
	public static function getPlaylistWidth( $params ){
////////////////////////////////

		/*
// example :
600				= player-width
- 18 * 2 	= 36	// playlist_btns
- 2  * 2 	= 4	// a margin, once left/right only each
- 2*1			= 2		// border or something ...
= 558 ( = playlist-width )

		*/
		return $params->get('width') - 2*(($params->get('playlist_btns')+2)+1);

	}

	

	

	

	



////////////////////////////////
	public static function getList( $textfieldcontent ){
////////////////////////////////



		$arr = explode( ";", trim($textfieldcontent));

		
		//check it:

		if (count($arr) < 1) {
return $this->getAlertMessage("No items found");

		}

		//clean it:
		for( $i=0; $i<count($arr);$i++){
$arr[$i] = trim($arr[$i]);	

		}


		return $arr;

	}

	

	

	

	



////////////////////////////////
	public static function mkPlaylistArr( $playlist, $thumblist, $dir, $randomsort = '0' ){
////////////////////////////////

		

		$player = array();


		// add items to playlist:

		for( $i=0; $i<count($playlist);$i++){


		
//thumbimage:	
if( @$thumblist[$i] == '' ){ 
	
	$thumblist[$i] = JURI::root(true) .'/'. $dir['assets'].'img/playlist/noimage.png';
}else{ 
	
	$thumblist[$i] = $dir['thumbs'].$thumblist[$i];
}
//extrakt title and length:	
$trackdetails = explode( "|", $playlist[$i]);
//clean it:
for( $e=0; $e<count($trackdetails);$e++){
$trackdetails[$e] = trim($trackdetails[$e]);	
}
if(empty($trackdetails[1])){ $trackdetails[1] =''; }
if(empty($trackdetails[2])){ $trackdetails[2] =''; }

		
if ( $trackdetails[0] !== '' ){
			
		// if file is !containing a full path, then add the local video-folder path  :
		if( !strstr($trackdetails[0], 'http://') ){
			
				$trackdetails[0] = $dir['videos'].$trackdetails[0];
		}
		
		$player['vids'][] = array( 
		
													'file' 	=> $trackdetails[0], 
													'title' => $trackdetails[1], 
													'length' => $trackdetails[2],
													'thumb' => $thumblist[$i] );
}

		}

		

		/////////////////

		if( $randomsort == '1' ){ shuffle($player['vids']); }

		/////////////////

		

		return $player;

	}

	

	

	

	

	

	

	

////////////////////////////////

	public static function includeOnce($name) {

////////////////////////////////



		if (!defined($name)) {
define($name, true);
return true;

		}

		

		return false;

	}

	

	

	

	

	

	

	

////////////////////////////////

	public static function getCleanRootedPath( $path ) {

////////////////////////////////

//$path 		= preg_replace( '/(\/\/)/', '/', '/'.trim($path) );
$path 		= str_replace( '//', '/', trim($path) );
// kill leading '/'
$path 		= ( !preg_match( "/http/", $path) && 
						substr($path,0,1) !== '/' 
					) ? '/'.$path : $path;

	

		return $path;

	}

	

	

	

	

////////////////////////////////

	public static function getCleanFolder( $folder ) {

////////////////////////////////

//$folder 		= preg_replace( '/(\/\/)/', '/', '/'.trim($folder) );
$folder 		= str_replace( '//', '/', trim($folder) );
// kill leading '/'
$folder 		= (substr($folder,0,1) == '/') ? substr($folder, 1): $folder;
// kill final '/'
$folder 		= (substr($folder,strlen($folder)-1) == '/') ? substr($folder,0, strlen($folder)-1): $folder;
$folder 		= JURI::base().$folder.'/';

		

		return $folder;

	}

	

	

	

	

	

	

	

	









////////////////////////////////////////////////////////

	public static function makeTag($cfg) {

////////////////////////////////////////////////////////
			

		
///////////////////////
// darf nur einmal ausgeführt werden !
///////////////////////
if (!defined($cfg['mod_tag'].'_crtag')){
define( $cfg['mod_tag'].'_crtag', true);
echo'
<a href="http://lab5.ch" style="display:none;"
title="Lab5 Webdesign Basel / Zürich Schweiz, Switzerland, Joomla Agentur " 
target="_blank">Lab5 - Webdesign Basel / Zürich Schweiz, Switzerland, Joomla Agentur</a>
'; ?>
<!--
<?php
			$subfunctionname = 'Module';

			$tag = 
			'/*|.|.|.|.|.|.|.|.|.o|l|.|.|.|.|.|.|.|.|.ooo|l|l _           _     _____ |l| |         | |   |  ___||l| |     __ _| |__ |___ \ |l| |    / _` | \'_ \    \ \|l| |___| (_| | |_) /\__/ /|l\_____/\__,_|_.__/\____/ |l|l|l|t|t|t|t'.self::$extensionname.' :: '.$subfunctionname.' - was developed by :|l|t|t|t|t|l|t|t|t|t01001100 01100001 01100010 00110101|l|t|t|l|t|t|t|tLab5 - Professional Web Development|l|t|t|t|tSwitzerland|l|t|t|t|thttp://lab5.ch|t|l|l|.|.|.|.|.|.|.|.|.ooo|l|.|.|.|.|.|.|.|.|.ooo|l*/'; // SPARES SOME SPACE 
			//$tag = str_replace( "\n", '|l', $tag ) ; $tag = str_replace( "\t", '|t', $tag ) ; $tag = str_replace( "ooooooooo", '|.', $tag ) ; // FORTH
			$tag = str_replace( '|.', "ooooooooo", $tag ) ; $tag = str_replace( '|t', "\t", $tag ) ; $tag = str_replace( '|l', "\n", $tag ) ;  // BACK
			echo $tag;
?>

/////////////////////////////////////////
# Package Information: #
/////////////////////////////////////////

		name : Lab5 Mobile Videos Module
		creationDate	:	2015-07-09
		author	:	Lab5 - Dennis Riegelsberger
		authorUrl	:	http://lab5.ch
		authorEmail	:	info[at]lab5.ch
		copyright	:	(C) 2011 - <?php echo date("Y")?> Lab5 - Dennis Riegelsberger
		copyrightUrl	:	http://lab5.ch
		license	:	GNU/GPL
		licenseUrl	:	http://www.gnu.org/licenses/gpl.html
		project	:	http://lab5.ch/blog
/////////////////////////////////////////
-->	
<?php		
}
///////////////////////

	}





	

	



}