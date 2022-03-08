<?php session_start();
include("config/db_connect.php");
extract($_REQUEST);

if($_SESSION['loginUser']!="")
{
echo "<script>window.location='check1.php';</script>";
}

if($_REQUEST['submit']=='SUBMIT')
{ 
if($_REQUEST['first_name']!="" && $_REQUEST['last_name']!="" && $_REQUEST['email']!="" && $_REQUEST['company']!="" && $_REQUEST['address1']!="" && $_REQUEST['city']!="" && $_REQUEST['zip']!="" && $_REQUEST['country']!="" && $_REQUEST['mobile']!="")
{
$result=mysql_query("insert into user_reg(id,name,last_name,pass,email,company,address1,address2,city,zip_code,state,country,phone)values(null,'".$first_name."','".$last_name."','".$pass."','".$email."','".$company."','".$address1."','".$address2."','".$city."','".$zip."','".$state."','".$country."','".$mobile."') ");
	
$_SESSION['loginUser']=$_REQUEST['first_name'];
?>
<script>window.location="check1.php";</script>
<?php
}
else
{ ?>
	<script>alert('Enter * Mandatory Fields');</script>
<?php }

}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Techno Industrial Packings ::</title>
<link rel="stylesheet" type="text/css" href="css/indexstyle.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/chrometheme/chromestyle.css" media="screen" />
<script type="text/javascript" src="javascript/chromejs/chrome.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script language="javascript" src="js/main_js.js"></script>
<script type="text/javascript">
<!--
"javascript.location.href='register.php?add_msg=msg01&mode=add'"
		-->	</script>
        <script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
        <script language="javascript">
		
function check()
{
	
if(document.getElementById('first_name').value == "")
{
	error = "You didn't enter  the first name.\n";
	document.getElementById('first_name').focus();
			document.getElementById('user_error').innerHTML = error;
			document.getElementById('user_error').value = "";
	
	
}	


	else
 {
	  
		 var error = "";
		 document.getElementById('user_error').innerHTML= "";

 }


	
}

	function check_last_name(fld)
{
if(document.getElementById('username2').value == "")
{
	error = "You didn't enter  the Last name.\n";
			document.getElementById('last_name_error').innerHTML = error;
	
	
}	

	else
 {
	  
		 var error = "";
		 document.getElementById('last_name_error').innerHTML = error;

 }
}


function check_pass()
{
if (document.getElementById('pass').value=="")
{

error = "Please Enter the Password.\n";
		document.getElementById('pass_error').innerHTML = error;
		document.getElementById('pass_error').value = "";
}	
else
	{
		error = "";
		document.getElementById('pass_error').innerHTML = error;

	}

}
		
function chk_telephone(fld) {
    var error = "";
    var stripped = fld.replace(/[\(\)\.\-\ ]/g, '');    

   if (fld == "") {
        error = "You didn't enter a phone number.\n";
		document.getElementById('mob_error').innerHTML = error;
		document.getElementById('mob_error').value = "";
        
    } else if (isNaN(parseInt(stripped))) {
        error = "The phone number contains illegal characters.\n";
		document.getElementById('mob_error').innerHTML = error;
		document.getElementById('mob_error').value = "";
        
    } else if (!(stripped.length == 10)) {
        error = "The phone number is the wrong length.\n";
		document.getElementById('mob_error').innerHTML = error;
		document.getElementById('mob_error').value = "";
       
    }
	else
	{
		error = "";
		document.getElementById('mob_error').innerHTML = error;

	}
    
}	

function comp_name()
{
if (document.getElementById('company').value=="")
{

error = "Please Enter the Company Name.\n";
		document.getElementById('comp_error').innerHTML = error;
		document.getElementById('comp_error').value = "";
}	
else
	{
		error = "";
		document.getElementById('comp_error').innerHTML = error;

	}

}

function func_address1()
{
if (document.getElementById('address1').value=="")
{

error = "Please Enter the Address 1.\n";
		document.getElementById('address1_error').innerHTML = error;
		document.getElementById('address1_error').value = "";
}	
else
	{
		error = "";
		document.getElementById('address1_error').innerHTML = error;

	}

}



function func_city()
{
if (document.getElementById('city').value=="")
{

error = "Please Enter the city.\n";
		document.getElementById('city_error').innerHTML = error;
		document.getElementById('city_error').value = "";
}	
else
	{
		error = "";
		document.getElementById('city_error').innerHTML = error;

	}

}

