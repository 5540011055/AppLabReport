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

<?php
if($_GET[date_tran] != "") {
  $sqlDate = "and t1.transfer_date =  '".$_GET[date_tran]."'";
  $date = $_GET[date_tran];
} 
else {
  $sqlDate = "and t1.transfer_date =  '2016-01-03'";
  $date =  "2016-01-03";
}

if($_GET[company] != "") {
  $sqlCom = "and t1.company = '".$_GET[company]."' ";
}


if($_GET[type] == "1") {
  $sqlArea = "and t2.area = 'In' ";
}
if($_GET[type] == "2") {
  $sqlArea = "and t2.area = 'Out' ";
}
if($_GET[type] == "3") {
  $sqlArea = "and t2.area = 'Point' ";
}
if($_GET[type] == "4") {
  $sqlArea = "and t2.area = 'Service' ";
}
if($_GET[type_show]=="1"){
	$sqlType_showfilert = "and t1.lab_approve = '1' ";
}else if($_GET[type_show]=="2"){
	$sqlType_showfilert = "and t1.lab_approve = '0' ";
} 

$db->connectdb_cn(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[other] = $db->select_query("select t1.id, t1.program, t1.airout_h, t1.airout_m, t1.air, t1.drivername , t1.to_place, t1.pickup_place, t1.pax, t1.orderid, t1.agent, t1.company, t1.lab_meet, t1.lab_approve, t1.invoice
  from web_order as t1
  left join web_transferproduct as t2
  on t1.program = t2.id
  where t1.id>0 ".$sqlDate."  and t1.type =  'transfer' ".$sqlArea." ".$sqlCom." and t1.status != 'CANCEL' ".$sqlType_showfilert."
  order by t1.lab_meet ASC , t1.outdate ASC , t1.airout_h ASC ");
  $num_all = 0;
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

?>

  <form method="post" name="approve_all" id="approve_all" >
    <?php
    
    foreach($lab_meet0 as $data_meet0){
      ?><input type="hidden" value="<?php echo $data_meet0[id];?>" name="all_id[]" />
      <input type="hidden" value="<?php echo $data_meet0[invoice];?>" name="all_invoice[]" /><?php
    }

    ?>
  
  </form>
 	
	  <div id="tableDataAll_cn"  align="center">
  <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">
            <a id="filter_alldata" style="cursor:pointer;" onclick="searchFilter(0)">งานทั้งหมด <?=$num_all;?></a>
          </h3>

        </div>
  
  <table border="0" align="center" class="table table-striped" >
    
 
    <tr>
      <th>
       <a style="cursor:pointer;" onclick="searchFilter(1)"> งานที่รับแล้ว <?=$num_approve;?></a> | <a id="non_app" style="cursor:pointer;" onclick="searchFilter(2)">งานที่ไม่ได้รับ <? echo $num_no_approve;?></a> |  <a style="cursor:pointer;" onclick="searchFilter(3)">เจอแขก <?=$num_meet;?></a> | <a style="cursor:pointer;" onclick="searchFilter(4)">ไม่เจอแขก <? echo $num_no_meet;  ?></a>
      </th>
    </tr>
  </table>     
  
  </div> </div>
  
 
  
  <div id="tableData_cn"  align="center">
   
  <div class="hidden-xs hidden-sm" id='non_approve'  <?=$none_no_meet;?> >
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">
            งานที่ไม่เจอแขก
          </h3>

        </div>
        <table class="table table-hover" id="dev-table">
          <thead  align="left" class="td_cl">
            <th>
              <button id="getjob_all" class="btn btn-success" onclick="update_approve_all('<?=$num_no_approve;?>')">
                รับงานทั้งหมด
              </button>
            </th>
          </thead>
          <thead  align="center" >

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

          </thead>
          <tbody>
            <?php
            $num = 1;
            foreach($lab_meet0 as $arr[other]){

              if($arr[other][lab_approve] != 0) {
                $str = '<p data-placement="top" data-toggle="tooltip" title="Progress"><button class="btn btn-warning btn-xs" ><div><span class="glyphicon glyphicon-time"></span></div></button></p>';
              }
              else {
                $str = '<p data-placement="top" data-toggle="tooltip" title="GetJob"><button class="btn btn-success btn-xs" onclick="update_lab_approve('.$arr[other][id].',1,'.$arr[other][invoice].');" ><div><span class="glyphicon glyphicon-briefcase"></span></div></button></p>';
              }
              ?>
              <tr align="center" class="tr-hv">
                <td>
                  <?php echo $str; ?>
                </td>
                <td >
                  <?=$num;?>
                </td>
                <td >
                  <?
                  $res[area_q] = $db->select_query("select area,id from web_transferproduct where id = '".$arr[other][program]."' ");
                  $arr[area_q] = mysql_fetch_array($res[area_q]);
                  echo $arr[area_q][area]; 
                  if($arr[area_q][area]=="In"){
	$title_area = "รับเข้า";
	}else if($arr[area_q][area]=="Out"){
	$title_area = "ส่งออก";
	}
	else if($arr[area_q][area]=="Point"){
	$title_area = "Point to point";
	}
                  ?>
                </td>
                <td >
                  <? echo $arr[other][airout_h].".".$arr[other][airout_m]." น.";?>
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
                  <? $res[agent_name] = $db->select_query("select company  from web_admin where id = '".$arr[other][agent]."' ");
                  $arr[agent_name] = mysql_fetch_array($res[agent_name]);
                  echo $arr[agent_name][company];
                  ?>
                </td>
                <td >
                  <? $res[driver] = $db->select_query("select name,nickname from web_driver where id = '".$arr[other][drivername]."' ");
                  $arr[driver] = mysql_fetch_array($res[driver]);
                  if($arr[driver][nickname] != "") {
                   ?><a data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" onclick="driverPro('<? echo $arr[other][drivername];?>','<?=$arr[driver][nickname];?>','<?=$date;?>');"  style="cursor:pointer;" ><? echo $arr[driver][nickname];?></a><?
                  }
                  else {
                    echo "-";
                  }?>
                </td>
                <td >
                  <p data-placement="top" data-toggle="tooltip" title="View">
                    <button class="btn btn-primary btn-xs" data-title="View" data-toggle="modal" data-target="#view_detail_lab_report" onclick="viewDetail('<?=$arr[other][id];?>','งาน <?=$title_area;?>');" >
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
                    <img src="iconstatus/all/delete.png" width="20" height="20" align="middle" onclick="update_lab_meet('<?=$arr[other][id]?>',1,'<?=$arr[other][invoice]?>');" style="cursor:pointer;" />
                    <?php
                  } ?>
                </td>
                <td >
                  <p data-placement="top" data-toggle="tooltip" title="View">
                    <button class="btn btn-metis btn-xs" data-title="View" data-toggle="modal" data-target="#view_history" onclick="viewHistory('<?=$arr[other][id];?>');" >
                      <div>
                        <span class="glyphicon glyphicon-time">
                        </span>
                      </div>
                    </button>
                  </p>
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

        <table id="mytable2" class="table table-hover" align="center" >
          <thead  align="center">
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
          </thead>
          <tbody>
            <?php
            $num = 1;
           foreach($lab_meet1 as $arr[other2]){
              if($arr[other2][lab_approve] != 0) {
                $str = '<p data-placement="top" data-toggle="tooltip" title="Progress"><button class="btn btn-warning btn-xs" ><div><span class="glyphicon glyphicon-time"></span></div></button></p>';
              }
              else {
                $str = '<p data-placement="top" data-toggle="tooltip" title="GetJob"><button class="btn btn-success btn-xs" onclick="update_lab_approve('.$arr[other2][id].',1,'.$arr[other2][invoice].');" ><div><span class="glyphicon glyphicon-briefcase"></span></div></button></p>';
              }
              ?>
              <tr align="center" class="tr-hv" >
                <td width="8%">
                  <?=$str;?>
                </td>
                <td >
                  <?=$num;?>
                </td>
                <td >
                  <?
                  $res[area_q] = $db->select_query("select area,id from web_transferproduct where id = '".$arr[other2][program]."' ");
                  $arr[area_q] = mysql_fetch_array($res[area_q]);
                  echo $title_area = $arr[area_q][area]; 
  if($arr[area_q][area]=="In"){
	$title_area = "รับเข้า";
	}else if($arr[area_q][area]=="Out"){
	$title_area = "ส่งออก";
	}
	else if($arr[area_q][area]=="Point"){
	$title_area = "Point to point";
	}
                  
                  ?>
                </td>
                <td >
                  <? echo $arr[other2][airout_h].".".$arr[other2][airout_m]." น.";?>
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
                  <? $res[agent_name] = $db->select_query("select company  from web_admin where id = '".$arr[other2][agent]."' ");
                  $arr[agent_name] = mysql_fetch_array($res[agent_name]);
                  echo $arr[agent_name][company];
                  ?>
                </td>
                <td >
                  <? $res[driver] = $db->select_query("select nickname from web_driver where id = '".$arr[other2][drivername]."' ");
                  $arr[driver] = mysql_fetch_array($res[driver]);
                  if($arr[driver][name] != "") {
                    echo $arr[driver][nickname];
                  }
                  else {
                    echo "-";
                  }?>
                </td>
                <td >
                  <p data-placement="top" data-toggle="tooltip" title="View">
                    <button class="btn btn-primary btn-xs" data-title="View" data-toggle="modal" data-target="#view_detail_lab_report" onclick="viewDetail('<?=$arr[other][id];?>','งาน <?=$title_area;?>');" >
                      <div>
                        <span class="glyphicon glyphicon-eye-open">
                        </span>
                      </div>
                    </button>
                  </p>
                </td>
                <td>
                  <img src="iconstatus/all/accept.png" width="20" height="20" align="middle" style="cursor:pointer;" onclick="update_lab_meet('<?=$arr[other2][id]?>',0,'<?=$arr[other2][invoice];?>');" />
                </td>
                <td >
                  <p data-placement="top" data-toggle="tooltip" title="View">
                    <button class="btn btn-metis btn-xs" data-title="View" data-toggle="modal" data-target="#view_history" onclick="viewHistory('<?=$arr[other2][id];?>');" >
                      <div>
                        <span class="glyphicon glyphicon-time">
                        </span>
                      </div>
                    </button>
                  </p>
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

.
  <!-------------------------------------------- ----------------------------------------------->
  <div class="hidden-lg hidden-md" >
  <div <?=$none_no_meet;?> >
    <?php
    foreach($lab_meet0 as $tb_md1){
      if($tb_md1[lab_approve] != 0) {
        $str = '<span data-placement="top" data-toggle="tooltip" title="Progress"><button class="btn btn-warning btn-xs" ><div><span class="glyphicon glyphicon-time"></span></div></button></span>';
      }
      else {
        $str = '<span data-placement="top" data-toggle="tooltip" title="GetJob"><button class="btn btn-success btn-xs" onclick="update_lab_approve('.$tb_md1[id].',1,'.$tb_md1[invoice].');" ><div><span class="glyphicon glyphicon-briefcase"></span></div></button></span>';
      }
      ?>
	  <div class="col-lg-3 col-md-3 col-sm-3" >
 <div class="panel panel-default">
      <table  class="table table-bordered color-ms">
        <tr>
          <td width="68">
            <font size="-1">
              <b>ประเภท</b>
            </font>
          </td>
          <td width="109">
            <?
            $res[area_q2] = $db->select_query("select area,id from web_transferproduct where id = '".$tb_md1[program]."' ");
            $arr[area_q2] = mysql_fetch_array($res[area_q2]);
            echo $arr[area_q2][area]; 
			    if($arr[area_q2][area]=="In"){
	$title_area = "รับเข้า";
	}else if($arr[area_q2][area]=="Out"){
	$title_area = "ส่งออก";
	}
	else if($arr[area_q2][area]=="Point"){
	$title_area = "Point to point";
	}
			?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
              <b>เวลา</b>
            </font>
          </td>
          <td width="109">
            <? echo $tb_md1[airout_h].".".$tb_md1[airout_m]." น.";?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
              <b>เที่ยวบิน</b>
            </font>
          </td>
          <td width="109">
            <?
            if($tb_md1[air] != "") {
              echo $tb_md1[air];
            }
            else {
              echo "-";
            }?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
              <b>จำนวนคน</b>
            </font>
          </td>
          <td width="109">
            <? echo $tb_md1[pax];?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
              <b>สถานที่</b>
            </font>
          </td>
          <td width="109">
            <?
            if($arr[area_q][area] == "In") {
              $place = $tb_md1[to_place];
            }
            else {
              $place = $tb_md1[pickup_place];
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
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
              <b>ชื่อแขก</b>
            </font>
          </td>
          <td width="109">
            <? $res[guest_name] = $db->select_query("select guest  from web_book_agent where id = '".$tb_md1[orderid]."' ");
            $arr[guest_name] = mysql_fetch_array($res[guest_name]);
            echo $arr[guest_name][guest];
            ?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
              <b>ชื่อเอเยนต์</b>
            </font>
          </td>
          <td width="109">
            <? $res[agent_name] = $db->select_query("select company  from web_admin where id = '".$tb_md1[agent]."' ");
            $arr[agent_name] = mysql_fetch_array($res[agent_name]);
            echo $arr[agent_name][company];
            ?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
              <b>ชื่อคนขับ</b>
            </font>
          </td>
          <td width="109">
            <? $res[driver] = $db->select_query("select name,nickname from web_driver where id = '".$tb_md1[drivername]."' ");
            $arr[driver] = mysql_fetch_array($res[driver]);
            if($arr[driver][nickname] != "") {
              echo $arr[driver][nickname];
            }
            else {
              echo "-";
            }?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
        
            </font>
          </td>
          <td width="109">
            <? echo $str;?>
            <span data-placement="top" data-toggle="tooltip" title="View">
              <button class="btn btn-primary btn-xs" data-title="View" data-toggle="modal" data-target="#view_detail_lab_report" onclick="viewDetail('<?=$tb_md1[id];?>', 'งาน <?=$title_area;?>');" >
                <div>
                  <span class="glyphicon glyphicon-eye-open">
                  </span>
                </div>
              </button>
            </span>
            <?php
            if($tb_md1[lab_approve] != "0") {
              ?>
              <img src="iconstatus/all/delete.png" width="20" height="20" align="middle" onclick="update_lab_meet('<?=$tb_md1[id]?>',1,'<?=$tb_md1[invoice]?>');" style="cursor:pointer;" />
              <?php
            }?>
            <span data-placement="top" data-toggle="tooltip" title="View">
              <button class="btn btn-metis btn-xs" data-title="View" data-toggle="modal" data-target="#view_history" onclick="viewHistory('<?=$tb_md1[id];?>');" >
                <div>
                  <span class="glyphicon glyphicon-time">
                  </span>
                </div>
              </button>
            </span>
          </td>
        </tr>
      </table>
	  </div></div>
      <?
    } ?>
</div>

<div <?=$none_meet;?> >
	<?php
  foreach($lab_meet1 as $tb_md2){
      if($tb_md2[lab_approve] != 0) {
        $str = '<span data-placement="top" data-toggle="tooltip" title="Progress"><button class="btn btn-warning btn-xs" ><div><span class="glyphicon glyphicon-time"></span></div></button></span>';
      }
      else {
        $str = '<span data-placement="top" data-toggle="tooltip" title="GetJob"><button class="btn btn-success btn-xs" onclick="update_lab_approve('.$tb_md2[id].',1,'.$tb_md2[invoice].');" ><div><span class="glyphicon glyphicon-briefcase"></span></div></button></span>';
      }
      ?>

 <div class="col-lg-3 col-md-3 col-sm-3">
 <div class="panel panel-primary">
      <table  class="table table-bordered color-md">

        <tr>
          <td width="68">
            <font size="-1">
             <b> ประเภท </b>
            </font>
          </td>
          <td width="109">
            <?
            $res[area_q2] = $db->select_query("select area,id from web_transferproduct where id = '".$tb_md2[program]."' ");
            $arr[area_q2] = mysql_fetch_array($res[area_q2]);
            echo $arr[area_q2][area]; 
			    if($arr[area_q2][area]=="In"){
	$title_area = "รับเข้า";
	}else if($arr[area_q2][area]=="Out"){
	$title_area = "ส่งออก";
	}
	else if($arr[area_q2][area]=="Point"){
	$title_area = "Point to point";
	}
			?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
              <b>เวลา</b>
            </font>
          </td>
          <td width="109">
            <? echo $tb_md2[airout_h].".".$tb_md2[airout_m]." น.";?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
             <b> เที่ยวบิน</b>
            </font>
          </td>
          <td width="109">
            <?
            if($tb_md2[air] != "") {
              echo $tb_md2[air];
            }
            else {
              echo "-";
            }?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
             <b> จำนวนคน </b>
            </font>
          </td>
          <td width="109">
            <? echo $tb_md2[pax];?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
             <b> สถานที่ </b>
            </font>
          </td>
          <td width="109">
            <?
            if($arr[area_q][area] == "In") {
              $place = $tb_md2[to_place];
            }
            else {
              $place = $tb_md2[pickup_place];
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
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
             <b> ชื่อแขก </b>
            </font>
          </td>
          <td width="109">
            <? $res[guest_name] = $db->select_query("select guest  from web_book_agent where id = '".$tb_md2[orderid]."' ");
            $arr[guest_name] = mysql_fetch_array($res[guest_name]);
            echo $arr[guest_name][guest];
            ?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
            <b>  ชื่อเอเยนต์ </b>
            </font>
          </td>
          <td width="109">
            <? $res[agent_name] = $db->select_query("select company  from web_admin where id = '".$tb_md2[agent]."' ");
            $arr[agent_name] = mysql_fetch_array($res[agent_name]);
            echo $arr[agent_name][company];
            ?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
              <b>ชื่อคนขับ</b>
            </font>
          </td>
          <td width="109">
            <? $res[driver] = $db->select_query("select name,nickname from web_driver where id = '".$tb_md2[drivername]."' ");
            $arr[driver] = mysql_fetch_array($res[driver]);
            if($arr[driver][nickname] != "") {
              echo $arr[driver][nickname];
            }
            else {
              echo "-";
            }?>
          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
         
            </font>
          </td>
          <td width="109">
            <? echo $str;?>
            <span data-placement="top" data-toggle="tooltip" title="View">
              <button class="btn btn-primary btn-xs" data-title="View" data-toggle="modal" data-target="#view_detail_lab_report" onclick="viewDetail('<?=$tb_md2[id];?>', 'งาน <?=$title_area;?>');" >
                <div>
                  <span class="glyphicon glyphicon-eye-open">
                  </span>
                </div>
              </button>
            </span>
              <img src="iconstatus/all/accept.png" width="20" height="20" align="middle" onclick="update_lab_meet('<?=$tb_md2[id]?>',1,'<?=$tb_md2[invoice]?>');" style="cursor:pointer;" />
            <span data-placement="top" data-toggle="tooltip" title="View">
              <button class="btn btn-metis btn-xs" data-title="View" data-toggle="modal" data-target="#view_history" onclick="viewHistory('<?=$tb_md2[id];?>');" >
                <div>
                  <span class="glyphicon glyphicon-time">
                  </span>
                </div>
              </button>
            </span>
          </td>
        </tr>
      </table>
	  </div></div>
      <?
    } ?>
	
	</div>
  </div>



</div>

