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
        <a href="<?=base_url('#')?>" class="logo-sm"><img src="<?=base_url('assets/style/'.$style.'/img/logo-sm.png')?>" alt="CASSOW"></a>
        <form class="search-input-form" id="searchbox">
            <div class="form-group">
                <input type="text" class="form-control input-search" name="q" value="<?=isset($q)?$q:''?>" id="term">
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
            <li><a href="<?=base_url('search/about')?>"><?=lang("What_Is_Cassow");?></a></li>
            <li><a href="<?=base_url('search/addtobrowser')?>"><?=lang("Add_To_Browser");?></a></li>
            <li><a href="<?=base_url('search/blog')?>"><?=lang("Blog");?></a></li>
            <li><a href="<?=base_url('search/help')?>"><?=lang("Help");?></a></li>
            <li><a href="<?=base_url('search/contact')?>"><?=lang("Contact");?></a></li>
            <li><a href="<?=base_url('search/setting')?>"><?=lang("Advanced_Settings");?></a></li>
            <li class="divider"></li>
            <li class="select-theme">
                <div class="select-theme-label"><?=lang("Select_Theme");?></div>
                <a href="#" onclick="changeTheme(2)"><img src="<?=base_url('assets/style/'.$style.'/img/egg-black.png')?>"></a>
                <a href="#" onclick="changeTheme(1)"><img src="<?=base_url('assets/style/'.$style.'/img/egg-blue.png')?>"></a>
            </li>
        </ul>
    </div>
</div>