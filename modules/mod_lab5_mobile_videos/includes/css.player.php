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
		/////////////////////////////////////////
*/ 
/////////////////////////////////////////////////
			ob_start();
/////////////////////////////////////////////////
?>
		
		/**********************************
		CSS settings for (Lab5 Mobile Videos Module) player, instance # <?php echo $mvID?>
		
		**********************************/
	
			/****** PLAYER ******/
				
				#<?php echo $cfg['mod_tag']?>-<?php echo $mvID?>,
				a#player-<?php echo $mvID?>.player,
				a#player-<?php echo $mvID?>.player video {	
					
						width:<?php echo $params->get('width')?>px;
						height:<?php echo $params->get('height')?>px;
						
						<?php echo $params->get('bgcolor') !== '' ? 
						'background:#'.$params->get('bgcolor').';' : ''?>
						
						
				}
					
			/****** PLAYLIST ******/
				
				#pl-<?php echo $mvID?> {
						
						height:<?php echo $params->get('playlist_height'); ?>px;
						background:#f5fbfb url(<?php echo JURI::root(true) .'/'. $dir['assets']?>img/global/gradient/h150.png) repeat-x;
				}
				#pl-<?php echo $mvID?>,
				#pl-<?php echo $mvID?> div.page{
						
						width:<?php echo modLab5_mobile_videosHelper::getPlaylistWidth( $params )?>px;
				}
				.<?php echo $cfg['mod_tag']?> .L5MVm_entries-<?php echo $mvID; ?> {
						/* left: -580px; */
				}
				#<?php echo $cfg['mod_tag']?>-<?php echo $mvID?> a.prev div,
				#<?php echo $cfg['mod_tag']?>-<?php echo $mvID?> a.next div {
					
							width:<?php echo $params->get('playlist_btns'); ?>px;
							height:<?php echo $params->get('playlist_height')+ 2*6; ?>px;
							
				}
				#pl-<?php echo $mvID?> div.page div.l5mv_thumbscreen img{
						
						
								width:<?php
								/*
									// example with 4 thumbs per scroll-page :
									
									132 * 4 = 528	// img-width
									3   * 4 = 12	// a margin-right
									3+1 * 4 = 16	// a margin-left
									2*1			= 2		// border or something ...
									= 558 ( = player-width )
								*/
								
								echo 
								(
								modLab5_mobile_videosHelper::getPlaylistWidth( $params ) 
								-
								$params->get('playlist_num_per_page') * ($params->get('thumb_margin'))
								-
								$params->get('playlist_num_per_page') * ($params->get('thumb_margin') + 1)
								-
								2 * 1
								
								) / $params->get('playlist_num_per_page')
								;
								?>px;
				}
				#<?php echo $cfg['mod_tag']?>-<?php echo $mvID?> a.next:hover div, 
				#<?php echo $cfg['mod_tag']?>-<?php echo $mvID?> a.prev:hover div {
					
						background-position:-<?php echo $params->get('playlist_btns'); ?>px center;	
				}
				
<?php
/////////////////////////////////////////////////
$Lab5_MVm_CSS = ob_get_contents();
ob_end_clean();
$doc->addStyleDeclaration( $Lab5_MVm_CSS );
/////////////////////////////////////////////////