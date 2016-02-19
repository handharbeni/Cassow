        <div class="container-fluid">
            <div class="content-wrap">
                <h2 class="title"><?=lang("Settings");?></h2>

                <div class="clearfix">
                    <div id="nav-side" class="sidebar">
                        <ul class="nav" data-spy="affix" data-offset-top="170" data-offset-bottom="40">
                            <li class="active"><a href="#search"><?=lang("search");?></a></li>
                            <li><a href="#themes"><?=lang("Themes");?></a></li>
                            <li><a href="#language"><?=lang("Language");?></a></li>
                            <li><a href="#region"><?=lang("Region");?></a></li>
                        </ul>
                    </div>
                    <div class="content">
                      <form method="post" id="formSetting" action="#">
                        <div id="search" class="box">
                            <h3><?=lang("search");?></h3>
                            <h4><?=lang("Page_Appereance");?></h4>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td><?=lang("suggest");?></td>
                                        <td>
                                            <?php
                                              if($this->input->cookie('suggest') != null){
                                                $value = $this->input->cookie('suggest');
                                              }else{
                                                $value = 0;
                                              }
                                            ?>
                                            <div class="btn-group radio-btn" data-toggle="buttons">
                                              <label class="btn btn-md <?=$value==1?"active":""?>" onclick="chekcedRadio(suggest1)">
                                                <input type="radio" name="suggest" id="suggest1" <?=$value==1?"checked='checked'":""?> autocomplete="off" value="1"> On
                                              </label>
                                              <label class="btn btn-md <?=$value==0?"active":""?>" onclick="chekcedRadio(suggest2)">
                                                <input type="radio" name="suggest" id="suggest2" <?=$value==0?"checked='checked'":""?> autocomplete="off" value="0"> Off
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Font");?></td>
                                        <td>
                                            <div class="select-custom">
                                                <?php 
                                                  $font = $this->input->cookie('font');
                                                ?>
                                                <label>
                                                  <select name="font" class="form-control font">
                                                    <option value="proxima_regular" <?=$font=='proxima_regular'?'selected':''?>>Proxima Regular</option>
                                                    <option value="proxima_italic" <?=$font=='proxima_italic'?'selected':''?>>Proxima Italic</option>
                                                    <option value="proxima_bold" <?=$font=='proxima_bold'?'selected':''?>>Proxima Bold</option>
                                                    <option value="century_gothic" <?=$font=='century_gothic'?'selected':''?>>Century Gothic</option>
                                                    <option value="georgia" <?=$font=='georgia'?'selected':''?>>Georgia</option>
                                                    <option value="segoe_ui" <?=$font=='segoe_ui'?'selected':''?>>Segoe UI</option>
                                                    <option value="sans_Serif" <?=$font=='sans_Serif'?'selected':''?>>Sans Serif</option>
                                                    <option value="times" <?=$font=='times'?'selected':''?>>Times New Roman</option>
                                                    <option value="tahoma" <?=$font=='tahoma'?'selected':''?>>Tahoma</option>
                                                    <option value="trebuchet_ms" <?=$font=='trebuchet_ms'?'selected':''?>>Trebuchet MS</option>
                                                    <option value="verdana" <?=$font=='verdana'?'selected':''?>>Verdana</option>
                                                    <option value="helvetica" <?=$font=='helvetica'?'selected':''?>>Helvetica</option>
                                                    <option value="helvetica_neue" <?=$font=='helvetica_neue'?'selected':''?>>Helvetica Neue</option>
                                                    <option value="serif" <?=$font=='serif'?'selected':''?>>Serif</option>
                                                  </select>
                                                </label>
                                              </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Font_Size");?></td>
                                        <td>
                                            <div class="select-custom">
                                                <?php 
                                                  $fontsize = $this->input->cookie('fontsize');
                                                  $fontsize = $fontsize!=null?$fontsize:20;
                                                ?>
                                                <label>
                                                  <select name="fontsize" class="form-control fontsize">
                                                    <option value="24" <?=$fontsize==35?'selected':''?>>Largest</option>
                                                    <option value="21" <?=$fontsize==30?'selected':''?>>Larger</option>
                                                    <option value="18" <?=$fontsize==25?'selected':''?>>Large</option>
                                                    <option value="15" <?=$fontsize==20?'selected':''?>>Medium</option>
                                                    <option value="12" <?=$fontsize==15?'selected':''?>>Small</option>
                                                  </select>
                                                </label>
                                              </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Search_Box_Width");?></td>
                                        <td>
                                            <div class="select-custom">
                                                <?php 
                                                  $searchboxwidth = $this->input->cookie('searchboxwidth');
                                                ?>
                                                <label>
                                                  <select name="searchboxwidth" class="form-control searchboxwidth">
                                                    <option value="70" <?=$searchboxwidth=="70"?"SELECTED":""?>>Wide</option>
                                                    <option value="40" <?=$searchboxwidth=="40"?"SELECTED":""?>>Narrow</option>
                                                  </select>
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Center_Alignment");?></td>
                                        <td>
                                            <div class="btn-group radio-btn" data-toggle="buttons">
                                            <?php
                                              if($this->input->cookie('centeralignment') != null){
                                                $value = $this->input->cookie('centeralignment');
                                              }else{
                                                $value = 0;
                                              }
                                            ?>
                                              <label class="btn btn-md <?=$value==1?"active":""?>" onclick="chekcedRadio(alignment1)">
                                                <input type="radio" name="centeralignment" id="alignment1" <?=$value==1?"checked='checked'":""?> autocomplete="off" value="1"> On
                                              </label>
                                              <label class="btn btn-md <?=$value==0?"active":""?>" onclick="chekcedRadio(alignment2)">
                                                <input type="radio" name="centeralignment" id="alignment2" <?=$value==0?"checked='checked'":""?> autocomplete="off" value="0"> Off
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Background_Color");?></td>
                                        <td>
                                            <div class="input-color">
                                            <!-- header blue #F1F1F1 -->
                                            <!-- header dark #434343 -->
                                                <?php
                                                  $value = "";
                                                  if($this->input->cookie('backgroundcolor') != null){
                                                    $value .= $this->input->cookie('backgroundcolor');
                                                  }else{
                                                    $classPreferences = $preferences;
                                                    $currentTheme = $classPreferences->currentTheme();
                                                    if($currentTheme['customTheme'] == 0){
                                                      if($currentTheme['baseTheme'] == 2){
                                                        $value = "#333";
                                                      }else{
                                                        $value = "#FFF";
                                                      }
                                                    }else{
                                                      if($currentTheme['baseTheme'] == 2){
                                                        $value = "#333";
                                                      }else{
                                                        $value = "#FFF";
                                                      }
                                                    }
                                                  }
                                                ?>
                                                <input type="text" id="color-background" class="form-control input-md" value="<?=$value?>" name="backgroundcolor">
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Homepage_Tabs");?></td>
                                        <td>
                                            <div class="select-custom">
                                              <label>
                                              <?php $value = $this->input->cookie('homepagetabs')!=null?$this->input->cookie('homepagetabs'):""; ?>
                                                <select name="homepagetabs" class="form-control">
                                                  <option value="1" <?=$value=="1"?"SELECTED":""?>>Add To Browser & Set As Homepage</option>
                                                  <option value="2" <?=$value=="2"?"SELECTED":""?>>Language & Regional</option>
                                                  <option value="3" <?=$value=="3"?"SELECTED":""?>>None</option>
                                                </select>
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                               </tbody> 
                            </table>
                            <h4><?=lang("Blog");?></h4>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td><?=lang("Header_Behavior");?></td>
                                        <td>
                                            <div class="select-custom">
                                            <?php
                                              $headerbehavior = $this->input->cookie('headerbehavior');
                                            ?>
                                              <label>
                                                <select name="headerbehavior" class="form-control headerbehavior">
                                                  <option value="non" <?=$headerbehavior=='nonfixed'?'selected':''?>>Absolute</option>
                                                  <option value="fixed" <?=$headerbehavior=='fixed'?'selected':''?>>Fixed</option>
                                                </select>
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Header_Color");?></td>
                                        <td>
                                            <div class="input-color">
                                                <?php
                                                  $value = "";
                                                  if($this->input->cookie('headercolor') != null){
                                                    $value .= $this->input->cookie('headercolor');
                                                  }else{
                                                    $classPreferences = $preferences;
                                                    $currentTheme = $classPreferences->currentTheme();
                                                    if($currentTheme['customTheme'] == 0){
                                                      if($currentTheme['baseTheme'] == 2){
                                                        $value = "#434343";
                                                      }else{
                                                        $value = "#F1F1F1";
                                                      }
                                                    }else{
                                                      if($currentTheme['baseTheme'] == 2){
                                                        $value = "#434343";
                                                      }else{
                                                        $value = "#F1F1F1";
                                                      }
                                                    }
                                                  }
                                                ?>
                                                <input type="text" id="color-header" class="form-control input-md" value="<?=$value?>" name="headercolor">
                                            </div>
                                        </td>
                                   </tr>
                               </tbody> 
                            </table>
                            <h4><?=lang("Result_Appearance");?></h4>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td><?=lang("Result_Title_Color");?></td>
                                        <td>
                                            <div class="input-color">
                                                <?php
                                                  $value = "";
                                                  if($this->input->cookie('resulttitlecolor') != null){
                                                    $value .= $this->input->cookie('resulttitlecolor');
                                                  }else{
                                                    $classPreferences = $preferences;
                                                    $currentTheme = $classPreferences->currentTheme();
                                                    if($currentTheme['customTheme'] == 0){
                                                      if($currentTheme['baseTheme'] == 2){
                                                        $value = "#DBDBDB";
                                                      }else{
                                                        $value = "#2D88D3";
                                                      }
                                                    }else{
                                                      if($currentTheme['baseTheme'] == 2){
                                                        $value = "#DBDBDB";
                                                      }else{
                                                        $value = "#2D88D3";
                                                      }
                                                    }
                                                  }
                                                ?>
                                                <input type="text" id="color-header" class="form-control input-md" value="<?=$value?>" name="resulttitlecolor">
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Result_Visited_Title_Color");?></td>
                                        <td>
                                            <div class="input-color">
                                                <?php
                                                  $value = "";
                                                  if($this->input->cookie('resultvisitedtitlecolor') != null){
                                                    $value .= $this->input->cookie('resultvisitedtitlecolor');
                                                  }else{
                                                    $classPreferences = $preferences;
                                                    $currentTheme = $classPreferences->currentTheme();
                                                    if($currentTheme['customTheme'] == 0){
                                                      if($currentTheme['baseTheme'] == 2){
                                                        $value = "#DBDBDB";
                                                      }else{
                                                        $value = "#2D88D3";
                                                      }
                                                    }else{
                                                      if($currentTheme['baseTheme'] == 2){
                                                        $value = "#DBDBDB";
                                                      }else{
                                                        $value = "#2D88D3";
                                                      }
                                                    }
                                                  }
                                                ?>
                                                <input type="text" id="color-header" class="form-control input-md" value="<?=$value?>" name="resultvisitedtitlecolor">
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Result_Title_Underline");?></td>
                                        <td>
                                            <div class="btn-group radio-btn" data-toggle="buttons">
                                            <?php
                                              if($this->input->cookie('resulttitleunderline') != null){
                                                $value = $this->input->cookie('resulttitleunderline');
                                              }else{
                                                $value = 0;
                                              }
                                            ?>
                                              <label class="btn btn-md <?=$value==1?"active":""?>" onclick="chekcedRadio(under1)">
                                                <input type="radio" name="resulttitleunderline" id="under1" <?=$value==1?"checked='checked'":""?> autocomplete="off" value="1"> On
                                              </label>
                                              <label class="btn btn-md <?=$value==0?"active":""?>" onclick="chekcedRadio(under2)">
                                                <input type="radio" name="resulttitleunderline" id="under2" <?=$value==0?"checked='checked'":""?> autocomplete="off" value="0"> Off
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Result_Description_Color");?></td>
                                        <td>
                                            <div class="input-color">
                                                <?php
                                                  $value = "";
                                                  if($this->input->cookie('resultdescriptioncolor') != null){
                                                    $value .= $this->input->cookie('resultdescriptioncolor');
                                                  }else{
                                                    $classPreferences = $preferences;
                                                    $currentTheme = $classPreferences->currentTheme();
                                                    if($currentTheme['customTheme'] == 0){
                                                      if($currentTheme['baseTheme'] == 2){
                                                        $value = "#939393";
                                                      }else{
                                                        $value = "#5C5D5D";
                                                      }
                                                    }else{
                                                      if($currentTheme['baseTheme'] == 2){
                                                        $value = "#939393";
                                                      }else{
                                                        $value = "#5C5D5D";
                                                      }
                                                    }
                                                  }
                                                ?>
                                                <input type="text" id="color-header" class="form-control input-md" value="<?=$value?>" name="resultdescriptioncolor">
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Result_Full_URLs");?></td>
                                        <td>
                                            <?php
                                              if($this->input->cookie('resultfullurls') != null){
                                                $value = $this->input->cookie('resultfullurls');
                                              }else{
                                                $value = 0;
                                              }
                                            ?>
                                            <div class="btn-group radio-btn" data-toggle="buttons">
                                              <label class="btn btn-md <?=$value==1?"active":""?>" onclick="chekcedRadio(full1)">
                                                <input type="radio" name="resultfullurls" id="full1" <?=$value==1?"checked='checked'":""?> autocomplete="off" value="1"> On
                                              </label>
                                              <label class="btn btn-md <?=$value==0?"active":""?>" onclick="chekcedRadio(full2)">
                                                <input type="radio" name="resultfullurls" id="full2" <?=$value==0?"checked='checked'":""?> autocomplete="off" value="0"> Off
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td><?=lang("Result_URLs_Above_Snippet");?></td>
                                        <td>
                                            <?php
                                              if($this->input->cookie('resultabovesnippet') != null){
                                                $value = $this->input->cookie('resultabovesnippet');
                                              }else{
                                                $value = 0;
                                              }
                                            ?>
                                            <div class="btn-group radio-btn" data-toggle="buttons">
                                              <label class="btn btn-md <?=$value==1?"active":""?>" onclick="chekcedRadio(above1)">
                                                <input type="radio" name="resultabovesnippet" id="above1" <?=$value==1?"checked='checked'":""?> autocomplete="off" value="1"> On
                                              </label>
                                              <label class="btn btn-md <?=$value==0?"active":""?>" onclick="chekcedRadio(above1)">
                                                <input type="radio" name="resultabovesnippet" id="above2" <?=$value==0?"checked='checked'":""?> autocomplete="off" value="0"> Off
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                               </tbody> 
                            </table>
                            <div>
                                <input type="submit" class="btn btn-default btn-md" value="Save & Exit">
                                <a href="#" onclick="changeTheme(1)" class="btn btn-default btn-md">Reset to Default</a>
                            </div>
                          </form>
                        </div>
                        <div id="themes" class="box">
                          <form method="post" id="formTheme">
                            <h3><?=lang("Themes");?></h3>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td><?=lang("Select_Theme");?></td>
                                        <td>
                                            <div class="select-custom">
                                              <label>
                                                <?php $value = $this->input->cookie('selectthemes')!=null?$this->input->cookie('selectthemes'):"1"; ?>
                                                <select name="theme" class="form-control">
                                                  <option value="1" <?=$value=="1"?"SELECTED":""?>>Light</option>
                                                  <option value="2" <?=$value=="2"?"SELECTED":""?>>Dark</option>
                                                </select>
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                                </tbody>
                            </table>
                            <div>
                                <input type="submit" class="btn btn-default btn-md" value="Save & Exit">
                                <a href="#" onclick="changeTheme(1)" class="btn btn-default btn-md">Reset to Default</a>
                            </div>
                          </form>
                        </div>
                        <div id="language" class="box">
                          <form method="post" id="formLanguage">
                            <h3><?=lang("Language");?></h3>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td><?=lang("Display_Language");?></td>
                                        <td>
                                            <div class="select-custom">
                                                <label>
                                                <?php $value = $this->input->cookie('language')!=null?$this->input->cookie('language'):"english"; ?>
                                                  <select name="language" class="form-control">
                                                    <option value="indonesia" <?=$value=="indonesia"?"SELECTED":""?>>Bahasa Indonesia</option>
                                                    <option value="english" <?=$value=="english"?"SELECTED":""?>>English</option>
                                                    <option value="french" <?=$value=="french"?"SELECTED":""?>>French</option>
                                                  </select>
                                                </label>
                                            </div>
                                        </td>
                                   </tr>
                                </tbody>
                            </table>
                        <div>
                            <input type="submit" class="btn btn-default btn-md" value="Save & Exit">
                            <a href="#" onclick="changeTheme(1)" class="btn btn-default btn-md">Reset to Default</a>
                        </div>
                        </form>
                        </div>
                        <div id="region" class="box">
                          <form method="post" id="formRegional">
                            <h3><?=lang("Region");?></h3>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td><?=lang("Select_Region");?></td>
                                        <td>
                                            <div class="select-custom">
                                                <label>
                                                  <?php
                                                    $value = "US";
                                                    if($this->input->cookie('regional')!=null){
                                                      $value = $this->input->cookie('regional');
                                                    }
                                                  ?>
                                                  <select name="regional" class="form-control">
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
                                                    <option value="RU" <?=$value=='RU'?"SELECTED":""?>>Rusia</option>
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
                                        </td>
                                   </tr>
                                </tbody>
                            </table>
                            <div>
                                <input type="submit" class="btn btn-default btn-md" value="Save & Exit">
                                <a href="#" onclick="changeTheme(1)" class="btn btn-default btn-md">Reset to Default</a>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>