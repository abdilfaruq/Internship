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
// no direct access
defined('_JEXEC') or die('Restricted access'); 

			/*
                What we do here is to replace the a-tag with a video-tag
                ( instead of outputting a no-flash-warning )
               ////////////////////
			//http://www.w3schools.com/html5/tag_video.asp
			Converting Videos  to Fedora OGG :
			http://commons.wikimedia.org/wiki/Help:Converting_video
			*/ 
			?>
              var L5MVm_var = ''+$L5MVm_currentClip_<?php echo $mvID?>;
              var L5MVm_videoCurrBase = L5MVm_var.substring( 0, L5MVm_var.lastIndexOf('.'));

							var L5MVm_videoTag = 
	
							'<video '
								+'width="<?php echo $params->get('width')?>" '
								+'height="<?php echo $params->get('height')?>" '
                +'autoplay="autoplay" '
								+'controls="controls" '
								<?php //+'loop="loop" ' ?>
								<?php if( $params->get('muted')):?>
								+'muted="muted" '
								<?php endif;?>
								+'preload="auto" ' // auto |  metadata |  none | 
								+'poster="<?php echo $params->get('previewimage');?>" '
								+'tabindex="0" '
								<?php /*
								//'src="<?php echo $startvideo?>" '
								*/ ?>
							+'>' +
								'<source src="'+L5MVm_videoCurrBase+'.mp4" type="video/mp4" />' +
								'<source src="'+L5MVm_videoCurrBase+'.m4v" type="video/mp4" />' +
								'<source src="'+L5MVm_videoCurrBase+'.ogv" type="video/ogg" />' +<?php // new Thedora mime  ?>
								'<source src="'+L5MVm_videoCurrBase+'.ogg" type="video/ogg" />' +<?php // old mime  ?>
								'<source src="'+L5MVm_videoCurrBase+'.webm" type="video/webm" />' +
								'<source src="'+L5MVm_videoCurrBase+'.3gp" type="video/3gpp" />' +
								"Your browser does neither support the HTML5 video tag, nor Flash as it seems. :S " +
							'</video>';
							var myAnchor = document.getElementById("player-<?php echo $mvID?>");
							myAnchor.onclick = function() {}
							myAnchor.innerHTML = '';
							var mySpan = document.createElement("span");
							mySpan.setAttribute( 'id', "player-<?php echo $mvID?>" );
							mySpan.innerHTML = L5MVm_videoTag;
							<?php /*if ($params->get('autoplay') == '1'): ?>
							//mySpan.getElementsByTagName('video')[0].play();
							<?php endif; */?>
							<?php if( $params->get('muted')):?>
							mySpan.getElementsByTagName('video')[0].muted = true;
							<?php endif;?>
							myAnchor.parentNode.insertBefore( mySpan, myAnchor );
							myAnchor.style.display = 'none';
							<?php 
							//myAnchor.addChild( mySpan);
							//myAnchor.parentNode.replaceChild( mySpan, myAnchor);
							//mySpan.parentNode.removeChild(mySpan);
							?>
							