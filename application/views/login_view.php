<!-- Login page-->
<script type="text/javascript">
    $(document).ready(function(){
        $('body').attr('class','loginPage');
    });

</script>



<div class="container" style="padding-top: 10%">





    <!--
    <div style="text-align: left;
width: 430px;
color:#fff;
height: 72px;
font-style: italic;text-shadow:0 1px 0 rgba(1, 1, 1, 0.5), 0 0 30px rgba(255, 255, 255, 0.125);" class="login">
        Кого здесь только нет - наркоман, графоман, депрессующий, обезумевшие патриот и русофоб, еврей, девственники и безотцовщины! Здесь все мои друзья!<br>
        <span style="float:right;color:#fff;text-shadow:0 1px 0 rgba(1, 1, 1, 0.5), 0 0 30px rgba(255, 255, 255, 0.125);">Anonymous</span>
    </div>
-->


      <?=$data?>
        <div class="login picrelated">
            <form action="/auth" class="form" method="post">
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

<center><h1>Underboard</h1></center>

