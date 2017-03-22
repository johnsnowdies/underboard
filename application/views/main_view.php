<!-- Main page -->
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
                <li class="active"><a href="/"><i class="icon-home"></i>&nbsp;Лобби</a></li>
                <li class="visible-desktop"><a style="cursor: pointer;" data-toggle="modal" data-target="#postForm"><i class="icon-plus "></i>&nbsp;Новая тема</a></li>
                <li class="visible-phone visible-tablet"><a href="/thread"><i class="icon-plus "></i>&nbsp;Новая тема</a></li>
                <li><a href="/auth/logout"><i class="icon-off "></i>&nbsp;Выход</a></li>
            </ul>
            </div>
        </div>
    </div>
   
    <div id="postForm" class="modal hide fade in large"  tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
        	   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Новая тема</h3>
        </div>

        <form action="<?=$id?>" class="form-horizontal" method="post" enctype="multipart/form-data" style="padding:0;margin:0;">
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
                <a class="btn" data-dismiss="modal" aria-hidden="true">Отменить</a>
                <button type="submit" id="sent-button" disabled class="btn btn-primary">Отправить!</button>
            </div>
        </form>
       
    </div>

    <div class="container">
    <? foreach($data as $post){?>
            <div class="row post">
                <div class="span1 visible-desktop visible-tablet">
                    <span class="counter label label-inverse visible-desktop" style="float: right;"><?=$post->count?></span>
                    <span class="counter-tablet label label-inverse visible-tablet" style="float: right;"><?=$post->count?></span>
                </div>
                <div class="span10 well">
                    <div class="row">
                        <div class="span9">
                                <a href="/thread/show/<?=$post->id?>" >
                                    <span class="big"><?=$post->title?></span>
                                </a>
                        </div>
                        <div class="span1 visible-desktop visible-tablet">
                            <span class="badge badge-important" style="float:right;">#<?=$post->id?></span>
                        </div>
                        <p class="phone-inform visible-phone ">#<?=$post->id?>, ответов - <?=$post->count?></p>
                    </div>
                    
                    <? if(!empty($post->mime)){ ?>
                        <a href="/image/show/<?= $post->id?>" target="_blank">
                            <img class="picrelated" src="/image/thumb/<?=$post->id?> " />
                        </a>
                    <? } ?>
                    
                        <p class="postbody"><?=$post->body ?></p>

                    <span class="label label-inverse" style="height: 15px;">Написал <?= $post->author?> - <?= $post->timestamp?></span>
                </div>
            </div>
    <? } ?>
    
    <div class="pagination-custom">
    <ul>
		
		 	<? foreach ($extars as $page){?>
			<li class="text-center">
				<div class="<?= $page['class']?>">
					<a href="<?= $page['link']?>"><?= $page['value']?></a>
				</div>
				
			</li>
			<?}?>
		
    </ul>
    </div>
    <br/><br/>
</div>

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
        	if ($('#inputAuthor').val()!="" && $('#inputBody').val()!="" && $('#inputTitle').val()!=""){
                $('#warning').fadeOut();
                $('#sent-button').removeAttr('disabled');
            }
            else{
                $('#warning').fadeIn();
                $('#sent-button').attr('disabled','');
            }
        }

        $('#inputTitle').keyup(function(){validate();});
        $('#inputBody').keyup(function(){validate();});
        $('#inputAuthor').keyup(function(){validate();});

</script>