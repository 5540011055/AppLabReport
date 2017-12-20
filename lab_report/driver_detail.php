
<style>
.customer {
    background-color: #cce6ff;
    padding: 5px;
    border: 1px solid lightblue;
}
.dv-td {
  background: #f2e6ff;
  border:1px solid #CCCCCC ;
  border-collapse: collapse;
}
</style>

<div id="dataTable2"  align="center"> 
<?php 
	//$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res[order] = $db->select_query("SELECT t1.id, t1.program, t1.airout_h, t1.airout_m, t1.air, t1.drivername, t1.to_place, t1.pickup_place, t1.pax, t1.orderid, t1.agent, t1.lab_meet, t1.lab_approve, t1.invoice, t1.outdate, t1.company
FROM web_order AS t1
WHERE t1.drivername =  '".$_POST[driver_id]."'
AND t1.transfer_date =  '".$_POST[date]."'
 order by t1.lab_meet ASC, t1.outdate ASC , t1.airout_h ASC , t1.airout_m ASC
  ");
	
	$db->connectdb_cn(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res[order_cn] = $db->select_query("SELECT t1.id, t1.program, t1.airout_h, t1.airout_m, t1.air, t1.drivername, t1.to_place, t1.pickup_place, t1.pax, t1.orderid, t1.agent, t1.lab_meet, t1.lab_approve, t1.invoice, t1.outdate, t1.company
FROM web_order AS t1
WHERE t1.drivername =  '".$_POST[driver_id]."'
AND t1.transfer_date =  '".$_POST[date]."'
 order by t1.lab_meet ASC, t1.outdate ASC , t1.airout_h ASC , t1.airout_m ASC
  ");
	
	
	$res[driver] = $db->select_query("select nickname,name,post_date,car_num, phone from web_driver where id = '".$_POST[driver_id]."' ");
	$arr[driver] = mysql_fetch_array($res[driver]);
 while($arr[order] = $db->fetch($res[order])) {
 $driver_work[] = $arr[order];
 }
 
  while($arr[order_cn] = $db->fetch($res[order_cn])) {
 $driver_work_en[] = $arr[order_cn];
 }
	 ?>  
	<div class="hidden-xs hidden-sm">
	<table  class="table customer" align="center" > 
	<tr>
		<td width="20%" align="center"><a href="#"  class="lightbox"  rel="group1"><img src="http://www.t-booking.com/admin/file/driver/pic/<?= $arr[driver][post_date]; ?>.jpg" name="view01"  width="110" height="125" border="0" id="view01" class="IMGSHOP" /></a>
		</td>
		<td><table class="table table-striped ">
			<tr><td><strong>ชื่อคนขับ</strong></td><td><? 
	if($arr[driver][name]!=""){
	echo $arr[driver][name];}else{ echo "-";}?></td>
	</tr><tr><td><strong>โทร.คนขับรถ</strong></td>	<td><? 
	if($arr[driver][phone]!=""){
	?>
	<a href="tel:<?=$arr[driver][phone];?>"><?=$arr[driver][phone];?></a>
	
	<?}else{ echo "-";}?></td></tr>
	<tr><td><strong>หมายเลขรถ</strong></td><td><? echo $arr[driver][car_num]; ?></td></tr>
	  </table></td>
	</tr>	
	</table>
	</div>
	
	
	<div class="hidden-lg hidden-md">
	<table  class="table table-striped customer" align="center" > 
	<tr>
	<td align="center"><a href="#"  class="lightbox"  rel="group1"><img src="http://www.t-booking.com/admin/file/driver/pic/<?= $arr[driver][post_date]; ?>.jpg" name="view01"  width="110" height="125" border="0" id="view01" class="IMGSHOP" /></a>
	</td>
	</tr>
	<tr>
	
	<td><table class="table table-striped ">
			<tr><td><strong>ชื่อคนขับ</strong></td><td><? 
	if($arr[driver][name]!=""){
	echo $arr[driver][name];}else{ echo "-";}?></td>
	</tr><tr><td><strong>โทร.คนขับรถ</strong></td>	<td><? 
	if($arr[driver][phone]!=""){
		?>
	<a href="tel:<?=$arr[driver][phone];?>"><?=$arr[driver][phone];?></a>
	
	<?
	}else{ echo "-";}?></td></tr>
	<tr><td><strong>หมายเลขรถ</strong></td><td><? echo $arr[driver][car_num]; ?></td></tr>
	  </table></td>
	  </tr>
	</table>
	</div>
	
	
	<div class="hidden-xs hidden-sm">
	<table  class="table table-striped" width="100%" align="center" > 
	<img src="iconstatus/flag/TH.png" align="absmiddle" />
	<thead  align="center" class="customer" >
		<th>ประเภท</th>
		<th>เวลา</th>
		<th>จำนวนคน</th>
		<th>สถานที่รับ</th>
		<th>สถานที่ส่ง</th>
	</thead>	
	<?php foreach ($driver_work as $arr[order]){ 
		
		if($arr[order][outdate] != $_POST[date]){
			if($arr[order][company] == '1133' || $arr[order][company] == '1779'){
				$next_date = "";
			}else{
				$next_date = " +1";
			}
			
		}else{
			$next_date = "";
		}
		
		if($arr[order][lab_meet]=='1'){
			$color = 'bgcolor="#FBFCC5"';
		}
	?>
	<tr <?=$color;?> >
		<td align="center"><? 
	$res[area_q] = $db->select_query("select area,id from web_transferproduct where id = '".$arr[order][program]."' ");
	$arr[area_q] = mysql_fetch_array($res[area_q]);
	if($arr[area_q][area]=="In"){
	echo "รับเข้า";
	}else if($arr[area_q][area]=="Out"){
	echo "ส่งออก";
	}
	else if($arr[area_q][area]=="Point"){
	echo "Point to point";
	}
	?></td>
	<td align="center">
	<? echo $arr[order][airout_h].".".$arr[order][airout_m]."";?> <?=$next_date;?>
	</td>
	<td align="center"><? echo $arr[order][pax]." ";?></td>
	<td>
			<? 
	$res[place1] = $db->select_query("select topic from web_transferplace where id = '".$arr[order][to_place]."' ");
	$arr[place1] = mysql_fetch_array($res[place1]);
	if($arr[place1][topic]!=""){
	$place_txt = $arr[place1][topic];}else{ $place_txt = "-"; }
	echo $place_txt; 
	 ?>
			</td>
			<td>
			<? 
	$res[place2] = $db->select_query("select topic from web_transferplace where id = '".$arr[order][pickup_place]."' ");
	$arr[place2] = mysql_fetch_array($res[place2]);
	if($arr[place2][topic]!=""){
	$place_txt = $arr[place2][topic];}else{ $place_txt = "-"; }
	echo $place_txt; 
	 ?>
			</td>
	</tr>
	<?php } ?>
	</table>
</div>

<div class="hidden-lg hidden-md">
<?php foreach ($driver_work as $arr[order]){ 

if($arr[order][outdate] != $_POST[date]){
			if($arr[order][company] == '1133' || $arr[order][company] == '1779'){
				$next_date = "";
			}else{
				$next_date = " +1";
			}
			
		}else{
			$next_date = "";
		}
?>
	<table class="table dv-td">
		<tr>
			<td  scope="row" width="130px;"><b>ประเภท</b></td>
			<td><? 
	$res[area_q] = $db->select_query("select area,id from web_transferproduct where id = '".$arr[order][program]."' ");
	$arr[area_q] = mysql_fetch_array($res[area_q]);
	if($arr[area_q][area]=="In"){
	echo "รับเข้า";
	}else if($arr[area_q][area]=="Out"){
	echo "ส่งออก";
	}
	else if($arr[area_q][area]=="Point"){
	echo "Point to point";
	}?></td>
		</tr>
		<tr>
			<td  scope="row"><b>เวลา</b></td>
			<td>
			
	<? echo $arr[order][airout_h].".".$arr[order][airout_m]."";?> <?=$next_date;?>

			</td>
		</tr>
		<tr>
			<td  scope="row"><b>จำนวนคน</b></td>
			<td><? echo $arr[order][pax]." คน";?></td>
		</tr>
	</table>
<? } ?>
</div>


<!---- Server cn  --->

<div class="hidden-xs hidden-sm">
	<table  class="table table-striped" width="100%" align="center" > 
	<img src="iconstatus/flag/China.png" align="absmiddle" />
	<thead  align="center"  class="customer" >
		<th>ประเภท</th>
		<th>เวลา</th>
		<th>จำนวนคน</th>
		<th>สถานที่รับ</th>
		<th>สถานที่ส่ง</th>
	</thead>	
	<?php foreach ($driver_work_en as $arr[order]){ 
if($arr[order][outdate] != $_POST[date]){
			if($arr[order][company] == '1133' || $arr[order][company] == '1779'){
				$next_date = "";
			}else{
				$next_date = " +1";
			}
			
		}else{
			$next_date = "";
		}
	?>
	<tr>
		<td align=""><? 
	$res[area_q] = $db->select_query("select area,id from web_transferproduct where id = '".$arr[order][program]."' ");
	$arr[area_q] = mysql_fetch_array($res[area_q]);
	if($arr[area_q][area]=="In"){
	echo "รับเข้า";
	}else if($arr[area_q][area]=="Out"){
	echo "ส่งออก";
	}
	else if($arr[area_q][area]=="Point"){
	echo "Point to point";
	}
	?></td>
	<td align="center">
	<? echo $arr[order][airout_h].".".$arr[order][airout_m]."";?> <?=$next_date;?>
	</td>
	<td align="center"><? echo $arr[order][pax]." ";?></td>
	<td>
			<? 
	$res[place1] = $db->select_query("select topic from web_transferplace where id = '".$arr[order][to_place]."' ");
	$arr[place1] = mysql_fetch_array($res[place1]);
	if($arr[place1][topic]!=""){
	$place_txt = $arr[place1][topic];}else{ $place_txt = "-"; }
	echo $place_txt; 
	 ?>
			</td>
			<td>
			<? 
	$res[place2] = $db->select_query("select topic from web_transferplace where id = '".$arr[order][pickup_place]."' ");
	$arr[place2] = mysql_fetch_array($res[place2]);
	if($arr[place2][topic]!=""){
	$place_txt = $arr[place2][topic];}else{ $place_txt = "-"; }
	echo $place_txt; 
	 ?>
			</td>
	</tr>
	<?php } ?>
	</table>
</div>
<div class="hidden-lg hidden-md">
<?php foreach ($driver_work_en as $arr[order]){ 
if($arr[order][outdate] != $_POST[date]){
			if($arr[order][company] == '1133' || $arr[order][company] == '1779'){
				$next_date = "";
			}else{
				$next_date = " +1";
			}
			
		}else{
			$next_date = "";
		}
?>
	<table class="table dv-td">
		<tr>
			<td  scope="row" width="130px;"><b>ประเภท</b></td>
			<td><? 
	$res[area_q] = $db->select_query("select area,id from web_transferproduct where id = '".$arr[order][program]."' ");
	$arr[area_q] = mysql_fetch_array($res[area_q]);
	if($arr[area_q][area]=="In"){
	echo "รับเข้า";
	}else if($arr[area_q][area]=="Out"){
	echo "ส่งออก";
	}
	else if($arr[area_q][area]=="Point"){
	echo "Point to point";
	}?></td>
		</tr>
		<tr>
			<td  scope="row"><b>เวลา</b></td>
			<td>
	<? echo $arr[order][airout_h].".".$arr[order][airout_m]."";?> <?=$next_date;?>
	</td>
		</tr>
		<tr>
			<td  scope="row"><b>จำนวนคน</b></td>
			<td><? echo $arr[order][pax]." คน";?></td>
		</tr>
	</table>
<? } ?>
</div>

</div>
