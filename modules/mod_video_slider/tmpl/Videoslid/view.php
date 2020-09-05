<?php
/**
* @title		video slider module
* @website		http://www.joombest.com
* @copyright	Copyright (C) 2016 joombest.com. All rights reserved.
* @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

    // no direct access
    defined('_JEXEC') or die;
?>

<script>
jQuery.noConflict();
</script>
<link rel="stylesheet" href="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/css/sangarSlider.css" />
<link rel="stylesheet" href="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/css/dark.css" />
<link rel="stylesheet" href="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/css/demo.css" />

<?php
if ($enableQuery == 1) {?>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/jquery.js"></script>
<?php }?>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/imagesloaded.min.js"></script>
<script type='text/javascript'>
var dis_naviga,width_module,animationSpeed;
dis_naviga = <?php echo $navigacontent_js;?>;
width_module = <?php echo $width_module;?>;
animationSpeed = <?php echo $animationSpeed;?>;

</script>
<?php
if ($pagination == 1) { ?>
	<script type='text/javascript'>
	var strpagination; 
	strpagination = "content-vertical"; 
	</script>
<?php }?>
<?php
if ($pagination == 0) {?>
	<script type='text/javascript'>
	var strpagination; 
	strpagination = "content-horizontal"; 
	</script>
<?php }?>

<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarBaseClass.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarSetupLayout.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarSizeAndScale.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarShift.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarSetupBulletNav.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarSetupNavigation.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarSetupSwipeTouch.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarSetupTimer.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarBeforeAfter.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarLock.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarResponsiveClass.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarResetSlider.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarTextbox.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarVideo.js"></script>
<script type="text/javascript" src="<?php echo $PathConfig_live_site; ?>/modules/mod_video_slider/tmpl/Videoslid/js/sangarSlider.js"></script>



<div class='video-sange-slider'>
<div class='sangar-example' id='sangar-example'>
<?php
			foreach($data as $index=>$value)
		{?>	 
			<div class='sangar-content'>
				<iframe src="<?php echo $value['Link']?>" frameborder="0" allowfullscreen></iframe>
			</div>
			<?php
		} ?>
</div>
</div>
<script>
jQuery.noConflict();
</script>
