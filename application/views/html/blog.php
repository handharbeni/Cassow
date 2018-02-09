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
    <?php
        $theme = 'blue';
        if(isset($selecttheme)){
            $theme = $selecttheme=="2"?"dark":"blue";
        }
    ?>
    <link href="<?=base_url('assets/style/'.$theme.'/css/style.css')?>" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="blogpage" data-spy="scroll" data-target="#nav-side" data-offset="200">
        
        <div class="searchbar">
            <div class="container-fluid">
                <a href="<?=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:base_url('Cassow/index')?>" class="back"><img src="<?=base_url('assets/style/'.$theme.'/img/icon-left.png')?>"> &nbsp;Back to Cassow</a>
            </div>
            <div class="right-menu">
                <button type="button" class="btn-togggle dropdown-toggle" data-toggle="dropdown">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="<?=base_url('search/about')?>">What is Cassow?</a></li>
                    <li><a href="<?=base_url('search/addtobrowser')?>">Add to Browser</a></li>
                    <li><a href="<?=base_url('search/blog')?>">Blog</a></li>
                    <li><a href="<?=base_url('search/help')?>">Help</a></li>
                    <li><a href="<?=base_url('search/contact')?>">Contact</a></li>
                    <li><a href="<?=base_url('search/setting')?>">Advanced Settings</a></li>
                    <li class="divider"></li>
                    <li class="select-theme">
                        <div class="select-theme-label">Select Theme</div>
                        <a href="<?=base_url('search/setDefaultTheme/2')?>"><img src="<?=base_url('assets/style/'.$theme.'/img/egg-black.png')?>"></a>
                        <a href="<?=base_url('search/setDefaultTheme/1')?>"><img src="<?=base_url('assets/style/'.$theme.'/img/egg-blue.png')?>"></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container style1">
            <div class="blog-header">
                <img src="<?=base_url('assets/style/'.$theme.'/img/cassow-sm.png')?>">
                <h2 class="title mb0">Cassow Blog</h2>
                <p>Latest news and update from Cassow HQ.</p>
            </div>
            <div class="clearfix">
                <div class="blog-sidebar">
                    <h3>About Cassow</h3>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet</p>
                    <hr>
                    <h3>Category</h3>
                    <div class="row">
                        <div class="col-xs-6">
                            <ul class="nav">
                                <li><a href="#">Features</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Update</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-6">
                            <ul class="nav">
                                <li><a href="#">Fact</a></li>
                                <li><a href="#">Development</a></li>
                                <li><a href="#">Maintenance</a></li>
                                <li><a href="#">Theme</a></li>
                                <li><a href="#">Celebration</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <h3>Archive</h3>
                    <ul class="nav">
                        <li><a href="#">December 2015</a></li>
                        <li><a href="#">November 2015</a></li>
                        <li><a href="#">September 2015</a></li>
                        <li><a href="#">August 2015</a></li>
                        <li><a href="#">July 2015</a></li>
                        <li><a href="#">June 2015</a></li>
                    </ul>
                    <hr>
                    <br>
                </div>
                <div class="blog-content">
                    <div class="blog-item">
                        <div class="blog-image">
                            <a href="#"><img src="<?=base_url('assets/style/'.$theme.'/img/blog-01.jpg')?>"></a>
                        </div>
                        <div class="blog-desc">
                            <h4><a href="#">Cassow New Feature : Theme Selection</a></h4>
                            <p class="blog-date">Posted on : January 18, 2015</p>
                            <p>Aenean lacinia bibendum nulla sed consectetur. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                            <div><a href="#">Read More</a></div>
                        </div>
                    </div>
                    <div class="blog-item">
                        <div class="blog-image">
                            <a href="#"><img src="<?=base_url('assets/style/'.$theme.'/img/blog-02.jpg')?>"></a>
                        </div>
                        <div class="blog-desc">
                            <h4><a href="#">Cassow New Feature : Theme Selection</a></h4>
                            <p class="blog-date">Posted on : January 18, 2015</p>
                            <p>Aenean lacinia bibendum nulla sed consectetur. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                            <div><a href="#">Read More</a></div>
                        </div>
                    </div>
                    <nav class="text-center">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><img src="<?=base_url('assets/style/'.$theme.'/img/icon-right.png')?>"></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <br><br>
        </div>
        
        
        <script src="<?=base_url('assets/style/js/jquery-1.11.0.min.js')?>"></script>
        <script src="<?=base_url('assets/style/js/bootstrap.min.js')?>"></script>
        <script>
            $(function(){
            });
        </script>
  </body>
</html>
