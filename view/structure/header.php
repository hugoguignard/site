<?php
    $session = Session::getInstance();
    require_once($_SERVER['DOCUMENT_ROOT']."/site/model/implementation/Database.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/site/controller/toolkit/ToolKitDisplay.php");
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="icon" type="image/png" href="/site/img/favicon.ico" />
        <title> UI Design Pattern Community </title>

        <!-- meta -->
        <meta charset="UTF-8">
        <meta name="author" content="Laurine MARMISSE & Loic VIGUIER & Loic FAURE & Hugo GUIGNARD" />
        <meta name="description" content="Site sur la gestion communautaire de design pattern" />
        <meta name="keywords" content="design pattern, ui, user interface, guideline, community, database" />
        <meta name="robots" content="All" />

        <link rel="stylesheet" type="text/css" href="/site/styles/styleBase.css" media="all" />
        <link rel="stylesheet" type="text/css" href="/site/styles/styleForm.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/site/styles/styleStructure.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/site/styles/stylePlus.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/site/styles/styleRate.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/site/styles/styleAdd.css" media="screen" />
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/site/javascript/toolkit.js"></script>
        <script type="text/javascript" src="/site/controller/sign/ctrlSignin.js"></script>
    </head>

    <body>

        <div id="global">

            <header id="header">
                <div id="headercontent">
                    <a href="/site/index.php"><img src="/site/img/header/logo_modif_gris.png" name="image" style="height:80px"
                       onmouseover="image.src='/site/img/header/logo_modif_gris_souris.png'" onmouseout="image.src='/site/img/header/logo_modif_gris.png'"></a>
                    <div id="navigation">
                        <div style="height:50px">
                            <form method="post" id="loginForm2" name="loginform2"
                                  action="#" onsubmit="return validSignin($(this));">
                                
                                <input type="text" id="loginsignin" name="loginsignin" 
                                       required="required" placeholder="Username or Email">
                                <input type="password" id="passwordsignin" name="passwordsignin"
                                       required="required" placeholder="Password">
                                <input value="SIGN IN" type="submit" class="signin" >
                                
                                <a href="/site/view/signup.php" style="text-decoration: none" >
                                    <input value="SIGN UP" type="button" class="signup">
                                </a>
                                
                            </form>
                            <div id="errorlogin" style="float: left; margin-left: 75px; margin-top: 3px"></div>
                            <div id="forgottenPassword"><a href="/site/view/forget.php">> Forgotten password?</a></div>
                        </div>
                        <nav id="menu">
                            <a href="/site/index.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/site/view/news.php">News</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/site/view/currentDP.php">My current Design Pattern (0)</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/site/view/contact.php">Contact</a>
                        </nav>
                    </div>
                </div>
            </header>

            <div id="centre">
