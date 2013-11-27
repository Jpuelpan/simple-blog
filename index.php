<?php
require_once('config.php');

on('GET', '/', function (){
  render('index');
});

dispatch();
?>