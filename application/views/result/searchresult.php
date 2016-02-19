            <?php 

                if($source != "google" && $source != "maps"){ ?>

                <div class="container-fluid" id="search-result">

                <?php

                    $class = "";

                    if($action == "Image"){

                        $class = "-image";

                    }else if($action == "Video"){

                        $class = "-video";

                    }

                ?>

                    <div class="search-result<?=$class?>">

                        <div class="search-stat" id="total">

                        </div>

                        <?php

                            $class = "results";

                            if($action == "Image"){

                                $class = "collage-wrap";

                            }else if($action == "Video"){
                				$class = "result";
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

                                    <div id="cImage">

                                        <div class="col-md-6">

                                            <img src="img/img-03-lg.jpg" class="img-responsive" id="iCurrentImage">

                                        </div>

                                        <div class="col-md-6">

                                            <div class="result-expand-desc">

                                                <h3 class="result-title">

                                                    <a href="#" id="iCurrentTitle"></a>



                                                </h3>

                                                <!--<div class="result-desc">Latest wallpaper resources, from the US, UK and across the world, along with news, comment, education jobs and discussion from TES</div>-->

                                                <div class="result-url">

                                                    <a href="#" id="iCurrentUrl" target="_blank">#</a>

                                                    <p id="iSize"></p>

                                                </div>

                                                <div class="result-expand-action">

                                                    <a href="#" class="btn btn-border-white btn-md" id="iCurrentUrlBtn" target="_blank">Visit Website</a> &nbsp; 

                                                    <a href="#" class="btn btn-border-white btn-md" id="iCurrentImgBtn" target="_blank">View Full-Sized</a>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div id="cVideo">

                                        <div class="col-md-6">
                                            <!-- <a href="http://www.youtube.com/watch?v=8mwKq7_JlS8" id="vCurrentVideo" class="embed"></a> -->
                                            <iframe style="max-width:539px;max-height:342px" src="#" id="vCurrentVideo" height="300px" width="100%" frameborder="0"></iframe>
                                            <!-- <iframe allowfullscreen="true" src="#" id="vCurrentVideo" scrolling="no" frameborder="0"></iframe> -->
                                        </div>

                                        <div class="col-md-6">

                                            <div class="result-expand-desc">

                                                <h3 class="result-title">

                                                    <a href="#" id="vCurrentTitle"></a>

                                                </h3>

                                                <h3 class="result-desc">

                                                    <p id="vDescription"></p>

                                                    <p>

                                                        <span class="icon-user" ></span> <em id="vOwner"></em><br>

                                                        <span class="icon-view-sm"></span> <em id="vViews"></em><br>

                                                        <span class="icon-time"></span> <em id="vCreated_time"></em>

                                                    </p>                                                    

                                                </h3>

                                                <!-- <div class="result-url"><a href="#" id="vCurrentUrl" target="_blank">#</a></div> -->

                                                <div class="result-expand-action">

                                                <?php
                                                    $source = $this->input->cookie('Video')!=null?$this->input->cookie('Video'):"bing";
                                                    $source = $source=="bing"?"Web":$source;
                                                    $source = ucfirst(strtolower($source));
                                                ?>

                                                    <a href="#" class="btn btn-border-white btn-md" id="vCurrentUrl" target="_blank">Watch on <?=$source?></a>

                                                </div>

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