<!-- Login page-->
<div class="jumbotron masthead visible-desktop visible-tablet">
    <h1>Underboard</h1>
    <p> &#946;eta</p>
</div>

<div class="container">
    
    <div class="phone-logo visible-phone ">
	    <h1>Underboard</h1>
		<center><p>&#946;eta - moblie</p></center>
	</div>
	<?= $data?>
        <div class="login">
            <form action="<?= "http://" . $_SERVER['SERVER_NAME'] . "/auth"; ?>" class="form" method="post">
            <h1></h1>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-append" >
                             <input class="finput" type="text" id="inputEmail" name="email" placeholder="Имя пользователя" >
                             <button disabled class="btn" id="user" style="opacity:100;" ><i class="icon-user"> </i></button>
                        </div>
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="controls">
                        <div class="input-append">
                            <input class="finput" type="password" id="inputPassword" name="password" placeholder="Пароль">
                            <button type="submit" id="password" class="btn btn-primary" style="margin-top:-1px;height:31px;" ><i class="icon-arrow-right"> </i></button>
                        </div>
                    </div>
                </div>
                
               
            </form>
        </div>
</div>