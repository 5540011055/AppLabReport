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
	$db->connectdb("admin_his",DB_USERNAME,DB_PASSWORD);

if($_GET[id_order]!=""){
$sqlId = "and order_id =  '".$_GET[id_order]."'";
}
$res[his] = $db->select_query("select * from web_his_labreport where id>0 ".$sqlId." ");
while($arr[his] = $db->fetch($res[his])){
	$array_his[] = $arr[his];
}
?> 


<div class="container" style="width:100%;">
<div class="row"> 
<div class="hidden-xs hidden-sm">
<table  class="table table-striped customer" align="center" > 
		 <thead  align="center" class="td_cl">
				   <th align="center"><strong>เวลา</strong></th>
				   <th align="center"><strong>ประเภท</strong></th>
                   <th align="center"><strong>ผู้อัพเดท</strong></th>
                    <th align="center"><strong>เลข Voucher</strong></th>
                   </thead>
		 <tbody>
<?php  foreach ($array_his as $arr[his]) { ?>
	<tr align="center">
	<td><?php echo ThaiTimeConvert($arr[his][post_date],3,2); ?>
	</td>
	<td>
	<?php if($arr[his][type]=="0"){echo "รับงาน";}else{ echo "เจอแขก"; } ?>
	</td>
	<td><?php $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
					  $res['user'] = $db->select_query("SELECT username from web_admin where id = '".$arr[his][posted]."' ");
					  $arr['user'] = mysql_fetch_array($res['user']);
					  echo $arr['user']['username'];
				 ?>
	</td>
	<td>
	<?php echo $arr[his][invoice];
	
	  ?>
	</td>
	</tr>
<?php } ?>	
  </table>	</div>
  
  <div class="hidden-lg hidden-md">
  <?php foreach ($array_his as $arr[his]) {   ?>
  <table  class="table table-striped customer" align="center" > 
		<tr>
			<td>เวลา</td>
			<td><?php echo ThaiTimeConvert($arr[his][post_date],3,2); ?></td>
		</tr>
		<tr>
			<td>ประเภท</td>
			<td><?php if($arr[his][type]=="0"){echo "รับงาน";}else{ echo "เจอแขก"; } ?></td>
		</tr>
		<tr>
			<td>ผู้อัพเดท</td>
			<td><?php $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
					  $res['user'] = $db->select_query("SELECT username from web_admin where id = '".$arr[his][posted]."' ");
					  $arr['user'] = mysql_fetch_array($res['user']);
					  echo $arr['user']['username'];
				 ?></td>
		</tr>
		<tr>
		   <td>เลข Voucher</td>
		   <td>	<?php echo $arr[his][invoice];?></td>
	    </tr>
	</table>
	<?php } ?> 
  </div>
  
  
  
  
  </div></div>
      
</div>
