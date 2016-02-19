        <?php $q = $q!=null?$q:'Illiyin'; ?>

        <div class="search-type">

            <div class="container-fluid">

                <ul class="nav navbar-nav hidden-xs">

                    <li class="<?=$action=="Web"?"active":""?>" ><a href="<?=base_url('search/Web?q='.$q)?>"><?=lang("web");?></a></li>

                    <li class="<?=$action=="Google"?"active":""?>" ><a href="<?=base_url('search/Google?q='.$q)?>"><?=lang("google");?></a></li>

                    <li class="<?=$action=="Image"?"active":""?>" ><a href="<?=base_url('search/Image?q='.$q)?>"><?=lang("image");?></a></li>

                    <li class="<?=$action=="Video"?"active":""?>" ><a href="<?=base_url('search/Video?q='.$q)?>"><?=lang("video");?></a></li>

                    <li class="<?=$action=="News"?"active":""?>" ><a href="<?=base_url('search/News?q='.$q)?>"><?=lang("news");?></a></li>

                    <li class="<?=$action=="Maps"?"active":""?>" ><a href="<?=base_url('search/Maps?q='.$q)?>"><?=lang("maps");?></a></li>

                </ul>

                <div class="btn-group search-type-xs visible-xs">

                    <button type="button" class="btn btn-default btn-md dropdown-toggle" data-toggle="dropdown">

                        <?=$action?> <span class="icon-arrow-down"></span>

                    </button>

                    <ul class="dropdown-menu">

                        <li><a href="<?=base_url('search/Web?q='.$q)?>"><?=lang("web");?></a></li>

                        <li><a href="<?=base_url('search/Google?q='.$q)?>"><?=lang("google");?></a></li>

                        <li><a href="<?=base_url('search/Image?q='.$q)?>"><?=lang("image");?></a></li>

                        <li><a href="<?=base_url('search/Video?q='.$q)?>"><?=lang("video");?></a></li>

                        <li><a href="<?=base_url('search/News?q='.$q)?>"><?=lang("news");?></a></li>

                        <li><a href="<?=base_url('search/Maps?q='.$q)?>"><?=lang("maps");?></a></li>

                    </ul>

                </div>

                <?php if($action=="Video"){ ?>

                <div class="navbar-right">

                        <div class="select-custom">

                            <label>

                                <?php $cookie = $this->input->cookie("Video")!=null?$this->input->cookie("Video"):"youtube"; ?>

                                <select class="form-control"  name="source" onchange="changeSource('Video',this.value)">

                                    <option value="bing" <?=$cookie=="bing"?"SELECTED":""?>>Web</option>

                                    <option value="youtube" <?=$cookie=="youtube"?"SELECTED":""?>>Youtube</option>

                                    <option value="dailymotion" <?=$cookie=="dailymotion"?"SELECTED":""?>>DailyMotion</option>

                                    <option value="vimeo" <?=$cookie=="vimeo"?"SELECTED":""?>>Vimeo</option>

                                </select>

                            </label>

                        </div>

                        <div class="select-custom">

                            <label>

                                <?php $cookie = $this->input->cookie("sortVideo")!=null?$this->input->cookie("sortVideo"):"relevance"; ?>

                                <select class="form-control sort"  name="sort" onchange="changeSort(this.value)">

                                    <option value="date" <?=$cookie=="date"?"SELECTED":""?>>Most Recent</option>

                                    <option value="relevance" <?=$cookie=="relevance"?"SELECTED":""?>>Relevance</option>

                                </select>

                            </label>

                        </div>

                </div>

                <?php }else if($action == 'Image'){ ?>

                <div class="navbar-right">

                        <div class="select-custom">

                            <label>

                                <?php $cookie = $this->input->cookie("Image")!=null?$this->input->cookie("Image"):"bing"; ?>

                                <select class="form-control changeSource" onchange="changeSource('Image',this.value)">

                                    <option value="bing" <?=$cookie=="bing"?"SELECTED":""?>>Web</option>

                                    <option value="picasa" <?=$cookie=="picasa"?"SELECTED":""?>>Picasa</option>

                                    <option value="flickr" <?=$cookie=="flickr"?"SELECTED":""?>>Flickr</option>

                                    <option value="soopx" <?=$cookie=="soopx"?"SELECTED":""?>>500px</option>

                                    <option value="ipernity" <?=$cookie=="ipernity"?"SELECTED":""?>>Ipernity</option>

                                    <option value="shutterstock" <?=$cookie=="shutterstock"?"SELECTED":""?>>Shutterstock</option>

                                </select>

                            </label>

                        </div>

                        <div class="select-custom">

                            <label>

                                <?php $cookie = $this->input->cookie("sizeImage")!=null?$this->input->cookie("sizeImage"):"all"; ?>

                                <select class="form-control sort"  name="iSize" onchange="changeSize(this.value);">

                                    <option value="all" <?=$cookie=="all"?"SELECTED":""?>>All Size</option>

                                    <option value="small" <?=$cookie=="small"?"SELECTED":""?>>Small</option>

                                    <option value="medium" <?=$cookie=="medium"?"SELECTED":""?>>Medium</option>

                                    <option value="large" <?=$cookie=="large"?"SELECTED":""?>>Large</option>

                                </select>

                            </label>

                        </div>

                    <!-- </form> -->

                </div>

                <?php } ?>

            </div>

        </div>
