<?php
include("config.php");
?>
<?php
$keyword=$_GET["keyword"];
$keyword = str_replace(' ', '%20', $keyword);
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
                            <h2 class="cat-heading">SEARCH RESULTS:</h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="block_area-content block_area-list film_list film_list-grid">
                        <div class="film_list-wrap">

                        <?php
        $api = "https://webdis-zgj8.onrender.com";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$api/search?keyw=$keyword");
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
                
               