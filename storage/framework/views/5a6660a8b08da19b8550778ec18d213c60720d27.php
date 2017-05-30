<!DOCTYPE html>
<html>
<head>
    <title>Iskolarship</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="/css/app.css"/>
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/css/index.css"/>
=======
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/font-awesome/css/font-awesome.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/index.css')); ?>"/>
>>>>>>> dd2265359f315b115e2ad585df266a08777ba7c7
</head>
<body>
    <!-- <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand"><span class="isko">Isko</span></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="/" data-toggle="tooltip" data-placement="bottom" title="Login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user register"><span class="register-icon">+</span></span>&nbsp;&nbsp;Register <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Register as?</li>
                                <li><a href="registration/Student Form"><span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;Student</a></li>
                                <li><a href="/Sponsor Form"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;Sponsor</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div> -->
  
    <?php echo $__env->yieldContent('content'); ?>

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    <script>
        $(document).ready(function(){$('[data-toggle="popover"]').popover();});
        $(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});
    </script>
</body>
</html>