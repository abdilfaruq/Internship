<?php 
/**
 * @package 	Module Tribu Alert Popup
 * @version 	1.0.1
 * @author 		Tribu And Co - Alexandre RITTY
 * @copyright 	Copyright (C) 2014 tribu-and-co.fr All rights reserved.
 *  @license 	GNU/GPL http://www.gnu.org/copyleft/gpl.html
 **/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 
jimport('joomla.application.component.helper');
?>
<?php if ($params->get( 'mode', '0') != 2) { ?>
<div id="banner_<?php echo $moduleid;?>" class="informationsbanner">
	<p class="infostitle"><a href="#" Onclick="showinfospop('<?php echo $moduleid;?>')" >
		<?php if ($params->get( 'icon') != '') { ?><img src="<?php echo $bannerImg?>" alt=""/><?php } ?>
		<strong><?php echo $bannerTitle?></strong></a>
	</p>
	<p class="infostitle2"><?php echo JHTML::_('string.truncate',  $articles[0]->title, $params->get('textlength','60')); ?></p>
	<p class="infosbtn"><a href="#" Onclick="showinfospop('<?php echo $moduleid;?>')" ><?php echo $params->get( 'openbutton', 'Read more...' ); ?></a></p>
</div>
<?php } ?>
<div id="<?php echo $moduleid;?>">
	<input type="hidden" id="infospopupwidth_<?php echo $moduleid;?>" value=" <?php echo $params->get( 'width', 800 );?>">
	<input type="hidden" id="infostimer_<?php echo $moduleid;?>" value=" <?php echo $params->get( 'closetime', '0')?>">

	<div id="infosfullscreen_<?php echo $moduleid;?>" class="infosfullscreen">
		<div id="infosposition_<?php echo $moduleid;?>" class="infosposition" style="margin-top: <?php echo $params->get( 'margintop', 140 );?>px">
			<div class="infoscontent">
				<div class="text">
					<?php
					foreach($articles as $article){
						echo '	<div class="poparticle">';
						echo '	<h2>'.$article->title.'</h2>';
						echo $article->introtext;
						echo '	</div>';
					}
					?>
				</div>
			</div>
			<div class="infospoptools">
				<input type="button" class="btn" align="center" id="closeinfos_<?php echo $moduleid;?>" value=" X <?php echo $params->get( 'closebutton', '' ); ?>">
			</div>
		</div>
	</div>

</div>