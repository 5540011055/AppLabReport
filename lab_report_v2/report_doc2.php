<?php
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
// $db-> connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD); 
// $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD); ?>
<? $part_img_load_big='<img src="admin/admin/transfer/new/js_load/loading-large.gif"/>' ; ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css?v=<?=time();?>" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js?v=<?=time();?>"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js?v=<?=time();?>"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?v=<?=time();?>" />

<script src="js/sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="js/sweetalert-master/dist/sweetalert.css" />

<!--- Pickerdate --->
<link rel="stylesheet" type="text/css" href="admin/admin/lab_report/assets_nut/pickerdate/classic.css?v=<?=time();?>" /> 
<link rel="stylesheet" type="text/css" href="admin/admin/lab_report/assets_nut/pickerdate/classic.date.css?v=<?=time();?>" /> 
<script src="admin/admin/lab_report/assets_nut/pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
<script src="admin/admin/lab_report/assets_nut/pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script>
<script>
$(function(){				
				
				var $win = $(window); // or $box parent container
				var $box = $("#navbarCollapse,#navbar_mobile");
//				var $log = $(".log");
				
				 $win.on("click.Bst", function(event){		
					if ( 
            $box.has(event.target).length == 0 //checks if descendants of $box was clicked
            &&
            !$box.is(event.target) //checks if the $box itself was clicked
          ){
						console.log('out');
						if($('#navbarCollapse').attr('aria-expanded')=='true'){
							$('.navbar-toggle').click();
						}
					} else {
						console.log('in');
					}
				});
  
});
</script>

