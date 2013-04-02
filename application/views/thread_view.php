<style type="text/css">
body{
  background-color: #363A3A;
}
</style>

<div class="container">
	

<?php 
	  while ($row = $data['opener']->fetch()) { ?>


          <div class="navbar navbar-inverse navbar-fixed-top">
              <div class="navbar-inner">
                  <a class="brand" href="/">underboard</a>
                  <ul class="nav">
                      <li><a href="/"><i class="icon-home icon-white"></i>&nbsp;Лобби</a></li>
                      <li class="active"><a href="/thread/show/<? echo $row['id'];?>"><span class="label label-important">Текущий тред: #<? echo $row['id'] ?></span></a></li>
                      <li><a href="/auth/logout"><i class="icon-star icon-white"></i>&nbsp;Избранное</a></li>
                      <li><a href="/auth/logout"><i class="icon-off icon-white"></i>&nbsp;Выход</a></li>
                  </ul>
              </div>
          </div>

    <div class="row">
     
        <div class="span11 well">
          <div class="row">
            <div class="span10"><a href="/thread/show/<? echo $row['id'];?>"><span class="big"><? echo $row['title'];?></span> </a></div>
            <div class="span1"><span class="badge badge-important" style="float:right;">#<? echo $row['id'] ?></span></div>
          </div>
            <p class="postbody"><? echo $row['body'];?></p>
            <span class="label label-inverse">Написал <? echo $row['author'].' - '.$row['timestamp'];?></span>
          </div>
    </div>
        
    <?
  }
	?>

	<?php 
    while ($row = $data['postbody']->fetch()) { ?>


    <div class="row">
      <div class="span1"></div>
        <div class="span10 well">
          <div class="row">
            <div class="span8"><a href="#<? echo $row['id'];?>"><span class="big"><? echo $row['title'];?></span> </a></div>
            <div class="span2"><span class="badge badge-important" style="float:right;">#<? echo $row['id'] ?></span></div>
          </div>
            <p class="postbody"><? echo $row['body'];?></p>
            <span class="label label-inverse">Написал <? echo $row['author'].' - '.$row['timestamp'];?></span>
      </div>
    </div>
    <?
  }
  ?>

  <form action="<? echo "http://".$_SERVER['SERVER_NAME']."/reply";?>" class="form-horizontal well" method="post">
  <input type="hidden" name="parent" value="<? echo $id;?>"> 
  <div class="control-group">
    <label class="control-label" for="inputAuthor">Author</label>
    <div class="controls">
      <input type="text" id="inputAuthor" class="input-xxlarge" name="author" value="Anonymous" >
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



</div>