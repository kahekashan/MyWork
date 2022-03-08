<?php 
	  
include("common/db_config.php");
include_once("fckeditor/fckeditor.php");
include('js/pagination/paginator.class1.php');	  
	  
extract($_REQUEST);


if($add == "Add")
	  {
	   for($c=0;$c < $count_chk;$c++)
	   {
		   {
		   if(isset($_REQUEST['chk_country_left'.$c]))
		   {
		   
		    mysql_query("insert into v_news_letter(news_letter_id,country,state_us,state_me,state_pe,state_sp,language,media_type,business_activity,business_size,activate_email,follow_from,other_follow_from,email_subject,email_copy_to,activate_logo,activate_date,greetings,body1,mail_type,article,body2,regards,quality,product)values('null','".$_REQUEST['chk_country_left'.$c]."','".$_REQUEST['state_us']."','".$_REQUEST['state_me']."','".$_REQUEST['state_pe']."','".$_REQUEST['state_sp']."','".$_REQUEST['language']."','".$_REQUEST['media_type']."','".$_REQUEST['business_activity']."','".$_REQUEST['business_size']."','".$_REQUEST['activate_email']."','".$_REQUEST['follow_from']."','".$_REQUEST['other_follow_from']."','".$_REQUEST['email_subject']."','".$_REQUEST['email_copy_to']."','".$_REQUEST['activate_logo']."','".$_REQUEST['activate_date']."','".addslashes($greetings)."','".addslashes($body1)."','".$_REQUEST['mail_type']."','".$_REQUEST['article']."','".addslashes($body2)."','".addslashes($regards)."','".$_REQUEST['quality']."','".$_REQUEST['product']."')");
		    $mode = "add";
		   }
		   
		   if(isset($_REQUEST['chk_country_left'.$c]))
		   {
			mysql_query("insert into v_news_letter(news_letter_id,country,state_us,state_me,state_pe,state_sp,language,media_type,business_activity,business_size,activate_email,follow_from,other_follow_from,email_subject,email_copy_to,activate_logo,activate_date,greetings,body1,mail_type,article,body2,regards,quality,product)values('null','".$_REQUEST['chk_country_left'.$c]."','".$_REQUEST['state_us_es']."','".$_REQUEST['state_me_es']."','".$_REQUEST['state_pe_es']."','".$_REQUEST['state_sp_es']."','".$_REQUEST['language_es']."','".$_REQUEST['media_type_es']."','".$_REQUEST['business_activity_es']."','".$_REQUEST['business_size_es']."','".$_REQUEST['activate_email_es']."','".$_REQUEST['follow_from_es']."','".$_REQUEST['other_follow_from_es']."','".$_REQUEST['email_subject_es']."','".$_REQUEST['email_copy_to_es']."','".$_REQUEST['activate_logo_es']."','".$_REQUEST['activate_date_es']."','".addslashes($greetings_es)."','".addslashes($body1_es)."','".$_REQUEST['mail_type_es']."','".$_REQUEST['article_es']."','".addslashes($body2_es)."','".addslashes($regards_es)."','".$_REQUEST['quality_es']."','".$_REQUEST['product_es']."')");
				$mode = "add";
		   }
			?>
		 <script>window.location="add_news_letter.php";</script>
		<?php
	  }
	  }
	  }
	  
	  
	   if($save == "Save")
	  {
	      if($record == $row['news_letter_id'])
	      //echo $_REQUEST['hide1'] .' '.$_REQUEST['hide2'];exit;
		  {
		  if($language != "Spanish")
		  {
		    mysql_query("update v_news_letter set media_type = '".$media_type."',business_activity = '".$business_activity."',business_size = '".$business_size."',email_subject = '".$email_subject."',quality = '".$quality."' where news_letter_id ='".$news_letter_id."' ");
			
			
			for($k=1;$k<=$total_left;$k++)
			{
			  
			  mysql_query("update v_news_letter set  activate_email = '".$_REQUEST['activate_e'.$k]."' where news_letter_id ='".$_REQUEST['hide'.$k]."' "); 
			 
			}
			$mode ="update";
		   }
		   else 
		  {
		  mysql_query("update v_news_letter set media_type = '".$media_type."',business_activity = '".$business_activity."',business_size = '".$business_size."',email_subject = '".$email_subject."',quality = '".$quality."' where news_letter_id ='".$news_letter_id."' ");
		   for($k=1;$k<=$total_left;$k++)
			{
			
		    mysql_query("update v_news_letter set  activate_email = '".$_REQUEST['activate_e'.$k]."' where news_letter_id ='".$_REQUEST['hide'.$k]."' "); 
			}
		  $mode ="update";
		  }
		  }
	  }
	  
	  
	  
	 if($submit == "Save All")
		 {  				
					mysql_query("update v_news_letter set media_type = '".$_REQUEST['media_type'.$k]."',business_activity = '".$_REQUEST['business_activity'.$k]."',business_size = '".$_REQUEST['business_size'.$k]."',email_subject = '".$_REQUEST['email_subject'.$k]."',quality = '".$_REQUEST['quality'.$k]."' where news_letter_id ='".$_REQUEST['news_letter_id'.$k]."'");
					
			
		 for($k=1;$k<=$total;$k++)
			{ 			
			  
			  
		mysql_query("update v_news_letter set  activate_email = '".$_REQUEST['activate_e'.$k]."' where news_letter_id ='".$_REQUEST['hide'.$k]."' ");
			 
			}
			 
			$mode = "updateall";
		 }
	  
	  
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VentDepot - Add/Edit News Letter </title>
<link rel="stylesheet" type="text/css" href="css/style.css" /> 
<script type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.translate-1.4.6-debug-all.js"></script>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>

<!--//new pagination starts-->
<script type="text/javascript" src="js/pagination/pagination.js"></script>
<link rel="stylesheet" type="text/css" href="css/pagination/pagination.css" />
<!--//new pagination ends-->

<!--Pagination starts-->

<link rel="stylesheet" href="css/pagination/jq.css" type="text/css" media="print, projection, screen">
<link rel="stylesheet" href="css/pagination/style_page.css" type="text/css" media="print, projection, screen">
<script src="js/pagination/urchin.js" type="text/javascript"></script>
<script type="text/javascript">_uacct = "UA-2189649-2";urchinTracker();</script>
<script type="text/javascript" src="js/pagination/jquery_002.js"></script>
<script type="text/javascript" src="js/pagination/jquery.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() { //alert("hii");
	$("#table_list")
		.tablesorter({ 
		 widthFixed: true,
		 widgets: ['zebra'],
		 //debug: true,
		 headers: { 
            0: { sorter: false },
			7: { sorter: false },
			8: { sorter: false }
        } 
		})
		//.tablesorterPager({container: $("#pager")});
});

<!--Pagination ends-->

<!----Start the Function to select All Countries and also Calling Function to select All Countries in Transalation Panel------>
function select_all_countries(all_countries)
{
	if(document.getElementById('all_countries').checked==true)
	{
		for(var i=0;i<all_countries;i++)
		{
			document.getElementById('chk_country'+i).checked=true;
		}
	}	
	else
	{
		for(var i=0;i<all_countries;i++)
		{
			document.getElementById('chk_country'+i).checked=false;
		}
	}
	//alert("hello");
	showCountry(all_countries);
}
<!----End the Function to select All Countries and also Calling Function to select All Countries in Transalation Panel------>

function selectAllMedia(all_media)
{ //alert(all_media);
	if(document.getElementById('all_media').checked==true)
	{
		for(var i=0;i<all_media;i++)
		{ //alert("hi");
			document.getElementById('chk_mediatype'+i).checked=true; 
		}
	}	
	else
	{
		for(var i=0;i<all_media;i++)
		{
			document.getElementById('chk_mediatype'+i).checked=false;
		}
	}
	//alert("hello");
	showMedia(all_media);
}

function selectAllBusiness(all_business)
{ //alert(all_business);
	if(document.getElementById('all_business').checked==true)
	{
		for(var i=0;i<all_business;i++)
		{ //alert("hi");
			document.getElementById('chk_business_activity_type'+i).checked=true; 
		}
	}	
	else
	{
		for(var i=0;i<all_business;i++)
		{
			document.getElementById('chk_business_activity_type'+i).checked=false;
		}
	}
	//alert("hello");
	showBusiness(all_business);
}

function selectAllEmployees(all_employees)
{ //alert(all_employees);
	if(document.getElementById('all_employees').checked==true)
	{
		for(var i=0;i<all_employees;i++)
		{ //alert("hi");
			document.getElementById('chk_num_employees'+i).checked=true; 
		}
	}	
	else
	{
		for(var i=0;i<all_employees;i++)
		{
			document.getElementById('chk_num_employees'+i).checked=false;
		}
	}
	//alert("hello");
	showEmployees(all_employees);
}

<!------- this is for display country in right side by ajax --------!>
function showCountry(num)
{ 	 	
	//alert(num);
	//var cont="";
	var countries_id='';
	for(var j=0;j<num;j++)
	{//alert(document.getElementById('chk_country'+j).checked);
	   if((document.getElementById('chk_country'+j).checked)==true)
	   {
			//alert("hi"+j);
			countries_id=countries_id+','+document.getElementById('chk_country'+j).value;
	   }				
	}
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return false;
	}
	var url="common/ajax/country_type_menu_bar.php?countries_id="+countries_id+"&mode=country&num="+num;
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			//document.getElementById('country1').value=xmlHttp.responseText;	
			//alert(document.getElementById('country1').value);
			document.getElementById('country').innerHTML=xmlHttp.responseText;				
		}
		
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;    
}

function showMedia(num)
{ 	//alert(num);
	var cont = ""; 
    for(con = 0;con<num;con++)
	{
	   var idName = 'chk_mediatype'+con;
	   if((document.getElementById(idName).checked)==true)
	   {
		 cont+=document.getElementById(idName).value+',';
		 
	   }
	   
	}//alert(cont);
    xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return false;
	}
	var url="common/ajax/media_check_ajax.php?media="+cont+"&mode=media";
	//alert(url);
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			document.getElementById('media_display').innerHTML=xmlHttp.responseText;
		
		}
		
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;
} 

function showBusiness(num)
{ 	//alert(num);
	var cont = ""; 
    for(con = 0;con<num;con++)
	{
	   var idName = 'chk_business_activity_type'+con;
	   if((document.getElementById(idName).checked)==true)
	   {
		 cont+=document.getElementById(idName).value+',';
		 
	   }
	   
	}//alert(cont);
    xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return false;
	}
	var url="common/ajax/business_check_ajax.php?business="+cont+"&mode=business";
	//alert(url);
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			document.getElementById('business_display').innerHTML=xmlHttp.responseText;
		
		}
		
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;
} 

