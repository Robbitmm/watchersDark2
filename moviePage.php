<?php
    if(isset($_GET['secrets'])){
        $file = "secrets.json";
        $arr = "secret";
        $get = $_GET['secrets'];

        $json_movie = file_get_contents($file);
        $json = json_decode($json_movie, true);

    }else{
        $file = "movies.json";
        $arr = "movies";
        $get = $_GET['movie'];

        $json_movie = file_get_contents($file);
        $json = json_decode(substr($json_movie, 3), true);
    }              
    
    $id = count($json[$arr]) - 1 - $get;

    $content = $json[$arr][$id];
    $title = $content['title'];
    $subt = $content['subt'];
    $link = $content['link'];
    $lang = $content['language'];
    

    echo "<h1 class='title'>". $title. "</h1>";
    echo "<h2>". $subt. "</h2>";
    echo "<div class='c-video'>
        <iframe id='ifvideo' src='$link'
            frameborder='0' allow='accelerometer; autoplay=1; encrypted-media; gyroscope;' frameborder='0' controls='0' allowfullscreen>
        </iframe></div>
        <p>" . $lang . "</p>"
?>