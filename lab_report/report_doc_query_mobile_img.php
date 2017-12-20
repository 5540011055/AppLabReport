  <?php 
 if($server=='1'){
 	$table_id_no_meet_sm = "table_no_meet_sm_cn";
 	$table_id_meet_sm = "table_meet_sm_cn";
 }else{
 	$table_id_no_meet_sm = "table_no_meet_sm";
 	$table_id_meet_sm = "table_meet_sm";
 }
 //echo $table_id_no_meet_sm." ".$table_id_meet_sm;
 ?>

 
 
<div class="hidden-lg hidden-md" >

<div <?=$none_no_meet;?> id="<?=$table_id_no_meet_sm;?>">
    <?php
    foreach($lab_meet0 as $tb_md1){
      $res[guest_name] = $db->select_query("select guest  from web_book_agent where id = '".$tb_md1[orderid]."' ");
            $arr[guest_name] = mysql_fetch_array($res[guest_name]);
            
   $res[area_q2] = $db->select_query("select area,id from web_transferproduct where id = '".$tb_md1[program]."' ");
   $arr[area_q2] = mysql_fetch_array($res[area_q2]);
           // echo $arr[area_q2][area]; 
	if($arr[area_q2][area]=="In"){
	$title_area = "รับเข้า";
	}else if($arr[area_q2][area]=="Out"){
	$title_area = "ส่งออก";
	}
	else if($arr[area_q2][area]=="Point"){
	$title_area = "Point to point";
	}
	 if($tb_md1[cartype]=="2"){
				$btn = '<p data-placement="top" data-toggle="tooltip" title="'.$title_area.'"><button class="btn btn-success btn-xs" onclick="show_hide('.$tb_md1[id].');" id="btn_'.$tb_md1[id].'"> <div><i class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="id_'.$tb_md1[id].'"></i> '.$title_area.'</div></button></p>';
				$id_hide_cartype = 'hide_private';
			}else{
				$btn = '<p data-placement="top" data-toggle="tooltip" title="'.$title_area.'"><button class="btn btn-warning btn-xs" onclick="show_hide('.$tb_md1[id].');"> <div><i class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="id_'.$tb_md1[id].'"></i> '.$title_area.'</div></button></p>';
			$id_hide_cartype = 'hide_join';
			}
			$res[driver] = $db->select_query("select name,nickname,phone,post_date,car_num from web_driver where id = '".$tb_md1[drivername]."' ");
            $arr[driver] = mysql_fetch_array($res[driver]);            
      ?>
      <li style="display: none;" class="inv"><a href="#"><?=$tb_md1[invoice];?></a></li>
      <li class="123" style="display: none;"><a href="#"><?=$tb_md1[ref];?></a></li>
       <li class="byname" style="display: none;"><a href="#"><?=$arr[guest_name][guest];?></a></li>
       	<li class="byphone" style="display: none;"><a href="#"><?=$arr[driver][phone];?></a></li>
<div class="<?=$id_hide_cartype;?>">     
<div class="ex">      
<div class="col-lg-3 col-md-3 col-sm-3" >
 <div class="panel panel-default">
      <table  class="table table-bordered color-ms">

        <tr>
          <td width="68">
            <font size="-1">
              <b>ประเภท</b>            </font>          
              </td>
          <td width="109">
            <?

			echo $btn;
		
			?>
			<input type="hidden" value="0" id="each_<?=$tb_md1[id];?>"/>
          </td>
<td rowspan="3" valign="middle" align="center" id="td_img_driver_<?=$tb_md1[id];?>">

<?php $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[car_num] = $db->select_query("SELECT province,plate_num,plate_color FROM web_carall where id='".$arr[driver][car_num]."'  ");
$arr[car_num] = $db->fetch($res[car_num]);	  
$name_driver = explode(" ",$arr[TB_driver][name_en]);
 
?>	
<? if($arr[car_num][plate_color]=="Green"){
$plate_color="009999"; } ?>
<? if($arr[car_num][plate_color]=="Yellow"){
$plate_color="FFCC00"; } ?>
<? if($arr[car_num][plate_color]=="Black"){
$plate_color="FFFFFF"; } ?>
<? if($arr[car_num][plate_color]=="Red"){
$plate_color="FF0000"; } ?>

<div align="center">
<span id="img_<?=$tb_md1[orderid];?>">
<a data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" 
onclick="driverPro('<? echo $tb_md1[drivername];?>','<?=$arr[driver][nickname];?>','<?=$date;?>','<?=$server;?>');"  style="cursor:pointer;" >

<img src="admin/file/driver/pic/<?= $arr[driver][post_date]; ?>.jpg?v=<?php  echo time(); ?>" name="view01"  width="80" height="95" border="0" id="view01" class="IMGSHOP" />

</a>
</span>
</div>

<table align="left" style="display: none;">
  <tr id="plate_<?=$tb_md1[orderid];?>">
    <td width="90" align="center" bgcolor="#<?=$plate_color?>" style="border: solid 1px; color:#CCCCCC; padding:2px;" ><font color="#<? if($arr[car_num][plate_color]=="Green"){
	 echo "FFFFFF"; } ?>" style=" font-size:14px;"><b><? echo $arr[car_num][plate_num];?> <br />
        <font style=" font-size:13px;"><? echo $arr[car_num][province];?>
		</font>
		</td>
  </tr>
