<?php
require_once 'engine/init.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Giolada</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/core.css" rel="stylesheet">
        <link href="css/product.css" rel="stylesheet">
        <link rel="stylesheet" href="css/boon.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -162px;
            margin-left: 158px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px;
            border-radius: 0 6px 6px 6px;

            display: block;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: opacity 500ms ease, visibility 500ms ease;
            -moz-transition: opacity 500ms ease, visibility 500ms ease;
            -o-transition: opacity 500ms ease, visibility 500ms ease;
            transition: opacity 500ms ease, visibility 500ms ease;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            visibility: visible;
            display: block;
            opacity: 1;
        }


        .dropdown-submenu>a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #ccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #fff;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left>.dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="header" class="pull-right gfont boon-300" style="padding-right:40px;">
                <div style="padding-top:5px;"> <img src="img/home/line.png" height="19" width="20"> Giolada.123</div>
                <div style="padding-top:3px;"><img src="img/home/facebook.png" height="18" width="19"> /Giolada</div>
                <div style="padding-top:3px;"><img src="img/home/mail.png" height="13" width="16"> contact@giolada.com</div>
                </div><!-- .header -->
                <div id="content">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-4" style="padding-left:110px;padding-top:50px;">
                            <img src="img/logo.png">
                        </div>
                    </div><!-- .row logo -->