function showEmployees(num)
{ 	//alert(num);
	var cont = ""; 
    for(con = 0;con<num;con++)
	{
	   var idName = 'chk_num_employees'+con;
	   if((document.getElementById(idName).checked)==true)
	   {
		 cont+=document.getElementById(idName).value+',';
		 
	   }
	   
	}//alert(cont);
    xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return false;
	}
	var url="common/ajax/employees_check_ajax.php?employees="+cont+"&mode=employees";
	//alert(url);
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			document.getElementById('employees_display').innerHTML=xmlHttp.responseText;
		
		}
		
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;
} 

function deleteRecord(rec)
{
var	list_limit = document.getElementById('list_limit').value;
var del = confirm("Are you sure you want to delete?");
if(del==true)
{ 
		xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
			alert ("Browser does not support HTTP Request")
			return false;
			}
			var url="common/ajax/delete_news_letter.php?record="+rec+"&mode=delete&list_limit="+list_limit;
           
			xmlHttp.onreadystatechange=function()
			{
				if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
				{ 
					//alert(xmlHttp.responseText);
					document.getElementById('page_contents').innerHTML=xmlHttp.responseText;
				$("#table_list")
		.tablesorter({ 
		 widthFixed: true,
		 widgets: ['zebra'],
		 //debug: true,
		 headers: { 
           0: { sorter: false },
			7: { sorter: false },
			8: { sorter: false }
        } 
		})	
			}
		else
		{
			document.getElementById('loadingid').innerHTML = '<img src="images/ajax-loader.gif"> Processing...';
			document.getElementById('loadingidbtm').innerHTML = '<img src="images/ajax-loader.gif"> Processing...';
		}
			
		}
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
		return false;
    
} 

}
function submitform2(actionUrl)
{
document.frm_job_table_list.action = actionUrl;	
//alert(document.frm_media_table_list.action);
 document.frm_job_table_list.submit();
}

function func_select_all_checkbox(num)
{//alert(num);
	if(document.getElementById('chk_select_all').checked==true)
	{
		for(k=1;k<=num;k++)
		{
			document.getElementById('checkbox'+k).checked=true;
		}
	}
	else
	{
		for(k=1;k<=num;k++)
		{
			document.getElementById('checkbox'+k).checked=false;
		}
	}
}


function func_sort_list(str)
{	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return false;
	}
	var url="common/ajax/sort_job_title.php?sort_val="+str;
	//alert(url);
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{
			//alert(xmlHttp.responseText);
			document.getElementById('news_list').innerHTML=xmlHttp.responseText;
		//var mode="delete";
		}
	
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;
	function GetXmlHttpObject()
	{
		var xmlHttp=null;
		try
		{
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
		}
		catch (e)
		{
		//Internet Explorer
			try
			{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch (e)
			{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
	return xmlHttp;
	}
}
 

function func_all_delete(count)
{
var	list_limit = document.getElementById('list_limit').value;

var del_all = confirm("Are you sure you want to delete?");
if(del_all==true)
{
var i;
var hide='';

for(i=1; i<=count;i++)
{
//var val='hide'+i;
//alert(document.getElementById('checkbox'+i).checked);
//alert(document.getElementById('hide'+i).value);
//alert(document.getElementById('checkbox'+i).checked);
if(document.getElementById('checkbox'+i).checked==true)
{
//alert(document.getElementById('hide'+i).value);
hide=hide+','+document.getElementById('hide'+i).value;
}
}
//alert(hide);
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return false;
}
var url="common/ajax/delete_news_letter.php?hide_id="+hide+"&mode=delete_all&list_limit="+list_limit;
//alert(url);
xmlHttp.onreadystatechange=function()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{
//alert(xmlHttp.responseText);
document.getElementById('page_contents').innerHTML=xmlHttp.responseText;
				$("#table_list")
		.tablesorter({ 
		 widthFixed: true,
		 widgets: ['zebra'],
		 //debug: true,
		 headers: { 
            0: { sorter: false },
			7: { sorter: false },
			8: { sorter: false }
        } 
		})	
			}
		else
		{
			document.getElementById('loadingid').innerHTML = '<img src="images/ajax-loader.gif"> Processing...';
			document.getElementById('loadingidbtm').innerHTML = '<img src="images/ajax-loader.gif"> Processing...';
		}
			
		}
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
		return false;
		function GetXmlHttpObject()
{
var xmlHttp=null;
try
{
// Firefox, Opera 8.0+, Safari
xmlHttp=new XMLHttpRequest();
}
catch (e)
{
//Internet Explorer
try
{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp;
}

}
}

function editRecord(str)
{	
	alert(str);
	var list_limit = document.getElementById('list_limit').value;
	alert('edit_newletter.php?news_letter_id='+str+'&list_limit='+list_limit);	
    window.open('edit_newletter.php?news_letter_id='+str+'&list_limit='+list_limit,'_blank');
}

function editAllRecord(total)
{   //alert(total);

	var chk='';
	var list_limit = document.getElementById('list_limit').value;
	
	for(var e=1;e<=total;e++)
	{ 
	   if((document.getElementById('checkbox'+e).checked)==true)
	   {//alert(document.getElementById('chk'+e).value);
	   	chk=document.getElementById('checkbox'+e).value;
	   	window.open('edit_newletter.php?news_letter_id='+chk+'&list_limit='+list_limit,'_blank');
	   }
	}
	if(chk=='')
	{
		alert("Please Select Record In Table");
		return false;
	}
}

<!--  This is for edit all record   --!>



function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
	{
	
	xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{
	
	try
	{
	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch (e)
	{
	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	}
	return xmlHttp;
}

$(document).ready(function(){  
$('#email_subject').keyup(function(event) {
var lang = document.getElementById('language_translate').value;
                        var sourceText = $('#email_subject').val();
                        $.translate(sourceText,'en',lang, {
                                start:          function(){   $('#throbber').show() },
                                complete:       function(translation){
                                                                $('#email_subject_es').val(translation);
                                                                $('#throbber').hide();
                                                        },
                                error:          function(){   $('#throbber').hide()   }
                        });
                });
				});
				
$(document).ready(function(){  
$('#email_copy_to').keyup(function(event) {
var lang = document.getElementById('language_translate').value;
                        var sourceText = $('#email_copy_to').val();
                        $.translate(sourceText,'en',lang, {
                                start:          function(){   $('#throbber').show() },
                                complete:       function(translation){
                                                                $('#email_copy_to_es').val(translation);
                                                                $('#throbber').hide();
                                                        },
                                error:          function(){   $('#throbber').hide()   }
                        });
                });
				});
				
$(document).ready(function(){  
$('#greetings').keyup(function(event) {
var lang = document.getElementById('language_translate').value;
                        var sourceText = $('#greetings').val();
                        $.translate(sourceText,'en',lang, {
                                start:          function(){   $('#throbber').show() },
                                complete:       function(translation){
                                                                $('#greetings_es').val(translation);
                                                                $('#throbber').hide();
                                                        },
                                error:          function(){   $('#throbber').hide()   }
                        });
                });
				});
				
$(document).ready(function(){  
$('#body1').keyup(function(event) {
var lang = document.getElementById('language_translate').value;
                        var sourceText = $('#body1').val();
                        $.translate(sourceText,'en',lang, {
                                start:          function(){   $('#throbber').show() },
                                complete:       function(translation){
                                                                $('#body1_es').val(translation);
                                                                $('#throbber').hide();
                                                        },
                                error:          function(){   $('#throbber').hide()   }
                        });
                });
				});
				
$(document).ready(function(){  
$('#body2').keyup(function(event) {
var lang = document.getElementById('language_translate').value;
                        var sourceText = $('#body2').val();
                        $.translate(sourceText,'en',lang, {
                                start:          function(){   $('#throbber').show() },
                                complete:       function(translation){
                                                                $('#body2_es').val(translation);
                                                                $('#throbber').hide();
                                                        },
                                error:          function(){   $('#throbber').hide()   }
                        });
                });
				});
				

if (document.addEventListener&& !/Opera/i.test(navigator.userAgent)) {
  document.addEventListener("DOMContentLoaded", initon, false);
}

(function() {
  /*@cc_on
  try {
    document.body.doScroll('up');
    return initon();
  } catch(e) {}
  /*@if (false) @*/
  if (/loaded|complete/.test(document.readyState)) return initon();
  /*@end @*/
  if (!initon.done) setTimeout(arguments.callee, 30);
})();

if (window.addEventListener) {
  window.addEventListener('load', initon, false);
} else if (window.attachEvent) {
  window.attachEvent('onload', initon);
}


window.onload = initon;
function initon()
{ 
	  if (arguments.callee.done) return;
      arguments.callee.done = true;	// Automatically calculates the editor base path based on the _samples directory.
	// This is usefull only for these samples. A real application should use something like this:
	// oFCKeditor.BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.
	var sBasePath = 'fckeditor/' ;
	//alert(sBasePath);
    //alert("hiii");
	var oFCKeditor = new FCKeditor( 'greetings' ) ;
	oFCKeditor.BasePath	= sBasePath ;
	oFCKeditor.Width  = '550' ;
    oFCKeditor.Height = '400' ;
	oFCKeditor.ReplaceTextarea() ;	
	
	var oFCKeditor = new FCKeditor( 'greetings_es' ) ;
	oFCKeditor.BasePath	= sBasePath ;
	oFCKeditor.Width  = '550' ;
    oFCKeditor.Height = '400' ;
	oFCKeditor.ReplaceTextarea() ;
	
	var oFCKeditor = new FCKeditor( 'body1' ) ;
	oFCKeditor.BasePath	= sBasePath ;
	oFCKeditor.Width  = '550' ;
    oFCKeditor.Height = '400' ;
	oFCKeditor.ReplaceTextarea() ;
	
	var oFCKeditor = new FCKeditor( 'body1_es' ) ;
	oFCKeditor.BasePath	= sBasePath ;
	oFCKeditor.Width  = '550' ;
    oFCKeditor.Height = '400' ;
	oFCKeditor.ReplaceTextarea() ;
	
	var oFCKeditor = new FCKeditor( 'body2' ) ;
	oFCKeditor.BasePath	= sBasePath ;
	oFCKeditor.Width  = '550' ;
    oFCKeditor.Height = '400' ;
	oFCKeditor.ReplaceTextarea() ;
	
	var oFCKeditor = new FCKeditor( 'body2_es' ) ;
	oFCKeditor.BasePath	= sBasePath ;
	oFCKeditor.Width  = '550' ;
    oFCKeditor.Height = '400' ;
	oFCKeditor.ReplaceTextarea() ;
	
	
	
	
}

function FCKeditor_OnComplete(editorInstance)
{   
    translate(editorInstance);
    editorInstance.Events.AttachEvent('OnSelectionChange', translate);
	translate1(editorInstance);
    editorInstance.Events.AttachEvent('OnSelectionChange', translate1);
	translate2(editorInstance);
    editorInstance.Events.AttachEvent('OnSelectionChange', translate2);
	translate3(editorInstance);
    editorInstance.Events.AttachEvent('OnSelectionChange', translate3);
}

function translate(editorInstance)
{
  var lang = document.getElementById('language_translate').value;
var oEditor_en = FCKeditorAPI.GetInstance('greetings') ;
var oEditor_es= FCKeditorAPI.GetInstance('greetings_es') ;

	//alert( oEditor.EditorDocument.body.innerHTML ) ;
                         //var sourceText = removeHTMLTags(oEditor.EditorDocument.body.innerHTML);
					    var sourceText1 = oEditor_en.EditorDocument.body.innerHTML;
                        $.translate(sourceText1,'en',lang, {
                                start:          function(){   $('#throbber1').show() },
                                complete:       function(translation){
								//alert("translate : "+translation);
                                                                oEditor_es.EditorDocument.body.innerHTML = translation;
                                                                $('#throbber1').hide();
                                                        },
                                error:          function(){   $('#throbber1').hide()   }
                       });
}

function translate1(editorInstance)
{
  var lang = document.getElementById('language_translate').value;
var oEditor_en = FCKeditorAPI.GetInstance('body1') ;
var oEditor_es= FCKeditorAPI.GetInstance('body1_es') ;

	//alert( oEditor.EditorDocument.body.innerHTML ) ;
                         //var sourceText = removeHTMLTags(oEditor.EditorDocument.body.innerHTML);
					    var sourceText1 = oEditor_en.EditorDocument.body.innerHTML;
                        $.translate(sourceText1,'en',lang, {
                                start:          function(){   $('#throbber1').show() },
                                complete:       function(translation){
								//alert("translate : "+translation);
                                                                oEditor_es.EditorDocument.body.innerHTML = translation;
                                                                $('#throbber1').hide();
                                                        },
                                error:          function(){   $('#throbber1').hide()   }
                       });
}

function translate1(editorInstance)
{
  var lang = document.getElementById('language_translate').value;
var oEditor_en = FCKeditorAPI.GetInstance('body2') ;
var oEditor_es= FCKeditorAPI.GetInstance('body2_es') ;

	//alert( oEditor.EditorDocument.body.innerHTML ) ;
                         //var sourceText = removeHTMLTags(oEditor.EditorDocument.body.innerHTML);
					    var sourceText1 = oEditor_en.EditorDocument.body.innerHTML;
                        $.translate(sourceText1,'en',lang, {
                                start:          function(){   $('#throbber1').show() },
                                complete:       function(translation){
								//alert("translate : "+translation);
                                                                oEditor_es.EditorDocument.body.innerHTML = translation;
                                                                $('#throbber1').hide();
                                                        },
                                error:          function(){   $('#throbber1').hide()   }
                       });
}

function changeLanguage()
{
  var lang = document.getElementById('language_translate').value;
  var oEditor_en = FCKeditorAPI.GetInstance('greetings') ;
  var oEditor_es= FCKeditorAPI.GetInstance('greetings_es') ;
  
  var sourceText1 = oEditor_en.EditorDocument.body.innerHTML;
                        $.translate(sourceText1,'en',lang, {
                                start:          function(){   $('#throbber1').show() },
                                complete:       function(translation){
								//alert("translate : "+translation);
                                                                oEditor_es.EditorDocument.body.innerHTML = translation;
                                                                $('#throbber1').hide();
                                                        },
                                error:          function(){   $('#throbber1').hide()   }
                       });
					   
  var oEditor_en = FCKeditorAPI.GetInstance('body1') ;
  var oEditor_es= FCKeditorAPI.GetInstance('body1_es') ;
  
  var sourceText1 = oEditor_en.EditorDocument.body.innerHTML;
                        $.translate(sourceText1,'en',lang, {
                                start:          function(){   $('#throbber1').show() },
                                complete:       function(translation){
								//alert("translate : "+translation);
                                                                oEditor_es.EditorDocument.body.innerHTML = translation;
                                                                $('#throbber1').hide();
                                                        },
                                error:          function(){   $('#throbber1').hide()   }
                       });
					   
  var oEditor_en = FCKeditorAPI.GetInstance('body2') ;
  var oEditor_es= FCKeditorAPI.GetInstance('body2_es') ;
  
  var sourceText1 = oEditor_en.EditorDocument.body.innerHTML;
                        $.translate(sourceText1,'en',lang, {
                                start:          function(){   $('#throbber1').show() },
                                complete:       function(translation){
								//alert("translate : "+translation);
                                                                oEditor_es.EditorDocument.body.innerHTML = translation;
                                                                $('#throbber1').hide();
                                                        },
                                error:          function(){   $('#throbber1').hide()   }
                       });
					   
 
$(document).ready(function(){  
//$('#description').keyup(function(event) {

                         var sourceText = $('#email_subject').val();
                        $.translate(sourceText,'en',lang, {
                                start:          function(){   $('#throbber').show() },
                                complete:       function(translation){
                                                                $('#email_subject_es').val(translation);
                                                                $('#throbber').hide();
                                                        },
                                error:          function(){   $('#throbber').hide()   }
                        });
                });
//});

$(document).ready(function(){  
//$('#description').keyup(function(event) {

                         var sourceText = $('#email_copy_to').val();
                        $.translate(sourceText,'en',lang, {
                                start:          function(){   $('#throbber').show() },
                                complete:       function(translation){
                                                                $('#email_copy_to_es').val(translation);
                                                                $('#throbber').hide();
                                                        },
                                error:          function(){   $('#throbber').hide()   }
                        });
                });
//});


}

function showMedia(num)
{ 	alert(num);
	var cont = ""; 
    for(con = 0;con<num;con++)
	{
	   //var idName = 'chk_mediatype'+con; alert(idName);
	   if((document.getElementById('chk_mediatype'+con).checked)==true)
	   {
	    
		 cont+=document.getElementById('chk_mediatype'+con).value+','; 
		 alert("hi");
		 alert(cont);
		 
	   }
	   
	}//alert(cont);
    xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return false;
	}
	var url="common/ajax/media_check_ajax.php?media="+cont+"&mode=media";
	alert(url);
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			document.getElementById('media_display').innerHTML=xmlHttp.responseText;
		
		}
		
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;
} 



<!-- this is for display Business or Activity Type in right side by ajax --!>
function showBusiness(num)
{ 	alert(num);
	var cont = ""; 
    for(con = 0;con<num;con++)
	{
	   var idName = 'chk_business_activity_type'+con; alert(idName);
	   if((document.getElementById(idName).checked)==true)
	   {
		 cont+=document.getElementById(idName).value+','; alert(cont);
		 
	   }
	   
	}//alert(cont);
    xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return false;
	}
	var url="common/ajax/business_check_ajax.php?business="+cont+"&mode=business";
	alert(url);
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			document.getElementById('business_display').innerHTML=xmlHttp.responseText;
		
		}
		
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;
} 


