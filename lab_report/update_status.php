<?php 

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
	
	$db->connectdb('admin_web','admin_MANbooking','252631MANbooking');
	$result[order] = $db->update_db('web_order', $data_order , " orderid='".$order_id."' ");
	
	$result[tp_admin] = $db->update_db('web_transfer_report', $data_transfer_report , " orderid='".$order_id."' ");
	$db->closedb();
	
	$db->connectdb('admin_data','admin_MANbooking','252631MANbooking');
	$result[tp_data] = $db->update_db('transfer_report_all', $data_transfer_report , " orderid='".$order_id."' ");
	$db->closedb();
	
	
	$db->connectdb('admin_web','admin_MANbooking','252631MANbooking');
	$result[his] = $db->add_db('web_history_change_driver_lab', $data_his);
	$db->closedb();
	
	
	echo json_encode($result);
	
}
?>