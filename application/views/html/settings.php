        <div class="container-fluid">
            <div class="content-wrap">
                <h2 class="title">Settings</h2>
                <div class="clearfix">
                    <div id="nav-side" class="sidebar">
                        <ul class="nav" data-spy="affix" data-offset-top="170" data-offset-bottom="40">
                            <li class="active"><a href="#search">Search</a></li>
                            <li><a href="#themes">Themes</a></li>
                            <li><a href="#language">Language</a></li>
                            <li><a href="#region">Region</a></li>
                        </ul>
                    </div>
                    <div class="content">
                      <form method="post" action="<?=base_url('Cassow/setCookiePref')?>">
                        <div id="search" class="box">
                            <h3>SEARCH</h3>
                            <h4>PAGE APPEARANCE</h4>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td>Font</td>
                                        <td>
                                            <div class="select-custom">
                                                <label>
                                                    <select class="form-control">
                                                        <option value="">Proxima Nova</option>
                                                        <option value="">Open Sans</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Font Size</td>
                                        <td>
                                            <div class="select-custom">
                                                <label>
                                                    <select class="form-control">
                                                        <option value="">Normal</option>
                                                        <option value="">Large</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Search Box Width</td>
                                        <td>
                                            <div class="select-custom">
                                                <label>
                                                    <select class="form-control">
                                                        <option value="">Wide</option>
                                                        <option value="">Narrow</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Center Alignment</td>
                                        <td>
                                            <div class="btn-group radio-btn" data-toggle="buttons">
                                              <label class="btn btn-md active">
                                                <input name="options" id="option1" autocomplete="off" checked="" type="radio"> On
                                              </label>
                                              <label class="btn btn-md">
                                                <input name="options" id="option2" autocomplete="off" type="radio"> Off
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Background Color</td>
                                        <td>
                                            <div class="input-color">
                                                <div style="width:96px;padding:1px 0;" class="evo-cp-wrap"><input id="color-background" class="form-control input-md colorPicker evo-cp0" value="#ffffff" name="backgroundcolor" type="text"><div class="evo-pointer evo-colorind-ff" style="background-color:#ffffff"></div></div>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Homepage Tabs</td>
                                        <td>
                                            <div class="select-custom">
                                                <label>
                                                    <select class="form-control">
                                                        <option value="">Add to Browser</option>
                                                        <option value="">Add to Browser</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </td>
                                   </tr>
                               </tbody> 
                            </table>
                            <h4>HEADER APPEARANCE</h4>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td>Header Behavior</td>
                                        <td>
                                            <div class="select-custom">
                                                <label>
                                                    <select class="form-control">
                                                        <option value="">Fixed</option>
                                                        <option value="">Static</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Header Color</td>
                                        <td>
                                            <div class="input-color">
                                                <div style="width:96px;padding:1px 0;" class="evo-cp-wrap"><input id="color-header" class="form-control input-md colorPicker evo-cp1" value="#ffffff" name="headercolor" type="text"><div class="evo-pointer evo-colorind-ff" style="background-color:#ffffff"></div></div>
                                            </div>
                                        </td>
                                   </tr>
                               </tbody> 
                            </table>
                            <h4>RESULTS APPEARANCE</h4>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td>Result Title Color</td>
                                        <td>
                                            <div class="input-color">
                                                <div style="width:96px;padding:1px 0;" class="evo-cp-wrap"><input id="color-result" class="form-control input-md colorPicker evo-cp2" value="#ffffff" name="resulttitlecolor" type="text"><div class="evo-pointer evo-colorind-ff" style="background-color:#ffffff"></div></div>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Result Visited Title Color</td>
                                        <td>
                                            <div class="input-color">
                                                <div style="width:96px;padding:1px 0;" class="evo-cp-wrap"><input id="color-visited" class="form-control input-md colorPicker evo-cp3" value="#ffffff" name="resultvisitedtitlecolor" type="text"><div class="evo-pointer evo-colorind-ff" style="background-color:#ffffff"></div></div>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Result Title Underline</td>
                                        <td>
                                            <div class="btn-group radio-btn" data-toggle="buttons">
                                              <label class="btn btn-md active">
                                                <input name="options" id="option1" autocomplete="off" checked="" type="radio"> On
                                              </label>
                                              <label class="btn btn-md">
                                                <input name="options" id="option2" autocomplete="off" type="radio"> Off
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Result Description Color</td>
                                        <td>
                                            <div class="input-color">
                                                <div style="width:96px;padding:1px 0;" class="evo-cp-wrap"><input id="color-description" class="form-control input-md colorPicker evo-cp4" value="#ffffff" name="resultdescriptioncolor" type="text"><div class="evo-pointer evo-colorind-ff" style="background-color:#ffffff"></div></div>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Result Full URLs</td>
                                        <td>
                                            <div class="btn-group radio-btn" data-toggle="buttons">
                                              <label class="btn btn-md active">
                                                <input name="options" id="option1" autocomplete="off" checked="" type="radio"> On
                                              </label>
                                              <label class="btn btn-md">
                                                <input name="options" id="option2" autocomplete="off" type="radio"> Off
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Result URLs above snippet</td>
                                        <td>
                                            <div class="btn-group radio-btn" data-toggle="buttons">
                                              <label class="btn btn-md active">
                                                <input name="options" id="option1" autocomplete="off" checked="" type="radio"> On
                                              </label>
                                              <label class="btn btn-md">
                                                <input name="options" id="option2" autocomplete="off" type="radio"> Off
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                               </tbody> 
                            </table>
                            <div>
                                <input type="submit" class="btn btn-default btn-md" value="Save & Exit">
                                <a href="#" class="btn btn-default btn-md">Reset to Default</a>
                            </div>
                          </form>
                        </div>
                        <div id="themes" class="box">
                          <form method="post" action="<?=base_url('Cassow/setCustomTheme')?>">
                            <h3>THEMES</h3>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td>Select Themes</td>
                                        <td>
                                            <div class="select-custom">
                                              <label>
                                                <select name="selectthemes" class="form-control">
                                                  <option value="1">BLUE</option>
                                                  <option value="2">DARK</option>
                                                </select>
                                              </label>
                                            </div>
                                        </td>
                                   </tr>
                                </tbody>
                            </table>
                            <div>
                                <input type="submit" class="btn btn-default btn-md" value="Save & Exit">
                                <a href="#" class="btn btn-default btn-md">Reset to Default</a>
                            </div>
                          </form>
                        </div>
                        <div id="language" class="box">
                          <form method="post" action="<?=base_url('Cassow/setLanguage')?>">
                            <h3>LANGUAGE</h3>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td>Display Language</td>
                                        <td>
                                            <div class="select-custom">
                                                <label>
                                                  <select name="displaylanguage" class="form-control">
                                                    <option value="ina">BAHASA INDONESIA</option>
                                                    <option value="en">ENGLISH</option>
                                                    <option value="fr">FRENCH</option>
                                                  </select>
                                                </label>
                                            </div>
                                        </td>
                                   </tr>
                                </tbody>
                            </table>
                        <div>
                            <input type="submit" class="btn btn-default btn-md" value="Save & Exit">
                            <a href="#" class="btn btn-default btn-md">Reset to Default</a>
                        </div>
                        </form>
                        </div>
                        <div id="region" class="box">
                          <form method="post" action="<?=base_url('Cassow/setRegion')?>">
                            <h3>REGION</h3>
                            <table class="table table-settings">
                               <tbody>
                                   <tr>
                                        <td>Select Region</td>
                                        <td>
                                            <div class="select-custom">
                                                <label>
                                                  <select name="selectregion" class="form-control">
                                                    <option value="id">INDONESIA</option>
                                                    <option value="en">ENGLISH</option>
                                                    <option value="fr_FR">FRENCH</option>
                                                  </select>
                                                </label>
                                            </div>
                                        </td>
                                   </tr>
                                </tbody>
                            </table>
                            <div>
                                <input type="submit" class="btn btn-default btn-md" value="Save & Exit">
                                <a href="#" class="btn btn-default btn-md">Reset to Default</a>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>