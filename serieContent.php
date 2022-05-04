<?php
    if(isset($_GET['serie'])){
        $file = "series.json";
        $arr = "series";
        $get = $_GET['serie'];

        $json_serie = file_get_contents($file);
        $json = json_decode($json_serie, true);
    }              

    $id = count($json[$arr]) - 1;

    $content = $json[$arr][$id];
    $title = $content['title'];
    $subt = $content['subt'];
    $season = $content['season'];
    $episodes = $content['episodes'];
    $lang = $content['language'];
    
    
    echo "<h1 class='title'>". $title. count($episodes). "</h1>";
    echo "<h2>". $subt. "</h2>";
    
    
    foreach($episodes as $episode){
        $season_index = array_search($episode, $episodes) +1;

        foreach($episode as $ep){
            $ep_index = array_search($ep, $episode) + 1;
            $link = "contentPage.php?season=$season_index&episode=$ep_index";

            echo "<a href='$link'><p>". $ep. " ". "</p></a>";
        }
    }
?>