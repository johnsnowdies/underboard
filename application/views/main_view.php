<div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <a class="brand" href="/">underboard</a>
            <ul class="nav">
                <li class="active"><a href="/"><i class="icon-home icon-white"></i>&nbsp;Лобби</a></li>
                <li><a href="#myModal" role="button" data-toggle="modal"><i class="icon-plus icon-white"></i>&nbsp;Новая тема</a></li>
                <li><a href="/auth/logout"><i class="icon-star icon-white"></i>&nbsp;Избранное</a></li>
                <li><a href="/auth/logout"><i class="icon-off icon-white"></i>&nbsp;Выход</a></li>
            </ul>
        </div>
    </div>

    <div class="modal hide fade in large" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" area-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Новая тема</h3>
        </div>

        <form action="<? echo "http://" . $_SERVER['SERVER_NAME'] . "/reply"; ?>" class="form-horizontal" method="post">
            <div class="modal-body">
                <input type="hidden" name="parent" value="0">
                <div class="control-group">
                    <label class="control-label" for="inputAuthor">Имя</label>

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
                        <textarea id="inputBody" class="input-xxlarge" style="height:120px;" name="body"
                                  placeholder=""></textarea>
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
    if ($data != null) {
        while ($row = $data->fetch()) {
            ?>
            <div class="row post">
                <div class="span1"><span class="counter label label-inverse" style="float: right;"><? echo $row['count'];?></span></div>
                <div class="span10 well">
                    <div class="row">
                        <div class="span9"><a href="/thread/show/<? echo $row['id']; ?>"><span
                                    class="big"><? echo $row['title'];?></span> </a></div>
                        <div class="span1"><span class="badge badge-important"
                                                 style="float:right;">#<? echo $row['id'] ?></span></div>
                    </div>
                    <p class="postbody"><? echo nl2br($row['body']);?></p>
                    <span class="label label-info" style="color:#333;"><i class="icon-star" ></i> в избранное</span>
                    <span
                    
                        class="label label-inverse" style="height: 15px;">Написал <? echo $row['author'] . ' - ' . $row['timestamp'];?></span>
                    
                </div>
            </div>

        <?
        }
    }
    ?>

</div>