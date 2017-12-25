<?php 
if($_GET[view]=='desktop'){

 $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
 $res[driver] = $db->select_query("select id,name,post_date,car_num,nickname,phone from web_driver where company = '".$_GET[com]."' and status = 1  ");
	 ?>  
<select class="form-control" id="select_driver">
<?php  while($arr[driver] = $db->fetch($res[driver])) { 
		if($arr[driver][id]==$_GET[driver_id]){
			$selected = "selected";
		}else{
			$selected = " ";
		}
?>
	<option value="<?=$arr[driver][id]; ?>" <? echo $selected;?> role="<?=$arr[driver][post_date];?>" class="<?=$arr[driver][car_num];?>"  > <?=$arr[driver][nickname]."  (".$arr[driver][car_num].")"; ?></option>
	<? } ?>
</select>
<script>
	$('#select_driver').change(function(){
		var img = $('#select_driver option:selected').attr('role');
		var car_no = $('#select_driver option:selected').attr('class');
		var url_img = 'admin/file/driver/pic/'+img+'.jpg?v=<?=time();?>';
		$.ajax({
		    url: url_img,
		    type:'HEAD',
		    error: function()
		    {
		        var url_img_no = 'admin/file/driver/pic/no.jpg?v=<?=time();?>';
//		        alert(url_img);
		        $('#img_driver').attr('src',url_img_no);
		    },
		    success: function()
		    {
		        var url_img = 'admin/file/driver/pic/'+img+'.jpg?v=<?=time();?>';
//		          console.log(url_img);
		          $('#img_driver').attr('src',url_img);
		    }
		});
		
		$('#carno').val(car_no);
		var txt = $('#select_driver option:selected').text();
		var name = txt.split("(");
		$('#new_driver').text(name[0]+' เบอร์ : '+car_no);
	});
</script>
<? 	} 

if($_GET[view]=="mobile"){ 

 
    $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
    $res[category] = $db->select_query("SELECT id,name,post_date,car_num,nickname,phone FROM web_driver where  status=1  and company = ".$_GET[com]."   ");
while ($arr[category] = $db->fetch($res[category])){
	
	$url = "admin/file/driver/pic/".$arr[category][post_date].".jpg";
	if(file_exists($url)==0){
		$url = "admin/file/driver/pic/no.jpg";
	}
	$phone = explode("/",$arr[category][phone]);
	if($phone[1]!="" and $phone[1]!=NULL){
		
		$tag_phone = '<span onclick="TelDriver(\''.$phone[0].'\'); ">โทร : '.$phone[0].'</span><br/><span onclick="TelDriver('.$phone[1].');">โทร : '.$phone[1]."</span>";
	}else{
		$tag_phone = '<span onclick="TelDriver(\''.$arr[category][phone].'\') ;">โทร : '.$arr[category][phone].'</span>';
	}
    ?>
<div href="#" class="mobileSelect-control" id="dv_a_<?=$arr[category][id];?>"  data-value="0" style="" onclick="SelectDriver('<?=$arr[category][id];?>','<?=$arr[category][car_num];?>','<?=$arr[category][nickname];?>');">
 <input type="hidden" value="<?=substr($arr[category][username],9);?>" id="user_<?=$arr[category][id];?>" class="user" />
 <input type="hidden" value="<?=$arr[category][nickname];?>" id="name_<?=$arr[category][id];?>" class="name" />

 	<table width="100%">
 	<tr>
 		
 		<td width="100"> <img src="<?=$url;?>"  width="65px"   style="box-shadow: 1px 1px 5px #ddd;border:1px solid #ddd;"   /></td>
 		<td class="td-color other" id="td_<?=$arr[category][id];?>">
 			<span><?=$arr[category][nickname]." เบอร์ ".$arr[category][car_num]." <br/>";?></span><br/>
 			<?=$tag_phone;?>
 		</td>
 		
 	</tr>
 	</table>
 </div>
 
	   
	   <? }
                      $db->closedb ();
                      ?>
 
<? }
?>