<div class="staff">

<div class="left-box">

<figure><img src="import_media.php?target=<?php echo($target) ?>" alt="sample name"></figure>

</div>
<!--/left-->

<div class="right-box">
<table id="stafftable" class="ta1">
<tr>
<th>名前</th>
<td><?php echo($name) ?></td>
</tr>
<tr>
<th>紹介</th>
<td style="white-space: pre-wrap;"><?php echo($comment_large) ?></td>
</tr>
<tr>
    <th>チャージ</th>
    <td id="charge_id"></td>
</tr>
<tr>
    <th>延長料金</th>
    <td id="extension_fee_id"></td>
</tr>
<tr>
    <th>ZoomURL</th>
    <td id="zoom_url"></td>
    <!-- <td><?php if($kubun!='r'){echo($zoom_url);} ?></td> -->
</tr>
<tr id="address">
    <th>住所</th>
    <td><?php echo($address) ?></td>
</tr>

</table>
<script src="js/jquery.qrcode.min.js"></script>
<script>
	$(()=>{
        <?php if($charge_id!=''){echo("
            $('#charge_id').append('<a href=\"".$charge_id."\">".$charge."</a><BR><div></div>');
            $('#charge_id div:first').css('width','160px');
            $('#charge_id div:first').css('height','160px');
            $('#charge_id div:first').css('background-color','white');
            $('#charge_id div:first').css('padding','8px');
            $('#charge_id div:first').qrcode({width: 160,height: 160,text: '".$charge_id."'});
        ");} else {echo("
            $('#charge_id').text(\"".$charge."\");
        ");} ?>
        <?php if($extension_fee_id!=''){echo("
            $('#extension_fee_id').append('<a href=\"".$extension_fee_id."\">".$extension_fee."</a><BR><div></div>');
            $('#extension_fee_id div:first').css('width','160px');
            $('#extension_fee_id div:first').css('height','160px');
            $('#extension_fee_id div:first').css('background-color','white');
            $('#extension_fee_id div:first').css('padding','8px');
            $('#extension_fee_id div:first').qrcode({width: 160,height: 160,text: '".$extension_fee_id."'});
        ");} else {echo("
            $('#extension_fee_id').text(\"".$extension_fee."\");
        ");} ?>
         <?php if($kubun!='r' && $zoom_url!=''){echo("
            $('#zoom_url').append('<a href=\"".$zoom_url."\">Zoomを開く</a><BR><div></div>');
            $('#zoom_url div:first').css('width','160px');
            $('#zoom_url div:first').css('height','160px');
            $('#zoom_url div:first').css('background-color','white');
            $('#zoom_url div:first').css('padding','8px');
            $('#zoom_url div:first').qrcode({width: 160,height: 160,text: '".$zoom_url."'});
        ");} ?>
        $('#stafftable').find('td').each(function(i){
			if($(this).text()==''){
				$(this).parent().hide()
			}
        });
	});
</script>

</div>
<!--/right-->
</div>
<!--/staff-->