</table>

          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
              <b>เวลา</b>            </font>          </td>
          <td width="109">
            <? echo $tb_md1[airout_h].".".$tb_md1[airout_m];?>          </td>
        </tr>
        <tr class="cls_hide_<?=$tb_md1[id];?>" style="display:none;">
          <td width="68">
            <font size="-1">
              <b>เที่ยวบิน</b>            </font>          </td>
          <td width="109">
            <?
            if($tb_md1[air] != "") {
              echo $tb_md1[air];
            }
            else {
              echo "-";
            }?>          </td>
        </tr>
        <tr class="cls_hide_<?=$tb_md1[id];?>" style="display:none;">
          <td width="68">
            <font size="-1">
              <b>จำนวนคน</b>            </font>          </td>
          <td width="109">
            <? echo $tb_md1[pax];?>          </td>
        </tr>
        <tr class="cls_hide_<?=$tb_md1[id];?>" style="display:none;">
          <td width="68">
            <font size="-1">
              <b>สถานที่</b>            </font>          </td>
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
            ?>          </td>
        </tr>
        <tr class="cls_hide_<?=$tb_md1[id];?>" style="display:none;">
          <td width="68">
            <font size="-1">
              <b>ชื่อแขก</b>            </font>          </td>
          <td width="109">
            <? 
            echo $arr[guest_name][guest];
            ?>          </td>
        </tr>
        <tr class="cls_hide_<?=$tb_md1[id];?>" style="display:none;">
          <td width="68">
            <font size="-1">
              <b>ชื่อเอเยนต์</b>            </font>          </td>
          <td width="109">
            <?
			 if($tb_md1[agent]=="13" or $tb_md1[agent]=="1563"){
				  	echo "<b>C</b>";
				  }else{ echo "<b>G</b>";}
            ?>          </td>
        </tr>
        <tr>
          <td width="68">
            <font size="-1">
              <b>ชื่อคนขับ</b>            </font>          </td>
          <td width="109">
            <a data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" 
onclick="changeDriver('<? echo $tb_md1[drivername];?>','<?=$tb_md1[orderid];?>','<?=$date;?>','<?=$server;?>','<?=$tb_md1[company];?>');"  style="cursor:pointer;" > 

<span id="dv_<?=$tb_md1[orderid];?>"><?if($arr[driver][nickname] != "") { echo $arr[driver][nickname]." ".$tb_md1[carno];}else{ echo "-";}?></span>
	
</a>       </td>
        </tr>       
        <tr>
          <td colspan="3" align="center">
          <table width="100%" align="center">
          <tr align="center">
          <td>
            <?php 
            if($tb_md1[lab_approve] != 0) { ?>
       <span data-placement="top" data-toggle="tooltip" title="Progress" style="display: none;"><button class="btn btn-warning btn-lg" ><div><span class="glyphicon glyphicon-time"></span></div></button></span>
    <?  } 
      else {	?>
        <span data-placement="top" data-toggle="tooltip" title="GetJob"><button class="btn btn-primary btn-lg" 
        onclick="update_lab_approve('<?=$tb_md1[id];?>','1','<?=$tb_md1[invoice];?>','<?=$server;?>','<?=$_GET[user];?>');" ><div><span class="glyphicon glyphicon-briefcase"></span></div></button></span>
    <?  }
            ?></td>
          <td>
            <span data-placement="top" data-toggle="tooltip" title="View">
              <button class="btn btn-success btn-lg" data-title="View" data-toggle="modal" data-target="#view_detail_lab_report"
onclick="viewDetail('<?=$tb_md1[id];?>', 'งาน <?=$title_area;?>','<?=$server;?>');" >
                <div>
                  <span class="glyphicon glyphicon-eye-open">
                  </span>
                </div>
              </button>
            </span></td>
          <td>
            <?php
            if($tb_md1[lab_approve] != "0") {
              ?>
              <img src="iconstatus/all/delete.png" width="30" height="30" align="middle" onclick="update_lab_meet('<?=$tb_md1[id]?>',1,'<?=$tb_md1[invoice]?>','<? echo $server; ?>','<?=$_GET[user];?>');" style="cursor:pointer;" />
              <?php
            }?></td>
          <td>
            <span data-placement="top" data-toggle="tooltip" title="View">
              <button class="btn btn-warning btn-lg" data-title="View" data-toggle="modal" data-target="#view_history" onclick="viewHistory('<?=$tb_md1[id];?>','<?=$server;?>');" >
                <div>
                  <span class="glyphicon glyphicon-time">
                  </span>
                </div>
              </button>
            </span></td>
          </tr>
            </table>
          </td>
        </tr>

      </table>
	  </div></div></div>
