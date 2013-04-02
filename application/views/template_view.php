<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Underboard</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/css/bootstrapSwitch.css" rel="stylesheet">
    <style type="text/css">
        .container{
            margin-top:50px;
        }

        body{
            background-image: url('/img/low_contrast_linen.png');
            color:#eee;
        }

        .well{
            border-radius: 0;
            padding: 0px 5px 5px 20px;
            border: none;
            background: none;
            border-bottom: 1px dashed #3a3a3a;
        }

        .label-inverse{
            color: #7a7a7a; 
        }

        .navbar{
    
        }

       p.postbody{
        text-align: justify;
        font-family: helvetica;
        
       }

       span.big{
        font-size: 2em;
        font-family: cambria;
       }


        /* Change the docs' brand */
        .navbar .brand {
            padding-right: 20px;
            padding-left: 0;
            margin-left: 20px;

            font-weight: bold;
            color: #000;
            text-shadow: 0 1px 0 rgba(255,255,255,.1), 0 0 30px rgba(255,255,255,.125);
            -webkit-transition: all .2s linear;
            -moz-transition: all .2s linear;
            transition: all .2s linear;
        }
        .navbar .brand:hover {
            text-decoration: none;
            color:#0099ff;
            text-shadow: 0 1px 0 rgba(0,153,255,.1), 0 0 30px rgba(0,153,255,.4);
        }

        .counter{
            font-size:3.2em;
            line-height: 40px;
        }
        
    </style>
</head>
<body>
  
    <?php include 'application/views/'.$content_view; ?>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://twitter.github.com/bootstrap/assets/js/google-code-prettify/prettify.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrapSwitch.js"></script>
</body>
</html>