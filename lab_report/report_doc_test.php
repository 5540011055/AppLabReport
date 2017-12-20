 
<?php 	// $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
	// $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD); ?>
	 <? $part_img_load_big = '<img src="admin/admin/transfer/new/js_load/loading-large.gif"/>'; ?>
	 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="admin/admin/lab_report/assets_nut/datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
  <link rel="stylesheet" type="text/css" href="admin/admin/lab_report/assets_nut/datetimepicker-master/jquery.datetimepicker.css"/>
 
  <!-- This is what you need -->
  <script src="js/sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="js/sweetalert-master/dist/sweetalert.css">



<style type="text/css">
<!--

td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	
}
.td_cl {

	 background-color: lightblue;
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

.btn-hv{
transition: all 0.5s ease 0s;
}

.btn-hv:hover {
  background: #CF4647;
}

</style>

<script>
window.onload = function(){

  jQuery(function(){
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
   var url = 'popup3.php?name=admin/lab_report&file=report_doc_query&date_tran='+date+'&key_word='+keyword+'&type='+type+'&company='+company_tran;

	   $('#show_table').html('<div align="center"><?=$part_img_load_big;?></div>');
       $("#show_table" ).load( url+" #tableData" );
	    //alert(date);
	  // $("#num_page" ).load( url+" #num_page" );   
   }
   
   
   
   //$("#filter").on("click", RefreshTable);
   $("#txtKeyword").on("click", Search);
   $("#txtSearch").on("click", Search);
   
});
	
</script>

<div class="" style="width:100%;">
        <div class="table-responsive">
<input  type="text"  id="datetimepicker4" name="starttime" value="<? //echo date('Y-m-d'); ?>"  /><img onclick="showImg()" src="images/admin/dateselect.gif" alt="Mountain View" style="cursor:pointer">
<button id="filter" class="myButton" name="filter" style="display:none;" >กรอง</button>
 <select id="type_order" name="type_order" > <option value="0">All</option>
 											 <option value="1" selected="selected">In</option>
 											 <option value="2">Out</option>
											 <option value="3">Point</option>
											 <option value="4">Service</option>
											  
 	</select>
	    <select name="company_tran" id="company_tran"  style="width: auto; ">
							 
	   <option value="" selected="selected">------- กรุณาเลือก -------</option>
<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[category] = $db->select_query("SELECT * FROM ".TB_admin." where  control_transfer=1 ORDER by service  ASC   ");

while ($arr[category] = $db->fetch($res[category])){
$num_row = $db->num_rows("web_transferproduct","id","company = '".$arr[category][id]."' and status = '1' ");
	if($num_row>0){
	?><option value="<?php echo $arr[category][id];?>"><?php echo $arr[category][company];?></option> <?php	 
	}
}
?>
                            </select>
							
	 <button id="txtKeyword" type="text" class="myButton" style="cursor:pointer">Search</button>
              <br /><br /><br />  </div>
            
        </div>
	

<div id="show_table"></div>


                
          

<div class="modal fade" id="view_history" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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
function viewHistory(id){

$("#his_show" ).html('<div align="center"><img src="iconstatus/loader.gif"/></div>');	

	 var url ="popup3.php?name=admin/lab_report&file=report_doc_histroy&id_order="+id;
		$.post(url,function(data){
	
		$("#his_show" ).html(data);	
			//alert(url);	
		} );

}
</script>		
		
		
		
		
<button class="btn btn-primary btn-xs" data-title="View" data-toggle="modal" data-target="#view_detail_lab_report" style="display:none;" >test</button>
<input id="open" type="button" value="open" style="display:none;"/>

<div class="modal fade" id="view_detail_lab_report" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">รายละเอียด</h4>
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

function viewDetail(id_order){

var date = $("#datetimepicker4").val();	
$("#detail_show" ).html('<div align="center"><img src="iconstatus/loader.gif"/></div>');	

	 var url ="popup3.php?name=admin/lab_report&file=report_doc_detail&id_order="+id_order+"&date_tran="+date;
		$.post(url,function(data){
	
		$("#detail_show" ).html(data);	
			//alert(url);	
		} );

}
   
</script>    
    
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
	
<script>
function showImg()
{
//document.getElementById("#open").style.color = "red";
$('#open').click();
}

$('#datetimepicker4').datetimepicker({
timepicker:false,
format:'Y-m-d'});
$('#open').click(function(){
	
	$('#datetimepicker4').datetimepicker('show');
});
</script>	


<script>
function update_lab_approve(id,status,vc){
var url = "?name=admin/lab_report&file=update_status&action=approve&status="+status;
//
  $.post(url,{ id:id ,invoice:vc},function(data){
	swal("สำเร็จ!", "รับงานสำเร็จ!", "success")
	jQuery('#txtKeyword').click();
  });


}
//------------------------------------------
function update_lab_meet(id,status,vc){
//alert(id);
var url = "?name=admin/lab_report&file=update_status&action=meet&status="+status;
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
function(isConfirm){
  if (isConfirm) {
  		$.post(url,{ id:id,invoice:vc },function(data){	
		//swal("Deleted!", "Your imaginary file has been deleted.", "success");
		jQuery('#txtKeyword').click();
		} );
    
  } 
  //else {
   	//	swal("Cancelled", "Your imaginary file is safe :)", "error");
  //}
});	
}
//-------------------------------------------
</script>

<script>
function update_approve_all(num){

var url = "popup3.php?name=admin/lab_report&file=update_status&action=all";
var data_form = $('#approve_all').serialize();
//alert(data_form);

swal({
  title: "ยืนยันการรับงานทั้งหมด "+num+" งาน",
  text: "กรุณากดตกลงเพื่อรับงานทั้งหมด",
  type: "info",
  confirmButtonText: "ตกลง, รับงาน!",
  cancelButtonText: "ไม่, ยกเลิก!",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true,
},
function(){
 $.post(url,data_form,function(data){	
			jQuery('#txtKeyword').click();
			
		} );
  
});

}
</script>