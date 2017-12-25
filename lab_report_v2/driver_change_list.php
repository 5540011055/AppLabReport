<?php 
if($_GET[call]=='action'){ ?>
<style>
	.box-pad{
	padding: 10px;
    border: 1px solid #ddd;
    width: 200px;
    margin: 10px;
    box-shadow: 1px 1px 5px #6f6f6f;
	}
</style>
<script>

$( document ).ready(function() {
	var com = '<?=$_POST[com];?>';
	
	$('#select_company').val(com);
   $('#select_company').change();
});
</script>
<?php
		////////////// check user
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
$res[driverold] = $db->select_query("select id,name,post_date,car_num,nickname from web_driver where id = '".$_POST[driver_id]."' and status = 1  ");
$arr[driverold] = mysql_fetch_array($res[driverold]);
?>
		
 
<div id="dataTable2"  align="center"> 
	 <table width="80%">
	 <tr>
	 <td align="center"><strong>Company</strong></td>
	 <td width="70%">
	 	<select class="form-control" id="select_company" >
	 	<?php if($arr[chk_user_tbk][admin_company] == '1' and $arr[chk_user_tbk][level] > 4){ ?>
				<option value="0">------- กรุณาเลือก -------</option>
		<?php } ?>
	 		<?php 
	 			 $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	 			 $res[com] = $db->select_query("select company,id from ".TB_ADMIN." where level = 4  $and_company_tran ");
				 
				 while($arr[com] = $db->fetch($res[com])) {
				 	$row = $db->num_rows(TB_driver,"id","company = '".$arr[com][id]."' "); 
			if($row>0){
				if($arr[com][id]==$_POST[com]){ 
					$selected = "selected";
					}else{
						$selected = " ";
					} 	?>
				  <option value="<?=$arr[com][id];?>" <? echo $selected;?> ><?=$arr[com][company];?></option> 
				
	 		   <? 	} 
	 		 } ?>
	 	</select>
	 </td>
	 </tr>
	 <tr><td><br></td></tr>
	 <tr>
	 <td  align="center"><strong>Driver</strong></td>
	 <td>
	 <div id="show_driver"></div>
	 	
	 </td>
	 </tr>
	 <tr>
	 	<td colspan="3" align="center">
	 		<div style="margin-top: 20px;">
	 		<table width="100%">
			<tr>
		<td align="center" width="45%">
			<table  width="100%">
				<tr>
					<td align="center"><span style="font-size: 20px;"><strong>คนขับเดิม</strong></span></td>
				</tr>
				<tr>
					<td align="center">
						<div class="box-pad">
							<span><?=$arr[driverold][nickname]." เบอร์ : ".$arr[driverold][car_num];?></span>
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top">
						<div align="center" style="padding: 0px;    margin-top: 20px;margin-bottom:20px;">
<img src="admin/file/driver/pic/<?=$arr[driverold][post_date]?>.jpg?v=<?=time();?>" style="   width: 200px;height:280px; border: 1px solid #ddd;box-shadow: 1px 1px 5px #ddd; " />
	 					</div>
					</td>
				</tr>
			</table>
		</td>
		<td  width="10%" align="center">
			<span class="glyphicon glyphicon-arrow-left" style="font-size:30px;color: green;"></span>
			<br/><br/>
			<span class="glyphicon glyphicon-arrow-right" style="font-size:30px;color: red;"></span>
		</td>
		<td align="center" width="45%">
			<table width="100%">
				<tr >
					<td align="center"><span style="font-size: 20px;"><strong>คนใหม่</strong></span></td>
				</tr>
				<tr>
					<td align="center">
					<div class="box-pad"><span id="new_driver"><?=$arr[drivernew][nickname]." เบอร์ : ".$arr[drivernew][car_num];?></span></div>
					</td>
				</tr>
				<tr>
					<td  valign="top">
						<div align="center" style="padding: 0px;    margin-top: 20px;margin-bottom:20px;">
	 			<img id="img_driver" src="admin/file/driver/pic/no.jpg?v=<?=time();?>" style="  width: 200px;height:280px; border: 1px solid #ddd;box-shadow: 1px 1px 5px #ddd; " />
	 					</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	
			</table>
			</div>
	 	</td>
	 </tr>
	 <tr>
	 <td colspan="3" align="center">
	 	<button class="btn btn-success" id="save_driver_chagne" style="width: 300px;"><strong style=" font-size: 20px;">บันทึก</strong></button>
	 </td>	
	 </tr>
	 </table>
</div>
<?php 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[report_all] = $db->select_query("SELECT id FROM transfer_report_all WHERE orderid = '".$_POST[order_id]."' ");
$arr[report_all] = $db->fetch($res[report_all]);
$db->closedb ();
?>
<input type="hidden" id="id_report_all" value="<?=$arr[report_all][id];?>"/>
<input type="hidden" id="orderid" value="<?=$_POST[order_id];?>"/>
<input type="hidden" id="driver_old" value="<?=$_POST[driver_id]?>"/>
<input type="hidden" id="invoice" value="<?=$_POST[invoice];?>"/>

<?php 
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[driver] = $db->select_query("select car_num, phone from web_driver where id = '".$_POST[driver_id]."' ");
$arr[driver] = mysql_fetch_array($res[driver]);
$db->closedb ();
?>
<input type="hidden" id="old_carno" value="<?=$arr[driver][car_num];?>"/>
<input type="hidden" id="carno" value="0"/>
<input type="hidden" id="server" value="<?=$_POST[server];?>"/>

<script>
	
	$('#select_company').change(function(){
		
		$("#show_driver").html('<img src="iconstatus/load_vc.gif" align="center" />');
		var id_com = $(this).val();
		var driver_old = $('#driver_old').val();
		var url = '?name=admin/lab_report/query&file=driver_list&com='+id_com+'&driver_id='+driver_old+'&view=desktop';
		
		$("#show_driver").load(url);
	});
	
	
	
</script>

<script>
	$('#save_driver_chagne').click(function() {
		

		var order_id = $('#orderid').val();
		var data_id = $('#id_report_all').val();
		var driver_old = $('#driver_old').val();
		var driver_new = $('#select_driver').val();
		
		var old_carno = $('#old_carno').val();
		var carno = $('#carno').val();
		var posted = '<?=$_SESSION[admin_user];?>';
		console.log(order_id);
		if($('#server').val()==1){
			var url = '<?php echo $ip_cn;?>admin/admin/lab_report/update_status.php?action=change_driver&drivername='+driver_new+'&old_drivername='+driver_old+'&order_id='+order_id+'&old_carno='+old_carno+'&carno='+carno+'&posted='+posted
		}else{
		
		var url = 'admin/admin/lab_report/update_status.php?action=change_driver&drivername='+driver_new+'&old_drivername='+driver_old+'&order_id='+order_id+'&old_carno='+old_carno+'&carno='+carno+'&posted='+posted;
			
		}
		console.log(url);
		
		
swal({
  title: "ต้องการสลับงาน ?",
  text: "คุณต้องการสลับงานให้คนขับรถคนนี้หรือไม่ ?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "ตกลง!",
  cancelButtonText: "ยกเลิก",
  closeOnConfirm: false
},
function(){
	
  		$.post(url, function(data) {
  			
        	var obj = JSON.parse(data);
        	console.log(obj);
        	if(obj.order==true && obj.tp_admin==true && obj.tp_data==true &&obj.his==true){

			swal("บันทึกการเปลี่ยนแปลง!", "รอการตอบรับจากคนขับ", "success");
			/*var txt_op =  $('#select_driver option:selected').text();
	    	var nickname =  txt_op.split("(");
			var date = $('.date_search').text();
		
			$('#pc_dv_'+order_id).html('<a data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" onclick="driverPro('+driver_new+',\'' + nickname[0] + '\',\'' + date + '\','+$('#server').val()+');"  style="cursor:pointer;" >'+nickname[0]+' '+carno+'<a/>');*/
			
			$('.close').click();
			$('#txtKeyword').click();
			}else{
			swal("บันทึกไม่สำเร็จ", "กรุณาตรวจสอบการบันทึกของคุณ", "error");	
				
			}
			
        });
});

	});
	
	function load_new_driver(order_id){
		
		var load_driver = 'action';
		var plate_color;
		var green;
		url = 'admin/admin/lab_report/update_status.php';
		$('#dv_'+order_id).html('<img src="iconstatus/ellipsis.gif" width="30" height="30" />');
		$('#img_'+order_id).html('<img src="iconstatus/ellipsis.gif" width="30" height="30" />');
		$('#plate_'+order_id).html('<img src="iconstatus/ellipsis.gif" width="30" height="30" />');
		$('#pc_dv_'+order_id).html('<img src="iconstatus/ellipsis.gif" width="30" height="30" />');
		$.post(url, {
           order_id:order_id,
           load_driver : load_driver
        }, function(data) {
        	//alert(data);
			var res = JSON.parse(data);
var server = $('#server').val();
var date = $('#date').val();

$('#dv_'+order_id).html(res.nickname+" "+res.carno);
$('#pc_dv_'+order_id).html('<a data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" onclick="driverPro(\''+res.id+'\',\''+res.nickname+'\',\''+date+'\',\''+server+'\');" style="cursor:pointer;">'+res.nickname+'<br>'+res.carno+'</a>');
$('#img_'+order_id).html('<a data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" onclick="driverPro(\''+res.id+'\',\''+res.nickname+'\',\''+date+'\',\''+server+'\');" style="cursor:pointer;" ><img src="admin/file/driver/pic/'+res.post_date+'.jpg" name="view01"  width="60" height="75" border="0" id="view01" class="IMGSHOP" /></a>'); 

 if(res.plate_color=="Green"){
plate_color="009999";
green = "FFFFFF"; } 
if(res.plate_color=="Yellow"){
plate_color="FFCC00"; 
green = "";} 
if(res.plate_color=="Black"){
plate_color="FFFFFF";
green = ""; } 
if(res.plate_color=="Red"){
plate_color="FF0000"; 
green = "";} 
var txtTd = '<td width="90"align="center"bgcolor="#'+plate_color+'"style="border:solid1px;color:#CCCCCC;padding:2px;"><font color="#'+green+'"style="font-size:14px;"><b>'+res.plate_num+'<br/><font style=" font-size:13px;">'+res.province+'</font></td>'; 
$('#plate_'+order_id).html(txtTd);
           
        });
	}
	
</script>
<?	
}