function func_state()
{
if (document.getElementById('state').value=="Select")
{

error = "Please Enter the State.\n";
		document.getElementById('state_error').innerHTML = error;
		document.getElementById('state_error').value = "";
		document.getElementById('state_error').value.focus();
		return false;
}	
else
	{
		error = "";
		document.getElementById('state_error').innerHTML = error;

	}

}

function func_zip()
{
if (document.getElementById('zip').value=="")
{
error = "Please Enter the Zip Code.\n";
		document.getElementById('zip_error').innerHTML = error;
		document.getElementById('zip_error').value = "";
		document.register.zip.focus();
		return false;
}	
else
	{
		error = "";
		document.getElementById('zip_error').innerHTML = error;

	}

}

function func_country()
{
if (document.getElementById('country').value=="")
{
error = "Please Enter the Country.\n";
		document.getElementById('country_error').innerHTML = error;
		document.getElementById('country_error').value = "";
		document.getElementById('country_error').value.focus();
		return false;
}	
else
	{
		error = "";
		document.getElementById('country_error').innerHTML = error;

	}

}

</script>
</head>

<body>
<div id="container">
<div id="wrap">
<div id="header">
<div id="logo"><a href="index.php"><img src="images/logo.jpg" width="250" height="56" border="0" /></a></div>
<div id="navigation">
<div align="right" id="naveigtop" style="margin-top:10px;"> 
<span class="cart"><i style="font-family:Arial, Helvetica, sans-serif; font-size:17px; color:#F00;">Y</i>our <i style="font-family:Arial, Helvetica, sans-serif; font-size:17px; color:#F00;">C</i>art<span>&nbsp;<?php echo $_SESSION['tot']; ?>&nbsp;</span><a href="cart.php" ><img src="images/carticon1.jpg" width="44" height="43" align="absmiddle" /></a>&nbsp;<a href="login.php" ><img src="images/checkout.jpg" width="118" height="30" align="absmiddle" /></a></span>
</div>
<div id="menu">
<div class="chromestyle" id="chromemenu">
<ul>
<li class="space"><a href="index.php">Home</a></li>
<li><a href="about_us.php">About Us</a></li>
<li><a href="product_gallery.php">Product Gallery</a></li>
<li><a href="specifications.php">Specifications</a></li>
<li><a href="promoters.php">Promoters</a></li>
<li><a href="contact_us.php">Contact Us</a></li>		
</ul>
</div>

<!--1st drop down menu -->                                                   
<!--<div id="dropmenu1" class="dropmenudiv" style="width:87em; margin-left:3em; margin-top:-1em; text-align:center;">
<a href="#">Spiral Wound Gaskets</a>|
<a href="#">Camprofile Gaskets</a>|
<a href="#">Double Jacketed Gaskets</a>|

</div>
-->
<!-- For addition of Dropdown menu with each link we need to make id and same rel need to give main menu-->
<!--2nd drop down menu -->                                                
<!--<div id="dropmenu2" class="dropmenudiv" style="width: 150px;">
<a href="http://www.cnn.com/">CNN</a>
<a href="http://www.msnbc.com">MSNBC</a>
<a href="http://news.bbc.co.uk">BBC News</a>
</div>-->

<script type="text/javascript">

cssdropdown.startchrome("chromemenu")

</script>

</div>

</div>
</div>
<!--header end-->

<div id="banner" class="clearboth">
<div id="bannerani">
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="710" height="236" accesskey="banner" title="banner">
    <param name="movie" value="banner.swf" />
    <param name="wmode" value="transparent" />
    <param name="quality" value="high" />
    <embed src="banner.swf" quality="high" wmode="transparent" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="710" height="236" ></embed>
  </object>
</div>
<div id="bannertxt">
<p class="bannerhead"><img src="images/bannertxt1.gif" width="156" height="107" border="0" usemap="#Map" />
<map name="Map" id="Map">
  <area shape="rect" coords="59,86,156,107" href="product_gallery.php" />
</map>
</p>
<br />
<p class="bannerhead"><img src="images/bannertxt2.gif" width="156" height="107" border="0" usemap="#Map" />
<map name="Map" id="Map">
  <area shape="rect" coords="59,86,156,107" href="product_gallery.php" />
</map>
</p>
</div>
</div>
<!--banner end-->

<div id="content" class="clearboth">

<div id="contentmain">

