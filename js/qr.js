
function checkLength(txtBox,remCharacters,maxCharacters) {

  var len = document.getElementById(txtBox).value.length;
  if (len > maxCharacters) {
    document.getElementById(txtBox).value = document.getElementById(txtBox).value.substring(0,maxCharacters);
    len = maxCharacters;
  }  
  document.getElementById(remCharacters).innerHTML = maxCharacters - len;
}


function submitForm(event){
		if (event.keyCode == 13){	
			 
			generateQRCode();
			
		}
}

function generateQRCode(){
$('#imgQR').hide(500)
$('#note').hide();
$('#trshort').hide();
$('#trlink').hide();
 
var uri;
 

	switch(giChoice)
	{
	case 0: //url	 
		if($('#txtURL').val()!=''){			
		$('#imgQR').attr('src','http://chart.apis.google.com/chart?chs=' +  $('input[name=rdSize]:checked').val() + '&cht=qr&chl=' + $('#txtURL').val() + '&choe=UTF-8');
		uri='http://chart.apis.google.com/chart?chs=450x450&cht=qr&chl=' + $('#txtURL').val() + '&choe=UTF-8';
		
		shorturl('http://qrsrc.com/default.aspx?shareurl='+ $('#txtURL').val());
		$('#trshort').show();
		}else{showerror('you need to specify url');return false;}
	break;
	case 1: //sms	
	if($('#txtSMSTo').val()!=''&& $('#txtSMS').val()!=''){			
		$('#imgQR').attr('src','http://chart.apis.google.com/chart?chs=' +  $('input[name=rdSize]:checked').val() + '&cht=qr&chl=SMSTO:'+ $('#txtSMSTo').val() + ':' + $('#txtSMS').val() + '&choe=UTF-8');
		uri='http://chart.apis.google.com/chart?chs=450x450&cht=qr&chl=SMSTO:'+ $('#txtSMSTo').val() + ':' + $('#txtSMS').val() + '&choe=UTF-8';
		}else{showerror('you need to type in phone number and sms body');return false;}
	break;
	case 2: //phone
		
		if($('#txtPhoneTo').val()!=''){			
			$('#imgQR').attr('src','http://chart.apis.google.com/chart?chs=' +  $('input[name=rdSize]:checked').val() + '&cht=qr&chl=TEL:' + $('#txtPhoneTo').val() + '&choe=UTF-8');
			uri='http://chart.apis.google.com/chart?chs=450x450&cht=qr&chl=TEL:' + $('#txtPhoneTo').val() + '&choe=UTF-8';
		}else{showerror('you need to type in phone number');return false;}
	break;
	case 3:
		if($('#txtText').val()!=''){			
		$('#imgQR').attr('src','https://chart.googleapis.com/chart?chs=' +  $('input[name=rdSize]:checked').val() + '&cht=qr&chl=' + $('#txtText').val() + '&choe=UTF-8');
		uri='https://chart.googleapis.com/chart?chs=450x450&cht=qr&chl=' + $('#txtText').val() + '&choe=UTF-8'
		}else{showerror('you need to type in text');return false;}
		break;
	case 4: //fb url		
	 
		if(typeof $fbURL!='undefined'){
		
			if($fbURL!=''){
				$('#imgQR').attr('src','http://chart.apis.google.com/chart?chs=' +  $('input[name=rdSize]:checked').val() + '&cht=qr&chl=' + $fbURL + '&choe=UTF-8');
				uri='http://chart.apis.google.com/chart?chs=450x450&cht=qr&chl=' + $fbURL + '&choe=UTF-8';
				$('#linktitle').html('FB Profile');
				$('#linkurl').val($fbURL);
				$('#trlink').show();
			}else{showerror('you must be logged in');return false;}
		}else{showerror('you must be logged in');return false;}
		break;
	case 5: //linkedin url	
		if(typeof $linURL!='undefined'){			
			if($linURL!=''){
				$('#imgQR').attr('src','http://chart.apis.google.com/chart?chs=' +  $('input[name=rdSize]:checked').val() + '&cht=qr&chl=' + $linURL + '&choe=UTF-8');
				uri='http://chart.apis.google.com/chart?chs=450x450&cht=qr&chl=' + $linURL + '&choe=UTF-8';
				$('#linktitle').html('LinkedIn');
				$('#linkurl').val($linURL);
				$('#trlink').show();
				}else{showerror('you must be logged in');return false;}
		}else{showerror('you must be logged in');return false;}
		break;
	break;
		case 6: //twitter url				
		if(typeof $twURL!='undefined'){
		if($twURL!=''){
			$('#imgQR').attr('src','http://chart.apis.google.com/chart?chs=' +  $('input[name=rdSize]:checked').val() + '&cht=qr&chl=' + $twURL + '&choe=UTF-8');
			uri='http://chart.apis.google.com/chart?chs=450x450&cht=qr&chl=' + $twURL + '&choe=UTF-8';
			$('#linktitle').html('Twitter');
			$('#linkurl').val($twURL);
			$('#trlink').show();
			}else{showerror('you must be logged in');return false;}
		}else{showerror('you must be logged in');return false;}
		break;
	break;
	}
	$('#source').val($('#imgQR').attr("src"));
 
 	var uri=encodeURIComponent(uri);
	
	$('#permlink').attr('href','http://www.qrsrc.com/qrcode.aspx?code='+uri );

	$('#imgQR').show(500)
	$('#note').show(700)

}