</div> 
      <?
    } ?>
</div>




<div <?=$none_meet;?> id="<?=$table_id_meet_sm;?>"  >
	<?php
  foreach($lab_meet1 as $tb_md2){
       $res[guest_name] = $db->select_query("select guest  from web_book_agent where id = '".$tb_md2[orderid]."' ");
            $arr[guest_name] = mysql_fetch_array($res[guest_name]);
             $res[area_q2] = $db->select_query("select area,id from web_transferproduct where id = '".$tb_md2[program]."' ");
            $arr[area_q2] = mysql_fetch_array($res[area_q2]);
           // echo $arr[area_q2][area]; 
			    if($arr[area_q2][area]=="In"){
	$title_area = "รับเข้า";
	}else if($arr[area_q2][area]=="Out"){
	$title_area = "ส่งออก";
	}
	else if($arr[area_q2][area]=="Point"){
	$title_area = "Point to point";
	}
	 if($tb_md2[cartype]=="2"){
				$btn = '<p data-placement="top" data-toggle="tooltip" title="'.$title_area.'"><button class="btn btn-success btn-xs" onclick="show_hide('.$tb_md2[id].');" id="btn_'.$tb_md2[id].'"> <div><i class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="id_'.$tb_md2[id].'"></i> '.$title_area.'</div></button></p>';
				$id_hide_cartype = 'hide_private';
			}else{
				$btn = '<p data-placement="top" data-toggle="tooltip" title="'.$title_area.'"><button class="btn btn-warning btn-xs" onclick="show_hide('.$tb_md2[id].');"> <div><i class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="id_'.$tb_md2[id].'"></i> '.$title_area.'</div></button></p>';
				$id_hide_cartype = 'hide_join';
			}
      $res[driver] = $db->select_query("select name,nickname,phone,post_date,car_num from web_driver where id = '".$tb_md2[drivername]."' ");
      $arr[driver] = mysql_fetch_array($res[driver]);      
      ?>
      <li class="inv" style="display: none;"><a href="#"><?=$tb_md2[invoice];?></a></li>
      <li class="123" style="display: none;"><a href="#"><?=$tb_md2[ref];?></a></li>
      <li class="byname" style="display: none;"><a href="#"><?=$arr[guest_name][guest];?></a></li>
      	<li class="byphone" style="display: none;"><a href="#"><?=$arr[driver][phone];?></a></li>
<div class="<?=$id_hide_cartype;?>">      
<div class="ex">  
 <div class="col-lg-3 col-md-3 col-sm-3">
 <div class="panel panel-primary">
      <table  class="table table-bordered color-md" > 

        <tr>
          <td width="68">
            <font size="-1">
             <b> ประเภท </b>
            </font>
          </td>
          <td width="109">
        <?
           
			echo $btn;
		
			?>
			<input type="hidden" value="0" id="each_<?=$tb_md2[id];?>"/>
          </td>
          <td rowspan="3" valign="middle" align="center" id="td_img_driver_<?=$tb_md2[id];?>">
<?php $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[car_num] = $db->select_query("SELECT province,plate_num,plate_color FROM web_carall where id='".$arr[driver][car_num]."'  ");
$arr[car_num] = $db->fetch($res[car_num]);	  
$name_driver = explode(" ",$arr[TB_driver][name_en]);
 
?>	
<? if($arr[car_num][plate_color]=="Green"){
$plate_color="009999"; } ?>
<? if($arr[car_num][plate_color]=="Yellow"){
$plate_color="FFCC00"; } ?>
<? if($arr[car_num][plate_color]=="Black"){
$plate_color="FFFFFF"; } ?>
<? if($arr[car_num][plate_color]=="Red"){
$plate_color="FF0000"; } ?>

<div align="center">
<a data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" 
onclick="driverPro('<? echo $tb_md2[drivername];?>','<?=$arr[driver][nickname];?>','<?=$date;?>','<?=$server;?>');"  style="cursor:pointer;" >
<span id="img_<?=$tb_md2[orderid];?>">
<img src="admin/file/driver/pic/<?= $arr[driver][post_date]; ?>.jpg?v=<?php  echo time(); ?>" name="view01"  width="80" height="95" border="0" id="view01" class="IMGSHOP" />
</span>
</a>
</div>

<table align="left" style="display: none;">
  <tr id="plate_<?=$tb_md2[orderid];?>">
    <td width="90" align="center" bgcolor="#<?=$plate_color?>" style="border: solid 1px; color:#CCCCCC; padding:2px;" ><font color="#<? if($arr[car_num][plate_color]=="Green"){
	 echo "FFFFFF"; } ?>" style=" font-size:14px;"><b><? echo $arr[car_num][plate_num];?> <br />
        <font style=" font-size:13px;"><? echo $arr[car_num][province];?>
		</font>
		</td>
  </tr>
