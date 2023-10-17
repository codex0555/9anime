<?php
include("config.php");
?>
<div id="main-sidebar">
                
                <section class="block_area block_area_sidebar block_area-realtime">
    <div class="block_area-header">
        <div class="float-left bah-heading mr-2">
            <h2 class="cat-heading">Top Anime</h2>
        </div>
        <div class="float-right bah-tab-min">
            <ul class="nav nav-pills nav-fill nav-tabs anw-tabs">
                <li class="nav-item"><a data-toggle="tab" href="#top-viewed-day" class="nav-link active">Today</a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="block_area-content">
        <div class="cbox cbox-list cbox-realtime">
            <div class="cbox-content">
                <div class="tab-content">
                    <div id="top-viewed-day" class="anime-block-ul anif-block-chart tab-pane active">
                        <ul class="ulclear">
                            


<?php
        $api = "https://webdis-zgj8.onrender.com";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$api/top-airing?type=");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        $json1 = json_decode($response, true);
        
        foreach ((array)$json1 as $next => $resentUpdated) {
            ?>
            
            <li class="">
    <div class="film-number"><span><?=$next+1?></span></div>
    <div class="film-poster item-qtip" data-id="18413">
        <img src="<?= $resentUpdated["animeImg"] ?>"
             class="film-poster-img lazyload" alt="<?= $resentUpdated["animeId"]; ?>">
    </div>
    <div class="film-detail">
        <h3 class="film-name">
            <a href="watch.php/<?= $resentUpdated["animeId"]; ?>-episode-1"
               title="<?= $resentUpdated["animeTitle"]; ?>" class="dynamic-name"
               data-jname="<?= $resentUpdated["animeTitle"]; ?>"><?= $resentUpdated["animeTitle"]; ?></a>
        </h3>
        <div class="fd-infor">
            <span class="fdi-item mr-2"> <?= $resentUpdated["genres"][0]; ?> •  <?= $resentUpdated["genres"][1]; ?></span>
            <!--            <span class="fdi-item"><i class="fas fa-heart mr-1"></i>50211</span>-->
        </div>
    </div>
    <div class="clearfix"></div>
</li>
            <?php
        }
        curl_close($ch);
        ?>
    </div>















                        </ul>
                    </div>
                    
                   
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
            </div>