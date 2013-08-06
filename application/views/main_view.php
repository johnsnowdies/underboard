<?php 
    $buf     = $data;
    $data    = $buf['data'];
    $content = $buf['posts'];
    $current = $buf['current'];

    function utf8_substr($str,$start)
    {
        preg_match_all("/./su", $str, $ar);
 
       if(func_num_args() >= 3) {
           $end = func_get_arg(2);
            return join("",array_slice($ar[0],$start,$end));
       } else {
        return join("",array_slice($ar[0],$start));
    }
    }

?>
<!-- Main view page -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner ">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="brand" href="/">underboard</a>
            <div class="nav-collapse collapse">
            <ul class="nav">
                <li class="active"><a href="/"><i class="icon-home icon-white"></i>&nbsp;Лобби</a></li>
                <li class="visible-desktop"><a id="newPost" role="button" ><i class="icon-plus icon-white"></i>&nbsp;Новая тема</a></li>
                <li><a href="/auth/logout"><i class="icon-off icon-white"></i>&nbsp;Выход</a></li>
            </ul>
            </div>
        </div>
    </div>
<div class="container">

    
    <div class="modal hide fade in large" id="postForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" area-hidden="true">
        <div class="modal-header">
 
            <h3 id="myModalLabel">Новая тема</h3>
        </div>

        <form action="<?= "http://" . $_SERVER['SERVER_NAME'] . "/reply"; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="hidden" name="parent" value="0">

                <div class="control-group">
                    <label class="control-label" for="inputAuthor">Автор</label>
                    <div class="controls">
                        <input type="text" id="inputAuthor" class="input-xxlarge" name="author" value="Anonymous">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputTitle">Заголовок</label>
                    <div class="controls">
                        <input type="text" id="inputTitle" class="input-xxlarge" name="title" placeholder="">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputBody">Сообщение</label>
                    <div class="controls">
                        <textarea id="inputBody" class="input-xxlarge" style="height:120px;" name="body" placeholder=""></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputImage">Картинка</label>
                    <div class="controls">
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                        <input name="inputImage" type="file" id="inputImage"> 
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <span title="Заполнены не все поля"  id="warning" class="badge badge-important"><b>Ошибка - заполнены не все поля</b></span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <a class="btn" id="postFormCancel" >Отменить</a>
                <button type="submit" id="sent-button" disabled class="btn btn-primary">Отправить!</button>
            </div>
        </form>
       
    </div>

    <?php
    if ($data != null) {
        while ($row = $data->fetch()) {?>
            <div class="row post">
                <div class="span1 visible-desktop">
                    <span class="counter label label-inverse" style="float: right;"><?= $row['count'];?></span>
                </div>
                <div class="span10 well">
                    <div class="row">
                        <div class="span9">
                                <a href="/thread/show/<?= $row['id']; ?>" >
                                    <span class="big"><?= $row['title'];?></span>
                                </a>
                        </div>
                        <div class="span1 visible-desktop">
                            <span class="badge badge-important" style="float:right;">#<?= $row['id'] ?></span>
                        </div>
                        <p class="visible-phone visible-tablet">#<?= $row['id'] ?></p>
                    </div>
                    <? if(!empty($row['image'])){ ?>
                        <a href="/image/show/<?= $row['id']; ?>" target="_blank">
                            <img class="picrelated" src="data:image/jpeg;base64,<?= base64_encode($row['image']); ?> " />
                        </a>
                    <? } ?>
                    <? if (strlen($row['body']) < 500){?>
                        <p class="postbody"><?= nl2br($row['body']);?></p>
                    <? }else { ?>
                        <p class="postbody post-cut"><?=utf8_substr(nl2br($row['body']),0,500);?>...
                            <br/><a href="/thread/show/<?= $row['id']; ?>" id="show<?=$row['id']?>">Показать полностью</a>
                        </p>
                    <?}?>

                    <span class="label label-inverse" style="height: 15px;">Написал <?= $row['author'] . ' - ' . $row['timestamp'];?></span>
                </div>
            </div>
        <?
        }
    }?>
    
    <div class="pagination-custom">
    <ul>
		<?if ($current > 0){?> <li><center><div class="page"><a href="<?php $_SERVER['SERVER_NAME'];?>/main/page/<?= $current-1?>"><i class="icon-chevron-left"></i></a></div></center></li><? }?>
    	<? for ($i=0;$i<$content;$i++ ){ ?>
    		<li><center><div class="page <? if ($i == $current) echo 'current'?>"><a href="<?php $_SERVER['SERVER_NAME'];?>/main/page/<?= $i?>"><?= $i+1?></a></div></center></li>
    	<? }?>
    	<?if ($current < ($content-1)){?> <li><center><div class="page"><a href="<?php $_SERVER['SERVER_NAME'];?>/main/page/<?= $current+1?>"><i class="icon-chevron-right"></i></a></div></center></li><? }?>
    </ul>
    </div>
    <br/><br/>
</div>

 <script type="text/javascript">
        $('#newPost').click(function(){
           $('#postForm').slideDown();
        });

        $('#postFormCancel').click(function(){
            $('#postForm').slideUp();
        });

        $('#inputTitle').keyup(function(){
           if ($('#inputAuthor').val()!="" && $('#inputBody').val()!="" && $('#inputTitle').val()!=""){
                $('#warning').fadeOut();
                $('#sent-button').removeAttr('disabled');
            }
            else{
                $('#warning').fadeIn();
                $('#sent-button').attr('disabled','');
            }

        });

        $('#inputBody').keyup(function(){
           if ($('#inputAuthor').val()!="" && $('#inputBody').val()!="" && $('#inputTitle').val()!=""){
                $('#warning').fadeOut();
                $('#sent-button').removeAttr('disabled');
            }
            else{
                $('#warning').fadeIn();
                $('#sent-button').attr('disabled','');
            }

        });

        $('#inputAuthor').keyup(function(){
            if ($('#inputAuthor').val()!="" && $('#inputBody').val()!="" && $('#inputTitle').val()!=""){
                $('#warning').fadeOut();
                $('#sent-button').removeAttr('disabled');
            }
            else{
                $('#warning').fadeIn();
                $('#sent-button').attr('disabled','');
            }

        });
    </script>