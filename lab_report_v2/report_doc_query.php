<?php
if($_GET[date_tran] != "") {
  $sqlDate = "and t1.transfer_date =  '".$_GET[date_tran]."'";
  $date = $_GET[date_tran];
}
else {
  $sqlDate = "and t1.transfer_date =  '2017-12-16'";
  $date =  "2017-12-16";
}

if($_GET[company] != "") {
  $sqlCom = "and t1.company = '".$_GET[company]."' ";
}


if($_GET[type] == "1") {
  $sqlArea1 = " or (t2.area = 'InOut' and  t1.main_inout = '1')  ";
  $sqlArea = "and t2.area = 'In' ";
}
if($_GET[type] == "2") {
	$sqlArea1 = " or (t2.area = 'InOut' and  t1.main_inout = '0')  ";
  $sqlArea = "and t2.area = 'Out' ";
}
if($_GET[type] == "3"){
  $sqlArea = "and t2.area != 'Out' and t2.area != 'In'  ";
}


if($_GET[type_show]=="1"){
	$sqlType_showfilert = "and t1.lab_approve = '1' ";
}else if($_GET[type_show]=="2"){
	$sqlType_showfilert = "and t1.lab_approve = '0' ";
} 
if($_GET[server]=="cn"){
$server = "1";
$table_id_nomeet = "table_no_meet_cn";
$table_id_meet = "table_meet_cn";
}else { $server = "0";
$table_id_nomeet = "table_no_meet"; 
$table_id_meet = "table_meet";}
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);


