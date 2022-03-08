<?php session_start();
include("common/db_config.php");
extract($_REQUEST);

//for new pagination	  
include('js/pagination/paginator.class1.php');


if($_REQUEST['update'] =='Update' and $mode == 'edit')
{
	mysql_query("UPDATE v_customer_master SET cus_type='".$_REQUEST['customer']."',name='".$_REQUEST['name']."',country='".$_REQUEST['country']."',state='".$_REQUEST['state']."',tax='".$_REQUEST['tax']."',phone1='".$_REQUEST['tele1']."',phone2='".$_REQUEST['tele2']."',fax='".$_REQUEST['fax']."',email='".$_REQUEST['email']."',reg_date_time='".$_REQUEST['date']."',assigned_to_master_dist='".$_REQUEST['master']."',assigned_to_dist='".$_REQUEST['distributor']."',assigned_to_agent='".$_REQUEST['agent']."',discount='".$_REQUEST['discount']."',hear_about='".$_REQUEST['media']."',business_type='".$_REQUEST['business_type']."',no_of_emp='".$_REQUEST['emp']."' where cus_master_id='".$cust_id."' ");	
	?>
		<!--<script>window.location="customer_search1.php?msg=success";</script>-->
	<?php
}

if($_REQUEST['update'] =='Update' and $mode == 'edit_all')
{
	$ex=explode(',',$cust_id);
	$count = count($ex);
	for($i=0;$i<=$count-2;$i++)
	{
		mysql_query("UPDATE v_customer_master SET cus_type='".$_REQUEST['customer'.$i]."',name='".$_REQUEST['name'.$i]."',country='".$_REQUEST['country'.$i]."',state='".$_REQUEST['state'.$i]."',tax='".$_REQUEST['tax'.$i]."',phone1='".$_REQUEST['tele1'.$i]."',phone2='".$_REQUEST['tele2'.$i]."',fax='".$_REQUEST['fax'.$i]."',email='".$_REQUEST['email'.$i]."',reg_date_time='".$_REQUEST['date'.$i]."',assigned_to_master_dist='".$_REQUEST['master'.$i]."',assigned_to_dist='".$_REQUEST['distributor'.$i]."',assigned_to_agent='".$_REQUEST['agent'.$i]."',discount='".$_REQUEST['discount'.$i]."',hear_about='".$_REQUEST['media'.$i]."',business_type='".$_REQUEST['business_type'.$i]."',no_of_emp='".$_REQUEST['emp'.$i]."' where cus_master_id='".$ex[$i]."' ");
	}
	?>
		<!--<script>window.location="customer_search1.php?msg=success";</script>-->
	<?php
}


//echo $gen_date_val;
include_once('common/Paging.class.php');
global $arrMainParam;
$arrMainParam['TOTAL_RECORDS']				=	'';
$arrMainParam['RECORDS_PER_PAGE']			=	5;
$arrMainParam['PAGELINKS_PER_PAGE']			=	5;
$arrChildParam['FORM_NAME']					=	'frm_list';
$arrChildParam['SHOW_TOTAL_RECORDS_FOUND']	=	'0';
$arrChildParam['PAGINATION_STYLE']			=	'3';
$arrChildParam['SPT_URL_PARAM']				=	'1';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>VentDepot - Admin</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="js/datepicker/css/datepicker.css" type="text/css" />
<link rel="stylesheet" href="css/jquery.autocomplete.css" type="text/css" />
<link rel="stylesheet" media="screen" type="text/css" href="js/datepicker/css/layout.css" />
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.translate-1.4.6-debug-all.js"></script>
<script type="text/javascript" src="js/datepicker/js/jquery.js"></script>
<script type="text/javascript" src="js/datepicker/js/datepicker.js"></script>
<script type="text/javascript" src="js/datepicker/js/eye.js"></script>
<script type="text/javascript" src="js/datepicker/js/utils.js"></script>
<script type="text/javascript" src="js/datepicker/js/layout.js?ver=1.0.2"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>



<!--//new pagination starts-->
<script type="text/javascript" src="js/pagination/pagination.js"></script>
<link rel="stylesheet" type="text/css" href="css/pagination/pagination.css" />
<!--//new pagination ends-->

<script>
<!-- Date Picker Starts -->
(function($)
{
	var initLayout = function()
	{
	
		//var date_single = $('#widgetField_single span').get(0).innerHTML;
		var date = $('#widgetField span').get(0).innerHTML;
		var gen_date = $('#widgetField_general span').get(0).innerHTML;
		var branch_date = $('#widgetField_branch span').get(0).innerHTML;
		
		alert ('hi'+date+", "+gen_date+" , "+branch_date);
		document.getElementByID('date_val').value = date;
		document.getElementByID('gen_date_val').value = gen_date;
		document.getElementByID('branch_date_val').value = branch_date;
	};
//EYE.register(initLayout, 'init');
})(jQuery)
<!-- Date Picker Starts -->
</script>



<!--Pagination starts-->

<link rel="stylesheet" href="css/pagination/jq.css" type="text/css" media="print, projection, screen">
<link rel="stylesheet" href="css/pagination/style_page.css" type="text/css" media="print, projection, screen">
<script type="text/javascript" src="js/pagination/jquery_002.js"></script>
<script type="text/javascript" src="js/pagination/jquery.js"></script>
<script type="text/javascript">
/*$(document).ready(function() { 
	$("#table_list")
		.tablesorter({
		 widthFixed: true,
		 widgets: ['zebra'],
		 //debug: true,
		 headers: { 
            0: { sorter: false }, 
            4: { sorter: false },
            5: { sorter: false }
        } 
		})
		.tablesorterPager({container: $("#pager")});
});*/

<!--Pagination ends-->

<!-- Start the function to submit the form -->
function submitform(val)
{//document.frm_list_type_menu_bar.action=document.frm_list_type_menu_bar.action+'?mode='+val;
//alert(document.frm_list_type_menu_bar.action);
  document.frm_list_type_menu_bar.submit();
  
}
<!-- End the function to submit the form -->


<!-- Start the Function for Select All and Un Select All check boxes on the selection of topped check box -->
function func_select_all_checkbox(num)
{//alert(num);
	//alert(document.getElementById('chk_select_all').checked);
	if(document.getElementById('chk_select_all').checked==true)
	{//alert("hi");
		
		for(k=0;k<num;k++)
		{//alert(document.getElementById('chk'+k).checked);
			document.getElementById('chk_box'+k).checked=true;
		}
		//document.getElementById('chk_select_all').checked=true;
	}
	else
	{
		for(k=0;k<num;k++)
		{
			document.getElementById('chk_box'+k).checked=false;
		}
	}
}
<!-- End the Function for Select All and Un Select All check boxes on the selection of topped check box -->


<!-- Start the function to hide and display data in list, based on check boxes in list header -->