<!-- this is for display Number Of Employees in right side by ajax --!>
function showEmployees(num)
{ 	alert(num);
	var cont = ""; 
    for(con = 0;con<num;con++)
	{
	   var idName = 'chk_num_employees'+con; alert(idName);
	   if((document.getElementById(idName).checked)==true)
	   {
		 cont+=document.getElementById(idName).value+','; alert(cont);
		 
	   }
	   
	}//alert(cont);
    xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return false;
	}
	var url="common/ajax/employees_check_ajax.php?employees="+cont+"&mode=employees";
	alert(url);
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			document.getElementById('employees_display').innerHTML=xmlHttp.responseText;
		
		}
		
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;
} 

function checkactype(current,translate)
{
	if(document.getElementById(current).checked == true)
	{
		document.getElementById(translate).checked = true
	}
	if(document.getElementById(current).checked == false)
	{
		document.getElementById(translate).checked = false
	}
}

function showArticle(num)
{ 	//alert(num);
	var cont = ""; 
    for(con = 0;con<num;con++)
	{
	   var idName = 'chk_num_article'+con; //alert(idName);
	   if((document.getElementById(idName).checked)==true)
	   {
		 cont+=document.getElementById(idName).value+',';
		 //alert(cont);
	   }
	   
	}//alert(cont);
    xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return false;
	}
	var url="common/ajax/article_check_ajax.php?employees="+cont+"&mode=employees";
	//alert(url);
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			document.getElementById('article_display').innerHTML=xmlHttp.responseText;
		
		}
		
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;
} 