if($_GET[call]=='view') { 
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[change] = $db->select_query("select driver_old_id,driver_new_id from web_change_driver where orderid = '".$_POST[order_id]."' and status = 1 limit 1 ");
$arr[change] = mysql_fetch_array($res[change]);

$res[driverold] = $db->select_query("select id,name,post_date,car_num,nickname from web_driver where id = '".$arr[change][driver_old_id]."' and status = 1  ");
$arr[driverold] = mysql_fetch_array($res[driverold]);

$res[drivernew] = $db->select_query("select id,name,post_date,car_num,nickname from web_driver where id = '".$arr[change][driver_new_id]."' and status = 1  ");
$arr[drivernew] = mysql_fetch_array($res[drivernew]);
?>
<style>
	.box-pad{
	padding: 10px;
    border: 1px solid #ddd;
    width: 200px;
    margin: 10px;
    box-shadow: 1px 1px 5px #6f6f6f;
	}
</style>
<div id="dataTable2"  align="center"> 
<table width="100%">
	<tr>
		<td align="center" width="45%">
			<table  width="100%">
				<tr>
					<td align="center"><span style="font-size: 20px;"><strong>คนขับเดิม</strong></span></td>
				</tr>
				<tr>
					<td align="center">
						<div class="box-pad">
							<span><?=$arr[driverold][nickname]." เบอร์ : ".$arr[driverold][car_num];?></span>
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top">
						<div align="center" style="padding: 0px;    margin-top: 20px;margin-bottom:20px;">
	 			<img src="admin/file/driver/pic/<?=$arr[driverold][post_date]?>.jpg?v=<?=time();?>" style="   max-width: 200px; border: 1px solid #ddd;box-shadow: 1px 1px 5px #ddd; " id="img_driver" />
	 					</div>
					</td>
				</tr>
			</table>
		</td>
		<td  width="10%" align="center">
			<span class="glyphicon glyphicon-arrow-left" style="font-size:30px;color: green;"></span>
			<br/><br/>
			<span class="glyphicon glyphicon-arrow-right" style="font-size:30px;color: red;"></span>
		</td>
		<td align="center" width="45%">
			<table width="100%">
				<tr >
					<td align="center"><span style="font-size: 20px;"><strong>คนใหม่</strong></span></td>
				</tr>
				<tr>
					<td align="center">
					<div class="box-pad"><span><?=$arr[drivernew][nickname]." เบอร์ : ".$arr[drivernew][car_num];?></span></div>
					</td>
				</tr>
				<tr>
					<td  valign="top">
						<div align="center" style="padding: 0px;    margin-top: 20px;margin-bottom:20px;">
	 			<img src="admin/file/driver/pic/<?=$arr[drivernew][post_date]?>.jpg?v=<?=time();?>" style="   max-width: 200px; border: 1px solid #ddd;box-shadow: 1px 1px 5px #ddd; " id="img_driver" />
	 					</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<div style="width: 350px;border: 1px solid #ddd;padding:15px;border-radius: 25px; margin-top: 5px;box-shadow: 1px 1px 5px #6f6f6f;">
				<span style="font-size:20px;"><strong>สถานะ : รอยืนยันจากคนขับรถ</strong></span>
				<img src="iconstatus/ellipsis.gif"/>
			</div>
			
		</td>
	</tr>
</table>
</div>
<? } 

