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
        <div class="search-box">

            <div class="container">

                <form method="get" action="<?=base_url('/search/Web')?>" id="landing">

                    <a href="#" class="logo">

                        <img src="<?=base_url('assets/style/'.$style.'/img/logo.png')?>" class="logo-portrait" alt="CASSOW">

                        <img src="<?=base_url('assets/style/'.$style.'/img/logo-landscape.png')?>" class="logo-landscape" alt="CASSOW">

                    </a>

                    <div class="form-group">

                        <input type="text" class="form-control input-lg input-search" name="q" id="term">

                        <button type="button" class="btn btn-remove"><span class="icon-remove"></span></button>

                        <button type="submit" class="btn btn-search"><span class="icon-search"></span></button>

                    </div>
                    <script>
                    </script>
                    <div class="homepage-btn">

                        <?php $Api = $api; ?>

                        <?php $browser = $Api->detectBrowser(); ?>

                        <?php $icon = explode(" ", $browser['name']); ?>
                        <?php
                            if($this->input->cookie('homepagetabs')!=null){
                                if($this->input->cookie('homepagetabs') == 1){
                                    ?>
                                        <button type="button" class="btn btn-primary btn-lg"><span class="icon-<?=strtolower($browser['alias'])?> icon-white"></span> &nbsp;<?=lang('add_to');?><?=$browser['name']?></button> &nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-border btn-lg"><?=lang('set_as_homepage');?></button>
                                    <?php
                                }else if($this->input->cookie('homepagetabs') == 2){
                                    ?>
                                        <div class="select-custom">
                                            <label>
                                            <?php $value = $this->input->cookie('language')!=null?$this->input->cookie('language'):"english"; ?>
                                              <select name="language" class="form-control" onchange="changeLanguage(this.value)">
                                                <option value="indonesia" <?=$value=="indonesia"?"SELECTED":""?>>BAHASA INDONESIA</option>
                                                <option value="english" <?=$value=="english"?"SELECTED":""?>>ENGLISH</option>
                                                <option value="french" <?=$value=="french"?"SELECTED":""?>>FRENCH</option>
                                              </select>
                                            </label>
                                        </div>
                                        <script type="text/javascript">
                                              function changeLanguage(val)

                                              {

                                                 $.ajax({

                                                   type: 'get',

                                                   url: '<?=base_url("Preferences/setLanguage/'+val+'")?>',

                                                   data: {

                                                     get_option:val

                                                   },

                                                   success: function (response) {

                                                      document.location.reload(true)

                                                   }

                                                 });

                                              }
                                        </script>
                                        <div class="select-custom">
                                            <label>
                                            <?php $value = $this->input->cookie('regional')!=null?$this->input->cookie('regional'):"US"; ?>
                                                <select name="regional" class="form-control" onchange="changeRegional(this.value)">
                                                    <option value="AT" <?=$value=='AT'?"SELECTED":""?>>Austria</option>
                                                    <option value="BE" <?=$value=='BE'?"SELECTED":""?>>Belgium(FR)</option>
                                                    <option value="NL_BE" <?=$value=='NL_BE'?"SELECTED":""?>>Belgium(NL)</option>
                                                    <option value="BG" <?=$value=='BG'?"SELECTED":""?>>Bulgaria</option>
                                                    <option value="FI" <?=$value=='FI'?"SELECTED":""?>>Finland</option>
                                                    <option value="FR" <?=$value=='FR'?"SELECTED":""?>>France</option>
                                                    <option value="DE" <?=$value=='DE'?"SELECTED":""?>>Germany</option>
                                                    <option value="GB" <?=$value=='GB'?"SELECTED":""?>>Great Britain</option>
                                                    <option value="GR" <?=$value=='GR'?"SELECTED":""?>>Greece</option>
                                                    <option value="IT" <?=$value=='IT'?"SELECTED":""?>>Italia</option>
                                                    <option value="NL" <?=$value=='NL'?"SELECTED":""?>>Netherlands</option>
                                                    <option value="PL" <?=$value=='PL'?"SELECTED":""?>>Poland</option>
                                                    <option value="PT" <?=$value=='PT'?"SELECTED":""?>>Portugal</option>
                                                    <option value="RU" <?=$value=='RU'?"SELECTED":""?>>Russia</option>
                                                    <option value="ES" <?=$value=='ES'?"SELECTED":""?>>Spain</option>
                                                    <option value="CA_ES" <?=$value=='CA_ES'?"SELECTED":""?>>Spain(CA)</option>
                                                    <option value="DE_CH" <?=$value=='DE_CH'?"SELECTED":""?>>Switzerland(DE)</option>
                                                    <option value="FR_CH" <?=$value=='FR_CH'?"SELECTED":""?>>Switzerland(FR)</option>
                                                    <option value="IT_CH" <?=$value=='IT_CH'?"SELECTED":""?>>Switzerland(IT)</option>
                                                    <option value="AR" <?=$value=='AR'?"SELECTED":""?>>Argentina</option>
                                                    <option value="BR" <?=$value=='BR'?"SELECTED":""?>>Brasil</option>
                                                    <option value="CA" <?=$value=='CA'?"SELECTED":""?>>Canada(EN)</option>
                                                    <option value="CA_FR" <?=$value=='CA_FR'?"SELECTED":""?>>Canada(FR)</option>
                                                    <option value="CL" <?=$value=='CL'?"SELECTED":""?>>Chile</option>
                                                    <option value="US" <?=$value=='US'?"SELECTED":""?>>United States</option>
                                                    <option value="CN" <?=$value=='CN'?"SELECTED":""?>>China</option>
                                                    <option value="JP" <?=$value=='JP'?"SELECTED":""?>>Japan</option>
                                                    <option value="EN_IN" <?=$value=='EN_IN'?"SELECTED":""?>>India</option>
                                                    <option value="EN_MY" <?=$value=='EN_MY'?"SELECTED":""?>>Malaysia(EN)</option>
                                                    <option value="MS_MY" <?=$value=='MS_MY'?"SELECTED":""?>>Malaysia(MS)</option>
                                                    <option value="RU" <?=$value=='RU'?"SELECTED":""?>>Rusia</option>
                                                    <option value="SG" <?=$value=='SG'?"SELECTED":""?>>Singapore</option>
                                                    <option value="IL" <?=$value=='IL'?"SELECTED":""?>>Israel</option>
                                                    <option value="SA" <?=$value=='SA'?"SELECTED":""?>>Saudi Arabia</option>
                                                    <option value="TR" <?=$value=='TR'?"SELECTED":""?>>Turkey</option>
                                                    <option value="AU" <?=$value=='AU'?"SELECTED":""?>>Australia</option>
                                                </select>
                                            </label>
                                        </div>
                                        <script type="text/javascript">
                                              function changeRegional(val)

                                              {

                                                 $.ajax({

                                                   type: 'get',

                                                   url: '<?=base_url("Preferences/setRegional/'+val+'")?>',

                                                   data: {

                                                     get_option:val

                                                   },

                                                   success: function (response) {

                                                      document.location.reload(true)

                                                   }

                                                 });

                                              }
                                        </script>
                                    <?php
                                }else if($this->input->cookie('homepagetabs') == 3){
                                }else{
                                    ?>
                                        <button type="button" class="btn btn-primary btn-lg"><span class="icon-<?=strtolower($browser['alias'])?> icon-white"></span> &nbsp;<?=lang('add_to');?><?=$browser['name']?></button> &nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-border btn-lg"><?=lang('set_as_homepage');?></button>
                                    <?php
                                }
                            }else{
                                    ?>
                                        <button type="button" class="btn btn-primary btn-lg"><span class="icon-<?=strtolower($browser['alias'])?> icon-white"></span> &nbsp;<?=lang('add_to');?><?=$browser['name']?></button> &nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-border btn-lg"><?=lang('set_as_homepage');?></button>
                                    <?php
                            }
                        ?>
                    </div>

                </form>

            </div>

        </div>

    </div>

