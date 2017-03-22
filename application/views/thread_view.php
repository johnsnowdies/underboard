<!-- Thread page -->
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
				<li><a href="/"><i class="icon-home "></i>&nbsp;Лобби</a></li>
            	<li class="active">
					<a href="/thread/show/<?=$data[0]->id?>">
                		<span class="label label-important">Текущий тред: #<?=$data[0]->id?></span>
					</a>
				</li>
	            <li><a href="/auth/logout"><i class="icon-off "></i>&nbsp;Выход</a></li>
            </ul>
		</div>
	</div>
</div>

<div class="container">

<?php
foreach ($data as $reply) {
	if (!isset($reply->parent)){
		$extraspan = 'span1';
		$container = 'span10 well';
		$link = 'half-big';
	}
	else{
		$extraspan = '';
		$container = 'span11 well';
		$link = 'big';
}?>
	<!-- Reply -->
	<a style="position: absolute;margin-top:-45px;" id="<?=$reply->id?>"></a>
	<div class="row post">
		<div class="<?=$extraspan?>"></div>
			<div class="<?=$container?>">
                <div class="row">
                    <div class="span8">
                    	<a href="#<?=$reply->id?>">
                    		<span class="<?=$link?>"><?=$reply->title?></span>
                    	</a>
                    </div>
                    <?if (isset($reply->parent)){?><div class="span1"></div><?php }?>
                    <div class="span2 visible-desktop visible-tablet">
                    	<span class="number badge badge-important" style="float:right; cursor:pointer;">#<?=$reply->id?></span>
                    </div>
	                    <p class="phone-inform visible-phone">#<?=$reply->id?></p>
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
            <label class="control-label hidden-phone" for="inputAuthor">Автор</label>
            <div class="controls">
                <input type="text" id="inputAuthor" class="input-xxlarge" name="author" value="Anonymous">
            </div>
        </div>

        <div class="control-group hidden-phone">
            <label class="control-label" for="inputTitle">Заголовок</label>
            <div class="controls">
                <input type="text" id="inputTitle" class="input-xxlarge" name="title" placeholder="Заголовок">
            </div>
        </div>

        <div class="control-group">
			<div class="controls">
				<div class="btn-group">
  					<a class="btn text-format" id="bold"><b>ж</b></a>
  					<a class="btn text-format" id="italic"><i>к</i></a>
  					<a class="btn text-format" id="irony"><span class="irony">ирония</span></a>
  					<a class="btn text-format" id="spoiler"><span class="spoiler">спойлер</span></a>
				</div>
			</div>
		</div>
        
        <div class="control-group">
            <label class="control-label hidden-phone" for="inputBody">Сообщение</label>
            <div class="controls">
                <textarea id="inputBody" class="input-xxlarge" style="height:120px;" name="body" placeholder="Текст"></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label hidden-phone" for="inputImage">Картинка</label>
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

		$('.text-format').click(function(){
			if($(this).attr('id') == 'bold' )
				tag_add(inputBody,'[b]','[/b]');
			if($(this).attr('id') == 'italic' )
				tag_add(inputBody,'[i]','[/i]');
			if($(this).attr('id') == 'irony' )
				tag_add(inputBody,'[irony]','[/irony]');
			if($(this).attr('id') == 'spoiler' )
				tag_add(inputBody,'[spoiler]','[/spoiler]');
			
		});

		function tag_add(obj, str1, str2) {   
		    if(document.selection) {                                               // Для IE  
		        var s = document.selection.createRange();  
		        if (s.text) {  
		            s.text = str1 + s.text + str2  
		        }  
		    } else {                                                               // Opera, FireFox, Chrome  
		        var start = obj.selectionStart;  
		        var end = obj.selectionEnd;  
		        s = obj.value.substr(start,end-start);  
		        obj.value = obj.value.substr(0, start) + str1 + s + str2 + obj.value.substr(end)  
		    }  
		}  
    	
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