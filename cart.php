<?php session_start();
include("config/db_connect.php");
$title = "Techno Industrial Packings.com.";

if($_REQUEST['submit_checkout'] == "checkout")
	echo "<script>window.location = 'login.php'; </script>";


if($_REQUEST['update_cart'] == "Update Cart")
{
extract($_REQUEST);


$_SESSION['current_bag'] = "";
for($i=0;$i<$total_products;$i++)
{
	$new_code = $_REQUEST["code" . $i];
	$new_price=$_REQUEST["category".$i];
	$new_quantity = $_REQUEST["quantity" . $i];
	$new_string = "|$new_code|$new_quantity,$new_price|$new_code|**";
	$_SESSION['current_bag'] .= $new_string;
	
}
  
}

if($_REQUEST['mode'] == "delete")
//echo "hellllo";
	 $_SESSION['current_bag'] ;
	$getremove = "|".$_REQUEST['cdd']."|".$_REQUEST['qd'].",".$_REQUEST['price_dimension']."|".$_REQUEST['cdd']."|**";
	//echo $getremove;
	$_SESSION['current_bag'] = str_replace($getremove,'', $_SESSION['current_bag']); ;
	
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




<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<!-- Sliding effect -->
<script src="js/slide.js" type="text/javascript"></script>
<script  language="javascript" src="js/main_js.js"></script>






</head>

<body>





<!--header end-->


<!--banner end-->





 <form name="cart_form" id="cart_form" action="#" method="get">
<table width="100%" border="0">

  <tr>
    <td>
    <table border="0" width="99">
     <tr>
          <?php
		if($_SESSION['current_bag'] != "")
		{
			
		?> 
          <td width="70%" height="300" align="left" valign="top"   ><div id="wrapper">
               
                  <table width="800px" border="0" align="center" class="cart" style="padding-right:300px"	>
                    <tr align="left" class="cart_heading" height="30">
                      <td colspan="9" valign="top" ><P style="font-family:arial;font-size:20px;color:#000000;font-weight:bold;">Your Cart</P>
                        <P style="font-family:arial;font-size:10px;color:#000000;"></P></td>
                    </tr>
                    <tr align="left">
                      <td valign="top"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0" ">
                        
                            <tr class="cart_heading" height="24" bgcolor="#333333">
                              <td width="57">Item</td>
                              <td width="461">Description</td>
                              <td width="108">Price</td>
                              <td width="72">Quantity</td>
                              <td width="102">Total</td>
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
					$subtotal = substr($details[1],0,strlen($details[1])) * $details[0];
					$quantity_stk=$product_table['quantity'];
					//$srt=strlen($product['price']);
					//echo $srt;
					//echo $subtotal;
					$item_total += $subtotal;
				 $_SESSION['tot']=number_format($total);
			 
				?>
           					<input type="hidden" id="<?php echo 'quantity_stock'.$k; ?>" value=<?php echo $quantity_stk; ?> >
                            <tr class="cart">
                              <td align="center" valign="top"><?php echo "<img src='admin/images/$product_image' width='70' hspace='12'>"; ?></td>
                              <td align="left" valign="top"><?php echo "
						<b>Dimension: <input type='text' name='dim" . "$k' value='" . $product['dimension'] . "' class='cart_invisible_box' readonly> </b><br>
						<b>Name: <input type='text' name='name" . "$k' value='" . $product1 . "' class='cart_invisible_box' readonly> </b><input type='hidden' name='category" . "$k' value='" . $details[1] . "' class='cart_invisible_box' readonly><br><input type='hidden' name='code" . "$k' value='" . $product_code[1] . "' class='cart_invisible_box' readonly><br><br>
						<br>
					<a href='cart.php?cdd=$code&qd=".$details[0] . "&price_dimension=".$details[1]."&mode=delete' style='font-family:verdana;font-size:10px;color:black;text-decoration:underline;'>Remove</a>
					
						"; ?></td>
                              <td align="left" valign="top"><?php echo $details[1]; ?></td>
                              <td align="left" valign="top"><select name="quantity<?php echo $k; ?>" id="quantity<?php echo $k; ?>" onchange="this.form.submit()" >
                                  <?php for($qi=1;$qi<=10;$qi++) { ?>
                                  <option 
						value="<?php echo $qi; ?>"
						<?php if($qi == $details[0]) echo "selected"; ?>><?php echo $qi; ?></option>
                                  <?php } ?>
                                </select>
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
                          </form>
                          <tr>
                            <td colspan="9" align="right" valign="top" class="cart_update"><form name="checkout_form" action="#" method="post">
                                <table border="0" width="300" cellpadding="5" cellspacing="0" align="right">
                                  <tr  class="cart_update">
                                    <td align="left" width="240"> Merchandise Total </td>
                                    <td align="right" width="12">$</td>
                                    <td align="right" width="18"><?php echo number_format($item_total,2); ?> </td>
                                  </tr>
                                  <tr  class="cart_update">
                                    <td align="left"> Shipping Charges </td>
                                    <td align="right" width="12">$</td>
                                    <td align="right"><?php echo number_format("15",2); ?> </td>
                                  </tr >
                                  <tr bgcolor="#CCCCCC">
                                    <td align="left" style="font-size:12px;font-weight:bold;">Total </td>
                                    <td align="right" width="12" style="font-size:12px;font-weight:bold;">$</td>
                                    <td align="right" style="font-size:12px;font-weight:bold;"><?php echo number_format(($item_total + 15), 2); ?> </td>
                                  </tr>
                                  <tr hieght="25"><td></td>
                                  <td></td>
                                  <td></td>
                                  </tr>
                                  <tr>
                                    <td align="center" colspan="3" style="font-size:12px;font-weight:bold;"><?php
					// Order SUmmary Session Variables
					$_SESSION['merchandise_total'] = number_format($item_total,2);
					$_SESSION['shipping_charges'] = number_format("15",2);
					$_SESSION['gross_total'] = number_format(($item_total + 15), 2);
					?>
                                      <input type="hidden" name="submit_checkout" value="checkout" />
                                      <A href="product_gallery.php"><img src="images/continueShopping.gif" hspace="5" vspace="15" border="0" /></A>
                                      <input type="image" src="images/checkout.gif" hspace="5" vspace="15" border="0" name="submit_checkout" value="checkout" />
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
                
             
            </td>
          <?php
		}		       
		else
			echo "<td height='500' valign='middle' align='center' ><strong style='font-size:'>Your cart bag is currently empty</strong></td>";
			
		?>
        </tr>
    </table>
    
    
    
    </td>
  </tr>
</table>

 </form>
</body>
</html>