var giChoice;
function showtab(iChoice){

				clear();
				$('#title').show(200);
				$('#generator').show(200);
				
				$('#div'+iChoice).show(200);
				$('#main').show(200);
				
				$('#imgQR').hide();
				
				giChoice =iChoice;
				
				switch(iChoice)
				{
				case 0://url			
					$('#title').html("URL");
					$('#txtURL').focus();
					break;
				case 1: //sms				
					$('#title').html("SMS Message");
					$('#txtSMSTo').focus();
				break;
				case 2:
					$('#title').html("Phone Number");
					$('#txtPhoneTo').focus();
				break;
				case 3:
					$('#title').html("Text");				
					$('#txtText').focus();
				break;
				case 4:
					$('#title').html("Facebook Profile");				
					//$('#txtText').focus();
				break;
				case 5:
					$('#title').html("LinkedIn Profile");				
					//$('#txtText').focus();
				break;
				case 6:
					$('#title').html("Twitter Profile");				
					//$('#txtText').focus();
				break;
				default:
					$('#title').html("Text");				
					$('#txtText').focus();
				}								
					$('#mainsection').fadeIn(500);
};


	
		function clear(){
					$('#div0').hide();
					$('#div1').hide();
					$('#div2').hide();
					$('#div3').hide();
					$('#div4').hide();
					$('#div5').hide();
					$('#div6').hide();
					$('#title').hide();
					$('#generator').hide();
					$('#imgQR').hide();
					//$('#main').hide();
					$('#note').hide();
					$('#txtText').val('');
					$('#txtPhoneTo').val('');
					$('#txtSMSTo').val('');
					$('#txtSMSTo').val('');
					$('#txtSMS').val('');
				
				
		};
		
		function download(){
		
			
		
		}
		
		
		
		function download(e) {
			
			$.get("download.aspx", { url: $('#source').val()}, function(data){datafile=data;});
			e.preventDefault();  //stop the browser from following
			window.location.href = 'download.aspx?file=' + datafile ;
		};

	
function shorturl(url){

   $.get("shorturl.aspx", { url: url}, function(data){$('#shorturl').val(data);});
}


/*
function makeurl(inurl){
$.getJSON(
    "http://sml.bz/api.aspx",
    "{url:inurl}",
    function(data) { alert(data); },
    "html"
);
		
}*/


function showerror(message){

	$('#diverror').html(message).slideDown(500).delay(2000).slideUp();

  }


var userAgent = navigator.userAgent.toLowerCase();
 
// Figure out what browser is being used
$.browser = {
	version: (userAgent.match( /.+(?:rv|it|ra|ie|me)[\/: ]([\d.]+)/ ) || [])[1],
	chrome: /chrome/.test( userAgent ),
	safari: /webkit/.test( userAgent ) && !/chrome/.test( userAgent ),
	opera: /opera/.test( userAgent ),
	msie: /msie/.test( userAgent ) && !/opera/.test( userAgent ),
	mozilla: /mozilla/.test( userAgent ) && !/(compatible|webkit)/.test( userAgent )
};


$(document).ready(function(){
 
if ($.browser.chrome==true){
	$("#btnBrowser").val('+add to chrome');
	$("#btnBrowser").show();
	$("#btnBrowser").click(function (e) {
	
		location.href='https://chrome.google.com/webstore/detail/hfkegikjdijmjcfohdgmgmnfddpgeade?hl=en-US&gl=US'
	});

}
if ($.browser.mozilla==true){
	$("#btnBrowser").val('+add to firefox');	
	$("#btnBrowser").show();
	$("#btnBrowser").click(function (e) {
	
	location.href='https://addons.mozilla.org/en-US/firefox/addon/qrsrc/'
	});
}



});