<span>Contact Details</span>





<table width="90%" align="left" cellpadding="0" cellspacing="0" border="0">
<tr>
<td valign="top">
<?php include('sign.php'); ?>
</td>
<td align="left" style="padding-right:50px">
<form id="register" name="register" method="post" action="#">
<table width="90%" align="left" border="0" cellspacing="1" cellpadding="1" bgcolor="#d8e9ec">
     <tr>
       <td colspan="4" align="left" style="padding-left:10px"><strong>Sign Up</strong></td>
       </tr>
     <tr>
       <td colspan="4" class="admin_list_msg" align="center"></td>
       </tr>
	 	 <tr><td colspan="4" align="center"  bgcolor="#011b36" height="30"><span class="smallhead"><b style="color:#FFF;">Login Details</b></span></td>
	 	 </tr>
         <tr><td colspan="4">&nbsp;</td></tr>
         <tr><td colspan="4">&nbsp;</td></tr>
	 
     <tr>
       <td width="33%" valign="top" align="right" class="login_page_text"><font color="#FF0000">*</font>First Name</td>
       <td width="2%">&nbsp;</td>
       <td width="32%"><input name="first_name"  id="first_name" type="text"  onblur="return check()" />
        
       <td width="33%" id="user_error" style="color:#FF0000; font-size:11px;"></td>
     </tr>
     
     
     
       <tr><td colspan="4">&nbsp;</td></tr>    
     <tr>
       <td width="33%" valign="top" align="right" class="login_page_text"><font color="#FF0000">*</font>Last Name</td>
       <td width="2%">&nbsp;</td>
       <td width="32%"><input name="last_name"  id="username2" type="text"  onblur="check_last_name()" value=""/>
        
       <td width="33%" id="last_name_error" style="color:#FF0000; font-size:11px;"></td>
     </tr>
      <tr><td colspan="4">&nbsp;</td></tr>
     <tr>
       <td width="33%" valign="top" align="right" class="login_page_text"><font color="#FF0000">*</font>Password</td>
       <td width="2%">&nbsp;</td>
       <td width="32%"><input name="pass"  id="pass" type="password"  onblur="return check_pass()" />
        
       <td width="33%" id="pass_error" style="color:#FF0000; font-size:11px;"></td>
     </tr>
     
      <tr><td colspan="4">&nbsp;</td></tr>
      <tr>
       <td align="right" class="login_page_text"><font color="#FF0000">*</font>Phone Number</td>
       <td>&nbsp;</td>
       <td><input name="mobile"  id="mobile" type="text"  onblur="chk_telephone(document.getElementById('mobile').value)" value=""/></td>
       <td id="mob_error" style="color:#FF0000; font-size:11px;" ></td>
     </tr>
	  <tr><td colspan="4">&nbsp;</td></tr>
        <!-- <tr>
       <td align="right" class="login_page_text">E-mail</td>
       <td>&nbsp;</td>
       <td><input name="email" id="email" type="text" onBlur="email_chk(document.getElementById('email').value);" value=""/></td>
       <td id="email_error" style="color:#FF0000; font-size:11px;">&nbsp;</td>
     </tr>-->

	 <tr>
       <td align="right" valign="top" class="login_page_text"><font color="#FF0000">*</font>E-mail</td>
       <td>&nbsp;</td>
       <td><input name="email" id="email" type="text" onBlur="email_chk(document.getElementById('email').value);" value="<?php echo $_REQUEST['email']; ?>"/></td>
       <td  id="email_error" style="color:#FF0000; font-size:11px;">&nbsp;</td>
     </tr>
         
        <tr><td colspan="4">&nbsp;</td></tr>
       
	 <tr>
       <td align="right" valign="top" class="login_page_text"><font color="#FF0000">*</font>Company</td>
       <td>&nbsp;</td>
       <td><textarea name="company" id="company" cols="16" rows="2" onBlur="return comp_name()"></textarea></td>
       <td id="comp_error" style="color:#FF0000; font-size:11px;"></td>
     </tr>
	 	 <tr><td colspan="4">&nbsp;</td></tr>

	 <tr>
       <td align="right" valign="top" class="login_page_text"><font color="#FF0000">*</font>Address1</td>
       <td>&nbsp;</td>
       <td><textarea name="address1" id="address1" cols="16" rows="2" onBlur="return func_address1()"></textarea></td>
       <td id="address1_error" style="color:#FF0000;  font-size:11px;" ></td>
     </tr>
	 <tr><td colspan="4">&nbsp;</td></tr>
      
    <tr>
       <td align="right" valign="top" class="login_page_text">Address2</td>
       <td>&nbsp;</td>
       <td><textarea name="address2" id="address2" cols="16" rows="2" onBlur="return func_address2()"></textarea></td>
      <td id="address2_error" style="color:#FF0000;  font-size:11px;" ></td>
     </tr>
    
       <tr><td colspan="4">&nbsp;</td></tr>
	  <tr>
       <td align="right" class="login_page_text"><font color="#FF0000">*</font>City</td>
       <td>&nbsp;</td>
       <td><input name="city" id="city" type="text" value="" onBlur="return func_city()" /></td>
       <td id="city_error" style="color:#FF0000;  font-size:11px;" ></td>
     </tr>
     <tr><td colspan="4">&nbsp;</td></tr>
     
      <tr><td colspan="4">&nbsp;</td></tr>
	 	  <tr>
       <td align="right" class="login_page_text"><font color="#FF0000">*</font>State</td>
       <td>&nbsp;</td>
       <td><select name="state" id="state" onBlur="return func_state();" style="width: 150px; " tabindex="10">
