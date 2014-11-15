<!DOCTYPE html>
<script src="js/jquery.cycle.all.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/qr.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
<script language="javascript">
		$(function(){
			var itab=0;		 			
			clear();		
			
 			showtab(itab);
			
			}			
			)
		
		var target;
		 
		function postQRCode()
		{    
			target=$('#imgQR').attr("src");      
			target=encodeURIComponent(target);                         
		}
	    
		
	</script>

			 <div align="center">
			 <script type="text/javascript"><!--

			google_ad_client = "ca-pub-2177771823661201";
			/* QRCoddes */
			google_ad_slot = "3198446792";
			google_ad_width = 728;
			google_ad_height = 90;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
			</div>
			<div class="section" style="">
			 <div id="divmenu">
			

			</div>
			<table width="100%"  id="mainsection" >
				<tr>
					<td  width="400" valign="top">										
						<h3 id="title" > </h3>
						<div id="diverror"></div>
						<div id="div0">
							<table>
								<tr>
									<td>
											URL 		
									</td>
									<td>
										<input type="text" id="txtURL" style="width:350px;" onkeydown="submitForm(event);"    value=""><br/>		
										<small>http://yourdomain.com</small>
									</td>
								</tr>																
							</table>
							 
						</div>
						
						<div id="div1">							
							<table>
								<tr>
									<td>
										Phone # 		
									</td>
									<td>
										<input type="text" id="txtSMSTo" style="width:330px;"><br/>		
									</td>
								</tr>
								<tr>
									<td valign="top">
											Message 		
									</td>
									<td>
											<textarea id="txtSMS" onkeydown="checkLength('txtSMS','char160',160);" rows="100" cols="20" style="height:50px;width:330px;"  ></textarea><br/>		
									</td>
								</tr>
								<tr>
									 
									<td align="right" colspan="2">
										Left <span id="char160">160</span>
									</td>
								</tr>
								
							</table>
							
							 
							
						</div>
						
						<div id="div2">
								<table>
								<tr>
									<td>
										Phone Number 		
									</td>
									<td>
										<input type="text" id="txtPhoneTo"  onkeydown="submitForm(event);">											
									</td>
								</tr>																
							</table>
							 	
						</div>
						<div id="div3">
						<table>
								<tr>
									<td valign="top">
										Text 		
									</td>
									<td>
										<textarea id="txtText" onkeydown="checkLength('txtText','char250',250);" rows="100" cols="20" style="height:100px;width:350px;"   ></textarea><br/>
									</td>
								</tr>																
								
								<tr>
									<td align="right" colspan="2">
										Left <span id="char250">250</span>
									</td>
								</tr>
							</table>
						</div>
						<div id="div4">
							<table>
								<tr>
									<td colspan="2">											
										<div id="fb-root"></div>
										<span id="fb-profile"></span>	
										<fb:login-button autologoutlink="true"></fb:login-button>		
										
										<br/>	<br/>
										<small>you have to be logged in to Facebook for us to proceed. we dont store or share your account information.</small>
									</td>
								</tr>																
							</table>														
						</div>
						<div id="div5">
							<table>
								<tr>
									<td colspan="2">											
										<script type="in/Login" data-onAuth="loadLinkedIn"></script>	
										<span id="link-profile"></span>																			
										<br/>	<br/>										
										<small>you have to be logged in to LinkedIn for us to proceed. we dont store or share your account information.</small>
									</td>
								</tr>																
							</table>														
						</div>
						
						<div id="div6">
								<table>
								<tr>
									<td colspan="2">											
										 
										<span id="twitter-connect-placeholder"></span>									
										<span id="tw-login-logout"></span>										
										
									
										<br/><br/>
										<small>you have to be logged in to Twitter for us to proceed. we don't store or share your account information.</small>
									</td>
								</tr>																
							</table>													
						</div>
						
						
						
						<br/>	
							<div id="generator" align="right">
								<b>Size:</b><input type="radio"  name="rdSize" value="150x150" id="150"/>150
								<input type="radio"  name="rdSize" value="250x250" id="250"/>250
								<input type="radio" name="rdSize" value="350x350" id="350" checked="true"/>350
								<input type="radio" name="rdSize" value="450x450" id="450"/>450							
								<input type="button" class="btn" value="generate" onclick="generateQRCode();">		
							</div>
							
							<br/>
							<br/>
								<div id="note" class="note">								
								<table>
									<tr>
										<td>
											source
										</td>
										<td>
											<input type="text" id="source" style="width:320px;" onclick=" $('#source').focus();  $('#source').select();">		
										</td>
									</tr>
									<tr id="trshort">
										<td>
											short
										</td>
										<td>
											<input type="text" style="width:320px;" id="shorturl" onclick=" $('#shorturl').focus();  $('#shorturl').select();">		
										</td>
									</tr>
										<tr id="trlink">
										<td>
											<div id="linktitle"></div>
										</td>
										<td>
											<input type="text" style="width:320px;" id="linkurl" onclick=" $('#linkurl').focus();  $('#linkurl').select();">		
										</td>
									</tr>
									
								</table>
								
								 							
								<div align="right"><b><a id="permlink">permalink</a></b>
								<!--<br/><br/>
								<div align="right"><b><a id="download" href="javascript:void(0);" onclick="download(event);">download this QR code</a></b>&nbsp;&nbsp;</div>
									-->		
									
						</div>
							 
					</td>
					<td>						 
					
						<br/>	
						<div align="center">
							<img id="imgQR"  src="images/pixel.png">														
						</div>		
					</td>
							
					
				</tr>
			
			</table>
			<br/>
		 
         </div>
   </div>
          <script type="text/javascript">
         
		 var url=''+'';   
		 var size=''+''; 
		     			 		  
		 if(size!=''){//$('input[name=rdSize]:eq(' + size + ')').attr('checked', 'checked');			 
						//$('input[name=rdSize]')[size].checked=true;
						$('#' + size +'').attr('checked', true);

						//$('input[name=rdSize]:nth(size)').attr('checked',true);
						$('input[name=rdSize]').val(size+'x'+size);
						}
		 if(url!=''){
		 
		 giChoice =0;
		 
		 generateQRCode();
		 $('#note').show(700);
		 $('#imgQR').show(700)
		 }		
		 
       </script>
       
 



			<div align="center" >
			
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-2177771823661201";
			/* QRCoddes */
			google_ad_slot = "3198446792";
			google_ad_width = 728;
			google_ad_height = 90;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
</div>

</html>