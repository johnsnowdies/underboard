<div class="container">
    <?php if (isset($_SESSION['user'])) { ?>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <a class="brand" href="/">underboard</a>
                <ul class="nav">
                    <li><a href="/"><i class="icon-home icon-white"></i>&nbsp;Лобби</a></li>
                    <li><a href="#myModal" role="button" data-toggle="modal"><i class="icon-plus icon-white"></i>&nbsp;Новая
                            тема</a></li>
                    <!-- <li><a href="/auth/logout"><i class="icon-star icon-white"></i>&nbsp;Избранное</a></li> -->
                    <li><a href="/auth/logout"><i class="icon-off icon-white"></i>&nbsp;Выход</a></li>
                </ul>
            </div>
        </div>
        <h1>Упс, что-то пошло не так!</h1>
        	<p>Мы не знаем, что именно случилось, но такой страницы нет, либо вы плохой человек и хотите все сломать.</p>
        	<p>Что можно сделать? Можно вернуться <a href="/">в лобби</a> или в <a href="/">избранное </a></p>
    	<? } else { ?>
        <h1>Ошибка доступа - вам сюда нельзя.</h1> <p>Попробуйте <a href="/">войти</a>.</p>
    <? }?>
</div>
