<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
?>
<?php
$genre="parody";
include("config.php");
?>
<?php
    // Check if there is more data to load
    $nextPage = $page + 1;
    $nextApi = "https://webdis-zgj8.onrender.com/genre/$genre?type=2&page=$nextPage";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $nextApi);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    $nextApiResponse = curl_exec($ch);
    $nextJson = json_decode($nextApiResponse, true);
    curl_close($ch);

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>9anime <?= $genre ?> : Best free anime to watch in HD quality</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="Watch latest <?= $genre ?>  anime in HD Quality and download your favorite anime from our fast anime website" />
    <meta name="keywords" content="9anime, 9 anime, 9animeto, latest anime, watch anime online, free anime, anime free, online anime, anime website" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $url ?>" />
    <meta property="og:title" content="9anime <?= $genre ?> : Best free anime to watch in HD quality" />
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
             

                <!--Begin: Section film list-->
                <section class="block_area block_area-anime none-bg">
                    <div class="block_area-header block_area-header-tabs">
                        <div class="float-left bah-heading mr-4">
                            <h2 class="cat-heading text-capitalize">Genre: <?= $genre ?> </h2>
                        </div>
                        <?php  if (!empty($nextjson1)) {
        // Display the "View More" button if there is more data
        echo '<a href="" class="btn btn-sm btn-focus more-padding ">View More <i class="fas fa-angle-right"></i></a>';
    }
    ?>
                        <a href="?page=<?= $nextPage ?>"><button type="button" class="btn btn-primary float-right mb-1">Next Page</button></a>
                        <div class="clearfix"></div>
                    </div>

                    <div class="block_area-content block_area-list film_list film_list-grid">
                        <div class="film_list-wrap">

                        <?php
        $api = "https://webdis-zgj8.onrender.com";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$api/genre/$genre?type=2&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        $nextjson1 = json_decode($response, true);
        
        foreach ((array)$nextjson1 as $resentUpdated) {
            ?>
            
            <div class="flw-item item-qtip" data-id="15578">
                                <div class="film-poster">
                                    <div class="tick-item tick-quality">HD</div>
                                   
                                    

                                    <img src="<?= $resentUpdated["animeImg"]; ?>" class="film-poster-img lazyload" alt="<?= $resentUpdated["animeId"] ?>">
                                    <a href="watch/<?= $resentUpdated["animeId"] ?>-episode-1" class="film-poster-ahref"><i class="fas fa-play"></i></a>
                                </div>
                                <div class="film-detail">
                                    <h3 class="film-name"><a href="watch/<?= $resentUpdated["animeId"] ?>-episode-1" title="<?= $resentUpdated["animeTitle"]; ?>" class="dynamic-name" data-jname="<?= $resentUpdated["animeTitle"]; ?>"><?= $resentUpdated["animeTitle"]; ?></a></h3>
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
   
    <div class="anime-pagination">
                        <div class="ap_-nav">
                          
                            <div class="ap__-btn ap__-btn-next">
                                
                               
                            </div>
                            
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
<script type="text/javascript" src="../main.js"></script>
<script type="application/json" id="userSettings"></script>

</html>