</table>
          </td>
        </tr>
		<tr>
          <td width="68">
            <font size="-1">
              <b>เวลา</b>
            </font>
          </td>
          <td width="109">
            <? echo $tb_md2[airout_h].".".$tb_md2[airout_m];?>
          </td>
        </tr>
        <tr class="cls_hide_<?=$tb_md2[id];?>" style="display:none;">
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
        <tr class="cls_hide_<?=$tb_md2[id];?>" style="display:none;">
          <td width="68">
            <font size="-1">
             <b> จำนวนคน </b>
            </font>
          </td>
          <td width="109">
            <? echo $tb_md2[pax];?>
          </td>
        </tr>
        <tr class="cls_hide_<?=$tb_md2[id];?>" style="display:none;">
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
        <tr class="cls_hide_<?=$tb_md2[id];?>" style="display:none;">
          <td width="68">
            <font size="-1">
             <b> ชื่อแขก </b>
            </font>
          </td>
          <td width="109">
            <?
            echo $arr[guest_name][guest];
            ?>
          </td>
        </tr>
        <tr class="cls_hide_<?=$tb_md2[id];?>" style="display:none;">
          <td width="68">
            <font size="-1">
            <b>  ชื่อเอเยนต์ </b>
            </font>
          </td>
          <td width="109">
            <? //$res[agent_name] = $db->select_query("select company  from web_admin where id = '".$tb_md2[agent]."' ");
            //$arr[agent_name] = mysql_fetch_array($res[agent_name]);
            //echo $arr[agent_name][company];
			 if($tb_md2[agent]=="13" or $tb_md2[agent]=="1563"){
				  	echo "<b>C</b>";
				  }else{ echo "<b>G</b>";}
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
           <a data-title="Driver Profile" data-toggle="modal" data-target="#view_detail_lab_report" 
onclick="changeDriver('<? echo $tb_md2[drivername];?>','<?=$tb_md2[orderid];?>','<?=$date;?>','<?=$server;?>','<?=$tb_md2[company];?>');"  style="cursor:pointer;" > 

<span id="dv_<?=$tb_md2[orderid];?>"><?if($arr[driver][nickname] != "") { echo $arr[driver][nickname]." ".$tb_md2[carno];}else{ echo "-";}?></span>
	
</a>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            <?php 
            if($tb_md2[lab_approve] != 0) { ?>
       <span data-placement="top" data-toggle="tooltip" title="Progress" style="display: none;"><button class="btn btn-warning btn-lg" ><div><span class="glyphicon glyphicon-time"></span></div></button></span>
        
    <?  }
      else { ?>
<span data-placement="top" data-toggle="tooltip" title="GetJob"><button class="btn btn-primary btn-lg" onclick="
update_lab_approve('<?=$tb_md2[id];?>','1','<?=$tb_md2[invoice];?>','<?=$server;?>','<?=$_GET[user];?>');" ><div><span class="glyphicon glyphicon-briefcase"></span></div></button></span>
    <?  }
            ?>&nbsp;&nbsp;&nbsp;
            <span data-placement="top" data-toggle="tooltip" title="View">
              <button class="btn btn-primary btn-lg" data-title="View" data-toggle="modal" data-target="#view_detail_lab_report" onclick="viewDetail('<?=$tb_md2[id];?>', 'งาน <?=$title_area;?>','<?=$server;?>');" >
                <div>
                  <span class="glyphicon glyphicon-eye-open">
                  </span>
                </div>
              </button>
            </span>&nbsp;&nbsp;&nbsp;
              <img src="iconstatus/all/accept.png" width="30" height="30" align="middle" onclick="update_lab_meet('<?=$tb_md2[id]?>',1,'<?=$tb_md2[invoice]?>','<?=$_GET[user];?>');" style="cursor:pointer;" />&nbsp;&nbsp;&nbsp;
            <span data-placement="top" data-toggle="tooltip" title="View">
              <button class="btn btn-metis btn-lg" data-title="View" data-toggle="modal" data-target="#view_history" onclick="viewHistory('<?=$tb_md2[id];?>','<?=$server;?>');" >
                <div>
                  <span class="glyphicon glyphicon-time">
                  </span>
                </div>
              </button>
            </span>&nbsp;&nbsp;&nbsp;
          </td>
        </tr>
      </table>
	  </div></div></div>
</div>
      <?
    } ?>
	
	</div>
  </div>