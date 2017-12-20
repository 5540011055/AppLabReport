<?php // $db-> connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD); // $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD); ?>
<? $part_img_load_big='<img src="admin/admin/transfer/new/js_load/loading-large.gif"/>' ; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="admin/admin/lab_report/assets_nut/datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
<link rel="stylesheet" type="text/css" href="admin/admin/lab_report/assets_nut/datetimepicker-master/jquery.datetimepicker.css" />
<script src="js/sweetalert-master/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="js/sweetalert-master/dist/sweetalert.css">

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
        
        background: linear-gradient(#66ccff, white);
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
        color: #2e7da3;
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
	
</style>

<?php include('admin/admin/lab_report/connect_cn.php'); ?>

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
            var date = $("#datetimepicker4").val();
            var type = $("#type_order").val();
            var company_tran = $("#company_tran").val();
            var url = 'popup4.php?name=admin/lab_report&file=report_doc_query&date_tran=' + date + '&key_word=' + keyword + '&type=' + type + '&company=' + company_tran+'&user='+'<?=$_SESSION[admin_user];?>';

            var url_cn = '<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=report_doc_query&date_tran=' + date + '&key_word=' + keyword + '&type=' + type + '&company=' + company_tran+"&server=cn"+'&user='+'<?=$_SESSION[admin_user];?>';
			
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
        var date = $("#datetimepicker4").val();
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

<div class="container">
    <div class="hidden-lg hidden-md">
        <button class="btn btn-success" id="btn_search_form">Search</button>
        <input type="hidden" id="chk_val_search" value="0" />
    </div>
    <script>
        $('#btn_search_form').click(function() {
            var chk_val_search = $('#chk_val_search').val();
            if (chk_val_search == 1) {
                $('#chk_val_search').val(0);
                $('#div_search_form').addClass('hidden-xs hidden-sm');
            } else {
                $('#chk_val_search').val(1);
                $('#div_search_form').removeClass('hidden-xs hidden-sm');
            }

        });
    </script>
    <div class="row well hidden-xs hidden-sm" id="div_search_form">
        <div class="col-lg-3 col-md-3 col-sm-3">
            <table cellspacing="5" cellspacing="5" >
                <tr>
                    <td>
                        <input type="text" id="datetimepicker4" name="starttime" value="<? echo date('Y-m-d'); ?>" class="form-control"/>
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
        <div class="col-lg-3 col-md-3 col-sm-3">
            <select name="company_tran" id="company_tran" class="form-control">

                <option value="" selected="selected">------- กรุณาเลือก -------</option>
                <?php $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD); $res[category] = $db->select_query("SELECT * FROM ".TB_admin." where control_transfer=1 ORDER by service ASC "); while ($arr[category] = $db->fetch($res[category])){ $num_row = $db->num_rows("web_transferproduct","id","company = '".$arr[category][id]."' and status = '1' "); if($num_row>0){ ?>
                <option value="<?php echo $arr[category][id];?>">
                    <?php echo $arr[category][company];?>
                </option>
                <?php } } ?>
            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <button id="txtKeyword" type="text" class="btn btn-primary" style="width: 100%;">Search</button>
        </div>

    </div>
	
    <div id="tabs-container">
       	<div class="tabs-menu">
       	<table width="100%"><tr><td>
           <a href="#tab-1"> <button class="btn btn-info active" id="tab1"><img src="iconstatus/flag/th.png" align="absmiddle" /> <strong>เซิร์ฟเวอร์ ไทย</strong> <span id="showno_meet_th"></span></button></a>
           </td><td>
           <a href="#tab-2"> <button class="btn btn-info" id="tab2"><img src="iconstatus/flag/cn.png" align="absmiddle" /> <strong>เซิร์ฟเวอร์ จีน</strong> <span id="showno_meet_cn"></span> </button></a></td>
           </tr> </table>
    </div><br/><br/>
		
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
<input type="text" class="form-control" id="myInput" onkeyup="find_by_invoice()" placeholder="Search for Voucher.." title="Type in a voucher"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><input type="text" class="form-control" id="myInput_ref" onkeyup="find_by_ref()" placeholder="Search for agent reference.." title="Type in a agent ref"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><input type="text" class="form-control" id="myInput_name" onkeyup="find_by_name()" placeholder="Search for guest name.." title="Type in a name"></td>
		</tr>
		</table >
		</div><br/><br/>
		
		<div class="hidden-lg hidden-md">
		
		<input type="text" class="form-control" id="myInput_sm" onkeyup="find_by_invoice2()" placeholder="Search for Voucher.." title="Type in a voucher"><br />
		<input type="text" class="form-control" id="myInput_sm_ref" onkeyup="find_by_ref2()" placeholder="Search for agent reference.." title="Type in a agent ref"><br />
		<input type="text" class="form-control" id="myInput_sm_name" onkeyup="find_by_name2()" placeholder="Search for guest name.." title="Type in a name">

		</div>
		<script>
function find_by_invoice2(server) {
  table_nomeet_sm(server);
  table_meet_sm(server);
}