<style type="text/css">
    @media (min-width: 1200px) {
        .visible-lg-block {
            display: block !important;
        }
    }
    @media (min-width: 1200px) {
        .visible-lg-inline {
            display: inline !important;
        }
    }
    @media (min-width: 1200px) {
        .visible-lg-inline-block {
            display: inline-block !important;
        }
    }
    @media (max-width: 767px) {
        .hidden-xs {
            display: none !important;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .hidden-sm {
            display: none !important;
        }
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .hidden-md {
            display: none !important;
        }
    }
    @media (min-width: 1200px) {
        .hidden-lg {
            display: none !important;
        }
    }
    .visible-print {
        display: none !important;
    }
    @media print {
        .visible-print {
            display: block !important;
        }
        table.visible-print {
            display: table !important;
        }
        tr.visible-print {
            display: table-row !important;
        }
        th.visible-print,
        td.visible-print {
            display: table-cell !important;
        }
    }
    <!-- td {
        font-size: 12px;
    }
    th {
        font-size: 13px;
    }
    td,
    th {
        font-family: Arial, Helvetica, sans-serif;
        color: #000000;
    }
    .color-ms {} .color-ms{
        background: #e6e6e6;
        /* For browsers that do not support gradients */
        
        background: -webkit-linear-gradient(#e6e6e6, white);
        /* For Safari 5.1 to 6.0 */
        
        background: -o-linear-gradient(#e6e6e6, white);
        /* For Opera 11.1 to 12.0 */
        
        background: -moz-linear-gradient(#e6e6e6, white);
        /* For Firefox 3.6 to 15 */
        
        background: linear-gradient(#e6e6e6, white);
        /* Standard syntax (must be last) */
    }
	.color-ms {} .color-ms:hover {
        background: #FFFFFF;
    }
    .color-md {
        background: #66ccff;
        /* For browsers that do not support gradients */
        
        background: -webkit-linear-gradient(#66ccff, white);
        /* For Safari 5.1 to 6.0 */
        
        background: -o-linear-gradient(#66ccff, white);
        /* For Opera 11.1 to 12.0 */
        
        background: -moz-linear-gradient(#66ccff, white);
        /* For Firefox 3.6 to 15 */
        
        background: linear-gradient(#f8bb8691, #f8ffde);
        /* Standard syntax (must be last) */
    }
	.color-md:hover {
        background: #FFFFFF;
    }
    /*!
 * Bootstrap v3.3.7 (http://getbootstrap.com)
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
    /*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */
    
    th { 
        text-align: center;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px
    }
    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd
    }
    .table-bordered>thead>tr>td,
    .table-bordered>thead>tr>th {
        border-bottom-width: 2px
    }
    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: #f9f9f9
    }
    .table-hover>tbody>tr:hover {
        background-color: #f5f5f5
    }
    table col[class*=col-] {
        position: static;
        display: table-column;
        float: none
    }
    table td[class*=col-],
    table th[class*=col-] {
        position: static;
        display: table-cell;
        float: none
    }
    .btn-hv {
        transition: all 0.5s ease 0s;
    }
    .btn-hv:hover {
        background: #CF4647;
    }
    .tr-hv:hover {
        background: #CF4647;
    }
    .tabs-menu {
        height: 30px;
        float: left;
        clear: both;
    }
    .tabs-menu li {
        height: 30px;
        line-height: 30px;
        float: left;
        margin-right: 10px;
        background-color: #ccc;
        border-top: 1px solid #d4d4d1;
        border-right: 1px solid #d4d4d1;
        border-left: 1px solid #d4d4d1;
    }
    .tabs-menu li.current {
        position: relative;
        background-color: #fff;
        border-bottom: 1px solid #fff;
        z-index: 5;
    }
    .tabs-menu li a {
        padding: 10px;
        text-transform: uppercase;
        color: #fff;
        text-decoration: none;
    }
    .tabs-menu .current a {
        color: #225c79;
    }
    .tab {
        border: 1px solid #d4d4d1;
        background-color: #fff;
        float: left;
        margin-bottom: 20px;
        width: auto;
    }
    .tab-content {
        width: auto;
        padding: 20px;
        display: none;
    }
    #tab-1 {
        display: block;
    }
    .btn-edit {
    display: inline-block;
    padding: 6px 12px;
    width: 100%;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px
}
	
</style>
<?php
// Turn off error reporting
error_reporting(0);


// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

?>
<?php include('admin/admin/lab_report/connect_cn.php'); ?>
<style>
	.fixedContainer {
    position: fixed; 
    left: 10px;
    right: 0;
    opacity: .9;
    z-index: 3;
    padding: 10px;
    overflow-y: auto;
    cursor: default;
    
    
}
.mobile{
	top: 35px;
	left: -10px;
	width: 125px;
}
.pc{
	top: 15px;
	left: 10px;
	width: 177px;
	
}
.classOfElements {
    background-color: #fff;
    background-color: rgba(255,255,255,0.5);
}
	.end-page {
    position: fixed; 
    left: auto;
    right: 0;
    top: 260px;
    opacity: .9;
    z-index: 3;
    padding: 1rem;
    overflow-y: auto;
    cursor: default;
}
.top-page {
    position: fixed; 
    left: auto;
    right: 0;
    top: 160px;
    opacity: .9;
    z-index: 3;
    padding: 1rem;
    overflow-y: auto;
    cursor: default;
}
kbd2 {
    padding: 2px 4px;
    font-size: 80%;
    color: #fff;
    background-color: rgba(51, 51, 51, 0.69);
    border-radius: 3px;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25);
    box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25)
}
kbd2 kbd2 {
    padding: 0;
    font-size: 100%;
    font-weight: 600;
    -webkit-box-shadow: none;
    box-shadow: none
}
</style>
				<div class="hidden-sm hidden-xs">
				<div aria-hidden="true" class="fixedContainer pc"><h2><kbd2 style="cursor:not-allowed"><b><span class="date_search"></span></b></kbd></h2></div>
				</div>
				<div class="hidden-lg hidden-md"> 
				<div aria-hidden="true" class="fixedContainer mobile"><h4><kbd2 style="cursor:not-allowed"><b><span class="date_search" ></span></b></kbd></h4></div>
				</div>
				<div>
				<button class="top-page btn" onclick="scrollWin('top');" style="cursor: pointer;"><i class="glyphicon glyphicon-chevron-up"></i></button>
				<button class="end-page btn" onclick="scrollWin('end');"  style="cursor: pointer;"><i class="glyphicon glyphicon-chevron-down"></i></button>
				</div>
<script>
	function scrollWin(type) {
		if(type=="top"){
			 window.scrollTo(0,document.body.scrollHeight-document.body.scrollHeight);
		}else if(type=="end"){
			 window.scrollTo(0,document.body.scrollHeight);
		}
   
}
</script>				
				
<script>
    window.onload = function() {

        jQuery(function() {
            jQuery('#txtKeyword').click();
        })
    }
</script>

<script>
    $(document).ready(function() {
        function Search() {

            var keyword = $("#keyword").val();
            var date = $(".datetimepicker4").val();
            var type = $("#type_order").val();
            var company_tran = $("#company_tran").val();
            var url = 'popup4.php?name=admin/lab_report&file=report_doc_query&date_tran=' + date + '&key_word=' + keyword + '&type=' + type + '&company=' + company_tran+'&user='+'<?=$_SESSION[admin_user];?>';

            var url_cn = '<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=report_doc_query&date_tran=' + date + '&key_word=' + keyword + '&type=' + type + '&company=' + company_tran+"&server=cn"+'&user='+'<?=$_SESSION[admin_user];?>';
			$('.date_search').html(date);
            $("#show_table_all").load(url + " #tableDataAll");
			$("#show_table_all_cn").load(url_cn + " #tableDataAll");
            $('#show_table').html('<div align="center"><?=$part_img_load_big;?></div>');
			$.get(url, function(result){
			var show = $('#no_meet_th').text();
     		$('#showno_meet_th').text("("+show+")");
    		});
			$.get(url_cn, function(result){
			var show = $('#no_meet_cn').text();
     		$('#showno_meet_cn').text("("+show+")");
    		});
            $("#show_table").load(url + " #tableData");
			$('#show_table_cn').html('<div align="center"><?=$part_img_load_big;?></div>');
            $("#show_table_cn").load(url_cn + " #tableData");
        }

        //$("#filter").on("click", RefreshTable);
        $("#txtKeyword").on("click", Search);
        $("#txtSearch").on("click", Search);
    });
</script>

<script>
    function searchFilter(type_show) {
        var keyword = $("#keyword").val();
        var date = $(".datetimepicker4").val();
        var type = $("#type_order").val();
        var company_tran = $("#company_tran").val();
        var url = 'popup4.php?name=admin/lab_report&file=report_doc_query&date_tran=' + date + '&key_word=' + keyword + '&type=' + type + '&company=' + company_tran + "&type_show=" + type_show+'&user='+'<?=$_SESSION[admin_user];?>';

       var url_cn = '<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=report_doc_query&date_tran=' + date + '&key_word=' + keyword + '&type=' + type + '&company=' + company_tran + "&type_show=" + type_show+"&server=cn"+'&user='+'<?=$_SESSION[admin_user];?>';

        $('#show_table').html('<div align="center"><?=$part_img_load_big;?></div>');
        $("#show_table").load(url + " #tableData");
		$.get(url, function(result){
		var show = $('#no_meet_th').text();
     	$('#showno_meet_th').text("("+show+")");
    	});
		$.get(url_cn, function(result){
		var show2 = $('#no_meet_cn').text();
     	$('#showno_meet_cn').text("("+show2+")");
    	});
		$('#show_table_cn').html('<div align="center"><?=$part_img_load_big;?></div>');
        $("#show_table_cn").load(url_cn + " #tableData");
    }
</script>

<script>
function fnc_logout(){
 window.location.replace('?name=admin&file=logout');
}
</script>

<script>
	
	function findBytype(type,server){
		
		if(type=='join'){
	
			$( ".hide_private" ).show( "slow", function() {
 
  });
			$('.hide_join').hide(1000);
		}else if(type=='private'){
			$('.hide_join').show(1000);
			$('.hide_private').hide(1000);
		}else{
			$('.hide_join').show(1000);
			$('.hide_private').show(1000);
		}
		
	}
	
</script>

<nav class="navbar navbar-default hidden-lg hidden-md " style="position: fixed;width: 100%;z-index: 9;box-shadow:1px 1px 5px #ccc;" id="navbar_mobile">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Brand</a>
            <a href="#" class="navbar-brand" id="btn_search_form">Box Search</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <!--<li><a href="#">Profile</a></li>-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" >Search <b class="caret"></b></a>
                    
                </li>
            </ul>
           <!-- <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>-->
            <ul class="nav navbar-nav navbar-right">
                <li><a  onclick="fnc_logout();"><strong>Log Out</strong>&nbsp;&nbsp;<span class="glyphicon glyphicon-log-out"></span></a></li>
            </ul>
        </div>
    </nav>

<div class="container">
<div  style="margin-top: 50px;" class="hidden-lg hidden-md">
	
</div>
	<div>
   <!-- <div class="hidden-lg hidden-md">
    	<div align="right">
    		<button type="button" class="btn btn-danger btn-sm" onclick="fnc_logout();">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
    	</div>
    	<br>
        <button class="btn-edit btn-success" id="btn_search_form">Search</button>
        <input type="hidden" id="chk_val_search" value="0" />
    </div>-->
     <input type="hidden" id="chk_val_search" value="0" />
   <script>
        $('#btn_search_form').click(function() {
            var chk_val_search = $('#chk_val_search').val();
            if (chk_val_search == 1) {
                $('#chk_val_search').val(0);
                $('.div_search_form').addClass('hidden-xs hidden-sm');
            } else {
                $('#chk_val_search').val(1);
                $('.div_search_form').removeClass('hidden-xs hidden-sm');
            }

        });
    </script>

	<div align="right" class="hidden-sm hidden-xs">
		<br>
		<a href="#" class="btn btn-danger btn-lg" onclick="fnc_logout();">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
        
	</div>
	<br>
    <div class="row well hidden-xs hidden-sm "  >
        <div class="col-lg-3 col-md-3 col-sm-3">
            <table cellspacing="5" cellspacing="5" >
                <tr>
                    <td>
                        <!--<input type="text" id="datetimepicker4" name="starttime" value="<? echo date('Y-m-d'); ?>" class="form-control" disabled="disabled"/>-->
                        <input type="text" id="datetimepicker4" name="starttime" value="2017-12-16" class="form-control datetimepicker4" />
                    </td>
                    <td width="5"></td>
                    <td>
                        <label for="datetimepicker4"><img onclick="showImg()" src="images/admin/dateselect.gif" alt="Mountain View" style="cursor:pointer">
                        </label>
                    </td>
                </tr>
            </table >


        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <select id="type_order" name="type_order" class="form-control">
                <option value="0">ทั้งหมด</option>
                <option value="1" selected="selected">รับเข้า</option>
                <option value="2">ส่งออก</option>
                <option value="3">อื่นๆ</option>
            </select>
        </div>
        <?php
		////////////// check user
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[chk_user_tbk] = $db->select_query("SELECT * FROM ".TB_admin." where username='".$_SESSION['admin_user']."' ");
		$arr[chk_user_tbk] = $db->fetch($res[chk_user_tbk]);
		if($arr[chk_user_tbk][id]){
			if($arr[chk_user_tbk][level] > 4){
				if($arr[chk_user_tbk][admin_company] == '1'){
					if($_SESSION['admin_user'] == 'adminuser_labsaw' or $_SESSION['admin_user'] == 'adminuser_labfar' or $_SESSION['admin_user'] == 'adminuser_labdech' or $_SESSION['admin_user'] == 'adminuser_labgace' or $_SESSION['admin_user'] == 'adminuser_laboak'){
					$and_company_tran = " and  id = '283' ";
					$lab_chk = 1;	
					}
				}else{
					$and_company_tran = " and admin_company = '".$arr[chk_user_tbk][admin_company]."' ";
				}
			}else{
				if($arr[chk_user_tbk][level] == '4'){
					if($arr[chk_user_tbk][id] == '1133'){
						$and_company_tran = " and ( id = '".$arr[chk_user_tbk][id]."'  or id = '1779') ";
					}else{
						$and_company_tran = " and id = '".$arr[chk_user_tbk][id]."' ";
					}
					
				}else{
					$and_company_tran = " and id = '".$arr[chk_user_tbk][postby]."' ";
				}
			}
		}else{
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$res[chk_user_lab] = $db->select_query("SELECT * FROM web_user_lab where username='".$_SESSION['admin_user']."' ");
			$arr[chk_user_lab] = $db->fetch($res[chk_user_lab]);
			if($arr[chk_user_tbk][id]){
				$and_company_tran = " and id = '".$arr[chk_user_lab][postby]."' ";
			}
		}
		?>
		
        <div class="col-lg-3 col-md-3 col-sm-3">
            <select name="company_tran" id="company_tran" class="form-control">

                <?php if($arr[chk_user_tbk][admin_company] == '1' and $arr[chk_user_tbk][level] > 4 and $lab_chk != 1){ ?>
				<option value="" selected="selected">------- กรุณาเลือก -------</option>
				<?php } ?>
                <?php $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD); $res[category] = $db->select_query("SELECT * FROM ".TB_admin." where control_transfer=1 ".$and_company_tran." ORDER by id ASC "); while ($arr[category] = $db->fetch($res[category])){ $num_row = $db->num_rows("web_transferproduct","id","company = '".$arr[category][id]."' and status = '1' "); if($num_row>0){ ?>
                <option value="<?php echo $arr[category][id];?>">
                    <?php echo $arr[category][company];?>
                </option>
                <?php } } ?>
            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <button id="txtKeyword" type="text" class="btn btn-primary" style="width: 100%;">Search</button>
        </div>
	<br>
    </div>
	
	<style>
	.qq {
    width: 100%;
}	
	</style>
    <div id="tabs-container">
       	<div class="tabs-menua">
       	<table width="100%">
       	<tr>
       	<td width="45%">
           <a href="#tab-1" class="qq"> <button class="btn-edit btn-info active" id="tab1"><img src="iconstatus/flag/th.png" align="absmiddle" /> <strong class="hidden-xs hidden-sm">เซิร์ฟเวอร์ ไทย</strong> <strong class="hidden-lg hidden-md">ไทย</strong> <span id="showno_meet_th"></span></button></a>
           </td><td width="10%"></td>
           <td width="45%" align="right">
           <a href="#tab-2"> <button class="btn-edit btn-info" id="tab2"><img src="iconstatus/flag/cn.png" align="absmiddle" /> <strong class="hidden-xs hidden-sm">เซิร์ฟเวอร์ จีน</strong>
           <strong class="hidden-md hidden-lg">จีน</strong> <span id="showno_meet_cn"></span> </button></a></td>
           </tr> </table>
    </div>
					
<script>
		$("#tab1").click(function(){
   			 $( "#tab2" ).removeClass( "active" );
			 $("#tab1").addClass("active");
		});
		$("#tab2").click(function(){
   			  $( "#tab1" ).removeClass( "active" );
			 $("#tab2").addClass("active");
		});
		</script>
				
<script>
function find_by_invoice(server) {
	
 	table_nomeet(server);
	table_meet(server);
}

function table_nomeet(server){
var input, filter, table, tr, td, i;
  
  if(server=='cn'){
  	input = document.getElementById("myInput_cn");
  	table = document.getElementById("table_no_meet_cn");
  }else{
  	input = document.getElementById("myInput");
  	table = document.getElementById("table_no_meet");
  }
  
  filter = input.value.toUpperCase();
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function table_meet(server){
var input, filter, table, tr, td, i;
  if(server=='cn'){
  	input = document.getElementById("myInput_cn");
  	table = document.getElementById("table_meet_cn");
  }else{
  	input = document.getElementById("myInput");
  	table = document.getElementById("table_meet");
  }
 
  filter = input.value.toUpperCase();
  //table = document.getElementById("table_meet");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function find_by_ref(server) {

  table_nomeet_ref(server);
  table_meet_ref(server);
}

function table_nomeet_ref(server){

var input, filter, table, tr, td, i;
  //input = document.getElementById("myInput_ref"); 
   if(server=='cn'){
  	input = document.getElementById("myInput_ref_cn");
  	table = document.getElementById("table_no_meet_cn");
  }else{
  	input = document.getElementById("myInput_ref");
  	table = document.getElementById("table_no_meet");
  }
  
  filter = input.value.toUpperCase();
 // table = document.getElementById("table_no_meet");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function table_meet_ref(server){

var input, filter, table, tr, td, i;
   if(server=='cn'){
  	input = document.getElementById("myInput_ref_cn");
  	table = document.getElementById("table_meet_cn");
  }else{
  	input = document.getElementById("myInput_ref");
  	table = document.getElementById("table_meet");
  }
  //input = document.getElementById("myInput_ref");
  filter = input.value.toUpperCase();
 // table = document.getElementById("table_meet");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>

<script>
function find_by_name(server) {

  table_nomeet_name(server);
  table_meet_name(server);
}

function table_nomeet_name(server){

var input, filter, table, tr, td, i;
  //input = document.getElementById("myInput_ref"); 
   if(server=='cn'){
  	input = document.getElementById("myInput_name_cn");
  	table = document.getElementById("table_no_meet_cn");
  }else{
  	input = document.getElementById("myInput_name");
  	table = document.getElementById("table_no_meet");
  }
  
  filter = input.value.toUpperCase();
 // table = document.getElementById("table_no_meet");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[9];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function table_meet_name(server){

var input, filter, table, tr, td, i;
   if(server=='cn'){
  	input = document.getElementById("myInput_name_cn");
  	table = document.getElementById("table_meet_cn");
  }else{
  	input = document.getElementById("myInput_name");
  	table = document.getElementById("table_meet");
  }
  //input = document.getElementById("myInput_ref");
  filter = input.value.toUpperCase();
 // table = document.getElementById("table_meet");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[9];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>

        <div class="clearfix"></div>
		
        <div class="row">
            <div id="tab-1" class="tab-content">
			<div class="hidden-xs hidden-sm">

<table cellspacing="5" cellspacing="5" width="100%" >
		<tr><td>
<input type="text" class="form-control" id="myInput" onkeyup="find_by_invoice()" placeholder="Search for Voucher... (e.x. 7033496)" title="Type in a voucher"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><input type="text" class="form-control" id="myInput_ref" onkeyup="find_by_ref()" placeholder="Search for agent reference... (e.x. 2869744087)" title="Type in a agent ref"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><input type="text" class="form-control" id="myInput_name" onkeyup="find_by_name()" placeholder="Search for guest name... (e.x. ZHU YUANHAO)" title="Type in a name"></td>
		</tr>
		<tr><td><br></td></tr>
		<tr>
		<td colspan="15"><input type="text" class="form-control" id="input_phone" onkeyup="find_by_phone('');"  placeholder="Search number phone..(e.x. 0935829109)"/>
		</td>
		</tr>
</table >
<script>
function find_by_phone(server){
		//alert(123);
		var input, filter, table, tr, td, i;
		var table_nomeet;
  input = document.getElementById("input_phone");
  if(server=='cn'){
  	table = document.getElementById("table_no_meet_cn");
  }else{
  	table = document.getElementById("table_no_meet");
  }
  
  filter = input.value.toUpperCase();
  tr = table.getElementsByTagName("tr");

	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[15];
	    if (td) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	}
	
  //input = document.getElementById("input_phone");
   if(server=='cn'){
  	table = document.getElementById("table_meet_cn");
  }else{
  	table = document.getElementById("table_meet");
  }
  filter = input.value.toUpperCase();
  tr = table.getElementsByTagName("tr");

	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[15];
	    if (td) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	}
	/**
	* 
	*/	
}	
</script>
		<br/>
		</div>
		
		<div class="hidden-xs hidden-sm div_search_form">
		
		<input type="text" class="form-control" id="myInput_sm" onkeyup="find_by_invoice2()" placeholder="Search Voucher..(e.x. 7033496)" title="Type in a voucher"><br />
		<input type="text" class="form-control" id="myInput_sm_ref" onkeyup="find_by_ref2()" placeholder="Search agent reference..(e.x. 2869744087)" title="Type in a agent ref"><br />
		<input type="text" class="form-control" id="myInput_sm_name" onkeyup="find_by_name2()" placeholder="Search guest name..(e.x. ZHU YUANHAO)" title="Type in a name"><br />
		<input type="text" class="form-control" id="input_sm_phone" onkeyup="find_by_phone2('');" placeholder="Search number phone..(e.x. 0935829109)" />
		

		</div>


			    <div id="show_table_all"></div>
                <div id="show_table"> </div>
            </div>

            <div id="tab-2" class="tab-content"> <!--- cn --->
            <div class="hidden-xs hidden-sm ">
            <table cellspacing="5" cellspacing="5" width="100%" >
		<tr><td>
<input type="text" class="form-control" id="myInput_cn" onkeyup="find_by_invoice('cn')" placeholder="Search for Voucher... (e.x. CN7021243)" title="Type in a voucher"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><input type="text" class="form-control" id="myInput_ref_cn" onkeyup="find_by_ref('cn')" placeholder="Search for agent reference... (e.x. 12510005074)" title="Type in a agent ref"></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><input type="text" class="form-control" id="myInput_name_cn" onkeyup="find_by_name('cn')" placeholder="Search for guest name... (e.x. WANG YAN)" title="Type in a name"></td>
		</tr><tr><td><br></td></tr>
		<tr><td colspan="15"><input type="text" class="form-control" id="input_phone" onkeyup="find_by_phone('en');" placeholder="Search number phone..(e.x. 0935829109)"/></td></tr>
		</table ><br/></div>
		<div class="hidden-xs hidden-sm div_search_form ">
		
		<input type="text" class="form-control" id="myInput_sm_cn" onkeyup="find_by_invoice2('cn')" placeholder="Search Voucher..(e.x. CN7021243)" title="Type in a voucher"><br />
		<input type="text" class="form-control" id="myInput_sm_ref_cn" onkeyup="find_by_ref2('cn')" placeholder="Search agent reference..(e.x. 12510005074)" title="Type in a agent ref"><br />	
		<input type="text" class="form-control" id="myInput_sm_name_cn" onkeyup="find_by_name2('cn')" placeholder="Search guest name..(e.x. WANG YAN)" title="Type in a name"><br />
		<input type="text" class="form-control" id="input_sm_phone_cn" onkeyup="find_by_phone2('cn');" placeholder="Search number phone..(e.x. 0935829109)" />
		</div>
		<div id="date_search_cn"></div>
			<div id="show_table_all_cn"></div>
                <div id="show_table_cn"> </div>
            </div>


            <script>
                $(document).ready(function() {
                    $(".tabs-menua a").click(function(event) {
                        event.preventDefault();
                        $(this).parent().addClass("current");
                        $(this).parent().siblings().removeClass("current");
                        var tab = $(this).attr("href");
                        $(".tab-content").not(tab).css("display", "none");
                        $(tab).fadeIn();
                    });
                });
            </script>

        </div>

    </div>
	</div>
</div>

<div class="modal fade" id="view_history" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title custom_align" id="Heading">ประวัติ</h4>
            </div>
            <div class="modal-body" id="his_show">

            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;display:none;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    function viewHistory(id,server) {

        $("#his_show").html('<div align="center"><img src="iconstatus/loader.gif"/></div>');
		if(server==1){
		   var url = "<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=report_doc_histroy&id_order=" + id;
		}else{
		   var url = "popup4.php?name=admin/lab_report&file=report_doc_histroy&id_order=" + id;
		}
     
        $.post(url, function(data) {

            $("#his_show").html(data);
            //alert(url);	
        });

    }
</script>

<button class="btn btn-primary btn-xs" data-title="View" data-toggle="modal" data-target="#view_detail_lab_report" style="display:none;">test</button>
<input id="open" type="button" value="open" style="display:none;" />

<!--<div class="modal fade" id="view_detail_lab_report" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true"> -->
<div class="modal fade" id="view_detail_lab_report" role="dialog" >
    <div class="modal-dialog" style="height: 1300px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title custom_align" id="title_view_modal">รายละเอียด</h4>
            </div>
            <div class="modal-body" id="detail_show">

            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;display:none;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
	function changeDriver(driver_id, order_id, date,server,com,invoice,type_call){
		console.log(com);
		$("#detail_show").html('<div align="center"><img src="iconstatus/loader.gif"/></div>');
		$('#title_view_modal').html('สลับคนขับ Invoice '+invoice );
		if(type_call=='action'){
			
			if(server==1){
	  	var url = "<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=driver_change_list&call=action";
			}else{
		var url = "popup4.php?name=admin/lab_report&file=driver_change_list&call=action";
			}
	        
		}
		else if(type_call=='view'){

			if(server==1){
	  	var url = "<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=driver_change_list&call=view_history_change_driver";
			}else{
		var url = "popup4.php?name=admin/lab_report&file=driver_change_list&call=view_history_change_driver";
			}
		}
		$.post(url, {
	            driver_id: driver_id,
	            date: date,
	            order_id: order_id,
	            com : com,
	            invoice : invoice,
	            server : server
	        }, function(data) {

	            $("#detail_show").html(data);
	            	
	        });
		
	}
</script>

<script>
    function driverPro(driver_id, nickname, date,server) {
        $('#title_view_modal').html(nickname);
        $("#detail_show").html('<div align="center"><img src="iconstatus/loader.gif"/></div>');
		
		if(server==1){
  	var url = "<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=driver_detail";
		}else{
	var url = "popup4.php?name=admin/lab_report&file=driver_detail";
		}
        //alert(date+" "+driver_id);
        $.post(url, {
            driver_id: driver_id,
            date: date
        }, function(data) {

            $("#detail_show").html(data);
            //alert(url);	
        });
    }

    function viewDetail(id_order, title,server) {

        var date = $(".datetimepicker4").val();
        $("#detail_show").html('<div align="center"><img src="iconstatus/loader.gif"/></div>');
		if(server==1){
  var url = "<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=report_doc_detail&id_order=" + id_order + "&date_tran=" + date+"&server="+server;
		}else{
  var url = "popup4.php?name=admin/lab_report&file=report_doc_detail&id_order=" + id_order + "&date_tran=" + date+"&server="+server;
		}
        

        $('#title_view_modal').html(title);
        $.post(url, function(data) {

            $("#detail_show").html(data);
            //alert(url);	
        });

    }
</script>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

 <script>
 	
 	var date=$('.datetimepicker4').val();

    $('.datetimepicker4').pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy/mm/dd',
        closeOnSelect: true,
        closeOnClear: false,
        "showButtonPanel": false,
        onStart: function() {
            this.set('select', date); // Set to current date on load
        },
		  onSet: function(context) {
		 		$('#txtKeyword').click();
		  }
        });
 </script>

<script>
    function showImg() {
        //document.getElementById("#open").style.color = "red";
        $('#open').click();
    }

    /*$('.datetimepicker4').datetimepicker({
        timepicker: false,
        format: 'Y-m-d'
    });
    $('#open').click(function() {

        $('.datetimepicker4').datetimepicker('show');
    });*/
</script>

<script>

function update_lab_approve(id, status, vc,server,user) {

if(server==1){
		   var url = "<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=update_status&action=approve&status=" + status+"&user="+user;
}else{
		   var url = "popup4.php?name=admin/lab_report&file=update_status&action=approve&status=" + status+"&user="+user;
}
		
swal({
  title: "คุณแน่ใจหรือไม่?",
  text: "รับงาน เลข Voucher "+vc+"!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "ตกลง, รับงาน!",
  cancelButtonText: "ไม่, ยกเลิก!",
  closeOnConfirm: false
},
function(){
    $.post(url, {
                id: id,
                invoice: vc,
				server : server
            }, function(data) {
                swal("สำเร็จ!", "รับงานสำเร็จ!", "success")
                jQuery('#txtKeyword').click();
            });
});

}
		
		
        //------------------------------------------
    function update_lab_meet(id, status, vc,server,user) {

		if(server==1){
		   var url = "<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=update_status&action=meet&status=" + status+"&user="+user;
		}else{
		    var url = "popup4.php?name=admin/lab_report&file=update_status&action=meet&status=" + status+"&user="+user;
		}
           
            swal({
                    title: "คุณแน่ใจหรือไม่?",
                    text: "เปลี่ยนสถานะเจอแขก!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ตกลง, เปลี่ยนสถานะ!",
                    cancelButtonText: "ไม่, ยกเลิก!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.post(url, {
                            id: id,
                            invoice: vc,
							server:server
                        }, function(data) {
                            //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                            jQuery('#txtKeyword').click();
                        });

                    }
                    //else {
                    //	swal("Cancelled", "Your imaginary file is safe :)", "error");
                    //}
                });
        }
        //-------------------------------------------
