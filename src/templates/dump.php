
    <div class="Inspector-dump-window" style="border:2px solid black; margin-bottom:20px; background-color: aquamarine;">
        <?if($title) :?> <div class='Inspector-dump-title' style='margin:10px 20px; font-size: 24px;'><?= $title ?></div> <?endif;?>
        <div class='Inspector-dump-data' style="max-height: <?= $maxHeight ?? '500px' ?>; overflow: scroll; background: #dedfe3; padding:10px 20px;\">
            <pre>
                <? var_dump($data); ?>
            </pre>
        </div>
    </div>