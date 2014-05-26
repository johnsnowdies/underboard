<!-- Login page-->

<div class="jumbotron masthead visible-desktop visible-tablet">
    <h1>Underboard</h1>
   <br>
     <div style="text-align: left;
width: 430px;
color:#444;
height: 72px;
font-style: italic;" class="login">
            Кого здесь только нет - наркоман, графоман, депрессующий, обезумевшие патриот и русофоб, еврей, девственники и безотцовщины! Здесь все мои друзья!<br>
            <span style="float:right;color:#444;">Anonymous</span>
    </div>
</div>

<div class="container">
    
    <div class="phone-logo visible-phone ">
	    <h1>Underboard</h1>
		<!--<center><p>&#946;eta - moblie</p></center>-->
        <div style="text-align: left;font-style:italic;font-size:12px;color:#222; ">
            Кого здесь только нет - наркоман, графоман, депрессующий, обезумевшие патриот и русофоб, еврей, девственники и безотцовщины! Здесь все мои друзья!<br>
         <span style="float:right;color:#222;">Anonymous</span>
         
	   </div>
       <br><br>
    </div>
	<?= $data?>
        <div class="login picrelated">
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