</script>

<script>
    function update_approve_all(num,server,user) {
	
		if(server==1){
		   var url = "<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=update_status&action=all&server="+server+"&user="+user;
		     var data_form = $('#approve_all_cn').serialize();
		   
		}else{
		   var url = "popup4.php?name=admin/lab_report&file=update_status&action=all&server="+server+"&user="+user;
		     var data_form = $('#approve_all').serialize();
		}
       
    
		
        swal({
                title: "ยืนยันการรับงานทั้งหมด " + num + " งาน",
                text: "กรุณากดตกลงเพื่อรับงานทั้งหมด",
                type: "info",
                confirmButtonText: "ตกลง, รับงาน!",
                cancelButtonText: "ไม่, ยกเลิก!",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
           function(){
  setTimeout(function(){
    $.post(url, data_form, function(data) {	
						
                    jQuery('#txtKeyword').click();
                });
    swal("อัพเดทสำเร็จ");
  }, 2000);
});

    }
	
function show_hide(id){
            var chk_val = $('#each_'+id).val();
			
            if (chk_val == 0) {
                $('#each_'+id).val(1);
                $('#td_img_driver_'+id).attr('rowspan',8);
                $(".cls_hide_"+id).show(500);
				$('#id_'+id).attr('class', 'glyphicon glyphicon-chevron-up');
            } else {
                $('#each_'+id).val(0);
                $('#td_img_driver_'+id).attr('rowspan',3);
				$(".cls_hide_"+id).hide(500);
				$('#id_'+id).attr('class', 'glyphicon glyphicon-chevron-down');
            }
}
</script>



<!---- mobile js -----> 

<!-- invoice mobile -->
<script>
////// 
function find_by_invoice2(server) {
  table_nomeet_sm_vc(server);
  table_meet_sm_vc(server);
}

function table_nomeet_sm_vc(server){
 var input, filter, ul, li, a, i;
 if(server=='cn'){
 	input = document.getElementById("myInput_sm_cn");
 	ul = document.getElementById("table_no_meet_sm_cn");
 }else{
 	input = document.getElementById("myInput_sm");
 	ul = document.getElementById("table_no_meet_sm");
 }
    
    filter = input.value.toUpperCase();
	//table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("inv");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
       //     table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
        //    table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}

function table_meet_sm_vc(server){
 	var input, filter, ul, li, a, i;
  if(server=='cn'){
 	input = document.getElementById("myInput_sm_cn");
 	ul = document.getElementById("table_meet_sm_cn");
 }else{
 	input = document.getElementById("myInput_sm");
 	ul = document.getElementById("table_meet_sm");
 }
   
    filter = input.value.toUpperCase();
	//table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("inv");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
          //  table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
            //table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}
</script>

<!-- name mobile --> 
<script>
	
function find_by_name2(server) {
  table_nomeet_sm_name(server);
  table_meet_sm_name(server);
}

function table_nomeet_sm_name(server){
 var input, filter, ul, li, a, i;
 if(server=='cn'){
 	input = document.getElementById("myInput_sm_name_cn");
 	ul = document.getElementById("table_no_meet_sm_cn");
 }else{
 	input = document.getElementById("myInput_sm_name");
 	ul = document.getElementById("table_no_meet_sm");
 }
    
    filter = input.value.toUpperCase();
	//table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("byname");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
          //  table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
          //  table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}
function table_meet_sm_name(server){
 	var input, filter, ul, li, a, i;
  if(server=='cn'){
 	input = document.getElementById("myInput_sm_name_cn");
 	ul = document.getElementById("table_meet_sm_cn");
 }else{
 	input = document.getElementById("myInput_sm_name");
 	ul = document.getElementById("table_meet_sm");
 }
   
    filter = input.value.toUpperCase();
	//table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("byname");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
          //  table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
           // table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}


</script>

<!-- agent ref mobile --> 
<script>
function find_by_ref2(server) {

table_nomeet_sm_ref(server);

table_meet_sm_ref(server);
}
function table_nomeet_sm_ref(server){
 var input, filter, ul, li, a, i;
 if(server=='cn'){
 	 input = document.getElementById("myInput_sm_ref_cn");
 	 ul = document.getElementById("table_no_meet_sm_cn");
 }else{
 	 input = document.getElementById("myInput_sm_ref");
 	 ul = document.getElementById("table_no_meet_sm");
 }
    filter = input.value.toUpperCase();
	//table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("123");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
           // table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
         //   table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}
function table_meet_sm_ref(server){
 var input, filter, ul, li, a, i;
    
    if(server=='cn'){
		input = document.getElementById("myInput_sm_ref_cn");
		 ul = document.getElementById("table_meet_sm_cn");
	}else{
		input = document.getElementById("myInput_sm_ref");
		 ul = document.getElementById("table_meet_sm");
	}
    filter = input.value.toUpperCase();
   
	//table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("123");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
           // table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
           // table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}
 
</script>

<!-- phone mobile -->
<script>
	function find_by_phone2(server){
		//alert(123);
		var input, filter, table, tr, td, i;
		var ul,ul2;
 if(server=='cn'){
 	input = document.getElementById("input_sm_phone_cn");
 	ul = document.getElementById("table_no_meet_sm_cn");
 	ul2 = document.getElementById("table_meet_sm_cn");
 }else{
 	input = document.getElementById("input_sm_phone");
 	ul = document.getElementById("table_no_meet_sm");
 	ul2 = document.getElementById("table_meet_sm");
 }
  filter = input.value.toUpperCase();
	//table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
    li = ul.getElementsByClassName("byphone");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {	   
        // li[i].style.display = "";	
			div[i].style.display = "";
        } else {
        //  li[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
    /**
	* 0884681829
	2017-01-23
	*/
    
    filter = input.value.toUpperCase();
	div = ul2.getElementsByClassName("ex");
    li = ul2.getElementsByClassName("byphone");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {	   
        // li[i].style.display = "";	
			div[i].style.display = "";
        } else {
       //   li[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
	
  
}	
</script>

<!-- popup -->
<link rel="stylesheet" href="admin/admin/lab_report/assets_nut/craftpip/css/bootstrap-fullscreen-select.css" />
<style>
.popup-open {
    overflow: hidden;
} 
.css-small-popup {
    /* left: 0px; */
    /* right: 0px; */
    /* bottom: 0px; */
    /*top: 50px;*/
   /* margin-top: 95px;
    margin-left: 30px;*/
/*    margin: 40px;*/
	  margin: 0% auto;
    position : relative;
    width: 100%;
    height: auto%;
    z-index: 9999;
    /* padding: 30px; */
    background-color: #fff;
    border: 2px solid #cccccc;
    border-radius: 10px;
}
.background-smal-popup{
	width: 100%;
	height: 100%;
	z-index: 9990;
	background-color: rgba(0, 0, 0, 0.45);
	top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
}
.close-small-popup{
	position : relative;
/*	right : 50px;
	top : 95px;*/
	z-index : 10000;
	color : #000000;
	width: 100%;
	/*margin-left: -10px;
	margin-top: 5px;*/
}
.css-full-popup2{
	position: fixed;
	width: 100%;
	z-index: 9999;
	background-color: #ffff;
	height: 100%;
/*	margin-top: 48px;*/
}
.btn_select{
		width: 100%; 
		border: 1px solid #ddd; 
		padding: 13px; 
		margin-top: 0px; 
		border-radius: 20px;
		background-color: #fff;
		box-shadow: 1px 1px 5px #ddd;
		background-color: #3b5998;
		color: #ffff;
	}
.td-color{
		color: #3C8DBC; font-size: 16px;
	}
.select-action{
		color: #ffffff; font-size: 16px;
	}	
.sweet-overlay{
	z-index :99900000;
}	
.sweet-alert{
	z-index: 99999999;
}
</style>
<div class="mobileSelect-container white" style="display: none;" id="popup_craftpip_1">
   <div id="animate-dailog" class="" style="transition: all 0.4s;top: 1020px;left: 20px;right: 20px;bottom: 20px;">
  <div class="close-small-popup" align="right" style="right:10px;margin-top: 5px;"><i  class="glyphicon glyphicon-remove close-craftpip-popup" style="font-size:26px; color:#333; "></i></div>
      <div class="mobileSelect-title" style="height: 150px;">
      
         <table width="100%">
            <tbody>
               <tr style="display: nones;">
                  <td width="110"><span style="font-size:20px;">เลือกบริษัท</span></td>
                  <td align="right" valign="top"> </td>
               </tr>
               <tr>
               		<td>
        			<select class="form-control" id="select_company_mobile" style="margin-top:10px;" >
	 	<?php 
	 	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[chk_user_tbk] = $db->select_query("SELECT * FROM ".TB_admin." where username='".$_SESSION['admin_user']."' ");
		$arr[chk_user_tbk] = $db->fetch($res[chk_user_tbk]);
		if($arr[chk_user_tbk][id]){
			if($arr[chk_user_tbk][level] > 4){
				if($arr[chk_user_tbk][admin_company] == '1'){
					
				}else{
					$and_company_tran = " and admin_company = '".$arr[chk_user_tbk][admin_company]."' ";
				}
			}else{
				if($arr[chk_user_tbk][level] == '4'){
					if($arr[chk_user_tbk][id] == '1133'){
						$and_company_tran = " and ( id = '".$arr[chk_user_tbk][id]."'  or id = '1779') ";
					}else{
						$and_company_tran = " and id = '".$arr[chk_user_tbk][id]."' ";
					}
					
				}else{
					$and_company_tran = " and id = '".$arr[chk_user_tbk][postby]."' ";
				}
			}
		}else{
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$res[chk_user_lab] = $db->select_query("SELECT * FROM web_user_lab where username='".$_SESSION['admin_user']."' ");
			$arr[chk_user_lab] = $db->fetch($res[chk_user_lab]);
			if($arr[chk_user_tbk][id]){
				$and_company_tran = " and id = '".$arr[chk_user_lab][postby]."' ";
			}
		}
	 	if($arr[chk_user_tbk][admin_company] == '1' and $arr[chk_user_tbk][level] > 4){ ?>
				<option value="" selected="selected">------- กรุณาเลือก -------</option>
		<?php } 
	 			 $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	 			 $res[com] = $db->select_query("select company,id from ".TB_ADMIN." where level = 4  $and_company_tran ");
				 
				 while($arr[com] = $db->fetch($res[com])) {
				 	$row = $db->num_rows(TB_driver,"id","company = '".$arr[com][id]."' "); 
			if($row>0){
				if($arr[com][id]=='283'){ 
					$selected = "selected";
					}else{
						$selected = " ";
					}	?>
				  <option value="<?=$arr[com][id];?>" <? echo $selected;?> ><?=$arr[com][company];?></option> 
				
	 		   <? 	} 
	 		 } ?>
	 	</select>
               		</td>
               </tr>
			   <tr>
			   		<td>
			   			<div style="width: 100%;margin-top:10px;border:1px solid #ddd;padding:6px;box-shadow: 1px 1px 2px #ddd;font-size: 18px;" align="center">
			   			<span id="old_drivername"></span>
			   			<span class="glyphicon glyphicon-arrow-right"></span>
			   			<span id="new_drivername"><!--<img src="iconstatus/ellipsis.gif"/>--></span>
			   			</div>
			   		</td>
			   </tr>
            </tbody>
         </table>
      </div>
      <div class="list-container" id="list_popup_switch_1" style="margin-bottom:55px !important;margin-top:150px;" ></div>
      <div class="mobileSelect-buttons"><a href="#" class="mobileSelect-savebtn" id="submit_change_driver">ตกลง</a><a href="#" class="mobileSelect-cancelbtn" style="display: none;">ยกเลิก</a></div>
   </div>
   <input type="hidden" id="driver_old_mobile" value="0"/>
   <input type="hidden" id="driver_new_mobile" value="0"/>
   <input type="hidden" id="car_no_mobile" value="0"/>
   <input type="hidden" id="car_no_old_mobile" value="0"/>
   <input type="hidden" id="invoice_mobile" value="0"/>
   <input type="hidden" id="orderid_mobile" value="0"/>
   <input type="hidden" id="server_change_driver" value="0"/>
   <input type="hidden" id="num_of_report" value="0"/>

</div>

<script>
	
	$('#select_company_mobile').change(function(){
		$("#list_popup_switch_1").html('<div style="width: 100%;height: 100%" align="center" ><img src="iconstatus/load_vc.gif" align="center" style="margin-top:50%;" /></div>');
		var id_com = $(this).val();
		if(id_com==0){
			return;
		}
		var driver_old = $('#driver_old').val();
		if($('#server_change_driver').val()==1){
			
			var url = '<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=driver_list&com='+id_com+'&driver_id='+driver_old+'&view=mobile';
		}else{
			var url = 'popup4.php?name=admin/lab_report/query&file=driver_list&com='+id_com+'&driver_id='+driver_old+'&view=mobile';
		}
		console.log(url);

		$("#list_popup_switch_1").load(url);
	});
	
	function changeDriverMobile(driver_id, order_id, date, server, com, invoice, nickname, carno,num_of_report ,type_call){
			console.log(order_id);
			$('#animate-dailog').animate({ "top": "20px" }, 0 );
			$('#popup_craftpip_1').show();
			
			$('body').css('overflow','hidden');
			$('#driver_old_mobile').val(driver_id);
			$('#invoice_mobile').val(invoice);
			$('#orderid_mobile').val(order_id);
			$('#car_no_old_mobile').val(carno);		
			$('#server_change_driver').val(server);		
			$('#num_of_report').val(num_of_report);		
			$('#old_drivername').text(nickname);
//			alert(com);
			$('#select_company_mobile').val(com);
			$('#select_company_mobile').change();
		
		

	}
	
	function SelectDriver(id,car_no,name){
		
		console.log(id+" : "+car_no);
		$('#new_drivername').text(name);
		$('#driver_new_mobile').val(id);
		$('#car_no_mobile').val(car_no);
		$('#list_popup_switch_1 .mobileSelect-control').removeClass('selected');
		
		$('.other').removeClass('select-action');
		$('.other').addClass('td-color');
		
		$('#dv_a_'+id).addClass('selected');
		
		$('#td_'+id).addClass('select-action');
		
		$('#td_'+id).removeClass('td-color')
	
	}
	
	$('#submit_change_driver').click(function(){
		if($('#car_no_mobile').val()==0){
			swal("เลือกคนขับ !", "กรุณาเลือกคนขับที่ต้องการสลับ", "error");
			return;
		}
		var name_old = $('#old_drivername').text();
		var name_new = $('#new_drivername').text();
		
		var order_id = $('#orderid_mobile').val();
		
		var driver_old = $('#driver_old_mobile').val();
		var driver_new = $('#driver_new_mobile').val();
		
		var old_carno = $('#car_no_old_mobile').val();
		var carno = $('#car_no_mobile').val();
		var num_of_report = $('#num_of_report').val();
		
		console.log(order_id);
		var server = $('#server_change_driver').val();
		var posted = '<?=$_SESSION[admin_user];?>';
		if($('#server_change_driver').val()==1){
			var url = '<?php echo $ip_cn;?>admin/admin/lab_report/update_status.php?action=change_driver&drivername='+driver_new+'&old_drivername='+driver_old+'&order_id='+order_id+'&old_carno='+old_carno+'&carno='+carno+'&posted='+posted+'&num_of_report='+num_of_report;
		}else{
			var url = 'admin/admin/lab_report/update_status.php?action=change_driver&drivername='+driver_new+'&old_drivername='+driver_old+'&order_id='+order_id+'&old_carno='+old_carno+'&carno='+carno+'&posted='+posted+'&num_of_report='+num_of_report;
		}
		
		console.log(url);

		swal({
                    title: "คุณแน่ใจหรือไม่?",
                    text: "สลับคนขับรถ "+name_old+" กับ "+name_new+" !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ตกลง",
                    cancelButtonText: "ยกเลิก",
                    
                    closeOnConfirm: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                      $.post(url, function(data) {

				        	var obj = JSON.parse(data);
				        	console.log(obj);
				        	if(obj.order==true && obj.tp_admin==true && obj.tp_data==true &&obj.his==true){
				        		
							swal("บันทึกการเปลี่ยนแปลง!", "รอการตอบรับจากคนขับ", "success");
							$('.close-craftpip-popup').click();
							$('#new_drivername').text('');
							$('#txtKeyword').click();					
							}else{
							swal("บันทึกไม่สำเร็จ", "กรุณาตรวจสอบการบันทึกของคุณ", "error");	
							
							}
							
				        });
                  
                    }
                });
	});
	
	function TelDriver(number){

		window.location.href = 'tel:'+number; 
	}
	
	$('.close-craftpip-popup').click(function(){
			
			$('body').css('overflow','auto');
			$('#animate-dailog').animate({ "top": "1020px" }, 0 );
			
			setTimeout(function(){ $('#popup_craftpip_1').hide(); }, 200);
	});
</script>

<!-- Check In -->
<script>
	function CheckIn(invoice,orderid){
		$('#title_view_modal').text('ถึงสถานที่รับแขก');
		$( "#detail_show" ).html('<div style="width: 100%;height: 100%" align="center" ><img src="iconstatus/load_vc.gif" align="center" style="margin-top:50%;" /></div>');
		var lat = $('#lat').val();
		var lng = $('#lng').val();
		var url = 'popup4.php?name=admin/lab_report/special&file=checkin_place&lat='+lat+'&lng='+lng+'&invoice='+invoice+'&orderid='+orderid;
		$.post( url, function( data ) {
//			console.log(data);
		  $( "#detail_show" ).html( data );
		 
		});
	}
</script>


<input type="hidden" id="place_now" value=""/>
<input type="hidden" id="lat" value=""/>
<input type="hidden" id="lng" value=""/>
<script>
geolocatCallFrist();
function geolocatCallFrist(){
	
		
		    if (navigator.geolocation) {
			        navigator.geolocation.getCurrentPosition(showPosition);
			       
			    } else { 
			       	console.log('ปิดตำแหน่ง');
			    }
		
}	   
	     
function showPosition(position) {
	
	// https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM
	
	 var url = 'https://maps.google.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&sensor=false&language=th&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM';
//	 var url = 'https://maps.google.com/maps/api/geocode/json?latlng=9.13824,99.32175&sensor=false';
    
    $('#lat').val(position.coords.latitude);
    $('#lng').val(position.coords.longitude);
    console.log(position.coords.latitude+" : "+position.coords.longitude);
    $.post( url, function( data ) {
 
		
		if(data.status=="OVER_QUERY_LIMIT"){
			console.log('OVER_QUERY_LIMIT');
 
			 
		}else{
			
			var place = data.results[0].address_components[0].long_name;
			console.log(place);
			$('#place_now').val(place);
			$('#lat').val(position.coords.latitude);
			$('#lng').val(position.coords.longitude);
		}
		
	});
} 

</script>