$res[other] = $db->select_query("select 
t1.numcar,
t1.vc_inout, 
t1.main_inout, 
t1.id, 
t1.api, 
t1.program, t1.airout_h, t1.airout_m, t1.air, t1.drivername , t1.to_place, t1.pickup_place, t1.pax, t1.orderid, t1.agent, t1.company, t1.lab_meet, t1.lab_approve, t1.invoice,t1.cartype,t1.carno,t1.ref
  from web_order as t1
  inner join web_transferproduct as t2
  on t1.program = t2.id
  where t1.id>0  ".$sqlDate." ".$sqlArea." and t1.type =  'transfer'  ".$sqlCom." and t1.status != 'CANCEL' ".$sqlType_showfilert."   $sqlArea1 
  
  order by t1.lab_meet ASC , t1.outdate ASC , t1.airout_h ASC,  t1.airout_h ASC
  ");
  $num_all = 0 ;
  $num_meet = 0;
  $num_no_meet = 0;
  $num_approve = 0;
  $num_no_approve = 0;
   while($arr[other] = $db->fetch($res[other])) {
   		if($arr[other][lab_meet]=="1"){
			 $num_meet++;
			 $lab_meet1[] = $arr[other];
		}else{
			 $lab_meet0[] = $arr[other];
			 $num_no_meet++;
		}
		if($arr[other][lab_approve]=="1"){
			$num_approve++;
		}else{
			$num_no_approve++;
		}
		
		$num_all++;
   }

   $none_no_meet = 'style="display: none;" ';
   $none_meet = 'style="display: none;" ';
   echo $_GET[type_show];
    if($_GET[type_show]=='4'){
  	
  	$none_no_meet = '';
  	
  } 
   else	if($_GET[type_show]=='3'){
	  	$none_meet = '';
	  	}
    else{
	$none_no_meet = '';
   	$none_meet = '';
	}

if($_GET[server]=="cn"){
	  	$id_meed = "no_meet_cn";
		$approve_all = "approve_all_cn";
		$pic = "cn";
	  } else{
	  	$id_meed = "no_meet_th";
		$approve_all = "approve_all";
		$pic = "th";
	  }

?>

 <div id="tableDataAll"  align="center">
  <form method="post" name="approve_all" id="<?=$approve_all;?>" >
    <?php
    
    foreach($lab_meet0 as $data_meet0){
      ?><input type="hidden" value="<?php echo $data_meet0[id];?>" name="all_id[]" />
      <input type="hidden" value="<?php echo $data_meet0[invoice];?>" name="all_invoice[]" /><?php
    }
    ?>
  </form>
 	
	  <style>
.wrapper-dropdown-3 {
    position: relative;
    width: 100px;
    margin: 0 auto;
    padding: 10px;
    background: #fff;
    border-radius: 7px;
    border: 1px solid rgba(0,0,0,0.15);
    box-shadow: 0 1px 1px rgba(50,50,50,0.1);
    cursor: pointer;
    outline: none;
    font-weight: bold;
    color: #8AA8BD;
    
}

	  </style>
  <div class="panel panel-warning">
        <div class="panel-heading hidden-xs hidden-sm div_search_form">
          
          <h3 class="panel-title"> 
          <table width="100%" ><tr align="left"><td width="47%">
          	<button class="wrapper-dropdown-3" onclick="findBytype('all','<?=$server;?>');" >all</button>
            <button class="wrapper-dropdown-3" onclick="findBytype('join','<?=$server;?>');">join</button>
            <button class="wrapper-dropdown-3" onclick="findBytype('private','<?=$server;?>');">private</button></td>
          <td>  <img src="iconstatus/flag/<?=$pic;?>.png" align="absmiddle" /> <a id="filter_alldata" style="cursor:pointer;" onclick="searchFilter(0)"><strong>งานทั้งหมด</strong> <?=$num_all;?></a></td>
            </tr></table>
          </h3>

        </div>
  
  <table border="0" align="center" class="table table-striped">
    <tr>
      <th>

       <!--<a style="cursor:pointer;" onclick="searchFilter(1)" class="active" > งานที่รับแล้ว <?=$num_approve;?></a> | 
       <a id="non_app" style="cursor:pointer;" onclick="searchFilter(2)">งานที่ไม่ได้รับ <? echo $num_no_approve;?></a> | -->
        <a id="filter_alldata" style="cursor:pointer; " class="btn btn-primary btn-sm" onclick="searchFilter(0)"><img src="iconstatus/flag/<?=$pic;?>.png" align="absmiddle" style="height: 17px;" /> <strong>ทั้งหมด</strong> <?=$num_all;?></a>
       <br class="hidden-md hidden-lg" /> 
       <br class="hidden-md hidden-lg" /> 
       <a style="cursor:pointer;" class="btn btn-success btn-sm" onclick="searchFilter(3);">
       เจอแขก <?=$num_meet;?>
       	
       </a>
       <a style="cursor:pointer;" class="btn btn-danger btn-sm" onclick="searchFilter(4)">
       ไม่เจอแขก 
       <span id="<?=$id_meed;?>"><? echo $num_no_meet;?></span>
       </a>
      </th>
    </tr>
    
    	<tr > 
    	<div align="center" class="hidden-lg hidden-md" style="display: none;">
    	<br>
<style>
 	
 	.animate
{
	transition: all 0.1s;
	-webkit-transition: all 0.1s;
}

.action-button
{
	position: relative;
	padding: 10px 40px;
  margin: 0px 10px 10px 0px;
  float: left;
	border-radius: 10px;
	font-family: 'Pacifico', cursive;
	font-size: 17px;
	color: #FFF;
	text-decoration: none;	
}

.yellow
{
	background-color: #faedc5;
	border-bottom: 5px solid #dcc57e;
	text-shadow: 0px -2px #dcc57e;
	
}
.action-button:active
{
	transform: translate(0px,5px);
  -webkit-transform: translate(0px,5px);
	border-bottom: 1px solid;
}
 	
 </style>
 <button id="getjob_all2" class="action-button shadow animate yellow" onclick="update_approve_all('<?=$num_no_approve;?>','<?=$server;?>','<?=$_GET[user];?>')" style="width: 100%;"><font color="#060000">รับงานทั้งหมด</font></button>
 </div>
 </tr>
  </table>  
 

  </div> 
  </div>
  
  <div id="tableData"  align="center">
  <input type="hidden" id="date" value="<?=$date;?>" />
<input type="hidden" id="server" value="<?=$server;?>" />
  <div class="hidden-xs hidden-sm" id='non_approve'  <?=$none_no_meet;?> >
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">
            งานที่ไม่เจอแขก
          </h3>

  </div>
        <table class="table table-hover" id="<?=$table_id_nomeet;?>">
          <thead  align="left" class="td_cl" style="display: none;">
            <th>
              <button id="getjob_all" class="btn btn-success" onclick="update_approve_all('<?=$num_no_approve;?>','<?=$server;?>','<?=$_GET[user];?>')">
                รับงานทั้งหมด
              </button>
            </th>
          </thead>
          <thead  align="center" >
		  	<th style="display:none;" >
				
			</th>
			<th style="display:none;" >
				
			</th>
            <th align="center">
              รับงาน
            </th>
            <th align="center">
              ลำดับ
            </th>
            <th align="center">
              ประเภท
            </th>
            <th align="center" width="7%">
              เวลา
            </th>
            <th align="center">
              เที่ยวบิน
            </th>
            <th align="center">
              จำนวนคน
            </th>
            <th align="center">
              สถานที่
            </th>
            <th align="center">
              ชื่อแขก
            </th>
            <th align="center">
              ชื่อเอเยนต์
            </th>
            <th align="center">
              ชื่อคนขับ
            </th>
            <th align="center">
              ตรวจสอบ
            </th>
            <th align="center">
              เจอแขก
            </th>
            <th align="center">
              ประวัติ
            </th>
			<th style="display:nones;" >
				สลับคนขับ
			</th>
			<th style="display:none;" >
				
			</th>
			<th>
				
			</th>
          </thead>
          
          <tbody>
            <?php
            $num = 1;
            foreach($lab_meet0 as $arr[other]){
    $res[area_q] = $db->select_query("select area,id from web_transferproduct where id = '".$arr[other][program]."' ");
    $arr[area_q] = mysql_fetch_array($res[area_q]);
    
    if($arr[area_q][area]=="In" or $arr[other][main_inout] == 1){
	$title_area = "รับเข้า";
	}else if($arr[area_q][area]=="Out" or ($arr[other][main_inout] == 0 and $arr[other][vc_inout] != '')  ){
	$title_area = "ส่งออก";
	}
	else {
	$title_area = "อื่นๆ";
	}
				if($arr[other][cartype]=="2"){
				$btn = '<p data-placement="top" data-toggle="tooltip" title="'.$title_area.'"><button class="btn btn-success btn-xs" disabled="disabled" style="cursor:default" ><div>'.$title_area.'</div></button></p>';
				$id_hide_cartype = 'hide_private';
				
			}else{
				$btn = '<p data-placement="top" data-toggle="tooltip" title="'.$title_area.'"><button class="btn btn-warning btn-xs" disabled="disabled" style="cursor:default"><div>'.$title_area.'</div></button></p>';
				$id_hide_cartype = 'hide_join';
			}	
            // echo $hide_cartype;
              ?>
              <tr align="center" class="<?=$id_hide_cartype;?>" >
                <td style="display:none;">
                 <?=$arr[other][invoice];?>
                </td>
				<td style="display:none;">
                 <?=$arr[other][ref];?>
                </td>
                <td>
                  <?php  if($arr[other][lab_approve] != 0) { ?>
                <p data-placement="top" data-toggle="tooltip" title="Progress"><button class="btn btn-default btn-xs" ><div><span class="glyphicon glyphicon-time"></span></div></button></p> <?
              }
              else { ?>
<p data-placement="top" data-toggle="tooltip" title="GetJob"><button class="btn btn-primary btn-xs"
 onclick="update_lab_approve('<?=$arr[other][id];?>','1','<?=$arr[other][invoice];?>','<?=$server;?>','<?=$_GET[user];?>');" ><div><span class="glyphicon glyphicon-briefcase"></span></div></button></p>
            <?  } ?>
                </td>
                <td >
                  <?=$num;?>
                </td>
                <td >
                  <?
			echo $btn;
                  ?>
                </td>
                <td >
                  <? echo $arr[other][airout_h].".".$arr[other][airout_m];?>
                </td>
                <td >
                  <?
                  if($arr[other][air] != "") {
                    echo $arr[other][air];
                  }
                  else {
                    echo "-";
                  }?>
                </td>
                <td >
                  <? echo $arr[other][pax];?>
                </td>
                <td width="25%">
                  <?
                  if($arr[area_q][area] == "In") {
                    $place = $arr[other][to_place];
                  }
                  else {
                    $place = $arr[other][pickup_place];
                  }
                  $res[place] = $db->select_query("select topic from web_transferplace where id = '".$place."'  ");
                  $arr[place] = mysql_fetch_array($res[place]);
                  if($arr[place][topic] != "") {
                    echo substr($arr[place][topic],0,20);
                  }
                  else {
                    echo "-";
                  }
                  ?>
                </td>
                <td width="15%" >
                  <? $res[guest_name] = $db->select_query("select guest  from web_book_agent where id = '".$arr[other][orderid]."' ");
                  $arr[guest_name] = mysql_fetch_array($res[guest_name]);
                  echo $arr[guest_name][guest];
                  ?>
                </td>
                <td >
                  <? //$res[agent_name] = $db->select_query("select company  from web_admin where id = '".$arr[other][agent]."' ");
                 // $arr[agent_name] = mysql_fetch_array($res[agent_name]);
                  //echo $arr[agent_name][company];
				  if($arr[other][agent]=="13" or $arr[other][agent]=="1563"){
				  	echo "<b>C</b>";
				  }else{ echo "<b>G</b>"; }
				  
                  ?>
                </td>
                <td width="5%" >
                  <? $res[driver] = $db->select_query("select name,nickname,phone,company from web_driver where id = '".$arr[other][drivername]."' ");
                  $arr[driver] = mysql_fetch_array($res[driver]);
                 
                   ?><span id="pc_dv_<?=$arr[other][orderid]?>"><a data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" onclick="driverPro('<? echo $arr[other][drivername];?>','<?=$arr[driver][nickname];?>','<?=$date;?>','<?=$server;?>');"  style="cursor:pointer;" >
                   <?  if($arr[driver][nickname] != "") { echo $arr[driver][nickname]."<br>".$arr[other][carno];}else{echo "-";}?></a></span>
                 
                </td>
                <td >
                  <p data-placement="top" data-toggle="tooltip" title="View">
                    <button class="btn btn-primary btn-xs" data-title="View" data-toggle="modal" data-target="#view_detail_lab_report" onclick="viewDetail('<?=$arr[other][id];?>','งาน <?=$title_area;?>','<?=$server;?>');" >
                  
                      <div>
                        <span class="glyphicon glyphicon-eye-open">
                        </span>
                      </div>
                    </button>
                  </p>
                </td>
                <td >
                  <?php
                  if($arr[other][lab_approve] != "0") {
                    ?>
                    <img src="iconstatus/all/delete.png" width="20" height="20" align="middle" onclick="update_lab_meet('<?=$arr[other][id]?>',1,'<?=$arr[other][invoice]?>','<? echo $server; ?>','<?=$_GET[user];?>');" style="cursor:pointer;" />
                    <?php
                  } ?>
                </td>
                <td >
                  <p data-placement="top" data-toggle="tooltip" title="View">
                    <button class="btn btn-metis btn-xs" data-title="View" data-toggle="modal" data-target="#view_history" onclick="viewHistory('<?=$arr[other][id];?>','<?=$server;?>');" >
                      <div>
                        <span class="glyphicon glyphicon-time">
                        </span>
                      </div>
                    </button>
                  </p>
                </td>
                <td style="display: none;">
                	<?=$arr[driver][phone];?>
                </td>
                <td >
               <?php 
               $check_change_driver = $db->num_rows("web_history_change_driver_lab ","id","orderid = '".$arr[other][orderid]."' "); 
                if($check_change_driver<=0){          
                	$none_changedriver_view = 'display:none;';              	
                }else{	
					$none_changedriver_view = 'display:block;';
				}
               ?>
                 <button data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" class="btn btn-info btn-xs" onclick="changeDriver('<? echo $arr[other][drivername];?>','<?=$arr[other][orderid];?>','<?=$date;?>','<?=$server;?>','<?=$arr[driver][company];?>','<?=$arr[other][invoice];?>','action');"  style="cursor:pointer;width: 65px;" id="action_change_drive_<?=$arr[other][orderid];?>" > 
สลับคนขับ</button>
				<button data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" class="btn btn-xs btn-default" onclick="changeDriver('<? echo $arr[other][drivername];?>','<?=$arr[other][orderid];?>','<?=$date;?>','<?=$server;?>','<?=$arr[driver][company];?>','<?=$arr[other][invoice];?>','view');"  style="cursor:pointer;margin-top: 5px;width: 65px;<?=$none_changedriver_view;?>" id="view_change_drive_<?=$arr[other][orderid];?>" > 
ประวัติ</button>
				
                </td>
              </tr>
              <?php
              $num++;
            }
            ?>
          </tbody>
        </table>
      </div>
      
  </div>

  <div class="hidden-xs hidden-sm" <?=$none_meet;?>>
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">
            งานที่เจอแขก
          </h3>

        </div>

        <table id="<?=$table_id_meet;?>" class="table table-hover" align="center" >
          <thead  align="center">
          <th style="display: none;"></th>
		   <th style="display: none;"></th>
            <th align="center">
              รับงาน
            </th>
            <th align="center">
              ลำดับ
            </th>
            <th align="center">
              ประเภท
            </th>
            <th align="center" width="7%">
              เวลา
            </th>
            <th align="center">
              เที่ยวบิน
            </th>
            <th align="center">
              จำนวนคน
            </th>
            <th align="center">
              สถานที่
            </th>
            <th align="center">
              ชื่อแขก
            </th>
            <th align="center">
              ชื่อเอเยนต์
            </th>
            <th align="center">
              ชื่อคนขับ
            </th>
            <th align="center">
              ตรวจสอบ
            </th>
            <th align="center">
              เจอแขก
            </th>
            <th align="center">
              ประวัติ
            </th>
			 <th style="display: none;"></th>
          </thead>
          <tbody>
            <?php
            $num = 1;
           foreach($lab_meet1 as $arr[other2]){
           	  $res[area_q] = $db->select_query("select area,id from web_transferproduct where id = '".$arr[other2][program]."' ");
                  $arr[area_q] = mysql_fetch_array($res[area_q]);
                  //echo $title_area = $arr[area_q][area]; 
  if($arr[area_q][area]=="In"){
	$title_area = "รับเข้า";
	}else if($arr[area_q][area]=="Out"){
	$title_area = "ส่งออก";
	}
	else if($arr[area_q][area]=="Point"){
	$title_area = "Point to point";
	}
              if($arr[other2][cartype]=="2"){
				$btn = '<p data-placement="top" data-toggle="tooltip" title="'.$title_area.'"><button class="btn btn-success btn-xs" disabled="disabled" style="cursor:default" ><div>'.$title_area.'</div></button></p>';
				$id_hide_cartype = 'hide_private';
			}else{
				$btn = '<p data-placement="top" data-toggle="tooltip" title="'.$title_area.'"><button class="btn btn-warning btn-xs" disabled="disabled" style="cursor:default"><div>'.$title_area.'</div></button></p>';
				$id_hide_cartype = 'hide_join';
			}
            ?>
              <tr align="center" class="<?=$id_hide_cartype;?>" >
               <td width="8%" style="display: none;" >
                  <?=$arr[other2][invoice];?>
                </td>
				<td style="display:none;">
                 <?=$arr[other2][ref];?>
                </td>
                <td width="8%">
                  <?php if($arr[other2][lab_approve] != 0) { ?>
                <p data-placement="top" data-toggle="tooltip" title="Progress"><button class="btn btn-warning btn-xs" ><div><span class="glyphicon glyphicon-time"></span></div></button></p>
           <?   } 
              else { ?>
                <p data-placement="top" data-toggle="tooltip" title="GetJob"><button class="btn btn-primary btn-xs" 
                onclick="update_lab_approve('<?=$arr[other2][id];?>','1','<?=$arr[other2][invoice];?>','<?=$server;?>','<?=$_GET[user];?>');" ><div><span class="glyphicon glyphicon-briefcase"></span></div></button></p>
          <?    }
              ?>
                </td>
                <td >
                  <?=$num;?>
                </td>
                <td >
                  <?
                
			echo $btn;
                  ?>
                </td>
                <td >
                  <? echo $arr[other2][airout_h].".".$arr[other2][airout_m];?>
                </td>
                <td >
                  <?
                  if($arr[other2][air] != "") {
                    echo $arr[other2][air];
                  }
                  else {
                    echo "-";
                  }?>
                </td>
                <td >
                  <? echo $arr[other2][pax];?>
                </td>
                <td width="25%">
                  <?
                  if($arr[area_q][area] == "In") {
                    $place = $arr[other2][to_place];
                  }
                  else {
                    $place = $arr[other2][pickup_place];
                  }
                  $res[place] = $db->select_query("select topic from web_transferplace where id = '".$place."'  ");
                  $arr[place] = mysql_fetch_array($res[place]);
                  if($arr[place][topic] != "") {
                    echo substr($arr[place][topic],0,20);
                  }
                  else {
                    echo "-";
                  }
                  ?>
                </td>
                <td width="15%" >
                  <? $res[guest_name] = $db->select_query("select guest  from web_book_agent where id = '".$arr[other2][orderid]."' ");
                  $arr[guest_name] = mysql_fetch_array($res[guest_name]);
                  echo $arr[guest_name][guest];
                  ?>
                </td>
                <td >
                  <? //$res[agent_name] = $db->select_query("select company  from web_admin where id = '".$arr[other2][agent]."' ");
                  //$arr[agent_name] = mysql_fetch_array($res[agent_name]);
                  //echo $arr[agent_name][company];
				  if($arr[other2][agent]=="13" or $arr[other2][agent]=="1563"){
				  	echo "<b>C</b>";
				  }else{ echo "<b>G</b>"; }
                  ?>
                </td>
                <td width="5%" >
                  <? 
                  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                  $res[driver] = $db->select_query("select nickname,phone from web_driver where id = '".$arr[other2][drivername]."' ");
                  $arr[driver] = mysql_fetch_array($res[driver]);
                  
                   ?><span id="pc_dv_<?=$arr[other2][orderid]?>"><a data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" onclick="driverPro('<? echo $arr[other2][drivername];?>','<?=$arr[driver][nickname];?>','<?=$date;?>','<?=$server;?>');"  style="cursor:pointer;" >
                   <?  if($arr[driver][nickname] != "") { echo $arr[driver][nickname]."<br>".$arr[other2][carno];} else{ echo "-";}?></a></span>
                   
                  
                </td>
                <td >
                  <p data-placement="top" data-toggle="tooltip" title="View">
                    <button class="btn btn-primary btn-xs" data-title="View" data-toggle="modal" data-target="#view_detail_lab_report" onclick="viewDetail('<?=$arr[other2][id];?>','งาน <?=$title_area;?>','<?=$server;?>','<?=$_GET[user];?>');" >
                     
                      <div>
                        <span class="glyphicon glyphicon-eye-open">
                        </span>
                      </div>
                    </button>
                  </p>
                </td>
                <td>
                  <img src="iconstatus/all/accept.png" width="20" height="20" align="middle" style="cursor:pointer;" onclick="update_lab_meet('<?=$arr[other2][id]?>',0,'<?=$arr[other2][invoice];?>','<? echo $server; ?>');" />
                </td>
                <td >
                  <p data-placement="top" data-toggle="tooltip" title="View">
                    <button class="btn btn-metis btn-xs" data-title="View" data-toggle="modal" data-target="#view_history" onclick="viewHistory('<?=$arr[other2][id];?>','<?=$server;?>');" >
                      <div>
                        <span class="glyphicon glyphicon-time">
                        </span>
                      </div>
                    </button>
                  </p>
                </td>
				
				<td style="display: none;" ><?=$arr[driver][phone];?></td>
				<td>
					 <button data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" class="btn btn-metis btn-xs" onclick="changeDriver('<? echo $arr[other2][drivername];?>','<?=$arr[other2][orderid];?>','<?=$date;?>','<?=$server;?>','<?=$arr[other2][company];?>');"  style="cursor:pointer;" > change</button>
				</td>
              </tr>
              <?php
              $num++;
            }
            ?>
          </tbody>

        </table>
      </div>
  </div>


  <!--------------------------------------------8018038 ----------------------------------------------->



<?php include('admin/admin/lab_report/report_doc_query_mobile.php');?>



</div>