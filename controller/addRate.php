<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/site/model/implementation/designpattern/DesignPattern.php");
if($_POST['table'] == "DesignPattern"){
    $dp = new DesignPattern($_POST['id'], "", "", "", "", "", "");
    return $dp->addRate(new User($_POST['login'], "", "", "", "", ""), $_POST['rate']);
}
else{
    $sl = new Solution($_POST['id'], "", "", "", "", "", "");
    return $sl->addRate(new User($_POST['login'], "", "", "", "", ""), $_POST['rate']);
}