function addRecord(mode)
{ //alert(save);
//alert(radio);
//alert(mode);

count_chk = document.getElementById('count_chk').value; //alert(count_chk);
media_chk = document.getElementById('media_chk').value; //alert(media_chk);
business_chk = document.getElementById('business_chk').value; //alert(business_chk);
employees_chk = document.getElementById('employees_chk').value; //alert(employees_chk);
article_chk = document.getElementById('article_chk').value; //alert(article_chk);



email_subject = document.getElementById('email_subject').value;//alert(email_subject);
email_subject_es = document.getElementById('email_subject_es').value; //alert(email_subject_es);

email_copy_to = document.getElementById('email_copy_to').value; //alert(email_copy_to);
email_copy_to_es = document.getElementById('email_copy_to_es').value; //alert(email_copy_to_es);

quality = document.getElementById('quality').value; //alert(email_copy_to);
quality_es = document.getElementById('quality_es').value; //alert(quality_es);


var oEditor_en = FCKeditorAPI.GetInstance('greetings');
var oEditor_t= FCKeditorAPI.GetInstance('greetings_es');
greeting = oEditor_en.EditorDocument.body.innerHTML;//alert(greeting);
greeting_es = oEditor_t.EditorDocument.body.innerHTML; //alert(greeting_es);

var oEditor_en1 = FCKeditorAPI.GetInstance('body1');
var oEditor_t1= FCKeditorAPI.GetInstance('body1_es');
body1 = oEditor_en1.EditorDocument.body.innerHTML; //alert(body1);
body_es = oEditor_t1.EditorDocument.body.innerHTML; //alert(body_es);


var oEditor_en = FCKeditorAPI.GetInstance('body2');
var oEditor_t= FCKeditorAPI.GetInstance('body2_es');
regards = oEditor_en.EditorDocument.body.innerHTML; //alert(regards);
regards_es = oEditor_t.EditorDocument.body.innerHTML; //alert(regards_es);

if(document.getElementById('activate').checked == true)
{
	act1 = 1; //alert(act1);
}
else if(document.getElementById('activate1').checked == true)
{
	act1 = 0;
}

if(document.getElementById('activate_es').checked == true)
{
	act1_es = 1;
}
else if(document.getElementById('activate_es1').checked == true)
{
	act1_es = 0;
}


if(document.getElementById('mail_type').checked == true)
{
	mail_type = 1;
}
else if(document.getElementById('mail_type1').checked == true)
{
	mail_type = 2;
}
else if(document.getElementById('mail_type2').checked == true)
{
	mail_type = 3;
}
else if(document.getElementById('mail_type3').checked == true)
{
	mail_type = 4;
}
else if(document.getElementById('mail_type4').checked == true)
{
	mail_type = 5;
}



if(document.getElementById('mail_type_es').checked == true)
{
	mail_type_es = 1;
}
else if(document.getElementById('mail_type_es1').checked == true)
{
	mail_type_es = 2;
}
else if(document.getElementById('mail_type_es2').checked == true)
{
	mail_type_es = 3;
}
else if(document.getElementById('mail_type_es3').checked == true)
{
	mail_type_es = 4;
}
else if(document.getElementById('mail_type_es4').checked == true)
{
	mail_type_es = 5;
}


var acc_type="";
var acc_type_es="";
//alert(document.getElementById('acc_type_count').value);
for(var a=0;a<document.getElementById('acc_type_count').value;a++)
{
	if(document.getElementById('acc_type'+a).checked == true)
	{
	acc_type +=document.getElementById('acc_type'+a).value+","; //alert(acc_type);
	}
	if(document.getElementById('acc_type_es'+a).checked == true)
	{
	acc_type_es +=document.getElementById('acc_type_es'+a).value+","; //alert(acc_type_es);
	}
}



//acc_type=document.getElementById('acc_type').value; alert(acc_type);
//acc_type_es=document.getElementById('acc_type_es').value; alert(acc_type_es);
 

var country="";
	  for(var c=0;c < count_chk;c++)
	   {
		   
		   if(document.getElementById('chk_country'+c).checked==true)
		   {
			   country+=document.getElementById('chk_country'+c).value+','; //alert(country);
		   }
		  
	   }
	   
var media="";

	for(var m=0;m < media_chk;m++)
	{
		if(document.getElementById('chk_mediatype'+m).checked==true)
		{
			media+=document.getElementById('chk_mediatype'+m).value+','; //alert(media);
		}
	}
	
//alert(media);
var business="";

	for(var b=0;b < business_chk;b++)
	{
		if(document.getElementById('chk_business_activity_type'+b).checked==true)
		{
			business+=document.getElementById('chk_business_activity_type'+b).value+','; //alert(business);
		}
	}
	
	
var employees="";

	for(var e=0;e < employees_chk;e++)
	{
		if(document.getElementById('chk_num_employees'+e).checked==true)
		{
			employees+=document.getElementById('chk_num_employees'+e).value+','; //alert(employees);
		}
	}
//alert(employees);
var article="";

	for(var f=0;f < article_chk;f++)
	{
		if(document.getElementById('chk_num_article'+f).checked==true)
		{
			article+=document.getElementById('chk_num_article'+f).value+','; //alert(employees);
		}
	}
alert("eee"+article);

language=document.getElementById('language').value;
language_t=document.getElementById('language_translate').value;


alert(language_t);

xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return false;
	} 
	var url="common/ajax/ajax_add_newsletter.php";
	if(mode=='all')
	{
	var params = "mode="+mode+"&country="+country+"&media="+media+"&business="+business+"&employees="+employees+"&article="+article+"&acc_type="+acc_type+"&email_copy_to="+email_copy_to+"&email_subject="+email_subject+"&greeting="+greeting+"&body="+body1+"&regards="+regards+"&quality="+quality+"&acc_type_es="+acc_type_es+"&email_subject_es="+email_subject_es+"&email_copy_to_es="+email_copy_to_es+"&greeting_es"+greeting_es+"&body_es="+body_es+"&regards_es="+regards_es+"&quality_es="+quality_es+"&act1="+act1+"&act1_es="+act1_es+"&mail_type="+mail_type+"&mail_type_es="+mail_type_es+"&language_t="+language_t+"&language="+language;
	alert(params);
	}
	else if(mode=='default')
	{
	var params = "mode="+mode+"&country="+country+"&media="+media+"&business="+business+"&employees="+employees+"&article="+article+"&acc_type="+acc_type+"&email_copy_to="+email_copy_to+"&email_subject="+email_subject+"&greeting="+greeting+"&body="+body1+"&regards="+regards+"&quality="+quality+"&act1="+act1+"&mail_type="+mail_type+"&language="+language;
	alert(params);
	}
	else if(mode=='translator')
	{
	var params = "mode="+mode+"&country="+country+"&media="+media+"&business="+business+"&employees="+employees+"&article="+article+"&email_subject_es="+email_subject_es+"&email_copy_to_es="+email_copy_to_es+"&greeting_es"+greeting_es+"&body_es="+body_es+"&regards_es="+regards_es+"&acc_type_es="+acc_type_es+"&quality_es="+quality_es+"&act1_es="+act1_es+"&mail_type_es="+mail_type_es+"&language_t="+language_t;
	alert(params);
	}
			
		xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			
				document.getElementById('page_contents').innerHTML=xmlHttp.responseText;	
				//document.frm_state_add_from.reset();
			$("#table_list")
		.tablesorter({ 
		 widthFixed: true,
		 widgets: ['zebra'],
		 //debug: true,
		 headers: { 
           0: { sorter: false },
			7: { sorter: false },
			8: { sorter: false }
        } 
		})
			
		}
		else
		{
			document.getElementById('loadingid').innerHTML = '<img src="images/ajax-loader.gif"> Processing...';
			document.getElementById('loadingidbtm').innerHTML = '<img src="images/ajax-loader.gif"> Processing...';
		}
		
	}
	xmlHttp.open("POST",url,true);
	//Send the proper header information along with the request
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(params);
	return false;

}

function func_radio_select_all(num)
{ 

for(i=1;i<=num;i++)
	{
		
		document.getElementById('activate_e'+i).checked=true;
		//alert(document.getElementById('activate_e'+i).checked);
		//alert('radio_country'+i+"checked");
		document.getElementById('activate_e_t'+i).checked=false;
		//alert('radio_country_a'+i+"not checked");
		//alert(document.getElementById('activate_e_t'+i).checked);
	}
	document.getElementById('chk_save_all').value=1;
	//alert(document.getElementById('chk_save_all').value);
}

function func_radio_unselect_all(num)
{	
	
	for(j=1;j<=num;j++)
	{
		//alert('radio_country_a'+j+"checked");
		document.getElementById('activate_e_t'+j).checked=true;
		document.getElementById('activate_e'+j).checked=false;
	}
	document.getElementById('chk_save_all').value=1;
	//alert(document.getElementById('chk_save_all').value);
	//document.getElementById('activate_store').checked=false;
}

function saveAllRecord(total)
{   
    list_limit = document.getElementById('list_limit').value; 
	//alert(list_limit);
	if(list_limit == "")
	{ 
	list_limit = "all";
	}
	
   var act_store='';
   var chk='';
   //alert("hi");
	 if(document.getElementById('chk_save_all').value == 0)
	 {
		 alert('If You Check All, First You Need To Edit All And Then Click Save All');
		 return false;
	 }
	 
	else
	{
	if(chk=='')
	{
		for(var f=1;f<=total;f++)
	{
		//alert("Please Select Record In Table");
		//return false;
		//alert('activate_a'+f);
		act3=document.frm_news_table_list['activate_a'+f];
				for (var r=0; r < act3.length; r++)
        {
		   if (act3[r].checked)
			  {
			  act_store+=act3[r].value+',';
			  }
        }
		
		chk+=document.getElementById('hide'+f).value+',';
	}

	}}
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return false;
	}
	var url="common/ajax/saveall_newsletter.php";
	var params = "record="+chk+"&mode=saveall&list_limit="+list_limit+"&act_store="+act_store;
	//alert(url);
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			document.getElementById('page_contents').innerHTML=xmlHttp.responseText;
						//finalhtml = parseScript(xmlHttp.responseText);
			//alert(finalhtml);

		   $("#table_list")
		.tablesorter({ 
		 widthFixed: true,
		 widgets: ['zebra'],
		 //debug: true,
		 headers: { 
            0: { sorter: false }, 
            8: { sorter: false },
			9: { sorter: false }
        } 
		})
		window.location.hash='#pt';
		}
		
		else
		{
			document.getElementById('loadingidmid').innerHTML = '<img src="images/ajax-loader.gif">';
			document.getElementById('loadingid').innerHTML = '<img src="images/ajax-loader.gif"> Processing...';
			document.getElementById('loadingidbtm').innerHTML = '<img src="images/ajax-loader.gif"> Processing...';
		}
		
	}
	xmlHttp.open("POST",url,true);
	//Send the proper header information along with the request
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(params);
	return false;

}

function saveRecord(save,radio)
{ 
alert(save);
if(document.getElementById('activate_e'+radio).checked == true)
{
	act_store = 1;
}
else if(document.getElementById('activate_e_t'+radio).checked == true)
{
	act_store = 0;
}


//}
//alert("act_store :"+act_store+"act_reg :"+act_reg);

var	list_limit = document.getElementById('list_limit').value;
xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return false;
	}
	var url="common/ajax/save_newsletter.php?record="+save+"&mode=save&list_limit="+list_limit+"&act_store="+act_store;
			alert(url);
		xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			
			document.getElementById('page_contents').innerHTML=xmlHttp.responseText;
			$("#table_list")
		.tablesorter({ 
		 widthFixed: true,
		 widgets: ['zebra'],
		 //debug: true,
		 headers: { 
            0: { sorter: false }, 
            
			8: { sorter: false },
			9: { sorter: false }
        } 
		})
			
		}
		else
		{
			document.getElementById('loadingidmid'+save).innerHTML = '<img src="images/ajax-loader.gif">';
			document.getElementById('loadingid').innerHTML = '<img src="images/ajax-loader.gif"> Processing...';
			document.getElementById('loadingidbtm').innerHTML = '<img src="images/ajax-loader.gif"> Processing...';
			
		}
		
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;

}



</script>

</head>

<body>
<table width="110%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top">
		<table width="110%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td align="left" valign="top">
			<?php
				include("common/header.php");
			?>			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" style="background: #568EC5;">
			<?php
				include("common/top_menu.php");
			?>			</td>
		  </tr>
		  
		  <?php /*?><tr>
		    <td align="center" valign="top" class="msg">
			<?php 
				      if($mode == "update")
					  {
					      echo "Your Record Updated Successfully";
					  }
					  if($mode == "updateall")
					  {
					      echo "Your All Record Updated Successfully";
					  }
					  if($mode == "add")
					  {
					      echo "Your Record Added Successfully";
					  }
					  if($mode == "delete")
					  {
					      echo "Your Record Deleted Successfully";
					  }
			?>			
			</td>
	      </tr><?php */?>
		  <tr>