if($_GET[call]=='view_history_change_driver'){
	echo $_GET[order_id];
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[his] = $db->select_query("select * from web_history_change_driver_lab where orderid = '".$_POST[order_id]."' and status = 1 order by id desc");
while($arr[his] = $db->fetch($res[his])){ 
	$array[] = $arr[his];
	}
?>
<style>
	.box-img-his{
		width: 100px;box-shadow: 1px 1px 10px #999;border: 1px solid #ddd;padding:5px;margin-top:10px;margin-bottom: 10px;
	}
	.mobile-box{
		border: 1px solid #ddd;
		margin-bottom :15px;
		padding: 15px;
		box-shadow: 2px 2px 5px #ddd;
	}
	.number-box-mobile{
	width: 45px;
    background-color: #f38888;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 60px;
    color: #ffff;
    font-size: 20px;
    position : absolute;
    left : 10px;
    margin-top: -9px;
	}
</style>
<table width="100%">
	<tr>
		<td>
		
		<div class="hidden-xs hidden-sm">
			<table class="table table-striped">
				<th>ลำดับ</th>
				<th>คนขับคนใหม่</th>
				<th>คนขับคนเก่า</th>
				<th>อัพเดทล่าสุด</th>
				<th>ผู้อัพเดท</th>
				<tbody>
					<? foreach($array as $desktop){ 
						$res[driver_new] = $db->select_query("select nickname,post_date,car_num  from web_driver where 	id = '".$desktop[driver_new_id]."' ");
                  		$arr[driver_new] = mysql_fetch_array($res[driver_new]);
                  		if($arr[driver_new][nickname]==""){
							$arr[driver_new][nickname] = '-';
						}
                  		$res[driver_old] = $db->select_query("select nickname,post_date,car_num  from web_driver where 	id = '".$desktop[driver_old_id]."' ");
                  		$arr[driver_old] = mysql_fetch_array($res[driver_old]);
                  		if($arr[driver_old][nickname]==""){
							$arr[driver_old][nickname] = '-';
						}
					?>
					<tr>
						<td align="center"><?=$desktop[id];?></td>
						<td>
							<table>
								<tr>
									<td align="center"><span style="font-size: 20px;"><?=$arr[driver_new][nickname];?></span></td>
								</tr>
								<tr>
									<td><img src="admin/file/driver/pic/<?=$arr[driver_new][post_date]?>.jpg?v=<?=time();?>" class="box-img-his"/></td>
								</tr>
							</table>
						</td>
						<td>
							<table>
								<tr>
									<td align="center"><span style="font-size: 20px;"><?=$arr[driver_old][nickname];?></span></td>
								</tr>
								<tr>
									<td><img src="admin/file/driver/pic/<?=$arr[driver_old][post_date]?>.jpg?v=<?=time();?>" class="box-img-his"  /></td>
								</tr>
							</table>
						</td>
						<td align="center"><?=date('Y-m-d H:i:s', $desktop[post_date]);?></td>
						<td align="center"><?=$desktop[posted];?></td>
					</tr>
					<? } ?>
				</tbody>
			</table>
		</div>
		
		<div class="hidden-lg hidden-md" style="    padding-left: 10px;    padding-right: 10px;">
		<?php foreach($array as $mobile){   
						$res[driver_new] = $db->select_query("select nickname,post_date,car_num  from web_driver where 	id = '".$mobile[driver_new_id]."' ");
                  		$arr[driver_new] = mysql_fetch_array($res[driver_new]);
                  		if($arr[driver_new][nickname]==""){
							$arr[driver_new][nickname] = '-';
						}
                  		$res[driver_old] = $db->select_query("select nickname,post_date,car_num  from web_driver where 	id = '".$mobile[driver_old_id]."' ");
                  		$arr[driver_old] = mysql_fetch_array($res[driver_old]);
                  		if($arr[driver_old][nickname]==""){
							$arr[driver_old][nickname] = '-';
						}
		?>
		<div class="number-box-mobile" align="center" ><?=$mobile[id];?></div>
		<div class="mobile-box">
			<table width="100%">
				<tr>
					<td><strong>คนขับ</strong></td>
					<td>
						<table width="100%">
							<tr>
								<td align="center"><span style="font-size: 18px;"><?=$arr[driver_new][nickname]." ";?></span><strong><?=$arr[driver_new][car_num];?></strong></td>
								<td align="center"><span style="font-size: 18px;"><?=$arr[driver_old][nickname]." ";?></span><strong><?=$arr[driver_old][car_num];?></strong></td>
							</tr>
							<tr>
								<td align="center"><img src="admin/file/driver/pic/<?=$arr[driver_new][post_date]?>.jpg?v=<?=time();?>" class="box-img-his" style="width: 80px;margin-bottom:15px;"/></td>
								<td align="center"><img src="admin/file/driver/pic/<?=$arr[driver_old][post_date]?>.jpg?v=<?=time();?>" class="box-img-his" style="width: 80px;margin-bottom:15px;"/></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td><strong>อัพเดทล่าสุด</strong></td>
					<td><?=date('Y-m-d H:i:s', $mobile[post_date]);?></td>
				</tr>
				
			</table>
		</div>	
		<? } ?>	
		</div>
		
		</td>
	</tr>
</table>
	 
<? }
?>