function hide_checked_data(num,chk_val)
{//alert(num);
	//alert(chk_val);
	if(chk_val=='chk_1')
	{
		if(document.getElementById('chk1').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert('chk_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert('chk_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
			}
		}
	}
	
	if(chk_val=='chk_2')
	{
		if(document.getElementById('chk2').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_3')
	{
		if(document.getElementById('chk3').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_4')
	{
		if(document.getElementById('chk4').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_5')
	{
		if(document.getElementById('chk5').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_6')
	{
		if(document.getElementById('chk6').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_7')
	{
		if(document.getElementById('chk7').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_8')
	{
		if(document.getElementById('chk8').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	
	if(chk_val=='chk_9')
	{
		if(document.getElementById('chk9').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}	
	
	if(chk_val=='chk_10')
	{
		if(document.getElementById('chk10').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_11')
	{
		if(document.getElementById('chk11').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_12')
	{
		if(document.getElementById('chk12').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_13')
	{
		if(document.getElementById('chk13').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_14')
	{
		if(document.getElementById('chk14').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_15')
	{
		if(document.getElementById('chk15').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_16')
	{
		if(document.getElementById('chk16').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_17')
	{
		if(document.getElementById('chk17').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}
	
	if(chk_val=='chk_18')
	{
		if(document.getElementById('chk18').checked==true)
		{ 
			//document.getElementById('chk1').value=1;
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				//alert(chk_val+'_'+i+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='block';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='none';
			} 
		}
		else
		{
			for(var i=0;i<num;i++)
			{//alert(chk_val+'_'+i);
				document.getElementById(chk_val+'_'+i).style.display='none';
				document.getElementById(chk_val+'_'+i+'_'+i).style.display='block';
			}
		}
	}


}

<!-- End the function to hide and display data in list, based on check boxes in list header -->


<!--  Script For Sorting the Records in List according to images "Ascending or Descending"  -->
function func_sort(str1,str2,str3)
{
	//alert(str3);
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return false;
	}
	var url="common/ajax/sort_ascen_descending.php?sort_cond="+str1+"&dir_search="+str2+"&search_data="+str3;
	//alert(url);
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{
			//alert(xmlHttp.responseText);
			document.getElementById('sorted_table').innerHTML=xmlHttp.responseText;	
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

function getObj(argID){
	return document.getElementById(argID);
}
<!--  Script For Search data insering into search data textbox according to typed character  -->
function assign_search_data(str){
	//alert('str='+str);
	//getObj('search_data').value = '';
	getObj('search_data').value = str;
	//getObj('searchedResults').innerHTML='';
	getObj('searchedResults').style.display = 'none';
}

<!-- Function to close the "Assist Searched Results" as coming in List -->
function closeassist()
{
	$("#flush").click(function() {
		$("#search_data").data('autocompleter');
	});
	document.getElementById('searchedResults').style.display = 'none';
}


<!--  Script For Search data Dynamically according to typed character or Search Assistance  -->
function func_search_data(str)
{//alert(rec);
//alert("hi");	
	//alert(document.frm_direct_search.assist[1].checked);
	if(document.frm_direct_search.assist[0].checked==true)
	{
		//alert(document.frm_direct_search.dir_search.length);
		for (var i=0; i < document.frm_direct_search.dir_search.length; i++)
		{
			 if (document.frm_direct_search.dir_search[i].checked)
			 {
				var rad_val = document.frm_direct_search.dir_search[i].value;
			 }
		}
		//alert(rad_val);
	  	xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		{
			alert ("Browser does not support HTTP Request")
			return false;
		}
		
		var url="common/ajax/customer_search_data.php?search_str="+str+"&rad_val="+rad_val;
		//alert(url);
		xmlHttp.onreadystatechange=function()
		{
			getObj('searchedResults').innerHTML="<img src='images/loading.gif'>Fetching Data..";
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				//alert(xmlHttp.responseText);
				var resultedStr = xmlHttp.responseText;
				var resultedElem = resultedStr.split("^^^");
				//var reqStr = "<table width='100%' cellpadding='0' cellspacing='0' border='1'><tr><td align='right' valign='top' class='td' style='padding-right:8px'><a href='' onclick='closeassist()'>Close[X]</a></td></tr><tr><td><ul>";-----------style='background-color:#8CEC9B;'-------------
				var reqStr = "<table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='right' valign='top' class='td' style='padding-right:8px;border-bottom:1px solid #AF2533'><img src='images/cancel.png' width='22px' onclick='closeassist()'></td></tr><tr><td><ul>";
				for(i=0; i<resultedElem.length; i++)
				{
					if(resultedElem[i]!='')
					{
						reqStr += '<li bgcolor="#8CEC9B" class="acFirst" onclick="javascript:assign_search_data(\''+resultedElem[i]+'\');">'+resultedElem[i]+'</li>';
					}
				}
				reqStr += '</ul></td></tr></table>';
				var str1='/'+str+'/g';
				var finalstr = reqStr.replace(str1,"<b style='background-color:#FFFF00'>"+str+"</b>");
				//alert(finalstr);
				getObj('searchedResults').innerHTML=finalstr;
				getObj('searchedResults').style.display='';
			//document.getElementById('search_result').innerHTML=xmlHttp.responseText;
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
	else
		document.getElementById('searchedResults').style.display = 'none';
}



/*function opendiv(a)
{
if(a==1)
{
document.getElementById('dir_search').style.display = "block";
document.getElementById('gen_search').style.display = "none";
document.getElementById('branch_search').style.display = "none";
document.getElementById('report').style.display = "none";
}
else if(a==2)
{
document.getElementById('dir_search').style.display = "none";
document.getElementById('gen_search').style.display = "block";
document.getElementById('branch_search').style.display = "none";
document.getElementById('report').style.display = "none";
}
else if(a==3)
{
document.getElementById('dir_search').style.display = "none";
document.getElementById('gen_search').style.display = "none";
document.getElementById('branch_search').style.display = "block";
document.getElementById('report').style.display = "none";
}
else if(a==4)
{
document.getElementById('dir_search').style.display = "none";
document.getElementById('gen_search').style.display = "none";
document.getElementById('branch_search').style.display = "none";
document.getElementById('report').style.display = "block";
}
}*/


//accordion

</script>


<script type="text/javascript">
/*
$(function(str) { 
	$("#search_data").autocomplete('common/ajax/customer_search_data.php?search_str='+str);
	$("#flush").click(function() {
			$("#search_data").data('autocompleter');
	});
});
*/


/////////////////////////////////////////////////////////////////////////////////////
<!-- Start the function to Delete the particular Record on Selection of Check Box -->
/////////////////////////////////////////////////////////////////////////////////////
function func_customer_delete(cust_id)
{	
	var sql_query = document.getElementById('sql_query').value;
	var list_limit = document.getElementById('list_limit').value;	
	var page_item = document.getElementById('page_item').value;
	//var page_no = document.getElementById('page_no').value;
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return false;
	}
	var url="common/ajax/customer_search_delete.php?list_limit="+list_limit+"&page_item="+page_item+"&mode=delete&cust_id="+cust_id+"&sql_query="+sql_query;
	//alert(url);
	
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{
			//alert(xmlHttp.responseText);			
			document.getElementById('page_contents').innerHTML=xmlHttp.responseText;
			document.getElementById('message').innerHTML="Record is successfully deleted";
			document.getElementById('message').style.display='block';	
		}
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;	
}
<!-- End the function to Delete the particular Record on Selection of Check Box -->



/////////////////////////////////////////////////////////////////////////////
<!-- Start the function to Delete the Records on Selection of Check Boxes -->
/////////////////////////////////////////////////////////////////////////////
function deleteAll_customer()
{	
	var confirmation = confirm('Do you really want to delete this record');
	if(confirmation == true)
	{
		var cust_id = '';
		var sql_query = document.getElementById('sql_query').value;
		var list_limit = document.getElementById('list_limit').value;	
		var page_item = document.getElementById('page_item').value;
		//var page_no = document.getElementById('page_no').value;
		
		for(var i=0;i<page_item;i++)
		{//alert(document.getElementById('chk_box'+i).checked+'---'+i);
			if(document.getElementById('chk_box'+i).checked==true)
			{//alert("if");
				cust_id += document.getElementById('chk_box'+i).value + ',';			
			}
		}
		
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		{
			alert ("Browser does not support HTTP Request")
			return false;
		}
		var url="common/ajax/customer_search_delete.php?list_limit="+list_limit+"&page_item="+page_item+"&mode=delete_all&cust_id="+cust_id+"&sql_query="+sql_query;
		//alert(url);
		
		xmlHttp.onreadystatechange=function()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				//alert(xmlHttp.responseText);			
				document.getElementById('page_contents').innerHTML=xmlHttp.responseText;
				document.getElementById('message').innerHTML="Records are successfully deleted";
				document.getElementById('message').style.display='block';	
			}
		}
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
		return false;
	}
}
<!-- End the function to Delete the Records on Selection of Check Boxes -->




/////////////////////////////////////////////////////////////////////////////
<!-- Start the function to Approve the Customer on Selection of Check Box -->
/////////////////////////////////////////////////////////////////////////////
function func_customer_approve(cust_id)
{		
	var sql_query = document.getElementById('sql_query').value;
	var list_limit = document.getElementById('list_limit').value;	
	var page_item = document.getElementById('page_item').value;
	//var page_no = document.getElementById('page_no').value;	
	
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return false;
	}
	var url="common/ajax/customer_search_approve.php?list_limit="+list_limit+"&page_item="+page_item+"&mode=approve&cust_id="+cust_id+"&sql_query="+sql_query;	
	
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{
			//alert(xmlHttp.responseText);			
			
			document.getElementById('page_contents').innerHTML=xmlHttp.responseText;
			document.getElementById('message').innerHTML="Customer is Successfully approved";
			document.getElementById('message').style.display='block';
			
		}
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;

}
<!-- End the function to Approve the Customer on Selection of Check Box -->

function customer_edit(str)
{

var list_limit = document.getElementById('list_limit').value;
	 alert('customer_edit.php?mode=edit&cus_master_id='+str+'&list_limit='+list_limit);
	 window.open('customer_edit.php?mode=edit&cus_master_id='+str+'&list_limit='+list_limit,'_blank');

}


//////////////////////////////////////////////////////////////
<!-- Start the function to Edit or Edit All the Customers  -->
//////////////////////////////////////////////////////////////
/*function customer_edit(mode,cust_id)
{	
	if(mode == 'edit_all')
	{
		var cust_id = '';	
		var list_limit = document.getElementById('list_limit').value;	
		var page_item = document.getElementById('page_item').value;
		//var page_no = document.getElementById('page_no').value;
		
		for(var i=0;i<page_item;i++)
		{//alert(document.getElementById('chk_box'+i).checked+'---'+i);
			if(document.getElementById('chk_box'+i).checked==true)
			{//alert("if");
				cust_id += document.getElementById('chk_box'+i).value + ',';			
			}
		}
		document.getElementById('cust_id').value = cust_id;
	}
	if(mode == 'edit')
	{	
		document.getElementById('cust_id').value = cust_id;		
	}
	
	document.getElementById('mode').value = mode;
	document.frm_list.action = "customer_edit.php";
	document.frm_list.submit();
}*/
<!-- End of the function to Edit or Edit All the Customers  -->




//////////////////////////////////////////////////////////////////
<!-- Start the function to Generate the PDf Report of the List -->
//////////////////////////////////////////////////////////////////

function func_generate_pdf()
{
	document.getElementById('sql_query_pdf').value = document.getElementById('sql_query').value;
	document.getElementById('list_limit_pdf').value = document.getElementById('list_limit').value;
	//var page_item = document.getElementById('page_item').value;
	//alert(document.getElementById('sql_query_pdf').value);
	document.frm_report_criteria.submit();


	/*
	var cus_type = document.getElementById('r_customer_type').checked;
	var cus_master_id = document.getElementById('r_customer_number').checked;
	var reg_date_time = document.getElementById('r_registry_date').checked;
	var assigned_to_master_dist = document.getElementById('r_master_distributor_number').checked;
	var assigned_to_dist = document.getElementById('r_distributor_number').checked;
	var assigned_to_agent = document.getElementById('r_agent_number').checked;
	var client_number = document.getElementById('r_final_client_number').checked;// For Final Client
	var business_type = document.getElementById('r_business').checked;
	var tax = document.getElementById('r_tax_number').checked;
	var name = document.getElementById('r_name').checked;
	var last_name = document.getElementById('r_last_name').checked;
	var job_title = document.getElementById('r_job_title').checked;
	var dob = document.getElementById('r_date_of_birth').checked;
	var email = document.getElementById('r_email').checked;
	var country = document.getElementById('r_country').checked;
	var state = document.getElementById('r_state').checked;
	var city = document.getElementById('r_city').checked;
	var address1 = document.getElementById('r_address1').checked;
	var address2 = document.getElementById('r_address2').checked;
	var zipcode = document.getElementById('r_zip_code').checked;
	var phone1 = document.getElementById('r_area_telephone1').checked;
	var phone2 = document.getElementById('r_area_telephone2').checked;
	var mobile = document.getElementById('r_mobile').checked;
	var fax = document.getElementById('r_fax').checked;
	var website = document.getElementById('r_website').checked;
	var note = document.getElementById('r_note').checked;
	var hear_about = document.getElementById('r_how_about_ventdepot').checked;
	var activity_type = document.getElementById('r_business_activity_type').checked;
	var no_of_emp = document.getElementById('r_number_of_employees').checked;
	var newsletter = document.getElementById('r_newsletter_mailing_list').checked;
	var sp_discount = document.getElementById('r_sp_discounts_mailing_list').checked;
	var account_type = document.getElementById('r_account_type').checked;
	var tax_zone = document.getElementById('r_tax_zone').checked;
	var discount = document.getElementById('r_discounts').checked;
	var currency = document.getElementById('r_currency').checked;
	var language = document.getElementById('r_language').checked;
	var photo = document.getElementById('r_photograph').checked;
	

		
	var sql_query = document.getElementById('sql_query').value;
	var list_limit = document.getElementById('list_limit').value;
	var page_item = document.getElementById('page_item').value;
	
	

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return false;
	}
	var small_logo = document.getElementById('r_logo').checked;
var url="pdf/pdf_customer_data1.php?list_limit="+list_limit+"&page_item="+page_item+"&sql_query="+sql_query+"&cus_type="+cus_type+"&cus_master_id="+cus_master_id+"&reg_date_time="+reg_date_time+"&assigned_to_master_dist="+assigned_to_master_dist+"&assigned_to_dist="+assigned_to_dist+"&assigned_to_agent="+assigned_to_agent+"&client_number="+client_number+"&business_type="+business_type+"&tax="+tax+"&name="+name+"&last_name="+last_name+"&job_title="+job_title+"&dob="+dob+"&email="+email+"&country="+country+"&state="+state+"&city="+city+"&address1="+address1+"&address2="+address2+"&zipcode="+zipcode+"&phone1="+phone1+"&phone2="+phone2+"&mobile="+mobile+"&fax="+fax+"&website="+website+"&note="+note+"&hear_about="+hear_about+"&activity_type="+activity_type+"&no_of_emp="+no_of_emp+"&newsletter="+newsletter+"&sp_discount="+sp_discount+"&account_type="+account_type+"&tax_zone="+tax_zone+"&discount="+discount+"&currency="+currency+"&language="+language+"&photo="+photo+"&small_logo="+small_logo;
	alert(url);
	
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{
			alert(xmlHttp.responseText);			
			window.location	= 'pdf/pdf_customer_data1.php';
		}
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;
	*/
}
<!-- End the function to Generate the PDf Report of the List -->



////////////////////////////////////////////////////////////////////////////
<!-- Start the function to display the State on the selection of Country -->
////////////////////////////////////////////////////////////////////////////
///------ Get State for Direct Search
function getState1(countryAbbr,cnt)
{	
	var list_limit = document.getElementById('list_limit').value;
	//var page_no = document.getElementById('page_no').value;
	var page_item = document.getElementById('page_item').value;
	
	if(document.getElementById('direct_country').value == 'ALL' && cnt == 1)	
	{	countryAbbr = 'all'; 	}
		
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return false;
	}
	var url="common/ajax/customer_search_getState.php?abbreviation="+countryAbbr+"&cnt="+cnt+"&list_limit="+list_limit+"&page_item="+page_item+"&search_type=direct";
	//alert(url);
	
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{
			//alert(xmlHttp.responseText);
			if(cnt == 1)
				document.getElementById('statediv1').innerHTML=xmlHttp.responseText;				
		}
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;
	
}

///------ Get State for general Search
function getState2(countryAbbr,cnt)
{	
	var list_limit = document.getElementById('list_limit').value;
	//var page_no = document.getElementById('page_no').value;
	var page_item = document.getElementById('page_item').value;
	
	
	if(document.getElementById('general_country').value == 'ALL' && cnt == 2)	
	{	countryAbbr = 'all'; 	}
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return false;
	}
	var url="common/ajax/customer_search_getState.php?abbreviation="+countryAbbr+"&cnt="+cnt+"&list_limit="+list_limit+"&page_item="+page_item+"&search_type=general";
	//alert(url);
	
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{
			//alert(xmlHttp.responseText);			
			if(cnt == 2)
				//document.getElementById('general_state').innerHTML=xmlHttp.responseText;
				document.getElementById('statediv2').innerHTML=xmlHttp.responseText;		
		}
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;	
}
<!-- End the function to display the State on the selection of Country -->



/*
//function to bind states according to the selected country
function getState(countryId,cnt)
{
   var strURL="common/ajax/findstate.php?country="+countryId+"&cnt="+cnt;
   var req = GetXmlHttpObject();
   if (req)
   {
     req.onreadystatechange = function()

     {
      if (req.readyState == 4)
      {
	 // only if "OK"
	 if (req.status == 200)
         {
			 if(cnt==1)
			 {
	    document.getElementById('statediv1').innerHTML=req.responseText;
			 }
			 else if(cnt==2)
			 {
				 document.getElementById('statediv2').innerHTML=req.responseText;
			 }
			 else
			 {
				 document.getElementById('statediv3').innerHTML=req.responseText;
			 }
	 } else {
   	   alert("There was a problem while using XMLHTTP:\n" + req.statusText);
	 }
       }
      }
   req.open("GET", strURL, true);
   req.send(null);
   }
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
*/
//get big client list
function getClient()
{/*
	var list_limit = document.getElementById('list_limit').value;
	//var page_no = document.getElementById('page_no').value;
	var page_item = document.getElementById('page_item').value;
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return false;
	}
	var url="common/ajax/customer_search_getClient.php?list_limit="+list_limit+"&page_item="+page_item;
	alert(url);
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{
			alert(xmlHttp.responseText);
			document.getElementById('clientlistdiv').innerHTML=xmlHttp.responseText;	
		}
	}
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return false;
*/
	
	<?php 
	/*
	$sel_box_client = "<select name='client' id='client' style='width:180px' class='select_data' onfocus='getClient()' >";
	$var_client = mysql_query("select * from v_customer_master ");
	while($row_client = mysql_fetch_array($var_client))
	{
		$sel_box_client .= "<option value=".$row_client['cus_master_id'].">".$row_client['company_name']."</option>";
	}
	$sel_box_client .= "</select>";
	echo $sel_box_client;
	*/
	?>
	//alert('<?php //echo 'hi'; ?>');
}


///////////////////////////////////////////////////////////////////////////
<!-- Start the Function to create the XML HTTP object ("XmlHttpObject") -->
///////////////////////////////////////////////////////////////////////////

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
<!-- End the Function to create the XML HTTP object ("XmlHttpObject") -->

</script>


</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><?php
			include("common/header.php");
		?>
          </td>
        </tr>
        <tr>
          <td align="left" valign="top" style="background: #568EC5;"><?php
			include("common/top_menu.php");
		?>
          </td>
        </tr> 
        <tr>
          <td align="center">
		    <table width="95%" border="0" cellspacing="0" cellpadding="0">
		      <tr>
                <td style="padding-top:5px;padding-left:0px;padding-bottom:0px" class="top_td"><b>Customer >> Search</b></td>
                <td align="right" style="padding-top:5px;padding-right:0px"><INPUT TYPE="image" SRC="images/customer_back.png" HEIGHT="20" WIDTH="20" BORDER="0" ALT="Back" title="Back" onClick="javascript:history.go(-1);return false;">
                </td>
              </tr>
			  <tr>
			    <td colspan="2" align="center" class="msg" style="padding-right:100px"><?php
				 if($result=='delete')
				 {
					echo "Record hasbeen successfully deleted";
				 }
				 elseif($result=='delete_all')
				 {
					echo "All Records hasbeen deleted";
				 }
				 elseif($result=='edit')
				 {
					echo "Record hasbeen successfully updated";
				 }
				 elseif($result=='edit_all')
				 {
					echo "All Records hasbeen updated";
				 }
				 else
				 {
					echo "&nbsp;";
				 }
			  ?>
			    </td>
			  </tr>
              <tr>
                <td colspan="2" align="center" valign="top"><table width="100%" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #DCD8BA">
                    <tr bgcolor="#eb061d" onClick="opendiv(1);">
                      <td class="table_head" colspan="4" align="left" style="padding-left:5px" onMouseOver="this.style.background='#FA4355';" onMouseOut="this.style.background='#eb061d'">Direct Search</td>
                    </tr>
                    <tr>
                      <td><form id="frm_direct_search" name="frm_direct_search" method="post" action="#">
                          <!--<div id="dir_search" style="display:block;">-->
                            <table width="100%" cellpadding="6" cellspacing="2" style="border-right:1px solid #DCD8BA">
                              <tr>
                                <td style="border-right:1px solid #DCD8BA" colspan="3" align="center" valign="middle" height="12px">
								</td>
                              </tr>
                              <tr>
                                <td colspan="3" align="center" valign="middle" style="border-right:1px solid #DCD8BA">
								  <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td class="td" width="35%" align="left" style="padding-left:10px;"> Search Data:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="search_data" id="search_data" value="" onKeyUp="return func_search_data(this.value);" style="height:17px; width:180px;" /> </td>
                                      <td class="td" width="9%" align="left" valign="top" >Country:</td><td width="29%" align="left" valign="top">
                                        <select name="direct_country" id="direct_country" style="width:180px" onChange="getState1(this.value,1)">
                                          <?php
											$var_country=mysql_query("select * from v_country order by country");
											while($row_country=mysql_fetch_array($var_country))
											{
										   ?>
												  <option value="<?php echo $row_country['abbreviation'];?>" <?php if( $row_country['abbreviation'] == 'ALL'){ echo "selected"; } ?>><?php echo $row_country['country'];?></option>
												  <?php
											}
										   ?>
                                        </select>
                                      </td>
                                      <td class="td" width="5%" align="left" valign="top" >State:</td>
									  <td width="22%" align="left" valign="top">
                                        <div id="statediv1">
                                          <select name="direct_state" id="direct_state" style="width:180px">
									  		<option value="all">All States</option>
										  	  <?php 
											   $var_state = mysql_query("select * from v_state order by state");
											   while($row_state = mysql_fetch_array($var_state))
											   {
											   ?>
											    <option value="<?php echo $row_state['id'];?>"> <?php echo $row_state['state'];?> </option>
											   <?php
											   }
											  ?>
										  </select>
										</div>
                                      </td>
                                    </tr>
									<tr>
                                      <td colspan="7" class="td" align="left" style="padding-left:10px"> Search Assist :&nbsp;&nbsp;<input name="assist" id="assist" type="radio" value="1" checked />On
									  &nbsp;<input name="assist" id="assist" type="radio" value="0" />Off
									  </td>
                                    </tr>	
									<tr height="10px"></tr>								
									<tr>
                                      <td colspan="4" height="1px" align="left" bgcolor="#DCD8BA"></td>
                                    </tr>										
									<!-- starts -->
                                    <tr>
                                      <td colspan="3" style="padding-left:10px">
									  <!--


<div style="display: none; position: absolute; top: 241px; left: 146.35px; width: 202px;" 

class="acResults"><ul><li class="acFirst">Black Grouse</li><li class="">Black-crowned Night Heron</li><li 

class="">Black-necked Grebe</li><li class="jquery-autocomplete-selected-item acSelect">Common Crane</li><li 

class="">Corncrake</li><li class="">Great Bittern</li><li class="">Grey Partridge</li><li class="">Hen 

Harrier</li><li class="">Montagu`s Harrier</li><li class="">Red-crested Pochard</li><li class="acLast">Spotted 

Crake</li></ul></div>
-->
<div id="searchedResults" align="left" style="display: none; border:1px solid #261AC6; position: absolute; top: 233px; width: 95%;z-index:100;" class="acResults">
&nbsp;
</div>


									  </td>
                                    </tr>
									<!-- ends -->
                                  </table></td>
                              </tr>
                              <tr>
                                <td align="right" class="td" id="search_result" ><!--
								  <textarea rows="0" cols="20" style="border:none" onclick="">
								  </textarea>-->
								</td>
								<td colspan="2" style="border-right:1px solid #DCD8BA">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="358" class="td" align="left" style="padding-left:5px;"><input type="radio" name="dir_search" value="All" />
                                All</td>
                                <td width="211" class="td" align="left"><input type="radio" name="dir_search" id="dir_search" value="by Name" />
                                by Name</td>
                                <td width="308" class="td" align="left" style="border-right:1px solid #DCD8BA"><input type="radio" name="dir_search" id="dir_search" value="by Telephone, Fax or Mobile" />
                                By Telephone, Fax or Mobile</td>
                              </tr>
                              <tr>
                                <td width="358" class="td" align="left" style="padding-left:5px;"><input type="radio" id="dir_search" name="dir_search" value="by Customer #" />
                                by Customer #</td>
                                <td width="211" class="td" align="left"><input type="radio" id="dir_search" name="dir_search" value="by Last Name" />
                                by Last Name</td>
                                <td class="td" align="left" colspan="2"><table width="100%" border="0" cellspacing="2" cellpadding="2" >
                                    <tr>
                                      <td width="25%" class="td" align="left"><input type="radio" id="dir_search" name="dir_search" value="by_date" />
                                      by Date </td>
                                      <td width="75%" align="left"><div class="wrapper1">
                                          <div id="widget">
                                            <div id="widgetField_single"> <span>
                                             <?php
												$now9 = Date('d/m/Y');
												echo $now9;
									  		 ?>
                                              </span> <a href="#">Select date range</a> </div>
                                            <div id="widgetCalendar_single"> </div>
                                          </div>
                                        </div>
										<font class="display_td">&nbsp;(dd/mm/yyyy)</font>                                        
                                        <input type="hidden" id="date_val" name="date_val" value="" />
                                      </td>
									</tr>
								</table>								
                                      
                              </tr>
                              <tr>
                                <td width="358" class="td" align="left" style="padding-left:5px;"><input type="radio" name="dir_search" value="by Business Type" />
                                by Business Type</td>
                                <td width="211" class="td" align="left"><input type="radio" id="dir_search" name="dir_search" value="by Email" />
                                by Email</td>
                                <td width="308" class="td" align="left" style="border-right:1px solid #DCD8BA"><input type="radio" id="dir_search" name="dir_search" value="by Website" />
                                by Website</td>
                              </tr>
							  <tr height="30" >
                                <td colspan="2" width="569" class="td" align="left" style="padding-left:5px;"><input type="radio" name="dir_search" value="by Quote Range" />
                                by Quote Range - From&nbsp;<input type="text" id="dir_quote_range_from" name="dir_quote_range_from" value="" />&nbsp;To&nbsp;<input type="text" id="dir_quote_range_to" name="dir_quote_range_to" value="" />
                                </td>
                                <td width="308" class="td" align="left" style="border-right:1px solid #DCD8BA"><input type="radio" id="dir_search" name="dir_search" value="by Tax ID" />
                                by Tax ID</td>
                              </tr>
                              <tr>
                                <td class="td" align="left" style="padding-bottom:10px;padding-left:5px;border-bottom:2px solid #DCD8BA;"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                      <td width="30%" class="td" align="left"><input type="radio" id="dir_search" name="dir_search" value="by Time Range From" />
                                      by Time Range </td>
                                      <td width="70%" align="left" ><div class="wrapper">
                                          <div id="widget">
                                            <div id="widgetField"> <span>
                                              <?php
												$date = Date('d M,Y');
												
												$now3 = strtotime ( '-4 day' , strtotime ( $date ) ) ;
												$now3 = date ( 'd/m/Y' , $now3 );
												$now4 = Date('d/m/Y');
												echo $now3." - ".$now4;
									  		 ?>
                                              </span> <a href="#">Select date range</a> </div>
                                            <div id="widgetCalendar"> </div>
                                          </div>
										 </div>
                                        <font class="display_td">&nbsp;(dd/mm/yyyy)</font>
                                        <input type="hidden" id="gen_date_val" name="gen_date_val" value="" />
										<input type="hidden" id="branch_date_val" name="branch_date_val" value="" />
                                      </td>
									</tr>
								</table>	</td>
								<td width="211" class="td" style="border-bottom:2px solid #DCD8BA;" align="left"></td>							
                                      <td width="308" align="right" valign="middle" style="padding-right:5px;padding-bottom:5px;border-right:1px solid #DCD8BA;border-bottom:2px solid #DCD8BA;"><INPUT TYPE="image" SRC="images/searchicon.png" HEIGHT="20" WIDTH="20" BORDER="0" ALT="Search" title="Search" value="Search" name="search1"></td> 
                              </tr>
                            </table>
                          <!--</div>-->
                        </form></td>
                    </tr>
                    <tr bgcolor="#eb061d" onClick="opendiv(2);">
                      <td class="table_head" colspan="3" align="left" style="padding-left:5px" onMouseOver="this.style.background='#FA4355';" onMouseOut="this.style.background='#eb061d'">General Search</td>
                    </tr>
                    <tr>
                      <td><form name="frm_general_search" action="#" id="frm_general_search" method="post">
                          <!--<div id="gen_search" style="display:none">-->
                            <table width="100%" cellpadding="6" cellspacing="2" style="border-right:1px solid #DCD8BA">
                              <tr>
                                <td colspan="3" align="right" class="td" height="12px"></td>
                              </tr>							  
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Country</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
								 <select name="general_country" id="general_country" style="width:180px" class="select_data" onChange="getState2(this.value,2)">
								   <?php
									  $var_country=mysql_query("select * from v_country order by country");
									  while($row_country=mysql_fetch_array($var_country))
									  {
									  ?>
										<option value="<?php echo $row_country['abbreviation'];?>" <?php if( $row_country['abbreviation'] == 'ALL'){ echo "selected"; } ?> ><?php echo $row_country['country'];?></option>
									 <?php
									  }
									?>
                                  </select>
								</td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">State</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
								  <div id="statediv2">
                                    <select name="general_state" id="general_state" style="width:180px">
									  <option value="all">All States</option>
									   <?php 
									    $var_state = mysql_query("select * from v_state order by state");
									    while($row_state = mysql_fetch_array($var_state))
									    {
									    ?>
										 <option value="<?php echo $row_state['id'];?>"> <?php echo $row_state['state'];?> </option>
									    <?php
									    }
									    ?>
									</select>
								  </div>
								</td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Language</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px"><select name="language" style="width:180px" class="select_data" >
								<option value="all">All Languages</option>
                         <?php
						  $var_language=mysql_query("select * from v_language order by language");
						  while($row_language=mysql_fetch_array($var_language))
						  {
						 ?>
                                    <option value="<?php echo $row_language['id'];?>"><?php echo $row_language['language'];?></option>
                                    <?php
						  }
						 ?>
                                  </select>                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Job Title</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
                                  <select name="job_title" style="width:180px" class="select_data" >
                                    <option value="all">All Job Titles</option>
                                    <?php
						  $var_job_title=mysql_query("select distinct(title_name) from v_job_title_master order by title_name");
						  while($row_job_title=mysql_fetch_array($var_job_title))
						  {
						 ?>
                            <option value="<?php echo $row_job_title['title_name'];?>"><?php echo $row_job_title['title_name'];?></option>
                          <?php
						  }
						 ?>
                                  </select>
                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Customer Status</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
								 <select name="customer_status" id="customer_status" style="width:180px" class="select_data" >
								 <option value="all">All Customer Status</option>
                             <?php /*
							  $var_job_title=mysql_query("select * from v_job_title_master order by title_name");
							  while($row_job_title=mysql_fetch_array($var_job_title))
							  {*/
							 ?>
                                    <option value="Only Seeing">Only Seeing</option>
                                    <option value="Registering and Seeing">Registering and Seeing</option>
                                    <option value="Regstering and Purchasing">Regstering and Purchasing</option>
                                    <?php
						    // }
						    ?>
                                  </select>                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Media Type</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
								 <select name="media_type" id="media_type" style="width:180px" class="select_data" >
									<option value="all">All Media Types</option>
								   <?php
									$var_media=mysql_query("select distinct name from v_mediatype_master where language='English' order by name asc");
									while($row_media=mysql_fetch_array($var_media))
									{
								   ?>
									 <option value="<?php echo $row_media['name'];?>"><?php echo $row_media['name'];?></option>
									<?php
									}
								   ?>
                                  </select>                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Business Type</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px"><select name="business_type" style="width:180px" class="select_data" >
									<option value="all">All Business Types</option>
                               <?php
								$var_account=mysql_query("select distinct title_name from v_business_activity_master where language='English' order by title_name asc");
								while($row_account=mysql_fetch_array($var_account))
								{
							   ?>
                                    <option value="<?php echo $row_account['title_name'];?>"><?php echo $row_account['title_name'];?></option>
                                    <?php
								}
						    	?>
                                  </select>                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Business Employees</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
								 <select name="business_employees" id="business_employees" style="width:180px" class="select_data" >
									<option value="all">All Business Employees</option>
									<?php
									$var_number_emp=mysql_query("select distinct size_name from v_business_size_master where language='English'");
									while($row_number_emp=mysql_fetch_array($var_number_emp))
									{
								   ?>
								<option value="<?php echo $row_number_emp['size_name'];?>"><?php echo $row_number_emp['size_name'];?></option>
									<?php
									}
									?>
                                  </select>                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Account Type</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
								<?php
								$acc_type='';
								$var_acc_type=mysql_query("select * from v_customer_account_type_master where language=1");
								$i=0;
								while($row_acc_type=mysql_fetch_array($var_acc_type))
								{
									$ex=explode(',',$row_acc_type['client_type']);
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
									}		
								}	
								$ex_acc_type=explode(',',$acc_type);														
								$acc_count=count($ex_acc_type);
								?>
								 <select name="account_type" id="account_type" style="width:180px" class="select_data" >
									<option value="all">All Account Types</option>
								   <?php
									for($x=0;$x<$acc_count;$x++)
									{
									?>
										<option value="<?php echo $ex_acc_type[$x];?>"><?php echo $ex_acc_type[$x];?></option>	
									<?php
									}                                    
									?>
                                  </select>                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Tax Zone</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
								 <select name="tax_zone" id="tax_zone" style="width:180px" class="select_data" >
									<option value="all">All Tax Zones</option>
								   <?php
									$var_tax=mysql_query("select taxzone from v_taxzone order by taxzone asc");
									while($row_tax=mysql_fetch_array($var_tax))
									{
								   ?>
										<option value="<?php echo $row_tax['taxzone'];?>"><?php echo $row_tax['taxzone'];?></option>
								   <?php
									}
								   ?>
                                  </select>                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Discount</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
								 <select name="discount" id="discount" style="width:180px" class="select_data" >
									<option value="all">All Discounts</option>
									 <?php 
									  $var_dis=mysql_query("select distinct discount from v_discount_master ");
									  while($row_dis=mysql_fetch_array($var_dis))
									  {
									 ?>
									<option value="<?php echo $row_dis['discount'];?>"><?php echo $row_dis['discount'];?></option>
									<?php
									  }
									?>
                                  </select>                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Currency</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
								  <select name="currency" id="currency" style="width:180px" class="select_data" >
									<option value="all">All Currencies</option>
									<?php 
									$var_currency=mysql_query("select * from v_currency order by currency");
									while($row_currency=mysql_fetch_array($var_currency))
									{ 
								    ?>
										<option value="<?php echo $row_currency['id'];?>"><?php echo $row_currency['currency'];?></option>                                    
									<?php
								    }
								   ?>
                                  </select>                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" style="border-bottom:2px solid #DCD8BA;padding-bottom:10px" align="right">Time Range</td>
                                <td width="70%" class="td" style="border-bottom:2px solid #DCD8BA;padding-left:5px;padding-bottom:10px" align="left" ><div class="wrapper">
                                    <div id="widget">
                                      <div id="widgetField_general"> <span>
                                        <?php
									$date = Date('d M,Y');
									
									$now5 = strtotime ( '-4 day' , strtotime ( $date ) ) ;
									$now5 = date ( 'd/m/Y' , $now5 );
									$now6 = Date('d/m/Y');
									echo $now5." - ".$now6;
							     ?>
                                        </span> <a href="#">Select date range</a> </div>
                                      <div id="widgetCalendar_general"> </div>
                                    </div>
                                  </div>
                                  <input type="hidden" id="gen_date_val" value="" /><font class="display_td" style="vertical-align:bottom"> &nbsp;(dd/mm/yyyy - dd/mm/yyyy)</font> </td>
                                <td width="10%" align="right" style="padding-right:5px;padding-bottom:2px; border-bottom:2px solid #DCD8BA"><INPUT TYPE="image" SRC="images/searchicon.png" HEIGHT="20" WIDTH="20" BORDER="0" ALT="Search" title="Search" value="Search" name="search2"></td>
                              </tr>
                            </table>
                         <!-- </div>-->
                        </form></td>
                    </tr>
                    <tr bgcolor="#eb061d" onClick="opendiv(3);">
                      <td align="left" colspan="3" class="table_head" style="padding-left:5px" onMouseOver="this.style.background='#FA4355';" onMouseOut="this.style.background='#eb061d'">Branch Search</td>
                    </tr>
                    <tr>
                      <td><form name="frm_branch_search" action="#" id="frm_branch_search" method="post">
                          <!--<div id="branch_search" style="display:none">-->
                            <table width="100%" cellpadding="6" cellspacing="2"  style="border-right:1px solid #DCD8BA">
                              <tr>
                                <td colspan="3" align="right" class="td" height="12px"></td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Master Distributor</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
								  <select name="master_distributor" style="width:180px" class="select_data" >
									<option value="all">All Master Distributors</option>
									 <?php
									  $var_master_dist=mysql_query("select distinct(assigned_to_master_dist) from v_customer_master order by assigned_to_master_dist");
									  while($row_master_dist=mysql_fetch_array($var_master_dist))
									  {
									 ?>
										<option value="<?php echo $row_master_dist['assigned_to_master_dist'];?>"><?php echo $row_master_dist['assigned_to_master_dist'];?></option>
									 <?php
									  }
									 ?>
                                  </select>
                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Distributor</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px"><select name="distributor" style="width:180px" class="select_data" >
									<option value="all">All Distributors</option>
                             <?php
							  $var_distributor=mysql_query("select distinct(assigned_to_dist) from v_customer_master order by assigned_to_dist");
							  while($row_distributor=mysql_fetch_array($var_distributor))
							  {
							 ?>
                                    <option value="<?php echo $row_distributor['assigned_to_dist'];?>"><?php echo $row_distributor['assigned_to_dist'];?></option>
                                    <?php
							  }
						    ?>
                                  </select>
                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Agent</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px"><select name="agent" style="width:180px" class="select_data" >
									<option value="all">All Agents</option>
                             <?php
							  $var_agent=mysql_query("select distinct(assigned_to_agent) from v_customer_master order by assigned_to_agent");
							  while($row_agent=mysql_fetch_array($var_agent))
							  {
							 ?>
                                    <option value="<?php echo $row_agent['assigned_to_agent'];?>"><?php echo $row_agent['assigned_to_agent'];?></option>
                             <?php
							  }
						    ?>
                                  </select>
                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
							  <tr height="26px">
                                <td width="20%" class="td" align="right">Engineers</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
								  <select name="engineers" style="width:180px" class="select_data" >
									<option value="all">All Engineers</option>
                             <?php
							  $var_agent=mysql_query("select distinct(assigned_to_agent) from v_customer_master order by assigned_to_agent");
							  while($row_agent=mysql_fetch_array($var_agent))
							  {
							 ?>
                                    <option value="<?php echo $row_agent['assigned_to_agent'];?>"><?php echo $row_agent['assigned_to_agent'];?></option>
                             <?php
							  }
						    ?>
                                  </select>
                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right">Client</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">
                                <div id="clientlistdiv">
                                <select name="client" id="client" style="width:180px" class="select_data" onFocus="getClient()" >
									<option value="all">All Client</option>
									<?php
									$var_client = mysql_query("select distinct company_name from v_customer_master order by company_name");
									while($row_client = mysql_fetch_array($var_client))
									{
									?>
								 		<option value="<?php echo $row_client['company_name'];?>"><?php echo $row_client['company_name']; ?></option>
									<?php
									}
									?>
                                  </select>
                                </div>
                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
							  <tr height="26px">
                                <td width="20%" class="td" align="right">Quote Range</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px">From&nbsp;<input type="text" id="branch_quote_range_from" name="branch_quote_range_from" value="" />&nbsp;To&nbsp;<input type="text" id="branch_quote_range_to" name="branch_quote_range_to" value="" />
                                </td>
                                <td width="10%">&nbsp;</td>
                              </tr>
                              <tr height="26px">
                                <td width="20%" class="td" align="right" style="border-bottom:2px solid #DCD8BA;padding-bottom:10px">Time Range</td>
                                <td width="70%" class="td" align="left" style="padding-left:5px;border-bottom:2px solid #DCD8BA;padding-bottom:10px"><div class="wrapper">
                                    <div id="widget">
                                      <div id="widgetField_branch"> <span>
                                        <?php
											$date = Date('d M,Y');
											
											$now7 = strtotime ( '-4 day' , strtotime ( $date ) ) ;
											$now7 = date ( 'd/m/Y' , $now7 );
											$now8 = Date('d/m/Y');
											echo $now7." - ".$now8;
										 ?>
                                        </span> <a href="#">Select date range</a> </div>
                                      <div id="widgetCalendar_branch"> </div>
                                    </div>
                                  </div>
                                  <input type="hidden" id="branch_date_val" value="" /><font class="display_td" style="vertical-align:bottom"> &nbsp;(dd/mm/yyyy - dd/mm/yyyy)</font></td>
                                <td width="10%" align="right" style="padding-right:5px; padding-bottom:2px;border-bottom:2px solid #DCD8BA"><INPUT TYPE="image" SRC="images/searchicon.png" HEIGHT="20" WIDTH="20" BORDER="0" ALT="Search" title="Search" value="Search" name="search3"></td>
                              </tr>
                            </table>
                         <!-- </div>-->
                        </form></td>
                    </tr>
                    <tr bgcolor="#eb061d" onClick="opendiv(4);">
                      <td colspan="3" align="left" class="table_head" style="padding-left:5px" onMouseOver="this.style.background='#FA4355';" onMouseOut="this.style.background='#eb061d'">Report Criteria</td>
                    </tr>
                    <tr>
                      <td><form name="frm_report_criteria" action="pdf/pdf_customer_data.php" target="_blank" id="frm_general_search" method="post">
                          <!--<div id="report" style="display:none">-->
                          <table width="100%" cellpadding="0" cellspacing="0"   style="border-right:1px solid #DCD8BA">
                              <tr>
                                <td colspan="3" align="left" valign="top" class="td" height="12px"></td>
                              </tr>
                              <tr>
                                <td align="left" width="30%" class="td" valign="top">
								  <table width="100%" align="left" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="right" width="59%" class="td">Customer Type</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									    <input type="radio" name="r_customer_type" id="r_customer_type" value="yes" checked="checked" /> yes
                                        <input type="radio" name="r_customer_type" id="r_customer_type" value="no" /> no
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Customer #</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									   <input type="radio" name="r_customer_number" id="r_customer_number" value="yes" checked="checked" /> yes
                                        <input type="radio" name="r_customer_number" id="r_customer_number" value="no" /> no 
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Registry Date</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									    <input type="radio" name="r_registry_date" id="r_registry_date" value="yes" checked="checked" /> yes
                                        <input type="radio" name="r_registry_date" id="r_registry_date" value="no" /> no 
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Master Distributor #</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									    <input type="radio" name="r_master_distributor_number" id="r_master_distributor_number" value="yes" checked="checked" /> yes
                                        <input type="radio" name="r_master_distributor_number" id="r_master_distributor_number" value="no" /> no
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Distributor #</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									    <input type="radio" name="r_distributor_number" id="r_distributor_number" value="yes" checked="checked" /> yes
                                        <input type="radio" name="r_distributor_number" id="r_distributor_number" value="no" /> no
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Agent #</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									    <input type="radio" name="r_agent_number" id="r_agent_number" value="yes" checked="checked" /> yes
                                        <input type="radio" name="r_agent_number" id="r_agent_number" value="no" /> no
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Final Client #</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									    <input type="radio" name="r_final_client_number" id="r_final_client_number" value="yes" checked="checked" /> yes
                                       <input type="radio" name="r_final_client_number" id="r_final_client_number" value="no"/> no
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Business</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									    <input type="radio" name="r_business" id="r_business" value="yes" checked="checked" /> yes
                                        <input type="radio" name="r_business" id="r_business" value="no" /> no
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Tax #</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									 <input type="radio" name="r_tax_number" id="r_tax_number" value="yes" checked="checked"/> yes
                                       <input type="radio" name="r_tax_number" id="r_tax_number" value="no" /> no
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Name</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									    <input type="radio" name="r_name" id="r_name" value="yes" checked="checked" /> yes
                                        <input type="radio" name="r_name" value="no" /> no
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Last Name</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									   <input type="radio" name="r_last_name" id="r_last_name" value="yes" checked="checked"/> yes
                                       <input type="radio" name="r_last_name" id="r_last_name" value="no" /> no
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Job Title</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td">
									   <input type="radio" name="r_job_title" id="r_job_title" value="yes" checked="checked"/> yes
                                        <input type="radio" name="r_job_title" id="r_job_title" value="no" /> no
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td" style="padding-bottom:10px">Date Of Birth</td>
                                      <td align="left" width="8%" class="td" style="padding-bottom:10px">&nbsp;</td>
                                      <td align="left" width="33%" class="td" style="padding-bottom:10px"><input type="radio" name="r_date_of_birth" id="r_date_of_birth" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_date_of_birth" id="r_date_of_birth" value="no" />
                                        no </td>
                                    </tr>
                                  </table></td>
                                <td class="td" width="33%" valign="top"><table width="100%" align="left" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="right" width="59%" class="td">Email</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_email" id="r_email" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_email" id="r_email" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Country</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_country" id="r_country" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_country" id="r_country" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">State</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_state" id="r_state" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_state" id="r_state" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">City</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_city" id="r_city" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_city" id="r_city" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Address1</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_address1" id="r_address1" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_address1" id="r_address1" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Address2</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_address2" id="r_address2" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_address2" id="r_address2" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Zip Code</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_zip_code" id="r_zip_code" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_zip_code" id="r_zip_code" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Area Code & Telephone1</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_area_telephone1" id="r_area_telephone1" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_area_telephone1" id="r_area_telephone1" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Area Code & Telephone2</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_area_telephone2" id="r_area_telephone2" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_area_telephone2" id="r_area_telephone2" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Mobile</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_mobile" id="r_mobile" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_mobile" id="r_mobile" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Fax</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_fax" id="r_fax" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_fax" id="r_fax" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td">Website</td>
                                      <td align="left" width="8%" class="td">&nbsp;</td>
                                      <td align="left" width="33%" class="td"><input type="radio" name="r_website" id="r_website" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_website" id="r_website" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="59%" class="td" style="padding-bottom:10px">Note</td>
                                      <td align="left" width="8%" class="td" style="padding-bottom:10px">&nbsp;</td>
                                      <td align="left" width="33%" class="td" style="padding-bottom:10px"><input type="radio" name="r_note" id="r_note" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_note" id="r_note" value="no" />
                                        no </td>
                                    </tr>
                                  </table></td>
                                <td width="48%" align="left" valign="top"><table width="100%" align="left" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="right" width="68%" class="td">How did you about VentDepot?</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td"><input type="radio" name="r_how_about_ventdepot" id="r_how_about_ventdepot" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_how_about_ventdepot" id="r_how_about_ventdepot" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="68%" class="td">Business or Activity Type</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td"><input type="radio" name="r_business_activity_type" id="r_business_activity_type" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_business_activity_type" id="r_business_activity_type" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="68%" class="td">Number of Employees</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td"><input type="radio" name="r_number_of_employees" id="r_number_of_employees" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_number_of_employees" id="r_number_of_employees" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="68%" class="td">Newsletter Mailing List</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td"><input type="radio" name="r_newsletter_mailing_list" id="r_newsletter_mailing_list" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_newsletter_mailing_list" id="r_newsletter_mailing_list" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="68%" class="td">Special Discounts Mailing List</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td"><input type="radio" name="r_sp_discounts_mailing_list" id="r_sp_discounts_mailing_list" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_sp_discounts_mailing_list" id="r_sp_discounts_mailing_list" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="68%" class="td">Account Type</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td"><input type="radio" name="r_account_type" id="r_account_type" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_account_type" id="r_account_type" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="68%" class="td">Tax Zone</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td"><input type="radio" name="r_tax_zone" id="r_tax_zone" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_tax_zone" id="r_tax_zone" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="68%" class="td">Discounts</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td"><input type="radio" name="r_discounts" id="r_discounts" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_discounts" id="r_discounts" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="68%" class="td">Currency</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td"><input type="radio" name="r_currency" id="r_currency" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_currency" id="r_currency" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="68%" class="td">Language</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td"><input type="radio" name="r_language" id="r_language" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_language" id="r_language" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="68%" class="td">Photograph</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td"><input type="radio" name="r_photograph" id="r_photograph" value="yes" checked="checked" />
                                        yes
                                        <input type="radio" name="r_photograph" id="r_photograph" value="no" />
                                        no </td>
                                    </tr>
                                    <tr>
                                      <td align="right" width="68%" class="td">Logo</td>
                                      <td align="left" width="5%" class="td">&nbsp;</td>
                                      <td align="left" width="27%" class="td">
									    <input type="radio" name="r_logo" id="r_logo" value="yes" checked="checked" /> yes
                                        <input type="radio" name="r_logo" id="r_logo" value="no" /> no
									  </td>
                                    </tr>
                                  </table></td>
                              </tr>
                              <tr >
                               <td colspan="3" align="right" style="padding-right:5px;padding-bottom:2px;">
						<!-- <a href="javascript:;" onclick="return func_generate_pdf();" class="button">Create PDF Report</a>-->
						 		 <a href="javascript:;" onclick="return func_generate_pdf();"> 
							<img src="images/pdf_report.png" border="0" width="25" height="25" title="Generate PDF Report" /></a>		 
								 <input type="hidden" name="list_limit_pdf" id="list_limit_pdf" value="" />
								 <input type="hidden" name="sql_query_pdf" id="sql_query_pdf" value="" />
							   </td>
                             </tr>
                            </table>
                          <!--</div>-->
                        </form>
					  </td>
                    </tr>
                  </table>
				</td>
              </tr>
            </table>
		  </td>
        </tr>
		
        <tr height="20px">
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center" valign="top">
		   <div id="page_contents">		    		 
             <form name="frm_list" id="frm_list" action="" method="post">
			  <table width="95%" align="center" cellpadding="0" cellspacing="0">
			   <tr>
				<td align="center" id="message" class="message" style="padding-bottom:5px;display:none"></td>
			   </tr>
			   <?php 
			   	if($_SESSION['msg'] !='')
				{
					echo "<div class='message' align='center' style='padding-bottom:5px;'>".$_SESSION['msg']."</div>";
					$_SESSION['msg']='';
				}
			   ?>		  
			   <tr>
			    <td align="left">
		<?php 	  
					  
		//-----------Start the Conditions and Queries For 1st Direct Search Only-------------------------------//			   
		if($search1=="Search")
	    {	
		 // ----------- Queries for Countries nd States ------
			$var_country1=mysql_query("select * from v_country where abbreviation='".$direct_country."'");
			$row_country1=mysql_fetch_array($var_country1);
			//echo $row_country1['country'];
			$var_state1=mysql_query("select * from v_state where id='".$direct_state."'");
			$row_state1=mysql_fetch_array($var_state1);
			//echo "select * from v_language where id='".$language."'";
			$var_language1=mysql_query("select * from v_language where id='".$language."'");
			$row_language1=mysql_fetch_array($var_language1);
			
			$sql1 = '';
		
		//---- Condition For Country -----
			if($direct_country=='ALL')
			{
				$sql1=$sql1;
			}
			else
			{
				$sql1=$sql1." country='".$row_country1['country']."'";
			}
		//---- Condition For State -----
			if($direct_state=='all')
			{
				$sql1=$sql1;
			}
			else
			{
				if($sql1=='')
				{	
					$sql1=$sql1." state='".$row_state1['state']."'";
				}
				else
				{
					$sql1=$sql1." and state='".$row_state1['state']."'";
				}
			}
	  
		 $exp_rad=explode(' ', $dir_search);
		 $count=count($exp_rad);
		 
		 if($dir_search=="All")
		 {	
		 	//----------------
			if($sql1=='')
			{			
				$sql1 = $sql1." (name LIKE '%".$search_data."%' or phone1 LIKE '%".$search_data."%' or phone2 LIKE '%".$search_data."%' or fax LIKE '%".$search_data."%' or mobile LIKE '%".$search_data."%' or no_of_emp LIKE '%".$search_data."%' or last_name LIKE '%".$search_data."%' or cus_type LIKE '%".$search_data."%' or email LIKE '%".$search_data."%' or tax LIKE '%".$search_data."%')";
			}
			else
			{
				$sql1 = $sql1." and (name LIKE '%".$search_data."%' or phone1 LIKE '%".$search_data."%' or phone2 LIKE '%".$search_data."%' or fax LIKE '%".$search_data."%' or mobile LIKE '%".$search_data."%' or no_of_emp LIKE '%".$search_data."%' or last_name LIKE '%".$search_data."%' or cus_type LIKE '%".$search_data."%' or email LIKE '%".$search_data."%' or tax LIKE '%".$search_data."%') ";
			}
		 }
		
		 if($count==2)
		 {			 	
			$var=strtolower($exp_rad[1]); 
			
			//----------------
			if($sql1=='')
			{
				$sql1 = $sql1." $var LIKE '%".$search_data."%' ";								
			}
			else
			{
				$sql1 = $sql1." and $var LIKE '%".$search_data."%' ";								
			}
		 }
		 if($count==3)
		 {			 	
			$str_lower1=strtolower($exp_rad[1]); 
			$str_lower2=strtolower($exp_rad[2]);		
			$var=$str_lower1.'_'.$str_lower2;
			
			if($str_lower1.'_'.$str_lower2=='customer_#')
			{
				$var="no_of_emp";
			}
			if($var == 'tax_id')
			{
				$var="tax";
			}
			
			//----------------
			if($sql1=='')
			{
				$sql1 = sql1." $var LIKE '%".$search_data."%' ";				
			}
			else
			{
				$sql1 = sql1." and $var LIKE '%".$search_data."%' ";				
			}
		 }
		 
		 if($count==5)
		 {
			$str_lower1=strtolower($exp_rad[1]).","; 
			$var1='phone1';
			$var2='phone2';
			$var3=strtolower($exp_rad[2]);	
			$var4=strtolower($exp_rad[4]);	
			
			//----------------
			if($sql1=='')
			{
				$sql1 = sql1." $var1 LIKE '%".$search_data."%' or $var2 LIKE '%".$search_data."%' or $var3 LIKE '%".$search_data."%' or $var4 LIKE '%".$search_data."%' ";
			}
			else
			{
				$sql1 = sql1." and ($var1 LIKE '%".$search_data."%' or $var2 LIKE '%".$search_data."%' or $var3 LIKE '%".$search_data."%' or $var4 LIKE '%".$search_data."%') ";
			}
		 }
		}
			
			
	//-------------- End of Conditions and Queries For 1st Search (Direct Search) Only ----------------------------------//
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	//-------------- Start of Conditions and Queries For 2nd Search (General Search) Only -------------------------------//			
			 
			
	if($search2=="Search")
	{
	 //--------- Queries for The Countries and States
		$var_country1=mysql_query("select * from v_country where abbreviation='".$general_country."'");
		$row_country1=mysql_fetch_array($var_country1);
		//echo $row_country1['country'];
		$var_state1=mysql_query("select * from v_state where id='".$general_state."'");
		$row_state1=mysql_fetch_array($var_state1);
	
		$sql1="";
	//---- Condition For Country -----
		if($general_country=='ALL')
		{
			$sql1=$sql1;
		}
		else
		{
			$sql1=$sql1." country='".$row_country1['country']."'";
		}
	//---- Condition For State -----
		if($general_state=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." state='".$row_state1['state']."'";
			}
			else
			{
				$sql1=$sql1." and state='".$row_state1['state']."'";
			}
			
		}
	//---- Condition For Language -----
		if($language=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1.' language='.$language;
			}
			else
			{
				$sql1=$sql1.' and language='.$language;
			}
			
		}
	//---- Condition For Job Title -----
		if($job_title=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." job_title='".$job_title."'";
			}
			else
			{
				$sql1=$sql1." job_title='".$job_title."'";
			}
			
		}
		
	//---- Condition For Customer Status -----
		if($customer_status=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." customer_status='".$customer_status."'";
			}
			else
			{
				$sql1=$sql1." customer_status='".$customer_status."'";
			}
			
		}
	//---- Condition For Media Type -----
		if($media_type=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." hear_about='".$media_type."'";
			}
			else
			{
				$sql1=$sql1." and hear_about='".$media_type."'";
			}
			
		}
	//---- Condition For Business Type -----
		if($business_type=='all')
		{
			$sql1=$sql1;
		}
		else
		{	
			if($sql1=='')
			{	
				$sql1=$sql1." business_type='".$business_type."'";
			}
			else
			{
				$sql1=$sql1." and business_type='".$business_type."'";
			}
			
		}
	//---- Condition For Number of Business Employees -----
		if($business_employees=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($business_employees == '501 or more')
			{
				$ex = explode(' ',$business_employees);
				if($sql1=='')
				{	
					$sql1=$sql1." no_of_emp > 500 ";
				}
				else
				{
					$sql1=$sql1." and no_of_emp > 500 ";
				}
			}
			else
			{
				$ex_no_emp = explode('-',$business_employees);
				//$var_no_emp = mysql_query("select no_of_emp")
				if($sql1=='')
				{	
					$sql1=$sql1." no_of_emp between ".$ex_no_emp[0]." and ".$ex_no_emp[1]." ";
				}
				else
				{
					$sql1=$sql1." and no_of_emp between ".$ex_no_emp[0]." and ".$ex_no_emp[1]." ";
				}
			}
		}
	//---- Condition For Account Type -----
		if($account_type=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." activity_type='".$account_type."'";
			}
			else
			{
				$sql1=$sql1." and activity_type='".$account_type."'";
			}
			
		}
	//---- Condition For Tax Zone -----
		if($tax_zone=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." tax_zone='".$tax_zone."'";
			}
			else
			{
				$sql1=$sql1." and tax_zone='".$tax_zone."'";
			}
			
		}
	//---- Condition For Discounts -----
		if($discount=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." discount='".$discount."'";
			}
			else
			{
				$sql1=$sql1." and discount='".$discount."'";
			}
			
		}
	//---- Condition For Currency -----			
		if($currency=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." currency='".$currency."'";
			}
			else
			{
				$sql1=$sql1." and currency='".$currency."'";
			}
			
		}
	}
						
		
	//------------------------End Conditions and Queries For 2nd Search (General Search) Only----------------------------------//
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	//-------------------------Conditions and Queries For 3rd Search (Branch Search) Only--------------------------------------//
	if($search3=="Search")
	{
		$sql1 = '';
		
		//---- Condition For Master Distributor -----			
		if($master_distributor=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." assigned_to_master_dist ='".$master_distributor."'";
			}
			else
			{
				$sql1=$sql1." and assigned_to_master_dist='".$master_distributor."'";
			}
			
		}
		
		//---- Condition For Distributor -----			
		if($distributor=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." assigned_to_dist ='".$distributor."'";
			}
			else
			{
				$sql1=$sql1." and assigned_to_dist='".$distributor."'";
			}
			
		}
		
		//---- Condition For Agent -----			
		if($agent=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." assigned_to_agent ='".$agent."'";
			}
			else
			{
				$sql1=$sql1." and assigned_to_agent='".$agent."'";
			}
			
		}
		
		//---- Condition For Engineers -----			
		if($engineers=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." assigned_to_engineering ='".$engineers."'";
			}
			else
			{
				$sql1=$sql1." and assigned_to_engineering='".$engineers."'";
			}
			
		}
		
		//---- Condition For Client -----			
		if($client=='all')
		{
			$sql1=$sql1;
		}
		else
		{
			if($sql1=='')
			{	
				$sql1=$sql1." company_name ='".$client."'";
			}
			else
			{
				$sql1=$sql1." and company_name='".$client."'";
			}
			
		}			
	}
	//-------------------------End Conditions and Queries For 3rd Search (Branch Search) Only----------------------------------
	
	
	//------ Complete Query after Conditions for General Search ---------
		if($sql1=='')
		{
			$sql="select * from v_customer_master";
		}
		else
		{
			$sql="select * from v_customer_master where $sql1";
		}	
		
		//////////////////////////////////////////////////////////////////////////////////////////
		// ---------------------------- Code for New Pagination --------------------------------//
		//////////////////////////////////////////////////////////////////////////////////////////
		
		$sql_query = $sql;
		
		$var_sql = mysql_query($sql);
		$num_sql = mysql_num_rows($var_sql);
		if($num_sql ==0)
		{
			 echo "<div class='msg' align='center'>No Record Found</div>"."</td></tr>";
		}
		else
		{
			$query = $sql;
			$result = mysql_query($query) or die(mysql_error());
			$num_rows = mysql_fetch_row($result);
			if($list_limit == '')
				$listpage="customer_search_list.php";
			else
				$listpage="customer_search_list.php?list_limit=".$list_limit;
					$pages = new Paginator;
			$pages->items_total_rec = mysql_num_rows($result);
			$pages->items_total = $num_rows[0];
			$pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
			$pages->paginate($listpage);
			
			echo $pages->display_pages();
			echo "<span class=\"\">".$pages->display_jump_menu($listpage).$pages->display_items_per_page($listpage)."</span>";
			if($list_limit == '')
				$sql = mysql_query($sql."$pages->limit");
			else
				$sql = mysql_query($sql.$list_limit);
			$num = mysql_num_rows($sql);;		
		?>	
			<input type="hidden" name="list_limit" id="list_limit" value="<?php echo  $pages->limit;?>" />
			<input type="hidden" name="sql_query" id="sql_query" value="<?php echo $sql_query;?>" />
		   </td>
		  </tr>
		   
			<tr>
			  <td align="center" id="sorted_table">
				<table border="0" cellpadding="1" cellspacing="1" width="100%" class="table_center" style="border:1px solid #DCD8BA">
				  <tr bgcolor="#eb061d" height="86px">
					<td align="center" width="4%" class="table_head" style="border-right:1px solid #DCD8BA;padding-bottom:10px;padding-top:10px;border-bottom:1px solid #DCD8BA"><input type="checkbox" name="chk_select_all" id="chk_select_all" onClick="return func_select_all_checkbox('<?php echo $num;?>');" /></td>
					<td align="left" width="24%" class="table_head" style="border-right:1px solid #DCD8BA;padding-bottom:10px;padding-top:10px; padding-left:10px; border-bottom:1px solid #DCD8BA"><input name="chk1" id="chk1" type="checkbox" value="1" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_1');" /><img src="images/up_arrow.gif" border="0" onClick="func_sort('client_up','<?php echo $dir_search;?>','<?php echo $search_data;?>')" /> <img src="images/down_arrow.gif" border="0" onClick="func_sort('client_down')" />
					  Client #:<br />
					  <input name="chk2" id="chk2" type="checkbox" value="2" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_2');" />
					  Business:<br />
					  <input name="chk3" id="chk3" type="checkbox" value="3" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_3');"/>
					  Name:<br />
					  <input name="chk4" id="chk4" type="checkbox" value="4" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_4');"/>
					  Country, State:<br />
					  <input name="chk5" id="chk5" type="checkbox" value="5" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_5');"/>
					  Tax Id:</td>
					<td align="left" width="23%" bgcolor="#eb061d" class="table_head" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA"><input name="chk6" id="chk6" type="checkbox" value="6" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_6');"/>
					  Telephone 1:<br />
					  <input name="chk7" id="chk7" type="checkbox" value="7" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_7');"/>
					  Telephone 2:<br />
					  <input name="chk8" id="chk8" type="checkbox" value="8" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_8');"/>
					  Fax:<br />
					  <input name="chk9" id="chk9" type="checkbox" value="9" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_9');"/>
					  Email:<br />
					  <input name="chk10" id="chk10" type="checkbox" value="10" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_10');"/>
					  Account Type:</td>
					<td align="left" width="18%" class="table_head" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA"><input name="chk11" id="chk11" type="checkbox" value="11" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_11');"/><img src="images/up_arrow.gif" border="0" onClick="func_sort('registry_up')" /> <img src="images/down_arrow.gif" border="0" onClick="func_sort('registry_down',)" />
					  Registry Date:<br />
					  <input name="chk12" id="chk12" type="checkbox" value="12" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_12');"/><img src="images/up_arrow.gif" border="0" onClick="func_sort('master_dist_up')" /> <img src="images/down_arrow.gif" border="0" onClick="func_sort('master_dist_down')" />
					  Master Distributor:<br />
					  <input name="chk13" id="chk13" type="checkbox" value="13" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_13');"/><img src="images/up_arrow.gif" border="0" onClick="func_sort('distributor_up')" /> <img src="images/down_arrow.gif" border="0" onClick="func_sort('distributor_down')" />
					  Distributor:<br />
					  <input name="chk14" id="chk14" type="checkbox" value="14" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_14');"/><img src="images/up_arrow.gif" border="0" onClick="func_sort('agent_up')" /> <img src="images/down_arrow.gif" border="0" onClick="func_sort('agent_down')" />
					  Agent:</td>
					<td align="left" width="20%" class="table_head" style="border-right:1px solid #DCD8BA;padding-left:10px;border-bottom:1px solid #DCD8BA"><input name="chk15" id="chk15" type="checkbox" value="15" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_15');"/><img src="images/up_arrow.gif" border="0" onClick="func_sort('discount_up')" /> <img src="images/down_arrow.gif" border="0" onClick="func_sort('discount_down')" />
					  Discount Factor:<br />
					  <input name="chk16" id="chk16" type="checkbox" value="16" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_16');"/><img src="images/up_arrow.gif" border="0" onClick="func_sort('media_up')" /> <img src="images/down_arrow.gif" border="0" onClick="func_sort('media_down')" />
					  Media Type:<br />
					  <input name="chk17" id="chk17" type="checkbox" value="17" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_17');"/><img src="images/up_arrow.gif" border="0" onClick="func_sort('business_type_up')" /> <img src="images/down_arrow.gif" border="0" onClick="func_sort('business_type_down')" />
					  Business Type:<br />
					  <input name="chk18" id="chk18" type="checkbox" value="18" checked onClick="return hide_checked_data('<?php echo $num;?>','chk_18');"/><img src="images/up_arrow.gif" border="0" onClick="func_sort('business_emp_up')" /> <img src="images/down_arrow.gif" border="0" onClick="func_sort('business_emp_down')" />
					  Business Employees:</td>
					<td align="left" width="11%" class="table_head" style="border-bottom:1px solid #DCD8BA;padding-left:10px">Action</td>
				  </tr>
		
		<?php
		//$result=mysql_query($sql);
		
		if($num>0)
		{
		   $i=0;
		   while($row=mysql_fetch_array($sql))
		   {
		   	if($i%2 !=0)
			{
				echo "<tr bgcolor='#FFECEE'>";			
			}
			else
			{
				echo "<tr bgcolor='#FFFFFF'>";			
			}
		?>
				 
					<td align="center" valign="top" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA;padding-top:10px;"><input type="checkbox" name="<?php echo "chk_val".$i;?>" id="<?php echo "chk_box".$i;?>" value="<?php echo $row['cus_master_id'];?>" /></td>
					<td align="left" valign="top" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">
					 <span id="<?php echo "chk_1_".$i;?>">
					   <?php echo htmlentities($row['cus_master_id']);?>
					 </span>
					 <span id="<?php echo "chk_1_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_2_".$i;?>">
					   <?php echo htmlentities($row['cus_type']);?>
					 </span>
					 <span id="<?php echo "chk_2_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_3_".$i;?>">
					   <?php echo htmlentities($row['name']);?>
					 </span>
					 <span id="<?php echo "chk_3_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_4_".$i;?>">
					   <?php echo htmlentities($row['country']).",".htmlentities($row['state']);?>
					 </span>
					 <span id="<?php echo "chk_4_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_5_".$i;?>">
					   <?php echo htmlentities($row['tax']);?>
					 </span>
					 <span id="<?php echo "chk_5_".$i."_".$i;?>">
					   <br />
					 </span>
					 <?php //echo $row['cus_master_id']."<br>".$row['cus_type']."<br>".$row['name']."<br>".$row['country'].",".$row['state']."<br>".$row['tax']; ?>						
					 </td>
					<td align="left" valign="top" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">
					<span id="<?php echo "chk_6_".$i;?>">
					   <?php echo htmlentities($row['phone1']);?>
					 </span>
					 <span id="<?php echo "chk_6_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_7_".$i;?>">
					   <?php echo htmlentities($row['phone2']);?>
					 </span>
					 <span id="<?php echo "chk_7_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_8_".$i;?>">
					   <?php echo htmlentities($row['fax']);?>
					 </span>
					 <span id="<?php echo "chk_8_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_9_".$i;?>">
					   <?php echo htmlentities($row['email']);?>
					 </span>
					 <span id="<?php echo "chk_9_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_10_".$i;?>">
					   <?php echo htmlentities($row['activity_type']);?>
					 </span>
					 <span id="<?php echo "chk_10_".$i."_".$i;?>">
					   <br />
					 </span>
					<?php //echo $row['phone1']."<br>".$row['phone2']."<br>".$row['fax']."<br>".$row['email']."<br>".$row['activity_type']; ?> </td>
					<td align="left" valign="top" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">
					<span id="<?php echo "chk_11_".$i;?>">
					   <?php echo htmlentities($row['reg_date_time']);?>
					 </span>
					 <span id="<?php echo "chk_11_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_12_".$i;?>">
					   <?php echo htmlentities($row['assigned_to_master_dist']);?>
					 </span>
					 <span id="<?php echo "chk_12_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_13_".$i;?>">
					   <?php echo htmlentities($row['assigned_to_dist']);?>
					 </span>
					 <span id="<?php echo "chk_13_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_14_".$i;?>">
					   <?php echo htmlentities($row['assigned_to_agent']);?>
					 </span>
					 <span id="<?php echo "chk_14_".$i."_".$i;?>">
					   <br />
					 </span>
					<?php //echo $row['reg_date_time']."<br>".$row['assigned_to_master_dist']."<br>".$row['assigned_to_dist']."<br>".$row['assigned_to_agent']; ?> </td>
					<td align="left" valign="top" class="td" style="border-right:1px solid #DCD8BA;border-bottom:1px solid #DCD8BA">
					<span id="<?php echo "chk_15_".$i;?>">
					   <?php echo htmlentities($row['discount']);?>
					 </span>
					 <span id="<?php echo "chk_15_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_16_".$i;?>">
					   <?php echo htmlentities($row['hear_about']);?>
					 </span>
					 <span id="<?php echo "chk_16_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_17_".$i;?>">
					   <?php echo htmlentities($row['account_type']);?>
					 </span>
					 <span id="<?php echo "chk_17_".$i."_".$i;?>">
					   <br />
					 </span>
					 <span id="<?php echo "chk_18_".$i;?>">
					   <?php echo htmlentities($row['no_of_emp']);?>
					 </span>
					 <span id="<?php echo "chk_18_".$i."_".$i;?>">
					   <br />
					 </span>
					<?php //echo $row['discount']."<br>".$row['hear_about']."<br>".$row['account_type']."<br>".$row['no_of_emp']; ?> </td>
					<td align="left" valign="top" class="td" style="border-bottom:1px solid #DCD8BA">
					 <input type="hidden" name="<?php echo "hide".$i?>" id="<?php echo "hide".$i?>" value="<?php echo $row['cus_master_id'];?>" />	
					  <!--<a href="customer_edit.php?cust_id=<?php echo $row['cus_master_id'];?>&mode=edit">-->
					  <a href="javascript:;" onclick="return customer_edit('<?php echo $row['cus_master_id'];?>');">
					    <img src="images/customer_edit.png" border="0" width="20" height="20" title="Edit" />
					  </a>
					  <a href="javascript:;" onClick="return func_customer_approve('<?php echo $row['cus_master_id'];?>');">
					   <img src="images/customer_approve.png" border="0" width="20" height="20" title="Approve"/>
					  </a>
					  <a href="customer_assign.php">
					    <img src="images/customer_assign.png" border="0" width="20" height="20" title="Assign"/>
					  </a>
					  <a href="new_quotes.php">
					    <img src="images/customer_quotes.png" border="0" width="20" height="20" title="Quotes"/>
					  </a><br />
					  <a href="order_new.php">
					    <img src="images/customer_orders.png" border="0" width="20" height="20" title="Orders"/>
					  </a>
					  <a href="invoice_cancel.php">
					    <img src="images/customer_invoices.png" border="0" width="20" height="20" title="Invoices" />
					  </a>
					  <a href="javascript:;" onClick="return func_customer_delete('<?php echo $row['cus_master_id'];?>');">
					    <img src="images/customer_delete.png" border="0" width="20" height="20" title="Delete"/>
					  </a>
					</td>
				  </tr>
				  <?php
			$i++;
		 }			 
		}
		else
		{
		?>
		  <tr>
		   <td colspan="10" height="100" valign="bottom" align="center"><font color="#FF0000"><b>No Records Found</b></font></td>
		  </tr>	
		<?php
		}
	    ?>
				</table>
			  </td>
			</tr>
			<tr>
			  <td>
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
				  <tr>
					<td width="75%" align="left" class="pagination" style="padding-right:8px">
					 <?php
					  echo $pages->display_pages();
					  echo "<span class=\"\" >".$pages->display_jump_menu($listpage).$pages->display_items_per_page($listpage)."</span>";
					 ?>
					</td>
					<td align="right" style="padding-top:10px;">					
					 <a href="javascript:;" onclick="return customer_edit('edit_all','<?php echo $row['cus_master_id'];?>');" ><img src="images/customer_editall.png" border="0" width="20" height="20" title="Edit All"/></a>&nbsp;<a href="javascript:;" onClick="return cust_assign_all('<?php echo $i;?>')" ><img src="images/customer_assign.png" border="0" width="20" height="20" title="Assign All"/></a>&nbsp;<a href="javascript:;" onClick="return deleteAll_customer();" ><img src="images/customer_deleteall.png" border="0" width="20" height="20" title="Delete All"/>	</a>
				   </td>	
				 </tr>
				 <input type="hidden" name="cust_id" id="cust_id" value="" />
				 <input type="hidden" name="mode" id="mode" value="" />
				 <tr>
				   <td align="right" colspan="2" style="padding-bottom:5px;padding-top:10px">
					  <INPUT TYPE="image" SRC="images/customer_back.png" HEIGHT="20" WIDTH="20" BORDER="0" ALT="Back" title="Back" onClick="javascript:history.go(-1);return false;">
					</td>
				 </tr>
				</table>
			  </td>
			</tr>
			<?php
			}
			?>
		  </table>
		</form>            
	  </div>
	<tr>
	  <td align="center" valign="top">
	   <?php
		  include("common/fotter.php");
		?>
	  </td>
	</tr>
   </table>
  </td>
 </tr>
</table>
</body>
</html>
