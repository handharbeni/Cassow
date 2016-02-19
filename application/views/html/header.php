<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">
    <title>CASSOW</title>
    <link href="<?=base_url('assets/style/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/style/blue/css/style.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/style/dark/css/style.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/style/dark/css/dark.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/style/colorpicker/css/bootstrap-colorpicker.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/style/colorpicker/css/bootstrap-colorpicker.min.css')?>" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style type="text/css">
  .mapresult{
    width: 100%; 
    height: 81%;
    top: 0;
    left: 0;
  }
  form{margin-bottom: 0px;display: block;}
  </style>
  <?php
    $classBody = "";
    $classPreferences = $preferences;
    $currentTheme = $classPreferences->currentTheme();
    if($currentTheme['customTheme'] == 1){
      // load custom theme
      $classBody = $currentTheme['baseTheme']==2?"theme-dark":"";
    }else{
      $classBody = $currentTheme['baseTheme']==2?"theme-dark":"";
    }
  ?>
  <?php 
  if(isset($from)){ 
          $homepage = $from=='index'?TRUE:FALSE;
        }else{
          $homepage = '';
  }
  ?>
  <body class="<?=$classBody?><?=$homepage==TRUE?'homepage':''?>" data-spy='scroll' data-target='#nav-side' data-offset='200'>
