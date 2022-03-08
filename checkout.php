<?php session_start();
include("config/db_connect.php");
$title = "Techno Industrial Packings.com.";

if($_REQUEST['order_info']=="cancelled")
{
	$_SESSION['current_bag']=$_REQUEST['session_value'];
	$user=$str_replace("l;kj23l4kj23l4j23n","",$_REQUEST['hipayplssnur']);
	$user=$str_replace("!ssdf78sd90f9sd7*","",$user);	
	$_SESSION['loginUser'] = $user;
}




	
	//$_SESSION['current_bag'] = str_replace(("|$cdd|$qd|$cdd|**"), "", $_SESSION['current_bag']); 
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Techno Industrial Packings ::</title>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="css/style-h.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/indexstyle.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/chrometheme/chromestyle.css" media="screen" />



<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<!-- Sliding effect -->
<script src="js/slide.js" type="text/javascript"></script>
<script  language="javascript" src="js/main_js.js"></script>
<script language="javascript" src="js/jquery-1.2.6.min.js"></script>
<link type="text/css" media="screen" rel="stylesheet" href="colorbox.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript">
			$(document).ready(function(){
				$(".iframe").colorbox({width:"800", height:"600", iframe:true});
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
<script language="javascript" type="text/javascript" src="js/fadeeffect.js"></script>




<script type="text/javascript" src="javascript/chromejs/chrome.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>

<body>
<div id="container">
<div id="wrap">
<div id="header">
<div id="logo"><a href="index.php"><img src="images/logo.jpg" width="250" height="56" border="0" /></a></div>
<div id="navigation">
<div align="right" id="naveigtop" style="margin-top:10px;"> 
<span class="cart"><i style="font-family:Arial, Helvetica, sans-serif; font-size:17px; color:#F00;">Y</i> our <i style="font-family:Arial, Helvetica, sans-serif; font-size:17px; color:#F00;">C</i>art<span>&nbsp;<?php echo $_SESSION['tot']; ?> &nbsp;</span><img src="images/carticon1.jpg" width="44" height="43" align="absmiddle" />&nbsp;<img src="images/checkout.jpg" width="118" height="30" align="absmiddle" /></span> 
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>


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

<span></span>
<p class="gentxt">

<table width="100%" border="0">

  <tr>
    <td align="center">
    <table border="0" width="99" align="center">
     <tr>
         
          <td width="70%" height="300" align="left" valign="top"   ><div id="wrapper" style="background-image:url(images/contentbg.gif);  height:1100px;">
              <div id="contentwrapper">
                <div id="content">
                  <table width="800px" border="0" align="center" class="cart"	>
                    <tr align="left" class="cart_heading" height="30">
                      <td colspan="9" valign="top" ><P style="font-family:arial;font-size:20px;color:#000000;font-weight:bold;">Your Cart</P>
                        <P style="font-family:arial;font-size:10px;color:#000000;"></P></td>
                    </tr>
                    <tr align="left">
                      <td valign="top"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0" ">
                         
                            <tr class="cart_heading" height="24" bgcolor="#333333">
                              <td width="73">Item</td>
                              <td width="331">Description</td>
                              <td width="84">Price</td>
                              <td width="89">Quantity</td>
                              <td width="223">Total</td>
                            </tr>
                            <tr>
                              <td colspan="6" height="5"></td>
                            </tr>
                            <?php 
				
				$all_products = explode("**",$_SESSION['current_bag']); 
				$total = count($all_products) - 1;
				//echo $_SESSION['current_bag'];
				
				$k = 0;
				$item_total = 0;
				for($i=0;$i<$total;$i++)
				{  
				   
				    
					$product_code = explode("|",$all_products[$i]);
					$code = $product_code[1];
					$details = explode("|$code|",$all_products[$i]);
					$details = $details[1];
					$details = explode(",",$details);
					$price_dim=$details[1];
					$product = mysql_fetch_array(mysql_query("select * from tbl_dimension where  price= '".$details[1]."'  and prod_code=  '".$product_code[1]."' "));
					$product_table = mysql_fetch_array(mysql_query("select * from tbl_product where  product_code= '".$product_code[1]."' "));
					//echo "select * from tbl_dimension where  price= '".$details[1]."' and prod_code=  '".$product_code[1]."' ";
					//echo $product['dimension'];
					$product_image = $product_table['product_image'];				
					$product1=$product_table['product_name'];
					$paypal_products.=$product1.",";
					//echo $paypal_products;
					$subtotal = substr($details[1],0,strlen($details[1])) * $details[0];
					//$srt=strlen($product['price']);
					//echo $srt;
					//echo $subtotal;
					$item_total += $subtotal;
				 $_SESSION['tot']=number_format($total);
			 
				?>
           
                            <tr class="cart">
                              <td align="center" valign="top"><?php echo "<img src='admin/images/$product_image' width='70' hspace='12'>"; ?></td>
                              <td align="left" valign="top"><?php echo "<b><a href='view_product.php?cd=$code&q=" . $details[0] . "&cr=" . $details[1] . "'>" . $product['product_name'] . "</a></b><br>
						<b>Dimension: <input type='text' name='dim" . "$k' value='" . $product['dimension'] . "' class='cart_invisible_box' readonly> </b><br>
						<b>Name: <input type='text' name='name" . "$k' value='" . $product1 . "' class='cart_invisible_box' readonly> </b><input type='text' name='category" . "$k' value='" . $details[1] . "' class='cart_invisible_box' readonly><br><input type='text' name='code" . "$k' value='" . $product_code[1] . "' class='cart_invisible_box' readonly><br><br>
					
					
					
						"; ?></td>
                              <td align="left" valign="top"><?php echo $details[1]; ?></td>
                              <td align="left" valign="top"><?php echo $details[0]; ?>
                              </td>
                              <td align="left" valign="top"><?php echo "$" . $subtotal; ?></td>
                            </tr>
                            
                            <tr>
                              <td colspan="6" height="5"></td>
                            </tr>
                            <tr>
                              <td colspan="9"><hr color="#999999" size="1" /></td>
                            </tr>
                            <tr>
                              <td colspan="6" height="5"></td>
                            </tr>
                            <?php
				$k++;
				}

				?>
                            <input type="hidden" name="total_products" value="<?php echo $total; ?>"  />
                            <input type="hidden" name="update_cart" value="Update Cart" />
                        
                          <tr>
								<td colspan="2" align="left" valign="middle" height="25" style="font-family:arial;font-size:13px;color:#000000;font-weight:bold;">
								Billing Address
								</td>
							</tr>
							<tr>
								<td width="4%" height="25" align="left" valign="middle">
								
								<?php 
								$get=mysql_fetch_array(mysql_query("select * from user_reg where name='".$_SESSION['loginUser']."'")); 
								echo "<b>" . $get['name']." ".$get['last_name']."</b>,<br>".$get['address1'].",<br>".$get['city'].",<br>".$get['state'].",<br>".$get['country'].",<br>".$get['zip_code'].",<br>".$get['phone'];
								?>
								
								
								</td>
							</tr>	
                            <tr><td colspan="9"><hr color="#999999" size="1" /></td></tr>	
                          <tr>
                            <td colspan="9" align="right" valign="top" class="cart_update"><form name="checkout_form" action="#" method="post">
                                <table border="0" width="300" cellpadding="5" cellspacing="0" align="right">
                                  <tr  class="cart_update">
                                    <td align="left" width="300"> Merchandise Total </td>
                                    <td align="right" width="50">$</td>
                                    <td align="right" width="80"><?php echo number_format($item_total,2); ?> </td>
                                  </tr>
                                  <tr  class="cart_update">
                                    <td align="left"> Shipping Charges </td>
                                    <td align="right" width="50">$</td>
                                    <td align="right"><?php echo number_format("15",2); ?> </td>
                                  </tr >
                                  <tr bgcolor="#CCCCCC">
                                    <td align="left" style="font-size:12px;font-weight:bold;">Total </td>
                                    <td align="right" width="50" style="font-size:12px;font-weight:bold;">$</td>
                                    <td align="right" style="font-size:12px;font-weight:bold;"><?php echo number_format(($item_total + 15), 2); ?> </td>
                                  </tr>
                                  <tr>
                                    <td align="center" colspan="3" style="font-size:12px;font-weight:bold;"><?php
					// Order SUmmary Session Variables
					$_SESSION['merchandise_total'] = number_format($item_total,2);
					$_SESSION['shipping_charges'] = number_format("15",2);
					$_SESSION['gross_total'] = number_format(($item_total + 15), 2);
					
					$products=explode('**',$_SESSION['current_bag']);
					?>
                    	<form action="https://www.paypal.com/cgi-bin/webscr" name="_xclick" target="_parent" method="post">
							
							<input type="hidden" name="cmd" value="_xclick">
							
							<input type="hidden" name="currency_code" value="USD" />
							
							<input type="hidden" name="business" value="rakesh_1303190296_per@gmail.com">
							
							<input type="hidden" name="undefined_quantity" value="<?php echo $i; ?>">
							
							
							<input type="text" name="item_name" value="<?php echo substr($paypal_products,0,(strlen($paypal_products)-1)); ?> ">
							
							<input type="text" name="amount" value="<?php echo $_SESSION['gross_total']; ?>">
							
							<input type="hidden" name="return" value="http://localhost/technosoft/finish.php?cost=<?php echo $_SESSION['gross_total']; ?>&inid=<?=$inid?>">
							
							<!--<input type="hidden" name="cancel_return" value="http://localhost/technosoft/checkout.php?session_value=<?php echo $_SESSION['current_bag']; ?>&hipayplssnur=<?php echo "l;kj23l4kj23l4j23n#" . $_SESSION['loginUser'] . "!ssdf78sd90f9sd7*"; ?>&order_info=cancelled">-->
							
                                <input type="image" align="middle" src="images/checkout.gif" border="0" name="submit" onclick="insert_paypal()" />
							
							</form>
                                      
                                    </td>
                                  </tr>
                                </table>
                          </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr align="left">
                      <td colspan="9" valign="top" class="cart_update"></td>
                    </tr>
                    <tr align="left">
                      <td style="padding-top:30px;"></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" class="cart_update" width="690"></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr align="left">
                      <td style="padding-top:30px;"></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div></td>
          
        </tr>
    </table>
    
    
    
    </td>
  </tr>
</table>

</p>


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
