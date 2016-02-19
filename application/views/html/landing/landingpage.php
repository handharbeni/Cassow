        <script>
        function openPage(value){
            window.location.href='http://localhost/cassow/Search/Web?q='+value;
            // alert(value);
        }
        </script>
        <div class="search-box">
            <div class="container">
                <form method="get" action="<?=base_url('/cassow/Search/Web')?>">
                    <a href="#" class="logo">
                        <img src="<?=base_url('assets/style/blue/img/logo.png')?>" class="logo-portrait" alt="CASSOW">
                        <img src="<?=base_url('assets/style/blue/img/logo-landscape.png')?>" class="logo-landscape" alt="CASSOW">
                    </a>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg input-search" name="q"  onkeyup="openPage(this.value)">
                        <button type="button" class="btn btn-remove"><span class="icon-remove"></span></button>
                        <button type="submit" class="btn btn-search"><span class="icon-search"></span></button>
                    </div>
                    <div class="homepage-btn">
                        <?php $Api =& get_instance(); ?>
                        <?php $browser = $Api->detectBrowser(); ?>
                        <?php $icon = explode(" ", $browser['name']); ?>
                        <button type="button" class="btn btn-primary btn-lg"><span class="icon-<?=strtolower($icon[1])?> icon-white"></span> &nbsp;Add to <?=$browser['name']?></button> &nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-border btn-lg">Set as Homepage</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
