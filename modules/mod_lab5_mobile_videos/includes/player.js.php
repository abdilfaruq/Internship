<?php defined('_JEXEC') or die('Restricted access');  // no direct äccess
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
/////////////////////////////////////////////////
ob_start();
/////////////////////////////////////////////////
?>
var jQuery_Lab5_MVm_<?php echo $jQID?> = Lab5_MVm_jQuery_Instance.noConflict();
	
<?php ///////////////////////////////////////////////////////////////////////////////// ?>
jQuery_Lab5_MVm_<?php echo $jQID?>(function(){   
<?php ///////////////////////////////////////////////////////////////////////////////// ?>
	
	
	<?php // setup player  ?>
	$f(
	
		<?php 
		//////////////////////////////////////////////////////////////////////////// 
		// The HTML element to which the player is getting built
		//////////////////////////////////////////////////////////////////////////// 
		?>
		"player-<?php echo $mvID?>", 
		
		
		<?php 
		// our Flash component, the Player itself
		//////////////////////////////////////////////////////////////////////////// 
		?>
		 {
						<?php // our Flash component ?>
						src: "<?php echo $scripts['swf_source']; ?>" 
						<?php // we need at least this Flash version ?>
						,version: [9, 0]
						<?php // setting this explicitly, makes the flash z-indexable ( vs. flash-bug ) ?>
						,wmode:"<?php echo $params->get('wmode')?>"
						<?php // background colour: ?>
						,bgcolor:"#<?php 
						echo (trim($params->get('bgcolor')) !== '') ? $params->get('bgcolor') : '000000'?>"
						<?php // called every time the supported version is not found ?>
						,onFail: function()  {
                    <?php require($dir['includes'].'js.noflash.php');?>
						}
						<?php /*?>
						// supply your path to the express install Flash object.
						,expressInstall: "http://static.flowplayer.org/swf/expressinstall.swf",
						<?php */?>
		},
		
		
		<?php 
		//////////////////////////////////////////////////////////////////////////// 
		// here is our third argument which is the Flowplayer configuration
		//////////////////////////////////////////////////////////////////////////// 
		?>
		{
				<?php // common clip: these properties are common to all clips of the playlist ?>
				clip : {			
									
									url:'<?php echo $startvideo;?>'
									,title:''
									,thumb:''
									,subTitle:''
									,scaling:'<?php echo $params->get('scaling')?>'
									,autoPlay: true
									<?php if( $params->get('muted')):?>
									,onStart: function(){	$f().mute();	}
									<?php else:?>
									,onStart: function(){	$f().setVolume(<?php echo $params->get('volume');?>);	}
									<?php endif;?>
									<?php /*?>
									,baseUrl: 'http://wuwuwuw/'
									,baseUrl: '<?php //echo $dir['videos'];?>' // 'http://blip.tv/file/get'
									,autoBuffering: true
									,baseUrl: 'http://blip.tv/file/get/'
									// set a common clip event listener
									,onStart: function(clip) {
										alert("Clip onStart : Playing Clip "+ clip.url);
										<?php if( $params->get('muted')):?>
										$f().mute();
										<?php endif;?>
									}
									,onUpdate: function(clip) {}
									,onMetaData: function(clip) {}
									,onStop : function(clip) {}
									<?php */?>
				},
 
				<?php /*?>
				// buggy somehow Oo'
				playlist: [			// playlist is an array of Clips, hence [...]
							
							// this first PNG clip works as a splash image
							splashImg ,
							// second clip is a video or audio. 
							// when autoPlay is set to false the splash screen will be shown
						
								{			 
									url: 'KimAronson-TwentySeconds59483.flv',
									title: 'Palm trees and the sun',
									autoPlay: false
								},{
									url: 'KimAronson-TwentySeconds58192.flv',
									title: 'Happy feet in a car',
									autoPlay: false
								}
							
							reset($player['vids']);
							//echo "'".$startvideo."',\n\n";
							for( $i = 1; $i<=count($player['vids']); $i++){
			
									echo "
									{
									baseUrl: 'http://wuwuwuw/'
										,url:'".$player['vids'][$i-1]['file']."'
										,thumb:'".$params->get('thumbnailfolder').''.$player['vids'][$i-1]['thumb']."'
										,title:'".$player['vids'][$i-1]['title']."'
										,subTitle:'".$player['vids'][$i-1]['length']."' 
										//,duration: 25
										//,autoBuffering: true  // <-- LEAVE THIS OUT!
									}";
									echo ($i === count($player['vids'])) ? '' : ',';
									echo "\n";
							}?>
				],

				
				
				// show playlist buttons in controlbar
				plugins:  {
					controls: {
						playlist: true
						//,url: 'flowplayer.controls-tube-3.2.5.swf'
						//,fullscreen: false
						//,volume: false
					}
				},
				<?php */?>
				
				
				onStart : function() {},	<?php  // provide a Player event listener ?>
				onFinish: function() {},		<?php  // set an event handler in the configuration ?>
				onLoad : function() {	<?php  // provide a Player event listener ?>
	
							<?php if( !$params->get('muted')):?>
									this.unmute();
							<?php endif;?>
							<?php /*?>
									var clipN = {			// Clip is an object, hence '{...}'
													url:'<?php echo $startvideo;?>'
													,autoPlay: true
												};
									$f("player-<?php echo $mvID?>").addClip(clipN, 1);
									alert($f("player-<?php echo $mvID?>").getClip(0));
							<?php */?>	
				}
			
		<?php if($params->get('useplaylists') == '1') : ?>

					<?php /*
					// http://flowplayer.org/plugins/javascript/playlist-internal.htm
					// http://flowplayer.org/plugins/javascript/playlist.html
					$f("player1").playlist("div.clips:first", {loop:true});
					// here comes the magic plugin. It uses first div.clips element as the 
					// root for as playlist L5MVm_entries. 
					// Working with a so-called template, 
					// L5MVm_entries will automatically get built according to that pattern
					// loop parameter makes clips play from the beginning to the end.
					*/ 
					
					/*
					// the iPad plugin and the playlist plugin
					*/ 
					?>
					}).ipad().playlist("div.L5MVm_entries-<?php echo $mvID?>:first"<?php /*?>, {loop: true}<?php */?>);

					<?php /*
					//}).ipad().playlist("div.page:first", {loop: true});
					*/ ?>

		<?php else: ?>

					}).ipad();

		<?php endif; ?>



		<?php // setup scrolling for the playlist elements ?>

		jQuery_Lab5_MVm_<?php echo $jQID?>("#pl-<?php echo $mvID?>").scrollable({ 

							<?php /*
							//items:'a.leclip'
							//items:'div.page'
							//items:'div.L5MVm_entries-<?php echo $mvID?>'
							//items:'div.L5MVm_entries-<?php echo $mvID?> a',
							//,vertical:true
							//,vertical:false
							//,next:'a.down'
							//,prev:'a.up'
							//circular: true 
							*/ 
							// circular : true is buggy, since it makes the opener-video 
							// be the first vid from the LAST PAGE !
							// ( where it should be vid 1 from page 1 )
							?>
		});	


		<?php /* store the startvideo into the transfer-variable ( needed for the JS when autoplay = 1). */ ?>

		$L5MVm_currentClip_<?php echo $mvID?> = '<?php echo $startvideo?>';
		$L5MVm_fistrun_<?php echo $mvID?> = true;
		
		<?php
		/* add onclick func all playlist-videos ( needed for if no flash and no-ipad ) */

		if($params->get('useplaylists') == '1') : ?>

					var L5MVm_func_<?php echo $mvID?> = jQuery_Lab5_MVm_<?php echo $jQID?>("#pl-<?php echo $mvID?>").find("a");

					for ( var i = 0; i< L5MVm_func_<?php echo $mvID?>.length; i++ ){

							L5MVm_func_<?php echo $mvID?>[i].onclick = function(e){ 

										L5MVm_var = this.getAttribute('href');
										<?php // strange bug, maybe just Firefox: ?>
										if(L5MVm_var.substring( 0, 5) == '/http' ){

												L5MVm_var = L5MVm_var.substring( 1, L5MVm_var.length );
										}
										$L5MVm_currentClip_<?php echo $mvID?> = L5MVm_var;
										<?php // update current clip : ?>
										$f("player-<?php echo $mvID?>").getClip(0).update({url: L5MVm_var });	
							};
					}
					
		<?php endif; 

///////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////// 
?> }); <?php 
///////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////// 




/////////////////////////////////////////////////
$Lab5_MVm_JS = ob_get_contents();
ob_end_clean();
$doc->addScriptDeclaration( $Lab5_MVm_JS );
/////////////////////////////////////////////////