
<div class="container">
    <?= $data?>
    <div class="row">
        <div class="span3"></div>
        <div class="span6">
            <form action="<?= "https://" . $_SERVER['SERVER_NAME'] . "/auth"; ?>" class="form-horizontal"
                  method="post">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>

                    <div class="controls">
                        <input type="text" id="inputEmail" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Пароль</label>

                    <div class="controls">
                        <input type="password" id="inputPassword" name="password" placeholder="Пароль">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox"> Запомнить меня
                        </label>
                        <button type="submit" class="btn">Войти</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="span3"></div>
    </div>
