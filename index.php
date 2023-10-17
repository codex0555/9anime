<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>9anime Homepage: Best free anime to watch in HD quality</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="Watch latest anime in HD Quality and download your favorite anime from our fast anime website" />
    <meta name="keywords" content="9anime, 9 anime, 9animeto, latest anime, watch anime online, free anime, anime free, online anime, anime website" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $url ?>" />
    <meta property="og:title" content="9anime Homepage: Best free anime to watch in HD quality" />
    <meta property="og:image" content="https://9animetv.to/images/capture.png" />
    <meta property="og:image:width" content="650">
    <meta property="og:image:height" content="350">
    <meta property="og:description" content="Watch latest anime in HD Quality and download your favorite anime from our fast anime website" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta name="apple-mobile-web-app-status-bar" content="#202125">
    <meta name="theme-color" content="#202125">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "url": "https://9animetv.to/",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://9animetv.to/search?keyword={keyword}",
                "query-input": "required name=keyword"
            }
        }
    </script>
    <link rel="stylesheet" href="style.css">
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
     
   
            
    <div id="main-wrapper">
        <div class="container">
            <!--Begin: main-content-->
            <div id="main-content">
                <!--Begin: Slider-->
                <div class="deslide-wrap">
                    <div id="slider">
                        <div class="swiper-wrapper">

                        <?php
        $api = "https://webdis-zgj8.onrender.com";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$api/top-airing?type=");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        $json1 = json_decode($response, true);
        
        foreach ((array)$json1 as $resentUpdated) {
            ?>
            
            <div class="swiper-slide">
                                <div class="deslide-item">
                                    <div class="deslide-cover">
                                        <div class="deslide-cover-img"><img class="film-poster-img" src="<?= $resentUpdated["animeImg"] ?>" width="1366" height="768" title="" alt=""></div>
                                    </div>
                                    <div class="deslide-item-content">
                                        <div class="desi-head-title"><a href="watch.html"><?= $resentUpdated["animeTitle"]; ?></a></div>
                                        <div class="desi-description">
                                            Lorem ipsum dolor sit amet.
                                        </div>
                                        <div class="desi-buttons">
                                            <a href="watch/<?= $resentUpdated["animeId"] ?>-episode-1" class="btn">Watch now</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
            <?php
        }
        curl_close($ch);
        ?>

                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-navigation">
                            <div class="swiper-button swiper-button-next"><i class="fas fa-chevron-right"></i></div>
                            <div class="swiper-button swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!--Begin: Section film list-->
                <section class="block_area block_area-anime none-bg">
                    <div class="block_area-header block_area-header-tabs">
                        <div class="float-left bah-heading mr-4">
                            <h2 class="cat-heading">Recently Updated</h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="block_area-content block_area-list film_list film_list-grid">
                        <div class="film_list-wrap">

                        <?php
        $api = "https://webdis-zgj8.onrender.com";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$api/recent-release?type=");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        $json1 = json_decode($response, true);
        
        foreach ((array)$json1 as $resentUpdated) {
            ?>
            
            <div class="flw-item item-qtip" data-id="15578">
                                <div class="film-poster">
                                    <div class="tick-item tick-quality">HD</div>
                                    <div class="tick ltr">

                                        <div class="tick-item tick-sub"><?= $resentUpdated["subOrDub"] ?></div>


                                    </div>

                                    <div class="tick rtl">
                                        <div class="tick-item tick-eps">

                                          Ep <?= $resentUpdated["episodeNum"]; ?>

                                        </div>
                                    </div>

                                    <img data-src="<?= $resentUpdated["animeImg"]; ?>" class="film-poster-img lazyload" alt="The iDOLM@STER Million Live!">
                                    <a href="watch.php/<?= $resentUpdated["animeId"] ?>-episode-1" class="film-poster-ahref"><i class="fas fa-play"></i></a>
                                </div>
                                <div class="film-detail">
                                    <h3 class="film-name"><a href="/watch/the-idolmster-million-live-15578" title="<?= $resentUpdated["animeTitle"]; ?>" class="dynamic-name" data-jname="<?= $resentUpdated["animeTitle"]; ?>"><?= $resentUpdated["animeTitle"]; ?></a></h3>
                                </div>
                                <div class="clearfix"></div>
                            </div>
            <?php
        }
        curl_close($ch);
        ?>
    </div>

                            

                           

                            

                            

                           
                           
                        </div>
                    </div>
                    
                            
                </section>
                <div class="clearfix"></div>
        </div>
    </div>
    
              <?php
              include("footer.php");
              ?>
                
               
</body>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-612507a6a48f43d8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha512-jGsMH83oKe9asCpkOVkBnUrDDTp8wl+adkB2D+//JtlxO4SrLoJdhbOysIFQJloQFD+C4Fl1rMsQZF76JjV0eQ==" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
<script type="text/javascript" src="main.js"></script>
<script type="application/json" id="userSettings"></script>

</html>