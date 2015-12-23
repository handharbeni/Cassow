<div class="searchbar" style="">
    <div class="container-fluid">
    <?php
        $style = "blue";
        $classPreferences = $preferences;
        $currentTheme = $classPreferences->currentTheme();
        if($currentTheme['customTheme'] == 1){
          // load custom theme
          $style = $currentTheme['baseTheme']==2?"dark":"blue";
        }else{
          $style = $currentTheme['baseTheme']==2?"dark":"blue";
        }
    ?>
        <a href="<?=base_url('Cassow')?>" class="logo-sm"><img src="<?=base_url('assets/style/'.$style.'/img/logo-sm.png')?>" alt="CASSOW"></a>
        <form class="search-input-form">
            <div class="form-group">
                <input type="text" class="form-control input-search" name="q" value="<?=isset($q)?$q:''?>">
                <button type="button" class="btn btn-remove"><span class="icon-remove"></span></button>
                <button type="submit" class="btn btn-search"><span class="icon-search"></span></button>
            </div>
        </form>
    </div>
    <div class="right-menu">
        <button type="button" class="btn-togggle dropdown-toggle" data-toggle="dropdown">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?=base_url('Search/about')?>">What is Cassow?</a></li>
            <li><a href="<?=base_url('Search/addtobrowser')?>">Add to Browser</a></li>
            <li><a href="<?=base_url('Search/blog')?>">Blog</a></li>
            <li><a href="<?=base_url('Search/help')?>">Help</a></li>
            <li><a href="<?=base_url('Search/contact')?>">Contact</a></li>
            <li><a href="<?=base_url('Search/setting')?>">Advanced Settings</a></li>
            <li class="divider"></li>
            <li class="select-theme">
                <div class="select-theme-label">Select Theme</div>
                <a href="<?=base_url('Search/setDefaultTheme/2')?>"><img src="<?=base_url('assets/style/'.$style.'/img/egg-black.png')?>"></a>
                <a href="<?=base_url('Search/setDefaultTheme/1')?>"><img src="<?=base_url('assets/style/'.$style.'/img/egg-blue.png')?>"></a>
            </li>
        </ul>
    </div>
</div>