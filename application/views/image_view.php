<?php 

foreach($data->fetchAll() as $row){
?>
<div class="image-holder">
<center>
	<img class="big-image" src="data:image/<?=$row['mime']?>;base64,<?=base64_encode($row['image_big']) ?>" />
</center>
</div>

<div class="save-btn">
	<center>
		<a class="btn btn-primary" href="data:image/<?=$row['mime']?>;base64,<?=base64_encode($row['image_big']) ?>" download="ub00<?=$id ?>.<?=$row['mime']?>">Сохранить!</a>
	</center>
</div>
<?php }?>
