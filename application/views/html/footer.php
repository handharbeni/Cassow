        <script src="<?=base_url('assets/style/js/jquery-1.11.0.min.js')?>"></script>
        <script src="<?=base_url('assets/style/js/bootstrap.min.js')?>"></script> 
        <script src="<?=base_url('assets/style/colorpicker/js/bootstrap-colorpicker.js')?>"></script>
        <script src="<?=base_url('assets/style/colorpicker/js/bootstrap-colorpicker.min.js')?>"></script>
        <script src="<?=base_url('assets/style/js/jquery.collagePlus.min.js')?>"></script>
        <script src="<?=base_url('assets/style/js/jquery.removeWhitespace.min.js')?>"></script>
        <script src="<?=base_url('assets/style/js/evol.colorpicker.min.js')?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?=base_url('assets/style/js/jquery-ui.min.js')?>" type="text/javascript" charset="utf-8"></script>
        <script>
              function showImage(image, Url, Title) {
                document.getElementById('currentImage').src = image;
                document.getElementById('currentUrl').setAttribute('href', Url);
                document.getElementById('currentUrl').innerHTML = Url;
                document.getElementById('currentTitle').innerHTML = Title;
                document.getElementById('currentImgBtn').setAttribute('href', image);
                document.getElementById('currentUrlBtn').setAttribute('href', Url);
              }
             $(document).ready(function(){
              <?php if(($action != "Google") || ($action != "Maps")){ ?>
                  flag = true;
                  $(window).scroll(function() {
                    if($(window).scrollTop() + $(window).height() == $(document).height()){
                      first = $('#first').val();
                      limit = $('#limit').val();
                      no_data = true;
                      if(flag && no_data){
                        flag = false;
                        $('#loader').show();
                        $.ajax({
                          url : "<?php echo base_url().'Api/'.$source.'/'.$action.'/'.$q.'/"+limit+"'; ?>",
                          method: 'get',
                          data: {
                             start : first,
                             limit : limit
                          },
                          success: function( data ) {
                            flag = true;
                            limit = parseInt(limit)+51;
                            $('#limit').val( limit );
                            $('#loader').hide();
                            loadElement(data);
                          },
                          error: function( data ){
                            flag = true;
                            $('#loader').hide();
                            no_data = false;
                          }
                        });
                      }
                    }
                  }); 
              <?php } ?>
              function loadResult(dataResult){
                    var data = eval(dataResult);
                    console.log(data);
                    var i=0;
                    var Str = '';
                    for(i=0;i<data.length;i++){
                      <?php if($action == "Web"){ ?>
                        Str += "<div class='result'>";
                          Str += "<h3 class='result-title'>";
                            Str += "<a href='"+data[i].Url+"'>"+data[i].Title+"</a>";
                          Str += "</h3>";
                          Str += "<div class='result-desc'>"+data[i].Description+"</div>";
                          Str += "<div class='result-url'><a href='"+data[i].Url+"'>"+data[i].Url+"</a></div>";
                        Str += "</div>"
                      <?php }else if($action == 'Image'){ ?>
                        Str += "<div class='Image_Wrapper'>";
                          Str += "<a href='"+data[i].Url+"' onClick='showImage('"+data[i].Thumbnail+"', '"+data[i].Url+"', '"+data[i].Title+"')';>";
                            Str += "<img src='"+data[i].Thumbnail+"'>";
                            Str += "<div class='result-caption'>"+data[i].Title+"</div>";
                          Str += "</a>";
                        Str += "</div>";
                      <?php }else if($action == 'Video'){ ?>
                        Str+="<div class='result-img' width='334px' height='279px'>";
                          Str+="<a href='"+data[i].MediaUrl+"'><img src="+data[i].Thumbnail+" width='314px' height='204px'></a>";
                            Str+="<div class='result-video-caption'>";
                              Str+="<h3><a href='"+data[i].MediaUrl+"'>"+data[i].Title+"</a></h3>";
                              Str+="<div class='video-caption-attr row'>";
                                Str+="<div class='col-xs-6'><span><i class='icon-view-sm-grey'></i> 1400 views</span></div>";
                                Str+="<div class='col-xs-6 text-right'><span><i class='icon-time-grey'></i> 08.45</span></div>";
                              Str+="</div>";
                          Str+="</div>";
                        Str+="</div>";
                      <?php }else if($action == 'News'){ ?>
                        Str += "<div class='result'>";
                          Str += "<div class='media'>";
                              Str += "<div class='media-body'>";
                                Str += "<h3 class='result-title'>";
                                Str += "<a href='"+data[i].Url+"'>"+data[i].Title+"</a>";
                                Str += "</h3>";
                              Str += "<div class='result-desc'>"+data[i].Description+"</div>";
                              Str += "<div class='result-url'><a href='"+data[i].Url+"'>"+data[i].Url+"</a></div>";
                            Str += "</div>";
                            Str += "</div>";
                        Str += "</div>";
                      <?php } ?>
                    };
                    <?php if($action == "Image"){ ?>
                      $('section#timeline-container').append(Str);
                    <?php }else{ ?>
                      $('div#timeline-container').append(Str);
                    <?php } ?>
                  }
                $('.color-background').colorpicker().on('changeColor.colorpicker', function(event){
                  $('body').attr('style','background-color:'+event.color.toHex()+';');
                });
                $('.color-header').colorpicker().on('changeColor.colorpicker', function(event){
                  $('.searchbar').attr('style','background-color:'+event.color.toHex());
                });
                $('.color-result').colorpicker().on('changeColor.colorpicker', function(event){
                  //$('body').attr('style','background-color:'+event.color.toHex());
                });
                $('.color-visited').colorpicker().on('changeColor.colorpicker', function(event){
                  //$('body').attr('style','background-color:'+event.color.toHex());
                });
                $('.color-description').colorpicker().on('changeColor.colorpicker', function(event){
                  //$('body').attr('style','background-color:'+event.color.toHex());
                });

                $('#nav-side .nav > li > a').click(function(e){
                    var anchor = $(this).attr('href');
                    $('body,html').animate({ scrollTop:$(anchor).offset().top },500);
                    e.preventDefault();
                })
                $('.input-search').focus(function(){
                            $(this).parents('.form-group').addClass('focus')
                        })
                        $('.input-search').blur(function(){
                            $(this).parents('.form-group').removeClass('focus')
                        })
                        $('.input-search').keyup(function(){
                            checkLength()
                        })
                        $('.btn-remove').click(function(){
                            $('.input-search').val('').focus()
                            $(this).fadeOut();
                        })
                        checkLength();

                         /*-- 3-4 Dec --*/
                function collage() {
                    $('.Collage').removeWhitespace().collagePlus(
                        {
                            'fadeSpeed'     : 2000,
                            'targetHeight'  : 200,
                            'allowPartialLastRow' : true
                        }
                    );
                };
                //collage();
                function bindImage(){
                  var resizeTimer = null;
                  $(window).bind('resize', function() {
                      // hide all the images until we resize them
                      $('.Collage .Image_Wrapper').css("opacity", 0);
                      // set a timer to re-apply the plugin
                      if (resizeTimer) clearTimeout(resizeTimer);
                      resizeTimer = setTimeout(collage, 200);
                  });
                }
                function loadElement(data){
                  loadResult(data);
                  <?php if($action == "Image"){ ?>
                    collage();
                    bindImage();
                  <?php } ?>
                }
                loadElement(<?=$hasilSearch?>);
                /* Expand image */
                $(document).delegate('.Image_Wrapper > a','click',function(e){
                    if($(this).parents('.Image_Wrapper').hasClass('active')) {
                        $('.result-expand, .result-space').slideUp(function(){
                            $('.Image_Wrapper').removeClass('active');
                            $('.result-space').remove();
                        })
                    } else {
                        if(('.result-img.active').length>0){
                            $('.Image_Wrapper').removeClass('active');
                            $('.result-space').remove();
                        }
                        var h = $(this).parents('.Image_Wrapper').outerHeight(true);
                        var w = $(this).parents('.Image_Wrapper').outerWidth(true);

                        var indexImg = $(this).parents('.Image_Wrapper').index() + 1;
                        
                        var posLeft = $(this).position().left-20;

                        var currentOffset = $(this).offset().top;
                        var numberOfImg = $('.Image_Wrapper').size();

                        var eq = numberOfImg-1;
                        if(indexImg!=(numberOfImg-1)){
                            for(i=indexImg;i<numberOfImg;i++){
                                if(currentOffset!=$('.Image_Wrapper').eq(i).offset().top){
                                    eq = i-1;
                                    break;
                                } else {
                                    eq = numberOfImg-1;
                                }
                            }
                        }

                        $(this).parents('.Image_Wrapper').addClass('active');
                        $('.result-expand').css("top",currentOffset + h)
                        $('.result-expand').slideDown(function(){
                            $('.Image_Wrapper:eq('+ eq +')').after('<div class="result-space"></div>');
                            var reh = $('.result-expand').outerHeight(true);
                            $('.result-space').height(reh).slideDown('fast');
                        });
                    }
                    e.preventDefault();
                })
                $(document).delegate('.result-img > a','click',function(e){
                    if($(this).parents('.result-img').hasClass('active')) {
                        $('.result-expand, .result-space').slideUp(function(){
                            $('.result-img').removeClass('active');
                            $('.result-space').remove();
                        })
                    } else {
                        if(('.result-img.active').length>0){
                            $('.result-img').removeClass('active');
                            $('.result-space').remove();
                        }
                        var h = $(this).parents('.result-img').outerHeight(true);
                        var w = $(this).parents('.result-img').outerWidth(true);

                        var documentWidth = $(window).width();
                        var columnNumber = 4;
                        if(documentWidth>991 && documentWidth<1199){
                            columnNumber = 3;
                        }
                        if(documentWidth>479 && documentWidth<991) {
                            columnNumber = 2;
                        }
                        if(documentWidth>0 && documentWidth<479) {
                            columnNumber = 1;
                        }
                        var indexImg = $(this).parents('.result-img').index() + 1;
                        var row = Math.ceil(indexImg/columnNumber);
                        var posLeft = $(this).position().left-20;

                        $(this).parents('.result-img').addClass('active');
                        $('.result-expand').css("top",$(this).offset().top + h)
                        $('.result-expand').slideDown(function(){
                            var eq = (row*columnNumber)-1;
                            $('.result-img:eq('+ eq +')').after('<div class="result-space"><span class="expand-point"></span></div>');
                            var reh = $('.result-expand').outerHeight(true);
                            $('.expand-point').css("left",posLeft + (w/2))
                            $('.result-space').height(reh).slideDown('fast');
                        });
                        //$('body,html').animate({ scrollTop:$(this).offset().top },500);
                    }
                    e.preventDefault();
                })
                                /*-- End 3-4 Dec --*/
            });
            $(function(){
            $('.input-search').focus(function(){
                    $(this).parents('.form-group').addClass('focus')
                })
                $('.input-search').blur(function(){
                    $(this).parents('.form-group').removeClass('focus')
                })
                $('.input-search').keyup(function(){
                    checkLength()
                })
                $('.btn-remove').click(function(){
                    $('.input-search').val('').focus()
                    $(this).fadeOut();
                })
                checkLength();

                $('#nav-side .nav > li > a').click(function(e){
                    var anchor = $(this).attr('href');
                    $('body,html').animate({ scrollTop:$(anchor).offset().top },500);
                    e.preventDefault();
                })

                $('#color-background, #color-header, #color-result, #color-visited, #color-description').colorpicker();
                $("#color-background").on("change.color", function(event, color){
                    if(typeof color != 'undefined'){
                        console.log('color-background:' + color);
                    }
                });
                $("#color-header").on("change.color", function(event, color){
                    if(typeof color != 'undefined'){
                        console.log('color-header:' + color);
                    }
                });
                $("#color-result").on("change.color", function(event, color){
                    if(typeof color != 'undefined'){
                        console.log('color-result:' + color);
                    }
                });
                $("#color-visited").on("change.color", function(event, color){
                    if(typeof color != 'undefined'){
                        console.log('color-visited:' + color);
                    }
                });
                $("#color-description").on("change.color", function(event, color){
                    if(typeof color != 'undefined'){
                        console.log('color-description:' + color);
                    }
                });

            });

            function checkLength(){
                if($('.input-search').val().length>0){
                    $('.btn-remove').fadeIn();
                } else {
                    $('.btn-remove').fadeOut();
                }
            }
                </script>
                <script type="text/javascript">
                  $(document).ready( function ()
                  {
                    $('.changeSource').change(function() {
                        this.form.submit();
                    });
                    $('.sort').change(function() {
                        this.form.submit();
                    });
                    $('.size').change(function() {
                        this.form.submit();
                    });
                    $('.font').change(function(){
                      var option = $(this).find('option:selected').val();
                      var before = $('body').attr('style');
                      if(before == undefined){
                        before =  "";
                      }
                          if (option == "proxima_regular") {
                              $('body').attr('style',before+'font-family: proxima_nova_rgregular;');
                          }else if (option == "proxima_italic") {
                              $('body').attr('style',before+'font-family: proxima_novaregular_italic;');
                          } else if (option == "proxima_bold"){
                              $('body').attr('style',before+'font-family: proxima_novasemibold;');
                          }
                    });
                    $('.fontsize').change(function(){
                      var option = $(this).find('option:selected').val();
                      var before = $('body').attr('style');
                      if(before == undefined){
                        before =  "";
                      }
                      $('body').attr('style',before+'font-size: '+option+'px !important;');
                    });
                    $('.searchboxwidth').change(function(){
                      var option = $(this).find('option:selected').val();
                      $('.search-input-form').attr('style','');
                      $('.search-input-form').attr('style','width: '+option+'%; !important;');
                    });
                    $('.headerbehavior').change(function(){
                      var option = $(this).find('option:selected').val();
                      $('body').attr('class',option);
                    });
                  });
          </script>        
  </body>
</html>