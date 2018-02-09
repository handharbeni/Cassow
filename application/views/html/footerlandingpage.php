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