<td align="left" valign="top">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="90%" align="left" valign="top">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
		  <tr height="10px"><td>&nbsp;</td></tr>
		 <tr>
		    <td align="center" valign="top">
			   <table width="98%" align="center" cellpadding="0" cellspacing="0">
			      <tr>
				   <td align="center" valign="top">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
					  <tr>
						<td style="padding-top:5px;" class="top_td"><b>Marketing >> News Letter >> Add/Edit News Letter</b></td>
						<td align="right" style="padding-top:5px; padding-right:35px">
							<INPUT TYPE="image" SRC="images/customer_back.png" HEIGHT="20" WIDTH="20" BORDER="0" ALT="Back" title="Back" onClick="javascript:history.go(-1);return false;">
						</td>
					  </tr>
					</table>
					</td>
				  </tr>
		  <tr height="5px">
			<td>&nbsp;</td>	
		  </tr>
		  <tr>
           <td>
			<table width="100%">
			<tr>
			<td width="50%" align="center" class="top_td"><b>current Panel</b></td>
			<td width="50%" align="center"><b>Translation Panel</b></td>
			</tr>
			</table>
		   </td>
		  </tr>
		  <tr>
					<td align="center" valign="top" height="200">
			   <form action="add_news_letter.php" name="letter_table" method="post">
			   <table align="center" width="100%" cellpadding="0" cellspacing="0" >
				     <tr>
					 <td align="left" valign="top" width="90%">
			    <table width="98%" cellspacing="0" cellpadding="0" style="border:1px solid #DCD8BA;">
				    <?php
					    $sql_country = mysql_query("select * from v_country where activate=1 and language=1 order by country");
						$sql_num_country = mysql_num_rows($sql_country);	
					   ?>
				   <tr height="26px;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
					<td align="left" class="td" valign="top"  width="20%" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">Country  <div align="left" style="padding-left:5px;padding-top:5px;">
						  <input type="checkbox" name="all_countries" id="all_countries" onClick="return select_all_countries('<?php echo $sql_num_country; ?>')"  />
						</div></td>
                        <td class="td_space" style="border-bottom:1px solid #DCD8BA; border-right:1px solid #DCD8BA;">
						  <table width="100%" border="0" cellpadding="0" cellspacing="0">
						    <tr>
								<?php	
								$t = 1;
								//$sel='';
								$i = 0;		
								while($row_country = mysql_fetch_array($sql_country))
								{	
								  if(($t-1)%55==0)
								  { 
								  ?>
								  <td width="20%" valign="top" colspan="4">
									<table width='100%' cellpadding='0' cellspacing='0'>
									<?php
								  }
								?>
									  <tr>
										<td width="10%" align="center">
										  <input type="checkbox" onChange="return showCountry('<?php echo $sql_num_country;?>');" name="<?php echo 'chk_country_left'.$i; ?>" id="<?php echo 'chk_country'.$i; ?>" value="<?php echo $row_country['country_id']; ?>"  />										  </td>								 
										<td width="4%" align="left" valign="middle">
											<img src="images/flags/<?php echo $row_country['photo']; ?>" style="width:25px; height:20px; border:none; padding-left:3px;" />										  </td>								  
										<td width="86%" align="left" style="padding-left:3px;" nowrap="nowrap">
										  <?php echo substr($row_country['country'],0,14);?>
										   <!--<input type="text" name="<?php //echo 'country_name_left'.$i; ?>" id="<?php //echo 'country_name'.$i;?>" value="<?php //echo $row_country['country'];?>" readonly="" style="border:none;width:80px; background-color:#FFFFFF;" />-->										  </td>
									  </tr>
								<?php							
								  if($t%55==0 or $t==$sql_num_country)
								  { 
								  ?>
									</table>								  </td>
								 <?php
								  }
								  $t++;
								  $i++;
								}
								?>
                            </tr>   
                          </table>					    </td>
						
						<td class="td" align="left" width="20%" valign="top" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">Country</td>
                        <td class="td_space" valign="top" id="country" style="border-bottom:1px solid #DCD8BA">
						  <table width="100%" border="0" cellpadding="0" cellspacing="0">
						    <tr>
							<?php	
						$sql_country = mysql_query("select * from v_country where activate=1 and language=1 order by country");
							$sql_num_country = mysql_num_rows($sql_country);	
							$t = 1;
							//$sel='';
							$i = 0;		
							while($row_country = mysql_fetch_array($sql_country))
							{	
							  if(($t-1)%55==0)
								{ 
								?>
								  <td width="20%" valign="top">
									<table width="100%" cellpadding="0" cellspacing="0">
								<?php
								}
								?>
								  <tr>							
									<td width="10%" align="left" >
										<input type="checkbox" disabled="disabled" name="<?php echo 'chk_country'.$i; ?>" id="<?php echo 'chk_country'.$i; ?>" value="<?php echo $row_country['country_id']; ?>"  />									  </td>									  
									  <td width="4%" align="left" valign="middle">
									    <img src="images/flags/<?php echo $row_country['photo']; ?>" style="width:25px; height:20px; border:none; padding-left:3px;" />									  </td>
									  <td width="86%" align="left" style="padding-left:3px;" nowrap="nowrap">
									    <?php echo substr($row_country['country'],0,14);?>					  
									   <!--<input type="text" name="<?php //echo 'country_name_left'.$i; ?>" id="<?php //echo 'country_name'.$i;?>" value="<?php //echo $row_country['country'];?>" readonly="" style="border:none;width:80px; background-color:#FFFFFF;" />-->									  </td>
									</tr>
									  <?php
								
							     if($t%55==0 or $t==$sql_num_country)
							     { 
							     ?>
								     </table>								   </td>
							    <?php
							     }
								$t++;
								$i++;
							   }
							  ?>	
							 </tr>						
						  </table>                        </td>
				  </tr>
				  
				  <tr height="26px;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
		<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					  Language
					  </td>
				<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					    <select name="language" id="language" class="td" style="width:120px;">
						   
						    <?php 
					$sql=("select distinct language from v_language where activate=1 and def_lang = 'en' order by language asc");
					$data=mysql_query($sql);
  				  	while($fetch=mysql_fetch_array($data))
  					{
				?>
             <option value="<?php echo $fetch['language']; ?>" <?php if($fetch['language']=='English'){ echo "selected"; } ?>> <?php echo $fetch['language']; ?></option>
             <?php 
					}
				?>
						</select>					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						Language					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						<select name="language_es" id="language_translate" onChange="return changeLanguage();" style="width:120px;">
							   <option value="">Select</option>
							   <?php 
									 $sql_language= mysql_query("select distinct language from v_language where activate=1 and def_lang = 'en' order by language asc");
									 while($row_language = mysql_fetch_array($sql_language))
									 {
									 
							   ?>
							   <option value="<?php echo $row_language['language']; ?>" <?php if($row_language['language']=='Spanish'){ echo "selected"; } ?>><?php echo $row_language['language']; ?></option>
							   <?php
									 }
							   ?>
							</select>					</td>
				  </tr>
				  <tr height="26px;" bgcolor="#eb061d">
				    <td colspan="2" align="left" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >Select Type of Customers                    </td>
					<td colspan="2" align="left" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >Select Type of Customers                    </td>
				  </tr>
				 			 <?php 
								$sql_mediatype = mysql_query("select distinct name from v_mediatype_master where language = 2 ");
								$sql_num_mediatype = mysql_num_rows($sql_mediatype);	
								$t1 = 1;
								$i1 = 0;
							?>
						  <tr style=" background-color:#FFFFFF;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
						    <td align="left"  class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" colspan="2">Select Type of Customer </td>
						   
						    
						      <td align="left"  class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" colspan="2">Select Type of Customer </td>
						    </tr>
						  <td align="left"  class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">Media type
									<div align="left" style="padding-left:5px;padding-top:5px;"> <input type="checkbox" name="all_media" id="all_media" onClick="return selectAllMedia('<?php echo $sql_num_mediatype; ?>')"  /></div>								 </td>
						    <td align="left"  class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
							  <?php	
									
								while($row_mediatype = mysql_fetch_array($sql_mediatype))
								{	
								
								  if(($t1-1)%15==0)
								  { 
								  ?>
                                <td width="25%" class="td_space" style="border-right:0px solid #DCD8BA;border-bottom:0px solid #DCD8BA">
								<table width='100%' cellpadding='0' cellspacing='0'>
									<?php
								  }
								 
								 
								//if($temp != $row_mediatype['name'])
								//{
								 
								?>
									  <tr>
										<td width="10%" align="center">
										
										
										  <input type="checkbox" onChange="return showMedia('<?php echo $sql_num_mediatype;?>');" name="<?php echo 'chk_mediatype_left'.$i1; ?>" id="<?php echo 'chk_mediatype'.$i1; ?>" value="<?php echo $row_mediatype['name']; ?>"  />										  </td>								 
										
										<td width="86%" align="left" style="padding-left:3px;" nowrap="nowrap">
										<?php
										//$temp= ''; 
										//if($temp != $row_mediatype['name'])
								        //{
										   echo substr($row_mediatype['name'],0,10);										
										   //$temp = $row_mediatype['name']; 
								        //}
								
										  ?></td>
									  </tr>
								<?php							
								  if($t1%15==0 or $t1==$sql_num_mediatype)
								  { 
								  ?>
									</table>								   </td>
								 <?php
								  }
								  $t1++;
								  $i1++;
								  
								// $temp = $row_mediatype['name']; 
								// }
								//else
								//continue;
								  
								}
								?>
                              </tr>
							  <input type="hidden" name="sql_num_mediatype" id="sql_num_mediatype" value="<?php echo $sql_num_mediatype;?>" />
							  
							  
                             </table>							</td>
						    
						    <td align="left" class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">Media type </td>
						    <td align="left"  class="td_space" style="border-bottom:1px solid #DCD8BA" id="media_display">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
							 <?php	
								$sql_mediatype= mysql_query("select distinct name from v_mediatype_master where language = 2 ");
								$sql_num_mediatype = mysql_num_rows($sql_mediatype);	
								$t1 = 1;
								$i1 = 0;		
								while($row_mediatype = mysql_fetch_array($sql_mediatype))
								{	
								  if(($t1-1)%15==0)
								  { 
								  ?>
                                <td width="25%" class="td_space" style="border-right:0px solid #DCD8BA;border-bottom:1px solid #DCD8BA">
                                 <table width='100%' cellpadding='0' cellspacing='0'>
									<?php
								  }
								  
								  
								?>
									  <tr>
										<td width="10%" align="center">
										 <input type="checkbox" onChange="return showMedia('<?php echo $sql_num_mediatype;?>');" name="<?php echo 'chk_mediatype_left'.$i1; ?>" id="<?php echo 'chk_mediatype'.$i1; ?>" value="<?php echo $row_mediatype['name']; ?>"  disabled="disabled" />										  </td>								 
										
										<td width="86%" align="left" style="padding-left:3px;" nowrap="nowrap">
										 <?php echo substr($row_mediatype['name'],0,10);?>										 </td>
									  </tr>
								<?php							
								  if($t1%15==0 or $t1==$sql_num_mediatype)
								  { 
								  ?>
									</table>								</td>
									 <?php
								  }
								  $t1++;
								  $i1++;
								   }
								  ?>
                              </tr>
                            </table>							</td>
							
						  <tr style=" background-color:#FFFFFF;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
						     <?php 
								$sql_business_activity_type = mysql_query("select distinct title_name from v_business_activity_master  where language = 2 ");
								$sql_num_business_activity_type = mysql_num_rows($sql_business_activity_type);	
								$t2 = 1;
								$i2 = 0;
							?>
						   DF <td align="left"  class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">Business or Activity Type
							<div align="left" style="padding-left:5px;padding-top:5px;"> <input type="checkbox" name="all_business" id="all_business" onClick="return selectAllBusiness('<?php echo $sql_num_business_activity_type; ?>')"  /></div></td>
						    <td align="left"  class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                
								 <?php	
									
								while($row_business_activity_type = mysql_fetch_array($sql_business_activity_type))
								{	
								  if(($t2-1)%15==0)
								  { 
								  ?>
								  <td class="td_space" style="border-right:0px solid #DCD8BA;border-bottom:0px solid #DCD8BA">
								  <table width='100%' cellpadding='0' cellspacing='0'>
									<?php
								  }
								?>
									  <tr>
										<td width="10%" align="center">
										  <input type="checkbox" onChange="return showBusiness('<?php echo $sql_num_business_activity_type;?>');" name="<?php echo 'chk_business_activity_type_left'.$i2; ?>" id="<?php echo 'chk_business_activity_type'.$i2; ?>" value="<?php echo $row_business_activity_type['title_name']; ?>"  />										  </td>								 
										
										<td width="86%" align="left" style="padding-left:3px;" nowrap="nowrap">
										   <?php echo substr($row_business_activity_type['title_name'],0,10);?>											</td>
									  </tr>
								<?php							
								  if($t2%15==0 or $t2==$sql_num_business_activity_type)
								  { 
								  ?>
									</table>															</td>
														 <?php
								  }
								  $t2++;
								  $i2++;
								   }
								  ?>	
                              </tr>
							   <input type="hidden" name="sql_num_business_activity_type" id="sql_num_business_activity_type" value="<?php echo $sql_num_business_activity_type;?>" />
                            </table></td>
						    
						    <td align="left" class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">Business or Activity Type							 </td>
						    <td align="left"  class="td_space" style="border-bottom:1px solid #DCD8BA" id="business_display">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
							   <?php	
								$sql_business_activity_type = mysql_query("select distinct title_name from v_business_activity_master  where language = 2 ");
								$sql_num_business_activity_type = mysql_num_rows($sql_business_activity_type);	
								$t2 = 1;
								$i2 = 0;		
								while($row_num_business_activity_type = mysql_fetch_array($sql_business_activity_type))
								{	
								  if(($t2-1)%15==0)
								  { 
								  ?>
                                 <td class="td_space" style="border-right:0px solid #DCD8BA;border-bottom:1px solid #DCD8BA">
								<table width='100%' cellpadding='0' cellspacing='0'>
									<?php
								  }
								?>
									  <tr>
										<td width="10%" align="center">
										 <input type="checkbox" onChange="return showBusiness('<?php echo $sql_num_business_activity_type;?>');" name="<?php echo 'chk_business_activity_type_left'.$i2; ?>" id="<?php echo 'chk_business_activity_type'.$i2; ?>" value="<?php echo $row_num_business_activity_type['title_name']; ?>"  disabled="disabled" />									  </td>								 
										
										<td width="86%" align="left" style="padding-left:3px;" nowrap="nowrap">
										 <?php echo substr($row_num_business_activity_type['title_name'],0,10);?>										</td>
									  </tr>
								<?php							
								  if($t2%15==0 or $t2==$sql_num_business_activity_type)
								  { 
								  ?>
									</table>															</td>
															 <?php
								  }
								  $t2++;
								  $i2++;
								   }
								  ?>	
                              </tr>
                            </table>							</td>
						    </tr>
						  <tr style=" background-color:#FFFFFF;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
						     <?php 
								$sql_employees= mysql_query("select distinct size_name from v_business_size_master where language = 2 ");
								$sql_num_employees = mysql_num_rows($sql_employees);	
								$t3 = 1;
								$i3= 0;	
							?>
						    <td align="left"  class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">Number of Employees
							<div align="left" style="padding-left:5px;padding-top:5px;"> <input type="checkbox" name="all_employees" id="all_employees" onClick="return selectAllEmployees('<?php echo $sql_num_employees; ?>')"  /></div></td>
						    <td align="left"  class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                
								 <?php	
									
								while($row_employees = mysql_fetch_array($sql_employees))
								{	
								  if(($t3-1)%15==0)
								  { 
								  ?>
								  <td class="td_space" style="border-right:0px solid #DCD8BA;border-bottom:0px solid #DCD8BA">
								  <table width='100%' cellpadding='0' cellspacing='0'>
									<?php
								  }
								?>
									  <tr>
										<td width="10%" align="center">
										<input type="checkbox" onChange="return showEmployees('<?php echo $sql_num_employees;?>');" name="<?php echo 'chk_num_employees_left'.$i3; ?>" id="<?php echo 'chk_num_employees'.$i3; ?>" value="<?php echo $row_employees['size_name']; ?>"  />													  </td>								 
										
										<td width="86%" align="left" style="padding-left:3px;" nowrap="nowrap">
										   <?php echo substr($row_employees['size_name'],0,10);?>										</td>
									  </tr>
								<?php							
								   if($t3%15==0 or $t3==$sql_num_employees)
								  { 
								  ?>
									</table>															</td>
														 <?php
								  }
								 $t3++;
								 $i3++;
								   }
								  ?>	
                              </tr>
							   <input type="hidden" name="sql_num_employees" id="sql_num_employees" value="<?php echo $sql_num_employees;?>" />
                            </table></td>
						    
						    <td align="left" class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">Number of Employees							 </td>
						    <td align="left"  class="td_space" style="border-bottom:1px solid #DCD8BA" id="employees_display">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
							   <?php	
								$sql_employees = mysql_query("select distinct size_name from v_business_size_master where language = 2 ");
								$sql_num_employees = mysql_num_rows($sql_employees);	
								$t3 = 1;
								$i3 = 0;		
								while($row_employees = mysql_fetch_array($sql_employees))
								{	
								  if(($t3-1)%15==0)
								  { 
								  ?>
								  
                                 <td class="td_space" style="border-right:0px solid #DCD8BA;border-bottom:1px solid #DCD8BA">
								<table width='100%' cellpadding='0' cellspacing='0'>
									<?php
								  }
								?>
									  <tr>
										<td width="10%" align="center">
										 <input type="checkbox" onChange="return showEmployees('<?php echo $sql_num_employees;?>');" name="<?php echo 'chk_num_employees_left'.$i3; ?>" id="<?php echo 'chk_num_employees'.$i3; ?>" value="<?php echo $row_employees['size_name']; ?>"  disabled="disabled" />			  </td>								 
										
										<td width="86%" align="left" style="padding-left:3px;" nowrap="nowrap">
										  <?php echo substr($row_employees['size_name'],0,10);?>											</td>
									  </tr>
								<?php							
								 if($t3%15==0 or $t3==$sql_num_employees)
								  { 
								  ?>
									</table>															</td>
															 <?php
								  }
								  $t3++;
								  $i3++;
								   }
								  ?>	
                              </tr>
                            </table>							</td>
						    </tr>
				  
				  <tr height="26px;" bgcolor="#eb061d">
				    <td colspan="2" align="left" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >Mail</td>
					<td colspan="2" align="left" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >Mail</td>
				  </tr>
				  <tr onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						Activate Email				</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					<input type="radio" name="activate" id="activate" value="1" checked="checked" />Yes
		            <input type="radio" name="activate" id="activate1" value="0" />No					</td>
					
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						Activate Email				</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					<input type="radio" name="activate_es" id="activate_es" value="1" />Yes
		            <input type="radio" name="activate_es" id="activate_es1" value="0" checked="checked" />No					</td>
				  </tr>
				  <tr style=" background-color:#FFFFFF;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
							<td align="left" width="15%" valign="top" class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA"> Account Types</td>
							<td align="left" width="35%" class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">
								<?php
											$acc_type='';
											$var_acc_type=mysql_query("select * from v_customer_account_type_master where language like'2,%' order by client_type");
											$i=0;
											while($row_acc_type=mysql_fetch_array($var_acc_type))
											{
											$ex=explode('^^^',$row_acc_type['client_type']);
											$exp_acc_type[] = $ex[0];
											
											/*$count=count($ex);
											for($j=0;$j<$count;$j++)
											{
											if($i==0)
											{
											$acc_type=$ex[$j];
											$i++;
											}
											
											if($i!=0)
											{
											$ex_acc=explode(',',$acc_type);
											$cnt=count($ex_acc);
											for($k=0;$k<$cnt;$k++)
											{
											$match=1;
											if($ex_acc[$k]==$ex[$j])
											{
											$match=0;
											break;
											}
											}
											if($match==1)
											{
											$acc_type=$acc_type.','.$ex[$j];
											$i++;
											}
											
											}
											}*/
											}
											$ex_acc_type=array_unique($exp_acc_type);
											$ex_acc_type=array_values($ex_acc_type);
											//print_r($ex_acc_type);
											$acc_count=count($ex_acc_type);
											?>