<option value="Select">Select</option>
<option>Andaman &amp; Nicobar</option>
<option>Andhra Pradesh</option>
<option>Arunachal Pradesh</option>
<option>Assam</option>
<option>Bihar</option>
<option>Chandigarh</option>
<option>Chattisgarh</option>
<option>Dadra &amp; Nagar Haveli</option>
<option>Daman &amp; Diu</option>
<option>Delhi</option>
<option>Goa</option>
<option>Gujarat</option>
<option>Haryana</option>
<option>Himachal Pradesh</option>
<option>Jammu &amp; Kashmir</option>
<option>Jharkhand</option>
<option>Karnataka</option>
<option>Kerala</option>
<option>Lakshadweep</option>
<option>Madhya Pradesh</option>
<option>Maharashtra</option>
<option>Manipur</option>
<option>Meghalaya</option>
<option>Mizoram</option>
<option>Nagaland</option>
<option>Orissa</option>
<option>Puducherry</option>
<option>Punjab</option>
<option>Rajasthan</option>
<option>Sikkim</option>
<option>Tamil Nadu</option>
<option>Tripura</option>
<option>Uttar Pradesh</option>
<option>Uttarakhand</option>
<option>West Bengal</option>
</select>
      </td>
       <td id="state_error" style="color:#FF0000;  font-size:11px;"  ></td>
     </tr>
      <tr><td colspan="4">&nbsp;</td></tr>
	  <tr>
       <td align="right" class="login_page_text"><font color="#FF0000">*</font>Zipcode</td>
       <td>&nbsp;</td>
       <td><input name="zip" id="zip" type="text" value="" onBlur="return func_zip()"/></td>
       <td id="zip_error" style="color:#FF0000;  font-size:11px;"  ></td>
     </tr>
      <tr><td colspan="4">&nbsp;</td></tr>
	 <tr>
       <td align="right" class="login_page_text"><font color="#FF0000">*</font>Country </td>
       <td>&nbsp;</td>
       <td><input name="country" id="country" type="text" value="" onBlur="return func_country()" /></td>
       <td id="country_error" style="color:#FF0000;  font-size:11px;"></td>
     </tr>
      <tr><td colspan="4">&nbsp;</td></tr>
	
		<tr><td>&nbsp;  </td></tr>						
								
								
	 <tr>
	   <td align="right"></td>
	   <td></td>
	   <td>
	     
	     
	     
	     <input name="submit" type="submit" value="SUBMIT" onClick="return validate();"  />
	     
	     
	     </td>
	   <td></td>
	   </tr>
	 <tr><td>&nbsp;  </td></tr>
     
	
	 	 <tr><td>&nbsp;  </td></tr>
     
 
</table>
   </form>
</td>
</tr>
</table>

<p class="clearboth">&nbsp;</p>
</div>

</div> 
<!--content end-->

</div>  
<!--wrap end-->

<div id="footer" class="clearboth">
<div id="footmain"></div>
<div id="foottext"><p class="footstyle1">Copyright<sup>&copy;</sup> Jain Technosoft</p></div>
</div>
<!--footer end-->

</div>
<!--container end-->

</body>
</html>
