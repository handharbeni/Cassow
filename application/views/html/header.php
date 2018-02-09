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
    
    <link href="<?=base_url('assets/style/blue/css/evol.colorpicker.css')?>" rel="stylesheet" type="text/css">

    <link href="<?=base_url('assets/style/css/easy-autocomplete.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/style/css/easy-autocomplete.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/style/css/easy-autocomplete.themes.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/style/css/easy-autocomplete.themes.min.css')?>" rel="stylesheet" type="text/css">
    <?php
    $classPreferences = $preferences;
    $currentTheme = $classPreferences->currentTheme();
    if($currentTheme['customTheme'] == 1){
      if($currentTheme['baseTheme'] == 2){
        ?>
          <link href="<?=base_url('assets/style/dark/css/style.css')?>" rel="stylesheet">
          <link href="<?=base_url('assets/style/dark/css/dark.css')?>" rel="stylesheet">
        <?php 
      }else{
        ?>
          <link href="<?=base_url('assets/style/blue/css/style.css')?>" rel="stylesheet">
        <?php
      }
    }else{
      if($currentTheme['baseTheme'] == 2){
        ?>
          <link href="<?=base_url('assets/style/dark/css/style.css')?>" rel="stylesheet">
          <link href="<?=base_url('assets/style/dark/css/dark.css')?>" rel="stylesheet">
        <?php 
      }else{
        ?>
          <link href="<?=base_url('assets/style/blue/css/style.css')?>" rel="stylesheet">
        <?php
      }
    }
    ?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style type="text/css">
  #eac-container-term{
    text-align: left;
  }
  .result-url{
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
  }
  @media (max-width: 768px){
    .result-url a{
      display: inline;
      width: 80%;
    }
    .result-url span.visible-xs{
      display: inline !important;
      position: relative;
      top: 3px;
      color: #B0B0B0;
    }
  }
  html{
    font-size:14px;
  }
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
    $styleBody = "";
    $classPreferences = $preferences;
    $currentTheme = $classPreferences->currentTheme();
    if($currentTheme['customTheme'] == 0){
      // load custom theme
      $classBody .= $currentTheme['baseTheme']==2?"theme-dark":"";
      // font
      if($this->input->cookie('font') != null){
        switch ($this->input->cookie('font')) {
          case 'proxima_regular':
            # code...
              $styleBody .= " font-family: proxima_nova_rgregular;";
            break;
          case 'proxima_italic':
            # code...
              $styleBody .= " font-family: proxima_novaregular_italic;";
            break;
          case 'proxima_bold':
            # code...
              $styleBody .= " font-family: proxima_novasemibold;";
            break;
          
          default:
            # code...
              $styleBody .= " font-family: proxima_nova_rgregular;";
            break;
        }
      }
      // fontsize
      if($this->input->cookie('fontsize') != null){
        $styleBody .= "font-size: ".$this->input->cookie('fontsize')."px !important;";
      }else{
        $styleBody .= "font-size: 15px !important;";
      }
      // searchboxwidth
      if($this->input->cookie('searchboxwidth')!=null){
        $widthbox = $this->input->cookie('searchboxwidth');
        ?>
          <style>
          .search-input-form{
            width: <?=$widthbox?>% !important;
          }
          </style>
        <?php
      }
      // backgroundcolor
      if($this->input->cookie('backgroundcolor') != null){
        $styleBody .= " background-color: ".$this->input->cookie('backgroundcolor').";";
      }
      // homepagetabs

      
      
      
      // resultdescriptoncolor
      // resultfullurl
      // resultabovesnipper
    }else{
      $classBody = $currentTheme['baseTheme']==2?"theme-dark non":"";
    }
  ?>
  <?php 
  if(isset($from)){ 
          $homepage = $from=='index'?TRUE:FALSE;
          $classBody .= $homepage==TRUE?" homepage":" ";
        }else{
          $classPreferences = $preferences;
          $currentTheme = $classPreferences->currentTheme();
          if($currentTheme['customTheme'] == 0){
              // centeralignment
              if($this->input->cookie('centeralignment') != null){
                $classBody .= $this->input->cookie('centeralignment') == 1?"center-align":"";
              }
              // load custom theme
              // headerbehavior
              if($this->input->cookie('headerbehavior') != null){
                $classBody .= " ".$this->input->cookie('headerbehavior')." ";
              }else{
                $classBody .= " non ";
              }
              // headercolor
              if($this->input->cookie('headercolor') != null){
                ?>
                  <style type="text/css">
                    .searchbar{
                      background-color: <?=$this->input->cookie('headercolor')?>;
                    }
                  </style>
                <?php
              }
              // resulttitlecolor
              if ($this->input->cookie('resulttitlecolor') != null) {
                # code...
                ?>
                  <style type="text/css">
                    .result-title a{
                      color: <?=$this->input->cookie('resulttitlecolor')?>;
                    }
                  </style>
                <?php
              }
              // resultvisitedtitlecolor
              if($this->input->cookie('resultvisitedtitlecolor') != null){
                ?>
                  <style type="text/css">
                    .result-title a:visited{
                      color: <?=$this->input->cookie('resultvisitedtitlecolor')?>;
                    }
                  </style>
                <?php
              }
              // resulttitleunderline
              if($this->input->cookie('resulttitleunderline') != null){
                if($this->input->cookie('resulttitleunderline') == 1){
                  ?>
                    <style type="text/css">
                      .result-title a{
                        text-decoration: underline;
                      }
                    </style>
                  <?php
                }
                if ($this->input->cookie('resultdescriptioncolor') != null) {
                  # code...
                  ?>
                    <style type="text/css">
                      .theme-dark .result-desc{
                        color: <?=$this->input->cookie('resultdescriptioncolor')?>;
                      }
                      .result-desc{
                        color: <?=$this->input->cookie('resultdescriptioncolor')?>;
                      }
                    </style>
                  <?php
                }
              }
          }
      $homepage = '';
  }
  ?>
  <body class="<?=$classBody?>" data-spy='scroll' data-target='#nav-side' data-offset='200' id="body" style="<?=$styleBody?>">
