        <?php $q = $q!=null?$q:'Illiyin'; ?>
        <div class="search-type">
            <div class="container-fluid">
                <ul class="nav navbar-nav hidden-xs">
                    <li class="<?=$action=='Web'?'active':''?>"><a href="<?=base_url('Search/Web?q='.$q)?>">Web</a></li>
                    <li class="<?=$action=='Google'?'active':''?>"><a href="<?=base_url('Search/Google?q='.$q)?>">Google</a></li>
                    <li class="<?=$action=='Image'?'active':''?>"><a href="<?=base_url('Search/Image?q='.$q)?>">Images</a></li>
                    <li class="<?=$action=='Video'?'active':''?>"><a href="<?=base_url('Search/Video?q='.$q)?>">Videos</a></li>
                    <li class="<?=$action=='News'?'active':''?>"><a href="<?=base_url('Search/News?q='.$q)?>">News</a></li>
                    <li class="<?=$action=='Maps'?'active':''?>"><a href="<?=base_url('Search/Maps?q='.$q)?>">Maps</a></li>
                </ul>
                <div class="btn-group search-type-xs visible-xs">
                    <button type="button" class="btn btn-default btn-md dropdown-toggle" data-toggle="dropdown">
                        Web <span class="icon-arrow-down"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li class="<?=$action=='Web'?'active':''?>"><a href="<?=base_url('Search/Web?q='.$q)?>">Web</a></li>
                        <li class="<?=$action=='Google'?'active':''?>"><a href="<?=base_url('Search/Google?q='.$q)?>">Google</a></li>
                        <li class="<?=$action=='Image'?'active':''?>"><a href="<?=base_url('Search/Image?q='.$q)?>">Images</a></li>
                        <li class="<?=$action=='Video'?'active':''?>"><a href="<?=base_url('Search/Video?q='.$q)?>">Videos</a></li>
                        <li class="<?=$action=='News'?'active':''?>"><a href="<?=base_url('Search/News?q='.$q)?>">News</a></li>
                        <li class="<?=$action=='Maps'?'active':''?>"><a href="<?=base_url('Search/Maps?q='.$q)?>">Maps</a></li>
                    </ul>
                </div>
                <?php if($action=="Video"){ ?>
                <div class="navbar-right">
                    <form action="<?=base_url('Cassow/changeSourceSearch/video')?>" method="post" id="changeSource">
                        <div class="select-custom">
                            <label>
                                <select class="form-control changeSource"  name="source">
                                    <option value="web">Web</option>
                                    <option value="youtube">Youtube</option>
                                    <option value="dailymotion">DailyMotion</option>
                                    <option value="vimeo">Vimeo</option>
                                </select>
                            </label>
                        </div>
                        <div class="select-custom">
                            <label>
                                <select class="form-control sort"  name="sort">
                                    <option value="date">Most Recent</option>
                                    <option value="relevance">Relevance</option>
                                    <option value="view">Views</option>
                                </select>
                            </label>
                        </div>
                    </form>
                </div>
                <?php }else if($action == 'Image'){ ?>
                <div class="navbar-right">
                    <form action="<?=base_url('Cassow/changeSourceSearch/image')?>" method="post" id="changeSource">
                        <div class="select-custom">
                            <label>
                                <select class="form-control changeSource"  name="iSource">
                                    <option value="web">Web</option>
                                    <option value="picasa">Picasa</option>
                                    <option value="flickr">Flickr</option>
                                    <option value="500px">500px</option>
                                    <option value="ipernity">Ipernity</option>
                                </select>
                            </label>
                        </div>
                        <div class="select-custom">
                            <label>
                                <select class="form-control sort"  name="iSize">
                                    <option value="All">All Size</option>
                                    <option value="Small">Small</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>
                                    <option value="Wallpaper">Wallpaper</option>
                                    <option value="WideWallpaper">Wide Wallpaper</option>
                                </select>
                            </label>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>