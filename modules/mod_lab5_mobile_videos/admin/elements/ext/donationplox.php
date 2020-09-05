<?php
/**
 * @author	:	Lab5 - Dennis Riegelsberger
 * @authorUrl	:	http://lab5.ch
 * @authorEmail	:	info@lab5.ch
 * @copyright	:	(C) Lab5 - Dennis Riegelsberger. All rights reserved.
 * @copyrightUrl	:	http://lab5.ch
 * @license	:	GNU General Public License version 2 or later;
 * @licenseUrl	:	http://www.gnu.org/licenses/gpl-2.0.html
 * @project	:	http://lab5.ch/blog
 */
 
defined('_JEXEC') or die;

jimport('joomla.form.formfield');

class JFormFieldDonationplox extends JFormField {
	
		/////////////////////////////////////////////////////
        protected $type = 'Donationplox';
        protected $url = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EWRWSDZJ77AFY';
        protected $url2 = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9ET7GZ3CMVLGN';
		/////////////////////////////////////////////////////

        protected function getInput() {
			
				return  '
				<h1>Shamelessly shilling for donation money...</h1>
				<br>
				<em class="text-success">
						<blockquote>
							<p>
								<a href = "'.$this->url.'" target="_blank"  class="text-success">
								'.JText::_('LAB5_DONATIONPLOX_LINK_TXT').'
								
									Every help that gives me the freedom to code even more, is highly appreciated :) <br><br>
								</a>	
							</p>
							<a href = "'.$this->url.'" target="_blank"  class="text-success">
							
							<small>I share my work with you guys whenever there is something that might be useful and help you and other people too. <br>Sharing is fun, and saves people\'s time, which has the effect, to save people like YOU real money, <br>since now you don\'t have to create that software by yourself, right? <br>Me and the opensource crowd frees you people from tasks and, in doing so, creates you real spared time. <br>And time is money, correct ? Because it\'s time maybe, to work on again another task, correct?</small><br>I save YOU time => I save you MONEY => YOU HAVE MORE money NOW <br>So... if you want to share a little of your now INCREASED wealth back with me, <br>i\'d truely and highly love you, for your fairness, AND<br> you\'re then actually and really part of the open source force, which is shaping this planet for the better :-)
									
							</a>
						</blockquote>
						<p>
						<a href = "'.$this->url2.'" target="_blank">
							<button type="button" class="btn btn-primary btn-lg">
								<img  class="img-rounded" src="https://www.paypalobjects.com/en_US/CH/i/btn/btn_donateCC_LG.gif" type="image" />
							</button>
							<img src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="" width="1" height="1" border="0" />
							<br>
							<br>
							( This primarily help\'s me to afford licenses. )
							<br>
						</a>
						</p>
				</em>
				
				
				<h2>What would be great and what it does : </h2>
				
							<table class="table table-striped">
							<tr>
								<td>
									<h2 style="display:inline;">1$</h2></td><td>thanks :) 
								</td>
							</tr>
							<tr>
								<td>
									<h2 style="display:inline;">2$</h2></td><td>provides for a homebrewn coffe or two :) 
								</td>
							</tr>
							<tr>
								<td>
									<h2 style="display:inline;">5$</h2></td><td>A little bag of fruits or vegetables. ( Healthy, keeps your brain in good shape and motivation ). <b><i>Love it! :)</i></b> 
								</td>
							</tr>
							<tr>
								<td>
									<h2 style="display:inline;">10$</h2></td><td>small extension license/download <b><i>Yesss !! :) </i></b>
								</td>
							</tr>
							<tr>
								<td>
									<h2 style="display:inline;">25$</h2></td><td>yay, a full meal, or small-medium extension license/download :D <b><i>*muh thanks*</i></b>  
								</td>
							</tr>
							<tr>
								<td>
									<h2 style="display:inline;">50$</h2></td><td>yay, i can invite Hon to the meal now. She no longer needs to starve, gg :D <b><i>*sweetest thanks*</i></b>   OR : pays at least for a medium++ to larger extension license/download :D <b><i>*thanking intensifies*</i></b>  
								</td>
							</tr>
							<tr>
								<td>
									<h2 style="display:inline;">&gt;50$</h2></td><td>wow, you are special :O <b><i>*special thanks*</i></b> You must have done something <b><i>very right</i></b> in yout life to now and here be able to do this. Btw, you have best chances to get into the Alltime-Top-10 Supporters Donation Highscore Scoreboad on my website. 
								</td>
							</tr>
							</table>
							
							
				
				<hr><br>
		
				<blockquote>
					OK, this extension helped me save time and money worth at least this amount, so i want to help you too / say "Thank you very much Mr. Lab5, good sir." by donating the following amount to you, so i will feel and show proof that i am a fair person, who helps people who helped me :)
				</blockquote>

				<div class="form-group has-success">
						<label for="donationamount" class="col-sm-2 control-label"><b>$</b></label>
						<div class="col-sm-10">
								<input type="text" class="form-control" id="donationamount" name="donationamount"  value="10" placeholder="10$">
						</div>
				</div>
				<div class="form-group has-info">
						<label for="donationdisplayname" class="col-sm-2 control-label"><b>Supporter Name</b></label>
						<div class="col-sm-5">
								<input type="text" class="form-control" value="Anonymous" id="donationdisplayname" name="donationdisplayname" placeholder="Anonymous">
						</div>
						<div class="col-sm-5">
						<small>
								The Name you want to be be displayed in the Supporters Thank-You List on my website :). leave it blank of choose a name like \'Anonymous\'  if you want to stay hidden and be that cool guy that acts from within the realm of shaddows ... :D
						</small>
						</div>
				</div>
  
				<hr><br>
				
				
							
				 ';
        }
}