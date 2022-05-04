<?php
    if(isset($_GET['season']) && $_GET['episode']){
        $file = "series.json";
        $arr = "series";
        $season = $_GET['season'] - 1;
        $episode = $_GET['episode'] - 1;

        $json_serie = file_get_contents($file);
        $json = json_decode($json_serie, true);
    }              
    $id = count($json[$arr]) - 1;

    $content = $json[$arr][$season];
    $serie = $content['title'];
    $title = $content['episodes'][$id][$episode];
    $subt = $content['subt'];
    $link = $content['link'][$id][$episode];
    $lang = $content['language'];
    $previus_ep = $episode;
    $next_ep = $episode + 2;
    $season = $season + 1;

    if($previus_ep == 0){
        $previus_ep = 1;
    }
    if($next_ep == count($content['episodes'][$id]) + 1){
        $next_ep = count($content['episodes'][$id]);
    }
    

    echo "<h1 class='title'>". $serie. "</h1>";
    echo "<h2>". $title. "</h2>";
    echo "<div class='c-video'>
        <iframe id='ifvideo' src='$link'
            frameborder='0' allow='accelerometer; autoplay=1; encrypted-media; gyroscope;' frameborder='0' controls='0' allowfullscreen>
        </iframe></div>
        <p>" . $lang . "</p>
        <a class='ep_btn' href='contentPage.php?season={$season}&episode=$previus_ep'>Anterior</a>
        <a class='ep_btn' href='contentPage.php?season={$season}&episode=$next_ep'>Próximo</a>"
?>