<input type="hidden" id="acc_type_count" value="<?php echo $acc_count; ?>" />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
						      <tr>
								<?php	
								$t=1;
								$i=0;	
								for($x=0;$x<$acc_count;$x++)
												{	
								  if(($t-1)%5==0)
								  { 
								  ?>
								  <td width="20%" valign="top" colspan="4">
									<table width='100%' cellpadding='0' cellspacing='0'>
									<?php
								  }
								?>
									  <tr>
										<td width="25%" align="left">
										  <input type="checkbox" name="<?php echo 'acc_type'.$x; ?>" id="<?php echo 'acc_type'.$x; ?>" value="<?php echo $ex_acc_type[$x]; ?>" onClick=" checkactype(this.id,'<?php echo "acc_type_es".$x; ?>')"/><?php echo $ex_acc_type[$x]; ?>										</td>
									  </tr>
								<?php							
								  if($t%5==0 or $t==$acc_count)
								  { 
								  ?>
									</table>								  </td>
								 <?php
								  }
								  $t++;
								  $i++;
								}
								?>
                            </tr>   
                          </table>										  </td>
							
							<td align="left" valign="top" width="15%" class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">
							Account Types			    </td>
							<td align="left" width="35%" class="td_space" style="border-bottom:1px solid #DCD8BA">
							<?php
											$acc_type='';
											$var_acc_type=mysql_query("select * from v_customer_account_type_master where language like'2,%' order by client_type");
											$i=0;
											while($row_acc_type=mysql_fetch_array($var_acc_type))
											{
												//echo $row_acc_type['client_type']."<br>";
										    $ex=explode('^^^',$row_acc_type['client_type']);
											//echo $ex[1]."<br>";
											$exp_acc_type_es[] = $ex[1];
											/*$ex=explode(',',$row_acc_type['client_type']);
											$count=count($ex);
											for($j=0;$j<$count;$j++)
											{
											if($i==0)
											{
											$acc_type=$ex[$j];
											$i++;
											}
											
											if($i!=0)
											{
											$ex_acc=explode(',',$acc_type);
											$cnt=count($ex_acc);
											for($k=0;$k<$cnt;$k++)
											{
											$match=1;
											if($ex_acc[$k]==$ex[$j])
											{
											$match=0;
											break;
											}
											}
											if($match==1)
											{
											$acc_type=$acc_type.','.$ex[$j];
											$i++;
											}
											
											}
											}*/
											}
											$ex_acc_type_es=array_unique($exp_acc_type_es);
											$ex_acc_type_es=array_values($ex_acc_type_es);
											//print_r($ex_acc_type_es);
											$acc_count_es=count($ex_acc_type_es);
											?>


