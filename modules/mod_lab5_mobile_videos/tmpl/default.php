<?php defined('_JEXEC') or die('Restricted access');  // no direct access utf8 äöü
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
		/////////////////////////////////////////
*/ 
?>
<!--
/////////////////////////////////////////
# begin tmpl : Lab5 Mobile Videos Module ( instance # <?php echo $mvID?> )
/////////////////////////////////////////
-->	
<div class="<?php echo $cfg['mod_tag']?>" id="<?php echo $cfg['mod_tag']. '-' .$mvID?>">
<?php if( trim($params->get('pretext')) !== '' ){ echo $params->get('pretext'); } ?>

<a id="player-<?php echo $mvID?>" class="myPlayer player">

				<?php if ($params->get('autoplay') !== '1'): ?>
					  
						<div class="l5mv-playerscreen" <?php 
									if( $params->get('previewimage') !== '' ){ 
										echo 'style="background:url('.$params->get('previewimage').') no-repeat center center;"';
									}
								?> >
						
							<table border="0" 
							height="<?php echo $params->get('height')?>" 
							width="<?php echo $params->get('width')?>" 
							cellpadding="0" cellspacing="0">
							<tr>
							<td align="center" valign="middle"><?php /*?>
							<img style="margin:auto;" src="<?php echo JURI::root(true) .'/'. $dir'assets']?>img/player/btn/play_text_large.png"><?php */?>
							<img style="margin:auto;" src="<?php echo $paths['playbutton']?>">
							</td>
							</tr>
							</table>  
							
						</div>
						
				<?php endif; ?>
</a>
    

<?php if($params->get('useplaylists') == '1'){?> 

    <?php /*?><div id="playlist_wrap-<?php echo $mvID?>"><?php */?>
    <div class="playlist_wrap">
      
      <a class="prev"><div></div></a>
      
        <div id="pl-<?php echo $mvID?>" class="playlist"> 
          
							<?php /*?>
                    <div class="page cloned">
                    <div class="page">
              <?php */?>
              <div class="L5MVm_entries-<?php echo $mvID; ?> L5MVm_entries">

                  <?php require($dir['includes'].'php.playlist.php');?>
                 
              </div>
        </div>
      
      <a class="next"><div></div></a>
    
    </div>
	
<?php 
} 
///////////////////// INC JS ///
if( trim($params->get('posttext')) !== '' ){ echo $params->get('posttext'); } 
?>



</div>
<?php 
///////////////////////////////////////////////////////////////////////////
	// INFO!
	// http://flowplayer.org/documentation/api/player.html
	// http://flowplayer.org/documentation/configuration/index.html
	// http://flowplayer.org/plugins/javascript/playlist-internal.htm
	// http://flowplayer.org/plugins/javascript/playlist.html

/*

// should be applies AFTER (player's) onLoad, meaning: within the onLoad-listener function, afaik.

// Set a playlist in run time 
$f("player-<?php echo $mvID?>").setPlaylist( [

	// playlist entry as a string means the url
	'http://blip.tv/file/get/KimAronson-TwentySeconds58192.flv',

	// playlist entry with custom duration
	{url: 'http://blip.tv/file/get/KimAronson-TwentySeconds59483.flv', duration: 10}
]);

// Set common clip properties and event listeners
// in run-time
 
// register event listener with common clip
$f("player-<?php echo $mvID?>").onStart(function() {
	alert("player onStart Playing");
});

// register event listener with common clip
$f("player-<?php echo $mvID?>").onLoad (function() {
	alert("Player Event onLoad  ");
});
// register event listener with common clip
$f("player-<?php echo $mvID?>").onUnload (function() {
	alert("Player Event onUnload  ");
});
// register event listener with common clip
$f("player-<?php echo $mvID?>").onClipAdd(function() {
	alert("Player Event onClipAdd ");
});
// register event listener with common clip
$f("player-<?php echo $mvID?>").onError(function() {
	alert("Player Event onError ");
});
// register event listener with common clip
$f("player-<?php echo $mvID?>").onPlaylistReplace(function() {
	alert("Player Event onPlaylistReplace ");
});

// this does the same thing
$f("player-<?php echo $mvID?>").getCommonClip().onStart(function() {
	alert("player getCommonClip Playing");
});

// if you want to register a listener to a specific clip *only*
$f("player-<?php echo $mvID?>").getClip(1).onStart(function() {
	alert("player getClip(1) Playing");
});
///////////////////////////////////////////////////////////////////////////
 */?>
<!--
/////////////////////////////////////////
# end tmpl : Lab5 Mobile Videos Module
/////////////////////////////////////////
-->	