<!-- Login page-->

<div class="visible-phone ">
<h1>Underboard</h1>
<p> &#946;eta - moblie</p>
</div>

<div class="jumbotron masthead visible-desktop visible-tablet">
    <h1>Underboard</h1>
    <p> &#946;eta</p>
</div>

<div class="container">
    <? echo $data?>
    <div class="row">
        <div class="span3"></div>
        <div class="span6">
            <form action="<?= "http://" . $_SERVER['SERVER_NAME'] . "/auth"; ?>" class="form-horizontal "
                  method="post">
                <div class="control-group">
                    <div class="controls">
                        <div class="input-append" >
                             <input class="input-large" type="text" id="inputEmail" name="email" placeholder="Имя пользователя" >
                             <button disabled class="btn" style="opacity:100;" ><i class="icon-user"> </i></button>
                        </div>
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="controls">
                        <div class="input-append">
                            
                            <input class="input-large" type="password" id="inputPassword" name="password" placeholder="Пароль">
                            <button type="submit" class="btn btn-primary" style="margin-top:-1px;height:31px;" ><i class="icon-arrow-right"> </i></button>
                        </div>
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="controls">
                       
                    </div>
                </div>
            </form>
        </div>
        <div class="span3"></div>
    </div>
</div>