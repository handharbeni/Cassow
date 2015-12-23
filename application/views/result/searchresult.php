            <?php 
                if($source != "google" && $source != "maps"){ ?>
                <div class="container-fluid">
                <?php
                    $class = "";
                    if($action == "Image"){
                        $class = "-image";
                    }else if($action == "Video"){
                        $class = "-video";
                    }
                ?>
                    <div class="search-result<?=$class?>">
                        <div class="search-stat">
                            Showing results
                        </div>
                        <?php
                            $class = "results-img";
                            if($action == "Image"){
                                $class = "collage-wrap";
                            }
                        ?>
                        <div class="<?=$class?>" id="timeline-container">
                            <?php if($action == "Image"){ ?>
                                <section class="Collage effect-parent"  id="timeline-container">
                                </section>
                            <?php } ?>
                        </div>
                        <div class="result-expand">
                            <div class="result-expand-wrap">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="img/img-03-lg.jpg" class="img-responsive" id="currentImage">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="result-expand-desc">
                                            <h3 class="result-title">
                                                <a href="#" id="currentTitle"></a>
                                            </h3>
                                            <!--<div class="result-desc">Latest wallpaper resources, from the US, UK and across the world, along with news, comment, education jobs and discussion from TES</div>-->
                                            <div class="result-url"><a href="#" id="currentUrl" target="_blank">#</a></div>
                                            <div class="result-expand-action">
                                                <a href="#" class="btn btn-border-white btn-md" id="currentUrlBtn" target="_blank">Visit Website</a> &nbsp; 
                                                <a href="#" class="btn btn-border-white btn-md" id="currentImgBtn" target="_blank">View Full-Sized</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="loader">
                            <input type="hidden" id="first" value="<?php echo FIRST; ?>" />
                            <input type="hidden" id="limit" value="<?php echo LIMIT; ?>" >
                            <img src="<?=base_url('assets/loader/load.gif')?>" style="width:40px;">
                        </div>
                    </div>
                </div>
                <?php }else if($source == "google"){ ?>
                <div class="container-fluid">
                    <div class="search-result">
                        <div class="search-stat">
                            Showing results
                        </div>
                        <?php $this->load->view('result/googleresult'); ?>
                        </div>
                    </div>
                <?php }else if($source == "maps"){ ?>
                    <div class="mapresult">
                        <?php $Api = $api; ?>
                        <?php $Api->loadMaps($q); ?>
                    </div>
                <?php } ?>
        </div>