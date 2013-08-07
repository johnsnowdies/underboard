<?php 
	header('Content-type: image/'.$data->mime);
	header('Content-Disposition: attachment; filename="ub00'.$id.'.'.$data->mime.'"');
	echo $data->image;
?>