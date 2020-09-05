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
// no direct äccess
defined('_JEXEC') or die('Restricted access');?>
              
<?php /*?>     
   
  <!-- single playlist entry as an "template" -->
  <a class="leclip" href="${url}"  style="background:transparent url(${thumb}) no-repeat scroll 0%;">
        
        <div>${title}</div><br>     
        <em>${subTitle}</em>
	</a>
  
<?php */?>  
  
<?php /*?>         				
			<div class="page">
				<a href="http://www.quirksmode.org/html5/videos/big_buck_bunny.mp4">
					Big Buck Bunny <br />
					<em>1:01 min</em>
				</a>
				<a href="http://www.quirksmode.org/html5/videos/big_buck_bunny.mp4">
					Big Buck Bunny <br />
					<em>1:01 min</em>
				</a>
				<a href="http://www.quirksmode.org/html5/videos/big_buck_bunny.mp4">
					Big Buck Bunny <br />
					<em>1:01 min</em>
				</a>
				<a href="http://www.quirksmode.org/html5/videos/big_buck_bunny.mp4">
					Big Buck Bunny <br />
					<em>1:01 min</em>
				</a>
			</div> 				
			<div class="page">
				<a href="http://www.quirksmode.org/html5/videos/big_buck_bunny.mp4">
					Big Buck Bunny <br />
					<em>1:01 min</em>
				</a>
				<a href="http://www.quirksmode.org/html5/videos/big_buck_bunny.mp4">
					Big Buck Bunny <br />
					<em>1:01 min</em>
				</a>
				<a href="http://www.quirksmode.org/html5/videos/big_buck_bunny.mp4">
					Big Buck Bunny <br />
					<em>1:01 min</em>
				</a>
				<a href="http://www.quirksmode.org/html5/videos/big_buck_bunny.mp4">
					Big Buck Bunny <br />
					<em>1:01 min</em>
				</a>
			</div>
			<?php */?>
  
        <?php
        
        // immer 4er-schritte
        $i4 = 1;
        for( $i = 1; $i<=count($player['vids']); $i++){
					
						
						echo ($i4==1)	? "\n".'<div class="page' : '';
						//echo ($i==1)	? ' cloned' : '';
						echo ($i4==1)	? '">'."\n" : '';
							
						echo'
							<a href="'.$player['vids'][$i-1]['file'].'">'."\n"."\n";
							
							echo '<div class="l5mv_thumbscreen">'."\n";
							
								echo '<img src="'.$player['vids'][$i-1]['thumb'].'">';
									
									if($params->get('show_titles') && !empty($player['vids'][$i-1]['title'])){ 
												
												echo '<div>'.$player['vids'][$i-1]['title'].'</div><br>'."\n"; 
									}
									
									if($params->get('show_subtitles') && !empty($player['vids'][$i-1]['length'])){ 
									
												echo '<em>'.$player['vids'][$i-1]['length'].'</em>'."\n"; 
									}
							
							echo "\n".'</div>'."\n";
							
								
						echo'
							
							</a>			
						';
						if( ($i4==$params->get('playlist_num_per_page')) || ($i==count($player['vids']) && $i4!==4)){ 
							echo "\n".'</div>'."\n"; $i4=1;
						}else{ $i4++; }
          
        }
		
		
		
		
		
		