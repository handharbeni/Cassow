        <div class="container-fluid">
            <div class="addtochrome style1">
                <?php $Api = $api; ?>
                <?php $browser = $Api->detectBrowser(); ?>
                <?php $icon = explode(" ", $browser['name']); ?>
                <h2 class="title"><?=lang('add_to');?> <?=$browser['name']?></h2>
                <p>To start searching with Cassow, just install our free browser extension. It only takes about 10 seconds.</p>
                <br>
                <div><button type="button" class="btn btn-primary btn-lg"><span class="icon-<?=strtolower($browser['alias'])?> icon-white"></span> &nbsp;<?=lang('add_to');?> <?=$browser['name']?></button></div>
                <br><br>
                <p>Also available on:</p>
                <ul class="list-browser">
                    <li><a href="#"><span class="icon-safari"></span></a></li>
                    <li><a href="#"><span class="icon-firefox"></span></a></li>
                    <li><a href="#"><span class="icon-chrome-black"></span></a></li>
                    <li><a href="#"><span class="icon-ie"></span></a></li>
                    <li><a href="#"><span class="icon-opera"></span></a></li>
                </ul>
            </div>
        </div>
