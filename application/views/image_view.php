<?php 

foreach($data->fetchAll() as $row){
?>

<img name="compman" src="data:image;base64,<?=base64_encode($row['image_big']) ?>" />
<a href="data:image/jpeg;base64,<?=base64_encode($row['image_big']) ?>" download="filename.jpg">Схоронить!</a>
<?php }?>
