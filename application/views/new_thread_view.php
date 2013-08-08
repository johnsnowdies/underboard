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
                <li ><a href="/"><i class="icon-home icon-white"></i>&nbsp;Лобби</a></li>
                <li class="active visible-desktop"><a data-toggle="modal" data-target="#postForm"><i class="icon-plus icon-white"></i>&nbsp;Новая тема</a></li>
                <li class="active visible-phone visible-tablet"><a href="/thread"><i class="icon-plus icon-white"></i>&nbsp;Новая тема</a></li>
                <li><a href="/auth/logout"><i class="icon-off icon-white"></i>&nbsp;Выход</a></li>
            </ul>
            </div>
        </div>
    </div>
<div class="container">
<h1>Новая тема</h1>

	<form action="<?=$data?>" class="form-horizontal" method="post" enctype="multipart/form-data" style="padding:0;margin:0;">
                <input type="hidden" name="parent" value="0">
                <div class="control-group">
                    <label class="control-label hidden-phone" for="inputAuthor">Автор</label>
                    <div class="controls">
                        <input type="text" id="inputAuthor" class="input-xxlarge" name="author" value="Anonymous" placeholder="Автор">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label hidden-phone" for="inputTitle">Заголовок</label>
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
                        <textarea id="inputBody" class="input-xxlarge" style="height:220px;" name="body" placeholder="Сообщение"></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label hidden-phone" for="inputImage">Картинка</label>
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
          
				<div class="control-group">
					<div class="controls">
	                	
    	            	<button type="submit" id="sent-button" disabled class="btn btn-primary">Отправить!</button>
    	            </div>
         		</div>
	</form>
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