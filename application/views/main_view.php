
<div class="container">

<form action="<? echo "http://".$_SERVER['SERVER_NAME']."/reply";?>" class="form-horizontal" method="post">
  <div class="control-group">
    <label class="control-label" for="inputAuthor">Author</label>
    <div class="controls">
      <input type="text" id="inputAuthor" class="input-xxlarge" name="author" placeholder="author">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputTitle">Title</label>
    <div class="controls">
      <input type="text" id="inputTitle"  class="input-xxlarge" name="title" placeholder="title">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="inputBody">Body</label>
    <div class="controls">
      <textarea id="inputBody"   class="input-xxlarge" style="height:120px;" name="body" placeholder="Body"></textarea>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">

      <button type="submit" class="btn btn-primary">Отправить!</button>
    </div>
  </div>
</form>

	<?php 
	 if($data!=null){
	  while ($row = $data->fetch()) {
      	echo '<div class="well"><h4>'.$row['title'].'</h4><p>'.$row['body'].'</p><p>'.$row['author'].' at '.$row['timestamp'].'</p></div>';
    }}
	
	?>
	<a href="/auth/logout">Завершить сессию</a>
	
</div>