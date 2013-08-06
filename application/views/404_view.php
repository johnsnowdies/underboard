<div class="container">
    <?php if (isset($_SESSION['user'])) { ?>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <a class="brand" href="/">underboard</a>
                <ul class="nav">
                    <li><a href="/"><i class="icon-home icon-white"></i>&nbsp;Лобби</a></li>
                 
                    <li><a href="/auth/logout"><i class="icon-off icon-white"></i>&nbsp;Выход</a></li>
                </ul>
            </div>
        </div>
        <h1>Упс, что-то пошло не так!</h1>
        	<p>Мы не знаем, что именно случилось, но такой страницы нет.</p>
            <img src="http://404.wow.md/404_anime_girl.jpg"></img>
    	<? } else { ?>
        <h1>Ошибка доступа - вам сюда нельзя.</h1> <p>Попробуйте <a href="/">войти</a>.</p>
    <? }?>
</div>
