<div id="search-result">
    <style type='text/css'>
        .cse .gsc-control-cse, .gsc-control-cse{
            border: none;
        }
        .cse .gsc-control-cse, .gsc-control-cse{
            padding: 0;
        }
        .gsc-result-info{
            padding-left: 0;
        }
        .gsc-webResult.gsc-result{
            padding-left: 0;
        }
        .gsc-orderby,
        .search-stat{
            display: none !important;
        }
        .gsc-result-info{
            font-size: 15px;
            color: #999da0;
            margin: 30px 0;
        }
        .gsc-above-wrapper-area{
            border-bottom: none;
            padding: 0;
        }
        .gsc-results .gsc-cursor-box{
            margin-top: 30px;
        }
        .gsc-results .gsc-cursor-box .gsc-cursor-page{
            width: 40px;
            height: 40px;
            display: inline-block;
            padding: 10px;
            border: 1px solid #e2e2e2;
            border-radius: 10%;
            text-align: center;
            text-decoration: none;
        }
        .gsc-results .gsc-cursor-box .gsc-cursor-page:hover{
            background: #fafafa;
        }
        .gsc-control-cse .gs-result .gs-title, .gsc-control-cse .gs-result .gs-title{
            font-size: 19px;
            font-family: 'proxima_novasemibold';
        }
        .gsc-control-cse .gsc-table-result{
            font-size: 15px;
            font-family: 'proxima_nova_rgregular';
            color: #5c5d5d;
            line-height: 24px;
        }
        .gsc-url-bottom{
            font-size: 14px;
            font-family: 'proxima_novaregular_italic';
            line-height: 24px;
            color: #5c5d5d;
        }
</style>
    <?php
    $classPreferences = $preferences;
    $currentTheme = $classPreferences->currentTheme();
    if($currentTheme['customTheme'] == 1){
      if($currentTheme['baseTheme'] == 2){
        ?>
        <!-- dark -->
        <style>
            /* Google Result dark Style */
            .cse .gsc-control-cse, .gsc-control-cse{background-color: #333 !important;}
            .gsc-webResult.gsc-result{border-color: transparent !important;}
            .gsc-result-info{color: #999da0 !important;}
            .gs-result .gs-title, .gs-result .gs-title *{color: #dbdbdb !important;}
            .gs-result .gs-snippet{color: #939393;}
            .gs-result .gs-visibleUrl:hover, .gs-result .gs-title, .gs-result .gs-title:hover{text-decoration: underline;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page{background-color: #434343;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page{border: 1px solid transparent;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page{color: #939393 !important;}
            .gsc-results .gsc-cursor-box .gsc-cursor-current-page{color: #fff !important;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page:hover{background: #1a1a1a;}
            .gsc-control-cse .gsc-table-result{color: #5c5d5d;}
            .gsc-url-bottom{color: #5c5d5d;}
        </style>
        <?php 
      }else{
        ?>
        <!-- light -->
        <style type="text/css">
            /* Google Result Style */
            .gsc-result-info{color: #999da0;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page{border: 1px solid #e2e2e2;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page:hover{background: #fafafa;}
            .gsc-control-cse .gsc-table-result{color: #5c5d5d;}
            .gsc-url-bottom{color: #5c5d5d;}
        </style>
        <?php
      }
    }else{
      if($currentTheme['baseTheme'] == 2){
        ?>
        <!-- dark -->
        <style>
            /* Google Result dark Style */
            .cse .gsc-control-cse, .gsc-control-cse{background-color: #333 !important;}
            .gsc-webResult.gsc-result{border-color: transparent !important;}
            .gsc-result-info{color: #999da0 !important;}
            .gs-result .gs-title, .gs-result .gs-title *{color: #dbdbdb !important;}
            .gs-result .gs-snippet{color: #939393;}
            .gs-result .gs-visibleUrl:hover, .gs-result .gs-title, .gs-result .gs-title:hover{text-decoration: underline;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page{background-color: #434343;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page{border: 1px solid transparent;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page{color: #939393 !important;}
            .gsc-results .gsc-cursor-box .gsc-cursor-current-page{color: #fff !important;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page:hover{background: #1a1a1a;}
            .gsc-control-cse .gsc-table-result{color: #5c5d5d;}
            .gsc-url-bottom{color: #5c5d5d;}
        </style>
        <?php 
      }else{
        ?>
        <!-- light -->
        <style type="text/css">
            /* Google Result Style */
            .gsc-result-info{color: #999da0;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page{border: 1px solid #e2e2e2;}
            .gsc-results .gsc-cursor-box .gsc-cursor-page:hover{background: #fafafa;}
            .gsc-control-cse .gsc-table-result{color: #5c5d5d;}
            .gsc-url-bottom{color: #5c5d5d;}
        </style>
        <?php
      }
    }
    ?>
    <script>
      (function() {
        var cx = '004603905213444256273:nozyqsc5k0m';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
            '//cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
      })();
    </script>
    <gcse:searchresults-only></gcse:searchresults-only>
    <style>
    .gs-result .gs-visibleUrl {
        color: #B0B0B0;
        text-decoration: none;
    }
    .gs-result .gs-title, .gs-result .gs-title * {
        color: #2D88D3;
        text-decoration: none;
    }
    <style>
</div>