<table width="100%" border="0" cellpadding="0" cellspacing="0">
						      <tr>
								<?php	
								$t=1;
								$i=0;	
								for($x=0;$x<$acc_count_es;$x++)
												{	
								  if(($t-1)%5==0)
								  { 
								  ?>
								  <td width="20%" valign="top" colspan="4">
									<table width='100%' cellpadding='0' cellspacing='0'>
									<?php
								  }
								?>
									  <tr>
										<td width="25%" align="left">
										  <input type="checkbox" name="<?php echo 'acc_type_es'.$x; ?>" id="<?php echo 'acc_type_es'.$x; ?>" value="<?php echo $ex_acc_type_es[$x]; ?>" /><?php echo $ex_acc_type_es[$x]; ?>										</td>
									  </tr>
								<?php							
								  if($t%5==0 or $t==$acc_count)
								  { 
								  ?>
									</table>								  </td>
								 <?php
								  }
								  $t++;
								  $i++;
								}
								?>
                            </tr>   
                          </table>							</td>
						 </tr>
				  <tr height="26px;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
				<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					  Email Subject					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					    <input type="text" name="email_subject" id="email_subject" /> 					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						Email Subject					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						<input type="text" name="email_subject_es" id="email_subject_es" /> 					</td>
				  </tr>
				  <tr height="26px;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					  Email Copy to:   <br />
					  (If more than one separate with comas)					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					    <input type="text" name="email_copy_to" id="email_copy_to" /> 					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						Email Copy to:   <br />
						(If more than one separate with comas)					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						<input type="text" name="email_copy_to_es" id="email_copy_to_es" /> 					</td>
				  </tr>
				  
				  <tr height="26px;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					  Greetings					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					    <textarea id="greetings" name="greetings"></textarea> 					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						Greetings					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						<textarea id="greetings_es" name="greetings_es"></textarea> 					</td>
				  </tr>
				  <tr height="26px;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					  Body					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					    <textarea id="body1" name="body1"></textarea> 					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						Body					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						<textarea id="body1_es" name="body1_es"></textarea> 					</td>
				  </tr>
				  <tr height="26px;" bgcolor="#eb061d">
				    <td colspan="2" align="left" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >Article Type</td>
					<td colspan="2" align="left" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >Article Type</td>
				  </tr>
				  <tr height="26px;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					  Mail Type					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					    <input type="radio" name="mail_type" id="mail_type" value="1" checked="checked" />1 Article
						<input type="radio" name="mail_type" id="mail_type1" value="2" />2 Article
						<input type="radio" name="mail_type" id="mail_type2" value="3" />3 Article
						<input type="radio" name="mail_type" id="mail_type3" value="4" />4 Article
						<input type="radio" name="mail_type" id="mail_type4" value="5" />5 Article 					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						Mail Type					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						<input type="radio" name="mail_type_es" id="mail_type_es" value="1" checked="checked" />1 Article
						<input type="radio" name="mail_type_es" id="mail_type_es1" value="2" />2 Article
						<input type="radio" name="mail_type_es" id="mail_type_es2" value="3" />3 Article
						<input type="radio" name="mail_type_es" id="mail_type_es3" value="4" />4 Article
						<input type="radio" name="mail_type_es" id="mail_type_es4" value="5" />5 Article 					
					</td>
				  </tr>
				  <tr style=" background-color:#FFFFFF;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
						     <?php 
								$sql_artice= mysql_query("select distinct article_title from v_news_article  where language = 2 ");
								$sql_num_article = mysql_num_rows($sql_artice);	
								$t4 = 1;
								$i4= 0;	
							?>
						    <td align="left"  class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">Select Employees
						      <div align="left" style="padding-left:5px;padding-top:5px;"> <input type="checkbox" name="all_employees" id="all_employees" onClick="return selectAllEmployees('<?php echo $sql_num_article; ?>')"  /></div></td>
<td align="left"  class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                
								 <?php	
									
								while($row_article = mysql_fetch_array($sql_artice))
								{	
								  if(($t4-1)%15==0)
								  { 
								  ?>
								  <td class="td_space" style="border-right:0px solid #DCD8BA;border-bottom:0px solid #DCD8BA">
								  <table width='100%' cellpadding='0' cellspacing='0'>
									<?php
								  }
								?>
									  <tr>
										<td width="10%" align="center">
										<input type="checkbox" onChange="return showArticle('<?php echo $sql_num_article;?>');" name="<?php echo 'chk_num_article_left'.$i4; ?>" id="<?php echo 'chk_num_article'.$i4; ?>" value="<?php echo $row_article['article_title']; ?>"  />													  </td>								 
										
										<td width="86%" align="left" style="padding-left:3px;" nowrap="nowrap">
										   <?php echo substr($row_article['article_title'],0,10);?>										</td>
									  </tr>
								<?php							
								   if($t4%15==0 or $t4==$sql_num_article)
								  { 
								  ?>
									</table>															</td>
														 <?php
								  }
								 $t4++;
								 $i4++;
								   }
								  ?>	
                              </tr>
							   <input type="hidden" name="sql_num_article" id="sql_num_article" value="<?php echo $sql_num_article;?>" />
                            </table></td>
						    
						    <td align="left" class="td_space" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">Number of Employees							 </td>
						    <td align="left"  class="td_space" style="border-bottom:1px solid #DCD8BA" id="article_display">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
							   <?php	
								$sql_artice = mysql_query("select distinct article_title from v_news_article  where language = 2 ");
								$sql_num_article = mysql_num_rows($sql_artice);	
								$t4 = 1;
								$i4 = 0;		
								while($row_article = mysql_fetch_array($sql_artice))
								{	
								  if(($t4-1)%15==0)
								  { 
								  ?>
								  
                                 <td class="td_space" style="border-right:0px solid #DCD8BA;border-bottom:1px solid #DCD8BA">
								<table width='100%' cellpadding='0' cellspacing='0'>
									<?php
								  }
								?>
									  <tr>
										<td width="10%" align="center">
										 <input type="checkbox" onChange="return showArticle('<?php echo $sql_num_article;?>');" name="<?php echo 'chk_num_article_left'.$i4; ?>" id="<?php echo 'chk_num_article'.$i4; ?>" value="<?php echo $row_article['article_title']; ?>"  disabled="disabled" />			  </td>								 
										
										<td width="86%" align="left" style="padding-left:3px;" nowrap="nowrap">
										  <?php echo substr($row_article['article_title'],0,10);?>											</td>										
										  
									  </tr>
								<?php							
								 if($t4%15==0 or $t4==$sql_num_article)
								  { 
								  ?>
									</table>															</td>
								<?php
								  }
								  $t4++;
								  $i4++;
								   }
								  ?>	
                              </tr>
                            </table>
							</td>
						    </tr>
