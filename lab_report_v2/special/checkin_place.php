<style>
.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
</style>
<form id="data_form" method="post" enctype="multipart/form-data">
<div style="padding-left: 5px;padding-right:5px;">
	<table class="table">
		<tr>
			<td>สถานที่ปัจจุบัน :</td>
			<td><span class="txt-place"></span></td>
		</tr>
		<tr>
			<td>วัน / เวลา : </td>
			<td><?=date('Y-m-d');?>&nbsp;<span id="datetime"></span> น.</td>
		</tr>
	</table>
	 <div style="margin-top: 10px;">
	 		<div style="width: 100%;background-color: #ddd;border: 1px solid #ddd;height: 400px;" id="box_camera" onclick="openSelectFile();">
	 			<div align="center" style="margin-top:150px;"><i class="fa fa-circle-o" aria-hidden="true" style="color: #ffffff;font-size: 100px;"></i></div>
	 			<input type="file" id="photo_checkin" class="inputfile"/>
	 		</div>
	 		<img src="" id="show_img" style="display: none;width: 100%" />
	 </div>
		
	<div style="width: 100%;margin-top:15px;" >
		
	</div>
<input id="lat_location" value="<?=$_GET[lat];?>" name="lat" type="hidden"/>	
<input id="lng_location" value="<?=$_GET[lng];?>" name="lng" type="hidden"/>	
<input id="invoice" value="<?=$_GET[invoice];?>" name="invoice" type="hidden"/>	
<input id="orderid" value="<?=$_GET[orderid];?>" name="invoice" type="hidden"/>	
<button type="button" class="btn " id="submit_checkin" style="width: 100%;    border: 1px solid #ddd;    background-color: #333;    color: #ffff;"><strong style="font-size: 20px;">ยืนยัน</strong></button>	
</div>

</form>
<script>

	 $('.txt-place').text($('#place_now').val());
	 startTime();
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('datetime').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

document.getElementById('box_camera').onclick = function() {
    document.getElementById('photo_checkin').click();
};
document.getElementById('show_img').onclick = function() {
    document.getElementById('photo_checkin').click();
};
	
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#box_camera').hide();	
      $('#show_img').attr('src', e.target.result);
      $('#show_img').show();
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#photo_checkin").change(function() {
  readURL(this);
});

</script>

<script>


$('#submit_checkin').click(function(){

					data_form = $('#data_form').serialize();
					data = new FormData($('#edit_form')[0]);
    				data.append('file', $('#photo_checkin')[0].files[0]);
    				data.append('invoice', $('#invoice').val());
    				data.append('orderid', $('#orderid').val());
    				data.append('lng_location', $('#lng_location').val());
    				data.append('lat_location', $('#lat_location').val());
    				
    				var url = 'admin/admin/lab_report/special/api_action.php?key=checkin_place';
					
					swal({
                    title: "คุณแน่ใจหรือไม่?",
                    text: "คุณแน่ใจใช่ไหมที่จะยืนยันว่าคนขับถึงสถานที่แล้ว !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ตกลง",
                    cancelButtonText: "ยกเลิก",
                    
                    closeOnConfirm: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
					                url: url, // point to server-side PHP script 
					                dataType: 'text',  // what to expect back from the PHP script, if anything
					                cache: false,
					                contentType: false,
					                processData: false,
					                data: data,                         
					                type: 'post',
					                success: function(php_script_response){
//					                   console.log(php_script_response);
									   var obj = JSON.parse(php_script_response);
									   console.log(obj);
										   if(obj.last_result == true){
										   	swal("บันทึกสำเร็จ", "กดปุ่มเพื่อปิด!", "success");
										   }
										  else{
										  	swal("เกิดข้อผิดพลาด", "กดปุ่มเพื่อปิด!", "error");									
											}
											
									}
							});
						var url_post = 'https://goldenbeachgroup.com/app/driver_master/api_clone_img.php?key=post_img';
					                  		 $.ajax({
										                url: url_post, // point to server-side PHP script 
										                dataType: 'text',  // what to expect back from the PHP script, if anything
										                cache: false,
										                contentType: false,
										                crossDomain: true,
										                processData: false,
										                data: data,                         
										                type: 'post',
										                success: function(data){
										                   console.log(data);
														   
														}
														
												});
                    }
                });
					

	
});
					

</script>


























































