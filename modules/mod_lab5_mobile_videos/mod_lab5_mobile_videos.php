<?php
/**
		/////////////////////////////////////////
		# Package Information: #
		/////////////////////////////////////////
				name : Lab5 Mobile Videos Module
				creationDate	:	2015-02-9
				author	:	Lab5 - Dennis Riegelsberger
				authorUrl	:	http://lab5.ch
				authorEmail	:	info@lab5.ch
				copyright	:	(C) Lab5 - Dennis Riegelsberger
				copyrightUrl	:	http://lab5.ch
				license	:	GNU/GPL
				licenseUrl	:	http://www.gnu.org/licenses/gpl.html
				project	:	http://lab5.ch/blog
		/////////////////////////////////////////
*/
defined('_JEXEC') or die('Restricted access'); // no direct access
////////////////////////////////
$doc = JFactory::getDocument();

require_once (dirname(__FILE__).'/helper.php');

////////////////////////////////
	// Default values:
////////////////////////////////
	$params->set('width', $params->get('width',"480"));
	$params->set('height', $params->get('height',"270"));
	$params->set('previewimage', modLab5_mobile_videosHelper::getCleanRootedPath(trim($params->get('previewimage',""))));
	$params->set('wmode', $params->get('wmode',"opaque"));
	$params->set('bgcolor', trim(str_replace( '#','', $params->get('bgcolor',"transparent"))));
	$params->set('scaling', $params->get('scaling',"scale"));
	$params->set('playlist', $params->get('playlist', "
	http://www.quirksmode.org/html5/videos/big_buck_bunny.mp4|Big Buck Bunny|1:01 min;
	http://media.w3.org/2010/05/sintel/trailer.mp4|Land of the Gatekeepers|0:52 min;
	http://slides.html5rocks.com/src/chrome_japan.mp4|Chrome Propaganda|I prefere Firefox;
	http://media.jilion.com/videos/demo/midnight_sun_sv1_360p.mp4|Landscapes|1:27 min;
	http://www.808.dk/pics/video/gizmo.mp4|Lego Copter|0:06 min;
	http://haignet.co.uk/html5-video-element-test.mp4|Chimps|in the zoo;
	http://html5demos.com/assets/dizzy.mp4|Laser Cat|getting dizzy;
	http://www.annodex.net/~silvia/itext/elephants_dream/elephant.mp4|Elephants Dream|10:54 min;
	"));
	$params->set('thumblist', $params->get('thumblist', 

														"thumb1.png;thumb2.png;thumb3.png;thumb4.png;

		thumb5.png;thumb6.png;thumb7.png;thumb8.png;"));
	$params->set('volume', $params->get('volume',"50"));
	$params->set('muted', $params->get('muted',"0"));
	$params->set('autoplay', $params->get('autoplay',"0"));
	$params->set('randomsort', $params->get('randomsort',"0"));
	$params->set('show_titles', $params->get('show_titles',"1"));
	$params->set('show_subtitles', $params->get('show_subtitles',"1"));
	$params->set('playlist_height', $params->get('playlist_height',"57"));
	$params->set('playlist_num_per_page', $params->get('playlist_num_per_page',"4"));
	$params->set('playlist_btns', $params->get('playlist_btns',"18"));
	$params->set('thumb_margin', $params->get('thumb_margin',"3"));
	$params->set('playbutton', $params->get('playbutton',
	"/modules/mod_lab5_mobile_videos/assets/img/player/btn/play_text_large.png"));
	$params->set('suppress_js_jquery', $params->get('suppress_js_jquery', '0'));
	$params->set('swf_source', $params->get('swf_source','0'));
	

////////////////////////////////
// Default values:
////////////////////////////////

	$cfg= array();
	$cfg['mod_title'] 	= 'Lab5 Mobile Videos Player';
	$cfg['mod_path'] 		= 'mod_lab5_mobile_videos';
	$cfg['mod_tag'] 		= $cfg['mod_path'];
	$cfg['mod_ver'] 		= '1.6.0';

////////////////////////////////

	$paths = array();
	$paths['playbutton'] 	= $params->get('playbutton');

////////////////////////////////

	$dir = array();
	$dir['base'] 				= 'modules/'.$cfg['mod_path'].'/';
	$dir['includes']			= $dir['base'].'includes/';
	$dir['scripts']			= $dir['base'].'scripts/';
	$dir['assets']			= $dir['base'].'assets/';
	$dir['media']				= $dir['base'].'media/';
	//$dir['sample']			= $dir['base'].'samples/';
	$dir['videos']			= modLab5_mobile_videosHelper::getCleanFolder( $params->get('playlistfolder') );
	$dir['thumbs']			= modLab5_mobile_videosHelper::getCleanFolder( $params->get('thumbnailfolder') );

////////////////////////////////
	$mvID =  'mv'.$module->id;
	$jQID =  'jq'.$module->id;
	// $mvID =  uniqid('', false);
	// $jQID =  uniqid('', false);
////////////////////////////////

	$playlist 		= modLab5_mobile_videosHelper::getList( $params->get('playlist') );
	$thumblist 		= modLab5_mobile_videosHelper::getList($params->get('thumblist'));
	$randomsort 		= $params->get('randomsort'); 
	$player 			= modLab5_mobile_videosHelper::mkPlaylistArr( $playlist, $thumblist, $dir, $randomsort );
	$startvideo 	= $player['vids'][0]['file'];

////////////////////////////////
	$scripts 											= array();
////////////////////////////////
	
	if( $params->get('swf_source') == '1' ) :
	$scripts['swf_source'] 				= 'http://releases.flowplayer.org/swf/flowplayer-3.2.18.swf';
	$scripts['swf_source'] 				= 'http://releases.flowplayer.org/swf/flowplayer.swf';
	else:
	$scripts['swf_source'] 				= JURI::base() . $dir['base'] .'swf/flowplayer-3.2.18.swf';
	endif;
	////////////////////////////////////////////
	$scripts['js_player'] 				= 'flowplayer/flowplayer-3.js';
	$scripts['js_player'] 				= 'flowplayer/flowplayer-3.2.6.js';
	$scripts['js_player'] 				= 'flowplayer/flowplayer-3.2.6.min.js';
	////////////////////////////////////////////
	$scripts['js_plug_playlist']	= 'flowplayer/flowplayer.playlist-3.0.8.js';
	$scripts['js_plug_playlist']	= 'flowplayer/flowplayer.playlist-3.0.8.min.js';
	////////////////////////////////////////////
	$scripts['js_plug_ipad'] 			= 'flowplayer/flowplayer.ipad-3.2.2.js';
	$scripts['js_plug_ipad'] 			= 'flowplayer/flowplayer.ipad-3.2.2.min.js';
	////////////////////////////////////////////
	$scripts['js_jquery'] 				= 'jquery/jquery-1.6.2.js';
	$scripts['js_jquery'] 				= 'jquery/jquery-1.6.2.min.js';
	$scripts['js_jquery'] 				= 'jquery/jquery-1.7.1.js';
	$scripts['js_jquery'] 				= 'jquery/jquery-1.7.1.min';
	$scripts['js_jquery'] 				= 'jquery/jquery-1.6.4.js';
	$scripts['js_jquery'] 				= 'jquery/jquery-1.6.4.min.js';
	$scripts['js_jquery'] 				= 'jquery/jquery-1.9.1.min.js';
	////////////////////////////////////////////
	$scripts['js_jquery_noconf'] 	= 'jquery/jquery.noconflict.js';
	////////////////////////////////////////////
	$scripts['js_jquerytools'] 		= 'jquerytools/scrollable.js';
	//$scripts['js_jquerytools'] 		= 'jquery-1.2.6.min.tools';
	////////////////////////////////////////////
	//$scripts['css_standalone'] 		= 'standalone.css';
	$scripts['css_player'] 				= 'player.css';
	$scripts['css_playlist_h'] 		= 'playlist-horizontal.css';

	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////

	//$jversion = new JVersion;
	//$jver = str_replace( '.', '', $jversion->RELEASE);

	///////////////////////////////////////////////////////////////////////////
	if ($params->get('suppress_js_jquery') !=='1' && 
			modLab5_mobile_videosHelper::includeOnce('LAB5_MVMOD_SCRIPT1')) {
	///////////////////////////////////////////////////////////////////////////
			$incl_jq = true; // jquery includieren
			//////////////////
			/*
			// detect, whether Joomla! 3+
			if($params->get('suppress_js_jquery') == '2' ){ // auto

				if((int)$jver >= 30 ){ // Joomla 3.x
					$incl_jq = false;
				}
			}
			*/
	}
	///////////////////////////////////////////////////////////////////////////
	if(isset($incl_jq) && $incl_jq == true ){ 
	///////////////////////////////////////////////////////////////////////////
		$doc->addScript(JURI::root(true) .'/'. $dir['scripts'].'compat.before.js');
		$doc->addScript(JURI::root(true) .'/'. $dir['scripts'].$scripts['js_jquery']);
		$doc->addScript(JURI::root(true) .'/'. $dir['scripts'].$scripts['js_jquery_noconf']);
	}
	///////////////////////////////////////////////////////////////////////////
	if (!$params->get('suppress_js_jquerytools', '0') && 
			modLab5_mobile_videosHelper::includeOnce('LAB5_MVMOD_SCRIPTJQTOOLS')) {
	///////////////////////////////////////////////////////////////////////////

			$doc->addScript(JURI::root(true) .'/'. $dir['scripts'].$scripts['js_jquerytools']);
	}
	///////////////////////////////////////////////////////////////////////////
	if (!$params->get('suppress_js_player', '0') && 
			modLab5_mobile_videosHelper::includeOnce('LAB5_MVMOD_SCRIPT12')) {
	///////////////////////////////////////////////////////////////////////////
			$doc->addScript(JURI::root(true) .'/'. $dir['scripts'].$scripts['js_player']);

	}
	/*
	///////////////////////////////////////////////////////////////////////////
	if (modLab5_mobile_videosHelper::includeOnce('LAB5_MVMOD_CSS1')) {
	///////////////////////////////////////////////////////////////////////////
			$doc->addStyleSheet(JURI::root(true) .'/'. $dir['assets'].$scripts['css_standalone'], array(' title'=>'',' media'=>'all'));
	}*/
	///////////////////////////////////////////////////////////////////////////
	if (!$params->get('suppress_js_plug_playlist', '0') && 
			modLab5_mobile_videosHelper::includeOnce('LAB5_MVMOD_SCRIPT3')) {
	///////////////////////////////////////////////////////////////////////////

			$doc->addScript(JURI::root(true) .'/'. $dir['scripts'].$scripts['js_plug_playlist']);
	}
	if (!$params->get('suppress_js_plug_ipad', '0') && 
			modLab5_mobile_videosHelper::includeOnce('LAB5_MVMOD_SCRIPT4')) {
	///////////////////////////////////////////////////////////////////////////
			$doc->addScript(JURI::root(true) .'/'. $dir['scripts'].$scripts['js_plug_ipad']);

	}
	///////////////////////////////////////////////////////////////////////////
	if (modLab5_mobile_videosHelper::includeOnce('LAB5_MVMOD_CSS2')) {
	///////////////////////////////////////////////////////////////////////////

			// $doc->addStyleSheet(JURI::root(true) .'/'. $dir['assets'].$scripts['css_playlist_h'], 'text/css', 'all');
			$doc->addStyleSheet(JURI::root(true) .'/'. $dir['assets'].$scripts['css_playlist_h']);
			
	}
	///////////////////////////////////////////////////////////////////////////
	if (modLab5_mobile_videosHelper::includeOnce('LAB5_MVMOD_CSS3')) {
	///////////////////////////////////////////////////////////////////////////
			// $doc->addStyleSheet(JURI::root(true) .'/'. $dir['assets'].$scripts['css_player'], 'text/css', 'all');
			$doc->addStyleSheet(JURI::root(true) .'/'. $dir['assets'].$scripts['css_player']);

	}
	///////////////////////////////////////////////////////////////////////////
	if( modLab5_mobile_videosHelper::includeOnce('LAB5_MVMOD_SCRIPT_JQ_INSTANCER') ){ 

			$doc->addScript(JURI::root(true) .'/'. $dir['scripts'].'compat.after.js');
	}
	///////////////////////////////////////////////////////////////////////////
	modLab5_mobile_videosHelper::makeTag($cfg);

////////////////////////////////
require($dir['includes'].'css.player.php');
require($dir['includes'].'player.js.php');
////////////////////////////////
require(JModuleHelper::getLayoutPath($cfg['mod_path']));