<script>
</script>
							<tr height="26px;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					  Regards					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					    <textarea id="body2" name="body2"></textarea> 					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						Regards					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
						<textarea id="body2_es" name="body2_es"></textarea> 					</td>
				  </tr>
				  
				  <tr height="26px;" bgcolor="#eb061d">
				    <td colspan="2" align="left" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >Publish Products</td>
					<td colspan="2" align="left" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >Publish Products</td>
				  </tr>
				  <tr height="26px;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
				    <td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					Quality Product Per Page					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					<select name="quality" id="quality">
					<option value="5">5</option>
					</select>					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					Quality Product Per Page					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					<select name="quality_es" id="quality_es">
					<option value="5">5</option>
					</select>					</td>
				  </tr>
				  
				  <tr height="26px;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
				  <td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					Select Product					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">&nbsp;					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">
					Select Product					</td>
					<td align="left" class="td" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA">&nbsp;					</td>
				  </tr>
				  </table>
				  </td>
				  </tr>
				  <tr>
            <td align="left">
			<table width="98%" border="0" cellpadding="0" cellspacing="0">
			<tr>
            <td width="50%" align="right" style="padding-right:0" colspan="2">
            <a href="javascript:;" onClick="return addRecord('default');"> 
							<img src="images/customer_add.png" border="0" width="20" height="20" title="Add Current Panel" /></a>
            </td>
					<td width="50%" colspan="2" align="right" style="padding-right:0">
					<input type="hidden" name="media_chk" id="media_chk" value="<?php echo $i1; ?>" />
					<input type="hidden" name="business_chk" id="business_chk" value="<?php echo $i2; ?>" />
					<input type="hidden" name="employees_chk" id="employees_chk" value="<?php echo $i3; ?>" />
					<input type="hidden" name="article_chk" id="article_chk" value="<?php echo $i4; ?>" />
					<input type="hidden" name="count_chk" id="count_chk" value="<?php echo $sql_num_country; ?>" />
                  <a href="javascript:;" onClick="return addRecord('translator');"> 
							<img src="images/customer_add.png" border="0" width="20" height="20" title="Add Translation Panel" /></a>&nbsp;
				   <a href="javascript:;" onClick="return addRecord('all');"> 
							<img src="images/customer_addall.png" border="0" width="35" height="20" title="Add Current and Translation Panel" /></a>
                    </td>
			     </tr>		 
			   </table>
			   
			  			</td>
	     </tr>
				  <tr>
					<td align="center" height="25px;">
					  
											</td>
				  </tr>
				</table>
				</form>			</td>
	      </tr>
		  
		  
		  
		  
		  <tr>
		    <td align="center" valign="top" id="mess">&nbsp;</td>
	      </tr>
		  
		  
		  
		  <tr>
		    <td align="left" valign="top" height="200" id="news_list" class="msg">
			 <div id="page_contents"> 
			   <form action="add_news_letter.php" name="frm_news_table_list" method="post">
			   <?php /*?><?php 
							$sql = mysql_query("select * from v_news_letter");
							$num = mysql_num_rows($sql); 
							$i = 1;
			   ?><?php */?>
			 <table width="70%" border="0" cellspacing="0" cellpadding="0">
               <tr>
               <td align="left" valign="top">
               <?php
				 		$querycnt = "select count(*) as cnt from v_news_letter ";
		$resultcnt = mysql_query($querycnt) or die(mysql_error());
		while($rowcnt = mysql_fetch_array($resultcnt))
		{
			$totalcnt = $rowcnt['cnt'];
		}

			   		$query = "select * from v_news_letter  ORDER BY email_subject ASC";
		$result = mysql_query($query) or die(mysql_error());
		$num_rows = mysql_fetch_row($result);
		
				
		if($_SESSION['list_limit'] !='')
			$listpage="add_news_letter_list.php?list_limit=".$_SESSION['list_limit'];
		else
			$listpage="add_news_letter_list.php";		
		
				$pages = new Paginator;
		$pages->items_total_rec = mysql_num_rows($result);
		$pages->items_total = $num_rows[0];
		$pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
		$pages->paginate($listpage);
		
		
		echo $pages->display_pages();
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"\">".$pages->display_jump_menu($listpage)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pages->display_items_per_page($listpage)."</span>";
		echo "<span class=\"paginate\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Items: ".$totalcnt."</span><div id='loadingid' style='float:right'></div>";
	
			$list_limit = $_REQUEST['list_limit'];
	if($list_limit == "all")
	{
	//echo "select * from v_country ORDER BY country ASC";
	$sql = mysql_query("SELECT s.* FROM v_news_letter  s INNER JOIN v_country c ON s.country=c.country_id order by c.country asc");
	}
	elseif($list_limit != "all" && $list_limit != "")
	{
	//echo "select * from v_country ORDER BY country ASC $list_limit";
	$sql = mysql_query("SELECT s.* FROM v_news_letter  s INNER JOIN v_country c ON s.country=c.country_id order by c.country asc $list_limit");
	}
	else
	{
	//echo "select * from v_country ORDER BY country ASC $pages->limit";
	//echo "SELECT s.* FROM v_news_letter  s INNER JOIN v_country c ON s.country=c.country_id order by c.country asc $pages->limit";
	$sql = mysql_query("SELECT s.* FROM v_news_letter  s INNER JOIN v_country c ON s.country=c.country_id order by c.country asc $pages->limit");
	}
	
		$num = mysql_num_rows($sql);
		
			?>     
			 <input type="hidden" name="list_limit" id="list_limit" value="<?php echo  $pages->limit;?>" />               </td>
               </tr>
               				  <tr>
					<td align="center" valign="top">
					
					   <table width="100%" align="left" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #DCD8BA;" class="tablesorter" id="table_list">
					   
					   <thead>
					   
				        <tr height="26px;" bgcolor="#eb061d">
					    <th align="center" width="4%" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
						<input type="checkbox" name="chk_select_all" id="chk_select_all" onClick="return func_select_all_checkbox('<?php echo $num;?>');" /><input type="hidden" id="chk_save_all" name="chk_save_all" value="0" /></th>
					<th align="center" width="10%" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
					    Country					</th>
					
					<th align="center" width="10%" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
						Language					</th>
					<th align="center" width="10%" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
						Media Type</th>
					<th align="center" width="10%" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
						Business Type</th>
					<th align="center" width="10%" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
						Number of Employees</th>
					<th align="center" width="10%" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
						Email Subject					</th>
					
					<th align="center" width="10%" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
					    Activate<br />
						<input type="radio" name="activate_store" id="activate_store"  value="1" onClick="return func_radio_select_all('<?php echo $num;?>');" />Yes
		                <input type="radio" name="activate_store" id="activate_store1" value="0" onClick="return func_radio_unselect_all('<?php echo $num;?>');"  />No </th>
														
					<th align="center" width="10%" class="table_head" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
					    Action					</th>
				  </tr>
				  </thead>
				      <!--Feching Data from database -->
						<?php
							
							$i = 1;
							if($num != 0)
							{
						    while($row = mysql_fetch_array($sql))
							{
							$row_list_language = mysql_fetch_array(mysql_query("select * from v_language where id = '".$row['language']."' "));
							if($record == $row['news_letter_id'])
							{
						 ?>
								
						<?php 
						    }
							else
							{
						?>
						
						  <tr height="26px;" style=" background-color:#FFFFFF;" onMouseOver="this.style.background='#FFECEE';" onMouseOut="this.style.background='#FFFFFF';">
						  <td align="center" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
					<input type="checkbox" name="<?php echo 'checkbox'.$i; ?>" id="<?php echo 'checkbox'.$i; ?>" value="<?php echo $row['news_letter_id']; ?>" /></td>
							<td align="left" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
							     <?php 
								 $cntry = $row['country'];
								 $qry = "select * from v_country where country_id = $cntry";
								 $res = mysql_query($qry);
								 while ($row_cntry = mysql_fetch_array($res))
								 {
								 echo "<img src=\"images/flags/".$row_cntry['photo']."\"  width=\"25\" height=\"20\"  />&nbsp;&nbsp;".$row_cntry['country']; 
								 ?>
                                 <input type="hidden" name="<?php echo 'country_id'.$i; ?>" value="<?php echo $row['id']; ?>" />
                                 <?php
								 }
								 ?>									</td>
							
							 <td align="center" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
								 <?php echo $row_list_language['language']; ?>					</td>
							<td align="center" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
								 <?php echo $row['media_type'];?>					</td>
							<td align="center" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
								 <?php echo $row['business_activity'];?>					</td>
							
							<td align="center" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
								 <?php echo $row['business_size'];?>					</td>
							<td align="center" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA" >
								 <?php echo $row['email_subject'];?>					</td>
							<td width="10%" align="center" class="style_border">
				            <input type="hidden" name="<?php echo 'hide'.$i; ?>" value="<?php echo $row['subcategory_id']; ?>" />
							<input type="radio" name="<?php echo 'activate_a'.$i; ?>" 
							<?php if($row['activate']==1){ echo 'checked="yes"'; $radio=$i; }?> value="1" id="<?php echo 'activate_e'.$i; ?>"/>Yes								 
							 <input type="radio" name="<?php echo 'activate_a'.$i; ?>" <?php if($row['activate']==0){ echo 'checked="yes"'; $radio=$i; }?> value="0" id="<?php echo 'activate_e_t'.$i; ?>"/>No</td>	 
								 	 	 	 
							<td align="center" valign="middle" class="td" style="border-right:1px solid #DCD8BA;padding-left:5px;border-bottom:1px solid #DCD8BA" >
							<div id="<?php echo 'loadingidmid'. $row['news_letter_id']; ?>" style="float:left; padding-top:7px"></div>
								<?php 
									
					  	$ex_predefined_id = explode(',',$_SESSION['news_letter_id']);
						for($x=0;$x<count($ex_predefined_id);$x++)
						{
							if($row['news_letter_id']==$ex_predefined_id[$x])
							{
							?>
							<img src="images/save_ok.png" border="0" width="20" height="20" title="Updated Successfully" />&nbsp;
							<?php
							}
						}
						?>
<a href="javascript:;" onClick="return saveRecord('<?php echo $row['news_letter_id'];?>','<?php echo $radio;?>');"> 
							<img src="images/customer_saveall.png" border="0" width="20" height="20" title="Save" /></a>&nbsp;
                            <!--<a href="javascript:;" onClick="return saveRecord('<?php echo $row['news_letter_id']; ?>','<?php echo $radio; ?>','<?php echo $abbreviation; ?>');"> 
							<img src="images/customer_save.png" border="0" width="20" height="20" title="Save" /></a> &nbsp;-->
                              <a href="javascript:;" onClick="return editRecord('<?php echo $row['news_letter_id'];?>');">
					         <img src="images/customer_edit.png" border="0" width="20" height="20" title="Edit" /></a>&nbsp;
                             <a href="javascript:;" onClick="return deleteRecord('<?php echo $row['news_letter_id'];?>');">
					         <img src="images/customer_delete.png" border="0" width="20" height="20" title="Delete"/> </a>							 </td>
						  </tr>
						  <input type="hidden" name="<?php echo 'hide'.$i; ?>" id="<?php echo 'hide'.$i; ?>" value="<?php echo $row['news_letter_id']; ?>" />
						  <?php
						     }
						    $i++;
							 
							}
						   }
						  ?>
						  </table>                          </td>
                          </tr>
                          <tr>
                          <td align="left" valign="top">
						  <?php
                          echo $pages->display_pages();
						  		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"\">".$pages->display_jump_menu($listpage)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pages->display_items_per_page($listpage)."</span>";
		echo "<span class=\"paginate\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Items: ".$totalcnt."</span><div id='loadingidbtm' style='float:right'></div>";

/*echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
echo "<p class=\"paginate\">SELECT * FROM table $pages->limit (retrieve records $pages->low-$pages->high from table - $pages->items_total item total / $pages->items_per_page items pfunc_radio_select_aller page)";*/
?></td>
                          </tr>
						  <tr height="26px;">
				    <td align="right" colspan="18">
						
					    <input type="hidden" name="total" value="<?php echo $i-1; ?>"  />
					    <input type="hidden" name="total_left" value="<?php echo $i-1; ?>"  />
						<input type="hidden" name="total_right" value="<?php echo $j-1; ?>"  />
						<input type="hidden" name="news_letter_id" value="<?php echo $record; ?>"  />
						<INPUT TYPE="image" SRC="images/customer_saveall.png" value="Save All" HEIGHT="20" WIDTH="20" BORDER="0" ALT="Save All"  onClick="return saveAllRecord('<?php echo $i-1; ?>');" title="Save All" name="submit">
						<!--<input type="button" name="editall" value="Edit All" onClick="return editAllRecord('<?php echo $i-1; ?>');" class="button" />-->
                        <INPUT TYPE="image" SRC="images/customer_editall.png" name="editall" value="Edit All" HEIGHT="20" WIDTH="20" BORDER="0" ALT="Edit All" onClick="return editAllRecord('<?php echo $i-1; ?>');" title="Edit All">
						<a href="javascript:;" onClick="return func_all_delete('<?php echo $i-1;?>');">
						<img src="images/customer_deleteall.png" border="0" width="20" height="20" title="Delete All"/></a>	
						</td>
				  </tr>
						  </table>
			
		                  <table width="96%">
						  
				  </table>
				  </table>
			   </form>
			    </div>
			</td>
			
	      </tr>
		  <td align="right" valign="top" style="padding-right:25px">
			<tr>
                <td colspan="2" align="right" style="padding-right:500px"><INPUT TYPE="image" SRC="images/customer_back.png" HEIGHT="20" WIDTH="20" BORDER="0" ALT="Back" title="Back" onClick="javascript:history.go(-1);return false;">
                </td>
            </tr> 
		  
		  <tr>
		    <td align="center" valign="top">&nbsp;</td>
	      </tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
		  <tr>
			<td align="center" valign="top">
			<?php
				include("common/fotter.php");
			?>			</td>
		  </tr>
         </table>
    </td>
  </tr>
</table>
</body>
</html>
