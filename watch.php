<?php
include("config.php");
$parts = parse_url($_SERVER["REQUEST_URI"]);
$page_url = explode("/", $parts["path"]);
$url = $page_url[count($page_url) - 1];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$api/getEpisode/$url");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
$response = curl_exec($ch);
$getEpisode = json_decode($response, true);
curl_close($ch);
$anime = $getEpisode['anime_info'];
$download = str_replace("Gogoanime", "Animezia", $getEpisode['ep_download']);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$api/getAnime/$anime");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
$respon = curl_exec($ch);
$getAnime = json_decode($respon, true);
curl_close($ch);

$episodelist = $getAnime['episode_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $getAnime["name"] ?> online free on 9anime</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="<?= $getAnime['synopsis']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $link ?>" />
    <meta property="og:title" content="<?= $getAnime["name"] ?> online free on 9anime" />
    <meta property="og:image" content="https://9animetv.to/images/capture.png" />
    <meta property="og:image:width" content="650">
    <meta property="og:image:height" content="350">
    <meta property="og:description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta name="apple-mobile-web-app-status-bar" content="#202125">
    <meta name="theme-color" content="#202125">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <link rel="stylesheet" href="<?= $link ?>/style.css">
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <?php
    include("search.php");
    ?>
    <?php
    include("sidenavbar.php");
    ?>
    <div id="main-wrapper" class="layout-page layout-page-watch">
        <div class="container">
            <div class="player-extend-display"></div>
            <div id="main-content">
                <!--Begin: watch-block-->
                <div id="watch-block" class="">
                    <div class="player-wrap">
                        <div class="wb_-playerarea">
                            <div class="wb__-cover" style="background-image: url(<?= $getAnime['imageUrl']; ?>)"></div>
                            <div class="loading-relative loading-box" id="embed-loading">
                                <div class="loading">
                                    <div class="span1"></div>
                                    <div class="span2"></div>
                                    <div class="span3"></div>
                                </div>
                            </div>
                            <iframe id="iframe-embed" src="https://the.animezia.com/player/v2.php?id=<?= $url ?>" frameborder="0" scrolling="no" allow="autoplay; fullscreen" allowFullScreen webkitallowfullscreen mozallowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="player-controls">
                        <div class="pc-item pc-toggle pc-autoplay">
                            <div class="toggle-basic off quick-settings" data-option="auto_play">
                                <i class="far fa-check-square tb-on"></i>
                                <i class="far fa-square tb-off"></i>
                                <span class="tb-name"> Auto Play</span>
                            </div>
                        </div>
                        <div class="pc-item pc-toggle pc-autonext">
                            <div class="toggle-basic off quick-settings" data-option="auto_next">
                                <i class="far fa-check-square tb-on"></i>
                                <i class="far fa-square tb-off"></i>
                                <span class="tb-name"> Auto Next</span>
                            </div>
                        </div>
                        <div class="pc-item pc-toggle pc-light">
                            <div id="turn-off-light" class="toggle-basic">
                                <span class="tb-name"><i class="fas fa-lightbulb"></i> Light</span>
                            </div>
                        </div>
                        <div class="pc-item pc-fav" id="watch-list-content"></div>
                        <div class="pc-item pc-control block-prev" style="display: none;">
                            <a class="btn btn-sm btn-prev" href="javascript:;" onclick="prevEpisode()"><i class="fas fa-backward"></i> Prev</a>
                        </div>
                        <div class="pc-item pc-control block-next" style="display: none;">
                            <a class="btn btn-sm btn-next" href="javascript:;" onclick="nextEpisode()">Next <i class="fas fa-forward"></i></a>
                        </div>
                        <div id="extend-player" class="pc-item pc-zoomtv">
                            <div class="toggle-basic">
                                <i class="fas fa-expand tb-on"></i>
                                <i class="fas fa-compress tb-off"></i>
                                <span class="tb-name"> Expand</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
                <!--Begin: Section eps-list-->
                <section class="block_area block_area-episodes">
                    <div class="block_area-content">
                        <div id="episodes-page-1" class="episodes-ul">
                        


                            <?php 
                                                    foreach ($episodelist as $episodelist) {  ?>
                                                    <a href="watch.php/<?=$episodelist['episodeId']?>" class="item ep-item active">
                                <div class="order"><?=$episodelist['episodeNum']?></div>
                            </a>
                                                    <?php } ?>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </section>
                <!--/End: Section eps-list-->

                <!--Begin: Section detail-->
                <section class="block_area block_area-detail">
                    <div class="block_area-content">
                        <div class="anime-detail">
                            <div class="anime-poster">
                                <div class="film-poster">
                                    <img src="<?= $getAnime['imageUrl'] ?>" class="film-poster-img">
                                </div>
                            </div>
                            <div class="film-infor">
                                <div class="film-infor-top">
                                    <div id="vote-info"></div>
                                    <h2 class="film-name dynamic-name" data-jname="<?= $str = $getAnime["name"] ?>"><?= $str = $getAnime["name"] ?></h2>
                                    <div class="alias"><?= $getAnime['othername'] ?></div>
                                </div>
                                <div class="film-description">
                                    <p class="shorting"><?= $getAnime['synopsis']; ?></p>
                                </div>
                                <div class="meta">
                                    <div class="col1">
                                        <div class="item">
                                            <div class="item-title">Type:</div>
                                            <div class="item-content">
                                                <?= $getAnime['type'] ?>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="item">
                                            <div class="item-title">Date aired:*/---/*</div>
                                            <div class="item-content">
                                                <span></span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="item">
                                            <div class="item-title">Status:</div>
                                            <div class="item-content">
                                                <span><?= $getAnime['status'] ?></span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="item">
                                            <div class="item-title">Sub/Dub:</div>
                                            <div class="item-content">
                                                <span><?php
$last_word_start = strrpos($str, " ") + 1;
$last_word_end = strlen($str) - 1;
$last_word = substr($str, $last_word_start, $last_word_end);

// Remove numbers from the last word
$last_word = preg_replace('/\d+/', '', $last_word);

if ($last_word == "(Dub)") {
    echo "Dub";
} else {
    echo "Sub";
}
?></span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="item">
                                            <div class="item-title">Episode:</div>
                                            <div class="item-content">
                                                <span>Currently Watching <?= $getEpisode['ep_num'] ?> EP</span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="item">
                                            <div class="item-title">Quality:</div>
                                            <div class="item-content">
                                                <span>HD</span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </section>
</body>

</html>