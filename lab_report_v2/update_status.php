<?php 
$web = 'admin_web';
$data = 'admin_data';
$user = 'admin_MANbooking';
$pass = '252631MANbooking';
if($_GET[action]=="meet"){
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res['user'] = $db->select_query("SELECT id from web_admin where username = '".$_GET[user]."' ");
$arr['user'] = mysql_fetch_array($res['user']);

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$db->update_db("web_order",array("lab_meet"=>$_GET[status]),"id = '".$_POST[id]."'"); 

$db->connectdb("admin_his",DB_USERNAME,DB_PASSWORD);
$result = $db->add_db(' admin_his.web_his_labreport',array(
			"status"=>$_GET[status],		 
 			"posted"=>$arr['user']['id'],
			"post_date"=>"".TIMESTAMP."",
			"type"=>1,
			"order_id"=>$_POST[id],
			"invoice"=>$_POST[invoice],
			"server"=>$_POST[server],
			"ip"=>$_SERVER['REMOTE_ADDR'] ));
$db->closedb();

/*$data_meet[lat] = $_POST[lat];			
$data_meet[lng] = $_POST[lng];	
$data_meet[driver_pickup_date] = time();	
if($_GET[status]==1){
	$data_meet[driver_pickup] = 1; //meet	
}else{
	$data_meet[driver_pickup] = 2;	//not meet
}
	
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->update_db(TB_transfer_report_all,$data_meet," orderid = '".$_GET[orderid]."' ");
$db->closedb ();	*/		
}	

if($_GET[action]=="approve"){

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res['user'] = $db->select_query("SELECT id from web_admin where username = '".$_GET[user]."' ");
$arr['user'] = mysql_fetch_array($res['user']);

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$db->update_db("web_order",array("lab_approve"=>$_GET[status]),"id = '".$_POST[id]."'"); 

$db->connectdb("admin_his",DB_USERNAME,DB_PASSWORD);
$result = $db->add_db(' admin_his.web_his_labreport',array(
			"status"=>$_GET[status],		 
 			"posted"=>$arr['user']['id'],
			"post_date"=>"".TIMESTAMP."",
			"type"=>0,
			"order_id"=>$_POST[id],
			"invoice"=>$_POST[invoice],
			"server"=>$_POST[server],
			"ip"=>$_SERVER['REMOTE_ADDR'] ));
}

if($_GET[action]=="all"){
while(
list($key, $id) = each ($_POST['all_id']) and list($key, $vc) = each ($_POST['all_invoice']) ) 
{
echo $id;
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res['user'] = $db->select_query("SELECT id from web_admin where username = '".$_GET[user]."' ");
$arr['user'] = mysql_fetch_array($res['user']);

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$db->update_db("web_order",array("lab_approve"=>1),"id = '".$id."'"); 

$db->connectdb("admin_his",DB_USERNAME,DB_PASSWORD);
$result = $db->add_db(' admin_his.web_his_labreport',array(
			"status"=>1,		 
 			"posted"=>$arr['user']['id'],
			"post_date"=>"".TIMESTAMP."",
			"type"=>0,
			"order_id"=>$id,
			"invoice"=>$vc,
			"server"=>$_POST[server],
			"ip"=>$_SERVER['REMOTE_ADDR'] ));
}

}

if($_GET[action]=="change_driver"){
	require_once("../../../includes/class.mysql.php");
	$db = New DB();
	
	$order_id = $_GET[order_id];
	$driver_new_id = $_GET[drivername];
	$carno = $_GET[carno];
	$driver_old_id = $_GET[old_drivername];
	$old_carno = $_GET[old_carno];
	$num_of_report = $_GET[num_of_report];
	
	$data_his[orderid] = $order_id;
	$data_his[driver_old_id] = $driver_old_id;
	$data_his[driver_new_id] = $driver_new_id;
	$data_his[status] = 1;
	$data_his[post_date] = time();
	$data_his[ip] = $_SERVER['REMOTE_ADDR'];
	$data_his[posted] = $_GET[posted];
	
	$data_order[carno] = $carno;
	$data_order[drivername] = $driver_new_id;
	
	$data_transfer_report[driver_approved] = 0;
	$data_transfer_report[drivername] = $driver_new_id;
	$data_transfer_report[carno] = $carno;
	
	$db->connectdb($web,$user,$pass);
	$result[order] = $db->update_db('web_order', $data_order , " orderid='".$order_id."' ");
	
	$result[tp_admin] = $db->update_db('web_transfer_report', $data_transfer_report , " orderid = '".$order_id."' and number_of_report = '".$num_of_report."' ");
	$db->closedb();
	
	$db->connectdb($data,$user,$pass);
	$result[tp_data] = $db->update_db('transfer_report_all', $data_transfer_report , " orderid = '".$order_id."'  and number_of_report = '".$num_of_report."' ");
	$db->closedb();
	
	
	$db->connectdb($web,$user,$pass);
	$result[his] = $db->add_db('web_history_change_driver_lab', $data_his);
	$db->closedb();
	
	
	echo json_encode($result);
	
}
?>