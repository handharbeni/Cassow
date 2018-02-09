        <script src="<?=base_url('assets/style/js/jquery-1.11.0.min.js')?>"></script>
        <script src="<?=base_url('assets/js/jquery-ui.min.js')?>"></script>
        <script src="<?=base_url('assets/style/js/bootstrap.min.js')?>"></script>
        <script src="<?=base_url('assets/style/js/jquery.collagePlus.min.js')?>"></script>
        <script src="<?=base_url('assets/style/js/jquery.removeWhitespace.min.js')?>"></script>
        <script src="<?=base_url('assets/js/jquery-ui.min.js')?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?=base_url('assets/style/js/evol.colorpicker.min.js')?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?=base_url('assets/js/jquery.easy-autocomplete.js')?>" type="text/javascript" charset="utf-8"></script>
        <script>
              function changeTheme(val){
                $.ajax({
                  type: 'get',
                  url: '<?=base_url("Preferences/changeTheme/'+val+'")?>',
                  data:{
                    get_option:val
                  },
                  success: function(response){
                    document.location.reload(true);
                    // alert(response);
                  }
                });
              }

              function chekcedRadio(id){
                document.getElementById(id).setAttribute('checked','checked');
              }
              function changeSource(source, val)

              {

                 $.ajax({

                   type: 'get',

                   url: '<?=base_url("search/setSource/'+source+'/'+val+'")?>',

                   data: {

                     get_option:val

                   },

                   success: function (response) {
                      document.location.reload(true)
                   }

                 });

              }
              function changeSize(val)

              {

                 $.ajax({

                   type: 'get',

                   url: '<?=base_url("search/setSize/'+val+'")?>',

                   data: {

                     get_option:val

                   },

                   success: function (response) {

                      document.location.reload(true)

                   }

                 });

              }
              function changeSort(val)

              {

                 $.ajax({

                   type: 'get',

                   url: '<?=base_url("search/setSort/'+val+'")?>',

                   data: {

                     get_option:val

                   },

                   success: function (response) {

                      document.location.reload(true)

                   }

                 });

              }
              function resizeIframe(obj) {

                var addHeight = 20; //or whatever size is being cut off

                obj.height = obj.contentWindow.document.body.scrollHeight + addHeight + "px";

              }

              function showImage(image, Url, Title, size) {

                document.getElementById('cImage').setAttribute('style', 'display:block;');

                document.getElementById('cVideo').setAttribute('style', 'display:none;');

                // document.getElementById('currentImage').setAttribute('style', 'display:block;');

                document.getElementById('iCurrentImage').src = image;

                document.getElementById('iCurrentUrl').setAttribute('href', Url);

                document.getElementById('iCurrentUrl').innerHTML = Url;

                document.getElementById('iSize').innerHTML = size;

                document.getElementById('iCurrentTitle').innerHTML = Title;

                document.getElementById('iCurrentImgBtn').setAttribute('href', image);

                document.getElementById('iCurrentUrlBtn').setAttribute('href', Url);

              }

              function showVideo(video, Url, Title, Desc, views, owner, created_time){

                document.getElementById('cImage').setAttribute('style', 'display:none;');

                document.getElementById('cVideo').setAttribute('style', 'display:block;');

                // document.getElementById('currentImage').setAttribute('style', 'display:none;');

                document.getElementById('vDescription').innerHTML = Desc;

                // document.getElementById('vCurrentVideo').setAttribute('href',video);
                document.getElementById('vCurrentVideo').src = video;

                document.getElementById('vCurrentUrl').setAttribute('href', Url);

                if(owner != "undefined"){
            	    document.getElementById('vOwner').innerHTML = owner;
            	}else{
            	    document.getElementById('vOwner').setAttribute('style', 'display:none;');
            	}
                if(views != "undefined"){
	                document.getElementById('vViews').innerHTML = views;
            	}else{
            	    document.getElementById('vViews').setAttribute('style', 'display:none;');
            	}
                if(created_time != "undefined"){
	                document.getElementById('vCreated_time').innerHTML = created_time;
            	}else{
            	    document.getElementById('vCreated_time').setAttribute('style', 'display:none;');
            	}



                // document.getElementById('vCurrentUrl').innerHTML = Url;

                document.getElementById('vCurrentTitle').innerHTML = Title;

                // document.getElementById('vCurrentUrlBtn').setAttribute('href', Url);

                // $(function(){
                //   $("a.embed").oembed();
                // });


              }

             $(document).ready(function(){
                var options = {
                    url: function(phrase) {
                        return "<?=base_url('search/suggest/')?>"+phrase+"";
                    },

                    getValue: "suggest"
                };

                $("#term").easyAutocomplete(options);


                $("#formSetting").submit(function(e) {
                    var url = "<?=base_url('Preferences/save/preferences')?>"; // the script where you handle the form input.
                    $.ajax({
                           type: "POST",
                           url: url,
                           data: $("#formSetting").serialize(), // serializes the form's elements.
                           success: function(data)
                           {
                              document.location.reload('true');
                           }
                         });
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                });
                $("#formTheme").submit(function(e) {
                    var url = "<?=base_url('Preferences/changeTheme')?>"; // the script where you handle the form input.
                    $.ajax({
                           type: "POST",
                           url: url,
                           data: $("#formTheme").serialize(), // serializes the form's elements.
                           success: function(data)
                           {
                              document.location.reload('true');
                           }
                         });
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                });
                $("#formLanguage").submit(function(e) {
                    var url = "<?=base_url('Preferences/setLanguage')?>"; // the script where you handle the form input.
                    $.ajax({
                           type: "POST",
                           url: url,
                           data: $("#formLanguage").serialize(), // serializes the form's elements.
                           success: function(data)
                           {
                              document.location.reload('true');
                           }
                         });
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                });
                $("#formRegional").submit(function(e) {
                    var url = "<?=base_url('Preferences/setRegional')?>"; // the script where you handle the form input.
                    $.ajax({
                           type: "POST",
                           url: url,
                           data: $("#formRegional").serialize(), // serializes the form's elements.
                           success: function(data)
                           {
                              document.location.reload('true');
                           }
                         });
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                });
                $('#color-background, #color-header, #color-result, #color-visited, #color-description').colorpicker();
                $("#color-background").on("change.color", function(event, color){
                    if(typeof color != 'undefined'){
                        document.getElementById('body').style.backgroundColor = color;
                    }
                });
                $("#color-header").on("change.color", function(event, color){
                    if(typeof color != 'undefined'){
                        // console.log('color-header:' + color);
                        // document.getElementById()
                        $('.searchbar').attr('style','background-color:'+color);
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
                $('.font').change(function(){

                      var option = $(this).find('option:selected').val();

                      var before = $('body').attr('style');
                      var font;
                          if (option == "proxima_regular") {

                              font = "proxima_nova_rgregular";

                          }else if (option == "proxima_italic") {

                              font = "proxima_novaregular_italic";

                          } else if (option == "proxima_bold"){

                              font = "proxima_novasemibold";

                          } else if (option == "century_gothic"){

                              font = "century_gothic";

                          } else if (option == "georgia"){

                              font = "georgia";

                          } else if (option == "segoe_ui"){

                              font = "segoe_ui";

                          } else if (option == "sans_serif"){

                              font = "sans_serif";

                          } else if (option == "times"){

                              font = "times";

                          } else if (option == "tahoma"){

                              font = "tahoma";

                          } else if (option == "trebuchet_ms"){

                              font = "trebuchet_ms";

                          } else if (option == "verdana"){

                              font = "verdana";

                          } else if (option == "helvetica"){

                              font = "helvetica";

                          } else if (option == "helvetica_neue"){

                              font = "helvetica_neue";

                          } else if (option == "serif"){

                              font = "serif";

                          }
                      document.getElementById("body").style.fontFamily = font;

                    });

                    $('.fontsize').change(function(){
                      // console.log('FONT SIZE');
                      var option = $(this).find('option:selected').val();

                      var before = $('body').attr('style');
                      document.getElementById("body").style = "font-size:"+option+"px !important;";

                    });

                    $('.searchboxwidth').change(function(){
                      var option = $(this).find('option:selected').val();
                      $('.search-input-form').attr('style','');
                      $('.search-input-form').attr('style','width: '+option+'%; !important;');
                    });

                    $('.headerbehavior').change(function(){
                      var option = $(this).find('option:selected').val();
                      var before = document.getElementById('body').className;
                      if(option == 'non'){
                        before = before.replace('fixed', option)
                        // alert("1 "+before.replace('fixed', option));
                      }else if(option == 'fixed'){
                        before = before.replace('non', option)
                        // alert("2 "+before.replace('non', option));
                      }else{
                        before = before.replace('fixed', option)
                        // alert("3 "+before.replace('fixed', option));
                      }
                      // alert('NON'+before.indexOf('non'));
                      // alert('FIXED'+before.indexOf('fixed'));
                      $('body').attr('class',before);
                    });
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

                          url : "<?php echo base_url().'search/next_page/'.$action.'/'.$q.'/'; ?>"+limit,

                          method: 'get',

                          data: {

                             start : first,

                             limit : limit

                          },

                          success: function( data ) {

                            flag = true;

                            limit = parseInt(limit)+1;

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

              function msToTime(duration) {

                  var milliseconds = parseInt((duration%1000)/100)

                      , seconds = parseInt((duration/1000)%60)

                      , minutes = parseInt((duration/(1000*60))%60)

                      , hours = parseInt((duration/(1000*60*60))%24);



                  hours = (hours < 10) ? "0" + hours : hours;

                  minutes = (minutes < 10) ? "0" + minutes : minutes;

                  seconds = (seconds < 10) ? "0" + seconds : seconds;



                  return hours + ":" + minutes + ":" + seconds + "." + milliseconds;

              }

              function hapusPetik(string) {
                if(string === null){
                  return "";
                }else{
                  return hapusPetikDouble(string).split("'").join('');
                }
              }

              function hapusPetikDouble(string){

                return hapusSlash(string).split('"').join('');

              }

              function hapusSlash(string){
                return string.split("").join('');

              }

              function batasDekripsi(string){

                return string.substr(0,50)+"...";

              }

              function loadResult(dataResult){

                    var data = eval(dataResult);

                    console.log(data);

                    var i=0;

                    var Str = '';

                    var total = '';

                    for(i=0;i<data.length;i++){

                      <?php if($action == "Web"){ ?>

                        total = data[i].total;

                        Str += "<div class='result'>";

                          Str += "<h3 class='result-title'>";

                            Str += "<a href='"+data[i].Url+"'>"+data[i].Title+"</a>";

                          Str += "</h3>";

                          Str += "<div class='result-desc'>"+data[i].Description+"</div>";

                          Str += "<div class='result-url'><a href='"+data[i].Url+"' id='urlResult'>"+data[i].Url+"</a><span class='visible-xs'></span></div>";

                        Str += "</div>"

                      <?php }else if($action == 'Image'){ ?>

                        total = data[i].total;

                        Str += "<div class='Image_Wrapper'>";

                        var showImage = "'"+data[i].MediaUrl+"','"+data[i].Url+"','"+hapusPetik(data[i].Title)+"','"+data[i].iWidth+" x "+data[i].iHeight+"'";

                          Str += '<a href="'+data[i].Url+'" onClick="showImage('+showImage+')">';

                            Str += "<img src='"+data[i].Thumbnail+"'>";

                            Str += "<div class='result-caption'>"+data[i].Title+"</div>";

                          Str += "</a>";

                        Str += "</div>";

                      <?php }else if($action == 'Video'){ ?>

                        total = data[i].total;

                        Str+="<div class='result-img'  width='334px' height='279px'>";

                        var showVideo = "'"+data[i].Embed+"','"+data[i].MediaUrl+"','"+hapusPetik(data[i].Title)+"','"+hapusPetik(data[i].Description)+"','"+data[i].views_total+" Views','"+data[i].owner+"','"+data[i].created_time+"'";

                          Str+='<a href="'+data[i].MediaUrl+'" onClick="showVideo('+showVideo+');"><img src='+data[i].Thumbnail+' width="314px" height="204px"></a>';

                            Str+="<div class='result-video-caption'>";

                              Str+="<h3><a href='"+data[i].MediaUrl+"'>"+batasDekripsi(data[i].Title)+"</a></h3>";

                              Str+="<div class='video-caption-attr row'>";

                                Str+="<div class='col-xs-6'><span><i class='icon-view-sm-grey'></i> "+data[i].views_total+" views</span></div>";

                                Str+="<div class='col-xs-6 text-right'><span><i class='icon-time-grey'></i> "+data[i].duration+"</span></div>";

                              Str+="</div>";

                          Str+="</div>";

                        Str+="</div>";

                      <?php }else if($action == 'News'){ ?>

                        total = data[i].total;

                        Str += "<div class='result'>";

                          Str += "<div class='media'>";

                              Str += "<div class='media-body'>";

                                Str += "<h3 class='result-title'>";

                                Str += "<a href='"+data[i].Url+"'>"+data[i].Title+"</a>";

                                Str += "</h3>";

                              Str += "<div class='result-desc'>"+data[i].Description+"</div>";

                              Str += "<div class='result-url'><a href='"+data[i].Url+"' id='urlResult'>"+data[i].Url+"</a></div>";

                            Str += "</div>";

                            Str += "</div>";

                        Str += "</div>";

                      <?php } ?>

                    };

                    <?php if($action == "Image"){ ?>

                      $('#total').text("Showing "+total+" results");

                      $('section#timeline-container').append(Str);

                    <?php }else{ ?>

                      $('#total').text("Showing "+total+" results");

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

                loadElement(<?=isset($hasilSearch)?$hasilSearch:""?>);

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
                });
                $('.input-search').blur(function(){
                    $(this).parents('.form-group').removeClass('focus')
                });
                $('.input-search').keyup(function(){
                    checkLength()
                });
                $('.btn-remove').click(function(){
                    $('.input-search').val('').focus()
                    $(this).fadeOut();
                });
                checkLength();
                $('#nav-side .nav > li > a').click(function(e){
                    var anchor = $(this).attr('href');
                    $('body,html').animate({ scrollTop:$(anchor).offset().top },500);
                    e.preventDefault();
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
  </body>
</html>
