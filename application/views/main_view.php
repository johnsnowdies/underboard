<style type="text/css">
body{
  background-color: #2a2a2a;
}
</style>

<div class="container">
 <div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <a class="brand" href="/">Underboard</a>
    <ul class="nav">
      <li class="active"><a href="/">Лобби</a></li>
      <li><a href="#myModal" role="button" data-toggle="modal">Новая тема</a></li>
      <li><a href="/auth/logout">Выход</a></li>
    </ul>
  </div>
</div>

<div class="modal" id="myModal" tabindex="-1" role="dialog" style="display:none;" aria-labelledby="myModalLabel" area-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Новая тема</h3>
  </div>

<form action="<? echo "http://".$_SERVER['SERVER_NAME']."/reply";?>" class="form-horizontal" method="post">
  <div class="modal-body">

  <input type="hidden" name="parent" value="0"> 
  <div class="control-group">
    <label class="control-label" for="inputAuthor">Author</label>
    <div class="controls">
      <input type="text" id="inputAuthor" class="input-xlarge" name="author" value="Anonymous" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputTitle">Title</label>
    <div class="controls">
      <input type="text" id="inputTitle"  class="input-xlarge" name="title" placeholder="title">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="inputBody">Body</label>
    <div class="controls">
      <textarea id="inputBody"   class="input-xlarge" style="height:120px;" name="body" placeholder="Body"></textarea>
    </div>
  </div>

  
  
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Отменить</button>
    <button type="submit" class="btn btn-primary">Отправить!</button>
  </div>
</form>  
</div>



  <?php 
	 if($data!=null){
	  while ($row = $data->fetch()) { ?>
    <div class="row">
      <div class="span2"></div>
      	<div class="span7 well">
            <h4><a href="/thread/show/<? echo $row['id'];?>"><? echo $row['title'];?></a></h4>
            <a href="/thread/show/<? echo $row['id'];?>">[Открыть]</a>
            <p><? echo $row['body'];?></p>
            <span class="label">Написал <? echo $row['author'].' - '.$row['timestamp'];?></span>
          </div>
    </div>
        
    <?
  }}
	
	?>

</div>