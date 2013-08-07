<!-- Thread view -->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="brand" href="/">underboard</a>
		<div class="nav-collapse collapse">
			<ul class="nav">
				<li><a href="/"><i class="icon-home icon-white"></i>&nbsp;Лобби</a></li>
            	<li class="active">
					<a href="/thread/show/<?=$data[0]->id?>">
                		<span class="label label-important">Текущий тред: #<?=$data[0]->id?></span>
					</a>
				</li>
	            <li><a href="/auth/logout"><i class="icon-off icon-white"></i>&nbsp;Выход</a></li>
            </ul>
		</div>
	</div>
</div>

<div class="container">
<?foreach ($data as $reply) {?>
	<!-- Reply -->
	<a style="position: absolute;margin-top:-45px;" name="<?=$reply->id?>"></a>
	<div class="row post">
		<?if (!isset($reply->parent)){?>
		<div class="span1"></div>
			<div class="span10 well ">
		<?php }else{?>
            <div class="span11 well "> <?}?>
                <div class="row">
                    <div class="span8">
                    	<a href="#<?=$reply->id?>">
                    		<span class="half-big"><?=$reply->title?></span> 
                    	</a>
                    </div>
                    <?if (isset($reply->parent)){?><div class="span1"></div><?php }?>
                    <div class="span2 visible-desktop">
                    	<span class="number badge badge-important" style="float:right; cursor:pointer;">#<?=$reply->id?></span>
                    </div>
	                    <p class="visible-phone visible-tablet">#<?=$reply->id?></p>
                </div>
                <? if(!empty($reply->mime)){ ?>
                	<a href="/image/show/<?=$reply->id?>" target="_blank">
                        <img class="picrelated" src="/image/thumb/<?=$reply->id ?>" /> 
                    </a><? }?>
                
                <p class="postbody"><?=$reply->body?></p>
                <span class="label label-inverse">Написал <?= $reply->author. ' - ' . $reply->timestamp?></span>
			</div>
	</div>
	<? } ?>

    <form action="<?=$extars->postReply?>" class="form-horizontal well" method="post" enctype="multipart/form-data">
        <input type="hidden" name="parent" value="<?= $id; ?>">

        <div class="control-group">
            <label class="control-label" for="inputAuthor">Автор</label>
            <div class="controls">
                <input type="text" id="inputAuthor" class="input-xxlarge" name="author" value="Anonymous">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputTitle">Заголовок</label>
            <div class="controls">
                <input type="text" id="inputTitle" class="input-xxlarge" name="title" placeholder="Заголовок">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputBody">Сообщение</label>
            <div class="controls">
                <textarea id="inputBody" class="input-xxlarge" style="height:120px;" name="body" placeholder="Текст"></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputImage">Картинка</label>
            <div class="controls">
            	<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                <input name="inputImage" type="file" id="inputImage"> 
			</div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <span title="Заполнены не все поля"  id="warning" class="badge badge-important hidden-tablet hidden-phone"><b>Ошибка</b></span>
            </div>
            <div class="controls">
                <button type="submit" id="sent-button" disabled class="btn btn-primary">Отправить!</button>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function validate(){
        	if ($('#inputAuthor').val() && $('#inputBody').val()){
				 $('#warning').fadeOut();
	             $('#sent-button').removeAttr('disabled');
			}
			else{
               $('#warning').fadeIn();
               $('#sent-button').attr('disabled','');
           }
        }

        $(".number").click(function(){
            $('#inputBody').val($('#inputBody').val() + $(this).html() + " ");
            validate();
        });
        
		$('document').ready(function(){validate();});
        $('#inputBody').keyup(function(){validate();});
        $('#inputAuthor').keyup(function(){validate();});
    </script>
</div>