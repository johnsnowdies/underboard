<style>
    body {
        background-color: #222222;
        background-image: url('img/low_contrast_linen.png');
    }

    .gh-ico {
        float: left;
        height: 32px;
        width: 32px;

        margin-left: 10px;

        background-image: url('https://github.com/favicon.ico');
        background-repeat: no-repeat;
        background-position: 0 0;
    }

    .jumbotron {

        position: relative;
        padding: 40px 0;
        color: #fff;
        text-align: center;
        text-shadow: 0 1px 3px rgba(0, 0, 0, .4), 0 0 30px rgba(0, 0, 0, .075);
        background: #020031; /* Old browsers */
        background: -moz-linear-gradient(45deg, #020031 0%, #0099ff 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, #020031), color-stop(100%, #0099ff)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(45deg, #020031 0%, #0099ff 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(45deg, #020031 0%, #0099ff 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(45deg, #020031 0%, #0099ff 100%); /* IE10+ */
        background: linear-gradient(45deg, #020031 0%, #0099ff 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#020031', endColorstr='#6d3353', GradientType=1); /* IE6-9 fallback on horizontal gradient */
        -webkit-box-shadow: inset 0 3px 7px rgba(0, 0, 0, .2), inset 0 -3px 7px rgba(0, 0, 0, .2);
        -moz-box-shadow: inset 0 3px 7px rgba(0, 0, 0, .2), inset 0 -3px 7px rgba(0, 0, 0, .2);
        box-shadow: inset 0 3px 7px rgba(0, 0, 0, .2), inset 0 -3px 7px rgba(0, 0, 0, .2);
    }

    .jumbotron h1 {
        font-size: 80px;
        font-weight: bold;
        letter-spacing: -1px;
        line-height: 1;
    }

    .jumbotron p {
        font-size: 24px;
        font-weight: 300;
        line-height: 1.25;
        margin-bottom: 30px;
    }

        /* Link styles (used on .masthead-links as well) */
    .jumbotron a {
        color: #fff;
        color: rgba(255, 255, 255, .5);
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }

    .jumbotron a:hover {
        color: #fff;
        text-shadow: 0 0 10px rgba(255, 255, 255, .25);
    }

        /* Download button */
    .masthead .btn {
        padding: 19px 24px;
        font-size: 24px;
        font-weight: 200;
        color: #fff; /* redeclare to override the `.jumbotron a` */
        border: 0;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 5px rgba(0, 0, 0, .25);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 5px rgba(0, 0, 0, .25);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 5px rgba(0, 0, 0, .25);
        -webkit-transition: none;
        -moz-transition: none;
        transition: none;
    }

    .masthead .btn:hover {
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 5px rgba(0, 0, 0, .25);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 5px rgba(0, 0, 0, .25);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 5px rgba(0, 0, 0, .25);
    }

    .masthead .btn:active {
        -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, .1), 0 1px 0 rgba(255, 255, 255, .1);
        -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, .1), 0 1px 0 rgba(255, 255, 255, .1);
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, .1), 0 1px 0 rgba(255, 255, 255, .1);
    }

        /* Pattern overlay
        ------------------------- */
    .jumbotron .container {
        position: relative;
        z-index: 2;
    }

    .jumbotron:after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: url(img/bs-docs-masthead-pattern.png) repeat center center;
        opacity: .4;
    }

    @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (   min--moz-device-pixel-ratio: 2), only screen and (     -o-min-device-pixel-ratio: 2/1) {

        .jumbotron:after {
            background-size: 150px 150px;
        }

    }

        /* Masthead (docs home)
        ------------------------- */
    .masthead {
        padding: 70px 0 80px;
        margin-bottom: 0;
        color: #fff;

    }

    .masthead h1 {
        font-size: 120px;
        line-height: 1;
        letter-spacing: -2px;
    }

    .masthead p {
        font-size: 40px;
        font-weight: 200;
        line-height: 1.25;
    }

        /* Textual links in masthead */
    .masthead-links {
        margin: 0;
        list-style: none;
    }

    .masthead-links li {
        display: inline;
        padding: 0 10px;
        color: rgba(255, 255, 255, .25);
    }
</style>

<div class="jumbotron masthead">
    <h1>Underboard</h1>
    <p> &#946;eta</p>
</div>

<div class="container">
  <? echo $data?>
<div class="row">
    <div class="span3"></div>
    <div class="span6">
<form action="<? echo "http://".$_SERVER['SERVER_NAME']."/auth";?>" class="form-horizontal" method="post">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="email" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Пароль</label>
    <div class="controls">
      <input type="password" id="inputPassword"  name="password" placeholder="Пароль">
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
</div>