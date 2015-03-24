<?php
require_once 'engine/init.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Giolada Warehouse</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-fileupload.min.css">
        <link rel="stylesheet" href="css/core.css">
        <!-- <link rel="stylesheet" href="css/product.css">
        <link rel="stylesheet" href="css/boon.css"> -->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            .sidebar-nav {
                padding: 9px 0;
            }
            .dropdown-menu .sub-menu {
                left: 100%;
                position: absolute;
                top: 0;
                visibility: hidden;
                margin-top: -1px;
                -webkit-transition: 1s; /* For Safari 3.1 to 6.0 */
                transition: 1s;
            }
            .dropdown-menu li:hover .sub-menu {
                visibility: visible;
                
            }
            .dropdown:hover .dropdown-menu {
                display: block;
            }
            .nav-tabs .dropdown-menu, .nav-pills .dropdown-menu, .navbar .dropdown-menu {
                margin-top: 0;
            }
            .navbar .sub-menu:before {
                border-bottom: 7px solid transparent;
                border-left: none;
                border-right: 7px solid rgba(0, 0, 0, 0.2);
                border-top: 7px solid transparent;
                left: -7px;
                top: 10px;
            }
            .navbar .sub-menu:after {
                border-top: 6px solid transparent;
                border-left: none;
                border-right: 6px solid #fff;
                border-bottom: 6px solid transparent;
                left: 10px;
                top: 11px;
                left: -6px;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Giolada Warehouse</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
                            <li <?php if ($page == "product.php") echo ' class="active"'; ?>class="dropdown">
                                <a href class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Stocks <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="addproduct.php?tid=0">Add Product</a></li>
                                    <li class="divider"></li>
                                    <li><a href="product.php">Manage Product</a></li>
                                </ul>
                            </li>
                            <li><a href="viewphoto.php">Promotion</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>