<?php 
require_once("../../../../includes/class.mysql.php");
$db = New DB();
define("DB_NAME_DATA","admin_data");
define("DB_HOST","localhost");
define("DB_NAME","admin_web");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("TB_transfer_report_all","transfer_report_all");
define("TB_order","web_order");
define("TB_web_transfer","web_transfer_report");
if($_GET[key]=='checkin_place'){
	

	$data_report[driver_topoint_lat] = $_POST[lat];
	$data_report[driver_topoint_lng] = $_POST[lng];
	$data_report[driver_topoint] = 1;
	$data_report[driver_topoint_date] = time();
	$invoice = $_POST[invoice];
//	$check = cloneImg(55555);
//	echo $check;
	
	$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
	$result[TB_transfer_report_all] = $db->update_db(TB_transfer_report_all,$data_report," orderid = '".$_POST[orderid]."' ");
	$db->closedb ();
	
	
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);	
	$result[TB_web_transfer] = $db->update_db(TB_web_transfer,$data_report," orderid = '".$_POST[orderid]."' ");
 
  	$result[TB_order] = $db->update_db(TB_order,$data_report,"  orderid  = '".$_POST[orderid]."' ");
	$db->closedb ();
		
	if($result[TB_transfer_report_all]==1 and $result[TB_web_transfer]==1 and $result[TB_order]==1)	{
		$result[last_result] = true;
	}

	$tmpFilePath = $_FILES['file']['tmp_name'];
		 if($tmpFilePath != ""){
		 	 
				$result[save_pic][1] = @mkdir("../photo_driver/".$invoice, 0777);
				$result[save_pic][2] = @chmod("../car/pic/guest/".$invoice, 0777);    
				$target_file = "../photo_driver/".$invoice."/1.jpg";
				
             if(move_uploaded_file($tmpFilePath, $target_file)) {
					$result[upload_photo] = true;
                }
		}
	
	echo json_encode($result);
//	exit();
		
}



?>