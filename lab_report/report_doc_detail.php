
<style>
.customer {
    background-color: #cce6ff;
    padding: 5px;
    border: 1px solid lightblue;
}
</style>

<div id="dataTable2"  align="center"> 
<?php 

	//$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
if($_GET[date_tran]!=""){
$sqlDate = "and transfer_date =  '".$_GET[date_tran]."'";
}else{
$sqlDate = "and transfer_date =  '2016-01-03'";
}
if($_GET[id_order]!=""){
$sqlId = "and id =  '".$_GET[id_order]."'";
}

	$res[other] = $db->select_query("select id, program, airout_h, airout_m, air, drivername , to_place, pickup_place, pax, orderid, agent, remark , ondate,invoice, code,ref
 from web_order where id>0 ".$sqlDate."  and type =  'transfer' ".$sqlId." ");
 $arr[other] = mysql_fetch_array($res[other]);

	 ?>  

<table  class="table table-striped customer" width="100%" align="center" > 
		 
		<tr>
			<td  width="20%" ><strong>ประเภท</strong></td>
			<td><? 
	$res[area_q] = $db->select_query("select area,id from web_transferproduct where id = '".$arr[other][program]."' ");
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
		</tr>
		<tr>
			<td class="thc"><strong>วันที่รับแขก</strong></td>
			<td><? echo $arr[other][ondate];?>
			</td>
		</tr>
		<tr>
			<td class="thc"><strong>เวลารับแขก</strong></td>
			<td><? echo $arr[other][airout_h].".".$arr[other][airout_m];?>
			</td>
		</tr>
	<tr>
		<td><strong>เที่ยวบิน</strong></td>
		<td> <? if($arr[other][air]!=""){$flight = $arr[other][air];}else{$flight = "-";}?>
		<? echo $flight;?>
		</td>
	</tr>
		<tr>
			<td><strong>จำนวนคน</strong></td>
			<td><? echo $arr[other][pax]." คน";?></td>
		</tr>
		<tr>
			<td><strong>สถานที่รับ</strong></td>
			<td>
			<? 
	$res[place1] = $db->select_query("select topic from web_transferplace where id = '".$arr[other][to_place]."' ");
	$arr[place1] = mysql_fetch_array($res[place1]);
	if($arr[place1][topic]!=""){
	$place_txt = $arr[place1][topic];}else{ $place_txt = "-"; }
	echo $place_txt; 
	 ?>
			</td>
		</tr>
		<tr>
			<td><strong>สถานที่ส่ง</strong></td>
			<td>
			<? 
	$res[place2] = $db->select_query("select topic from web_transferplace where id = '".$arr[other][pickup_place]."' ");
	$arr[place2] = mysql_fetch_array($res[place2]);
	if($arr[place2][topic]!=""){
	$place_txt = $arr[place2][topic];}else{ $place_txt = "-"; }
	echo $place_txt; 
	 ?>
			</td>
		</tr>	
		<tr>
			<td><strong>หมายเหตุ</strong></td>
			<td>
			<? 	if($arr[other][remark]!=""){echo $arr[other][remark];}else{ echo "-";} 	 ?>
			</td>
		</tr>			
  </table>	    


<table  class="table table-striped customer" width="100%" align="center" > 
		<tr>
			<td><strong>เลข Voucher</strong></td>		    
			<td>
			<?php
		
			 if($_GET[server]=='1') { ?>
			<a href="http://t-bookingcn.com/print.php?name=admin/voucher&file=transfer&no=<?=$arr[other][id];?>&order=<?=$arr[other][orderid];?>&code=<?=$arr[other][code];?>" target="_blank"><?php echo $arr[other][invoice]; ?></a></td>
			<? }else{ ?>
			<a href="print.php?name=admin/voucher&file=transfer&no=<?=$arr[other][id];?>&order=<?=$arr[other][orderid];?>&code=<?=$arr[other][code];?>" target="_blank"><?php echo $arr[other][invoice]; ?></a></td>
			<? } ?>
			
		</tr>
		<tr>
			<td><strong>agent referent</strong></td>		    
			<td><?=$arr[other][ref];?></td>
		</tr>
		<tr>
			<td><strong>ชื่อแขก</strong></td>
			<td><? $res[guest_name] = $db->select_query("select guest,phone,phone2,phone3,country  from web_book_agent where id = '".$arr[other][orderid]."' ");
	$arr[guest_name] = mysql_fetch_array($res[guest_name]); 
	echo $arr[guest_name][guest];
	?></td>
		</tr>
		<tr>
			<td><strong>โทร.แขก</strong></td>
			<td><? if($arr[guest_name][phone]!=""){
	echo $arr[guest_name][phone]." ".$arr[guest_name][phone2]." ".$arr[guest_name][phone3];}else{ echo "-";}
	?></td>
		</tr>
		<? $res[country] = $db->select_query("select id,name_en,country_code  from web_country where id = '".$arr[guest_name][country]."' ");
	$arr[country] = mysql_fetch_array($res[country]); 
	?>
		<tr valign="middle">
			<td valign="middle"><table><tr valign="middle"><td  valign="middle" class="pad" align="left"><strong>สัญชาติ</strong></td></tr></table> </td>
			<td valign="middle">
	<table cellpadding="0" cellspacing="0" border="0"><tr><td>
	<img src="iconstatus/flag/<? echo $arr[country][name_en];  ?>.png" align="absmiddle" />
	</td><td width="10"></td><td><?
	echo $arr[country][name_en]." (".$arr[country][country_code].")";
	?>
	
	</td>
	</tr>
	</table>
	</td>
		</tr>
		 <tr>
			<td width="20%"><strong>ชื่อเอเยนต์</strong></td>
			<td ><? $res[agent_name] = $db->select_query("select company, phone  from web_admin where id = '".$arr[other][agent]."' ");
	$arr[agent_name] = mysql_fetch_array($res[agent_name]); 
	echo $arr[agent_name][company];
	?></td>
		</tr>
		<tr>
			<td><strong>โทร.เอเยนต์</strong></td>
			<td><? if($arr[agent_name][phone]!=""){
	echo $arr[agent_name][phone];}else{ echo "-";}?></td>
		</tr>
  </table>	
	
	<?php $num_driver = $db->num_rows("web_driver","post_date","id = '".$arr[other][drivername]."'");  
		if($num_driver>0){
	?>
	<div class="hidden-xs hidden-sm">
	<table  class="table table-striped customer" align="center" > 
	<? 
	$res[driver] = $db->select_query("select name,post_date,car_num, phone from web_driver where id = '".$arr[other][drivername]."' ");
	$arr[driver] = mysql_fetch_array($res[driver]); ?>
	<tr>
		<td width="20%" align="center"><a href="#"  class="lightbox"  rel="group1"><img src="admin/file/driver/pic/<?= $arr[driver][post_date]; ?>.jpg" name="view01"  width="110" height="125" border="0" id="view01" class="IMGSHOP" /></a>
		</td>
		<td><table class="table table-striped ">
			<tr><td><strong>ชื่อคนขับ</strong></td><td><? 
	if($arr[driver][name]!=""){
	echo $arr[driver][name];}else{ echo "-";}?></td>
	</tr><tr><td><strong>โทร.คนขับรถ</strong></td>	<td><? 
	if($arr[driver][phone]!=""){
	echo $arr[driver][phone];}else{ echo "-";}?></td></tr>
	<tr><td><strong>หมายเลขรถ</strong></td><td><? echo $arr[driver][car_num]; ?></td></tr>
	  </table></td>
	</tr>	
	</table>
	</div>
	
	
	<div class="hidden-lg hidden-md">
	<table  class="table table-striped customer" align="center" > 
	<tr><td align="center"><a href="#"  class="lightbox"  rel="group1"><img src="admin/file/driver/pic/<?= $arr[driver][post_date]; ?>.jpg" name="view01"  width="110" height="125" border="0" id="view01" class="IMGSHOP" /></a></td></tr>
	<tr><td><table class="table table-striped ">
			<tr><td><strong>ชื่อคนขับ</strong></td><td><? 
	if($arr[driver][name]!=""){
	echo $arr[driver][name];}else{ echo "-";}?></td>
	</tr><tr><td><strong>โทร.คนขับรถ</strong></td>	<td><? 
	if($arr[driver][phone]!=""){
	echo $arr[driver][phone];}else{ echo "-";}?></td></tr>
	<tr><td><strong>หมายเลขรถ</strong></td><td><? echo $arr[driver][car_num]; ?></td></tr>
	  </table></td></tr>
	</table>
	</div>
    <? } ?>
	
</div>