function table_nomeet_sm(server){
 var input, filter, ul, li, a, i;
 if(server=='cn'){
 	input = document.getElementById("myInput_sm_cn");
 	ul = document.getElementById("table_no_meet_sm_cn");
 }else{
 	input = document.getElementById("myInput_sm");
 	ul = document.getElementById("table_no_meet_sm");
 }
    
    filter = input.value.toUpperCase();
	table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("123");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
            table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
            table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}
function table_meet_sm(server){
 	var input, filter, ul, li, a, i;
  if(server=='cn'){
 	input = document.getElementById("myInput_sm_cn");
 	ul = document.getElementById("table_meet_sm_cn");
 }else{
 	input = document.getElementById("myInput_sm");
 	ul = document.getElementById("table_meet_sm");
 }
   
    filter = input.value.toUpperCase();
	table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("123");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
            table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
            table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}



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
	table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("byname");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
            table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
            table[i].style.display = "none";
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
	table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("byname");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
            table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
            table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}


</script>
			    <div id="show_table_all"></div>
                <div id="show_table"> </div>
            </div>

            <div id="tab-2" class="tab-content"> <!--- cn --->
            <div class="hidden-xs hidden-sm">
            <table cellspacing="5" cellspacing="5" width="100%" >
		<tr><td>
<input type="text" class="form-control" id="myInput_cn" onkeyup="find_by_invoice('cn')" placeholder="Search for Voucher.." title="Type in a voucher"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><input type="text" class="form-control" id="myInput_ref_cn" onkeyup="find_by_ref('cn')" placeholder="Search for agent reference.." title="Type in a agent ref"></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><input type="text" class="form-control" id="myInput_name_cn" onkeyup="find_by_name('cn')" placeholder="Search for guest name.." title="Type in a name"></td>
	
		</tr>
		</table ></div><br/><br/>
		<div class="hidden-lg hidden-md">
		
		<input type="text" class="form-control" id="myInput_sm_cn" onkeyup="find_by_invoice2('cn')" placeholder="Search for Voucher.." title="Type in a voucher"><br />
		<input type="text" class="form-control" id="myInput_sm_ref_cn" onkeyup="find_by_ref2('cn')" placeholder="Search for agent reference.." title="Type in a agent ref"><br />
		<input type="text" class="form-control" id="myInput_sm_name_cn" onkeyup="find_by_name2('cn')" placeholder="Search for guest name.." title="Type in a name">
		</div>
		
			<div id="show_table_all_cn"></div>
                <div id="show_table_cn"> </div>
            </div>


            <script>
                $(document).ready(function() {
                    $(".tabs-menu a").click(function(event) {
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

<div class="modal fade" id="view_detail_lab_report" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
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

        var date = $("#datetimepicker4").val();
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
    function showImg() {
        //document.getElementById("#open").style.color = "red";
        $('#open').click();
    }

    $('#datetimepicker4').datetimepicker({
        timepicker: false,
        format: 'Y-m-d'
    });
    $('#open').click(function() {

        $('#datetimepicker4').datetimepicker('show');
    });
</script>


<script>
    /*function update_lab_approve(id, status, vc,server,user) {

		if(server==1){
		   var url = "<?php echo $ip_cn;?>popup4.php?name=admin/lab_report&file=update_status&action=approve&status=" + status+"&user="+user;
		}else{
		    var url = "popup4.php?name=admin/lab_report&file=update_status&action=approve&status=" + status+"&user="+user;
		}
            
            //
            $.post(url, {
                id: id,
                invoice: vc,
				server : server
            }, function(data) {
                swal("สำเร็จ!", "รับงานสำเร็จ!", "success")
                jQuery('#txtKeyword').click();
            });


        } */
		
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
                $(".cls_hide_"+id).show(500);
				$('#id_'+id).attr('class', 'glyphicon glyphicon-chevron-up');
            } else {
                $('#each_'+id).val(0);
				$(".cls_hide_"+id).hide(500);
				$('#id_'+id).attr('class', 'glyphicon glyphicon-chevron-down');
            }
}
</script>

<script>
/*
function find_by_invoice2() {
  table_nomeet_sm();
  table_meet_sm();
}

function table_nomeet_sm(){
 var input, filter, ul, li, a, i;
    input = document.getElementById("myInput_sm");
    filter = input.value.toUpperCase();
    ul = document.getElementById("table_no_meet_sm");
	table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
            table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}

function table_meet_sm(){
 var input, filter, ul, li, a, i;
    input = document.getElementById("myInput_sm");
    filter = input.value.toUpperCase();
    ul = document.getElementById("table_meet_sm");
	table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
            table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}
*/


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
	table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("123");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
            table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
            table[i].style.display = "none";
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
   
	table = ul.getElementsByTagName("table"); 
	div = ul.getElementsByClassName("ex");
	
    li = ul.getElementsByClassName("123");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
	//	alert(li[i].getElementsByTagName("a")[0].innerHTML);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   
            table[i].style.display = "";
			
			div[i].style.display = "";
        } else {
		
            table[i].style.display = "none";
			div[i].style.display = "none";
        }
    }
}
 
</script>