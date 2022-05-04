<html>
    <head>
        <!--<link rel="stylesheet" href="styles/page.css"/>-->
    </head>

    <?php
        $movie = file_get_contents("movies.json");
        $serie = file_get_contents("series.json");

        //substr($string, numOfBits) -> Remove the first 3 bits
        //https://stackoverflow.com/questions/689185/json-decode-returns-null-after-webservice-call

        
        $json_movie = json_decode(substr($movie, 3), true);
        $json_serie = json_decode($serie, true);

        $i = count($json_movie['movies']) - 1;
        $j = count($json_serie['series']) - 1;
        
        $outout = "<div class='movies'>
                        <a name='movies'>
                            <h1>Filmes</h1>
                        </a>";
                
        foreach($json_movie['movies'] as $movie){
            $title = $movie['title'];
            $subt = $movie['subt'];
            $img = $movie['img'];
            $time = $movie['duration'];
            $language = $movie['language'];
            $oscar = $movie['oscar'];
            $link = "contentPage.php?movie=$i";
            
            $outout .= "<nav class='title'>";
            $outout .= "<a href='$link'>";
            
            if($oscar === 1){
                $outout .= "<img class='oscar' src='images/Oscar.png'>";
            }
            
            $outout .= "<img class='capa' src='$img'>";
            /*$outout .= "<ul class='info'>";
            $outout .= "<li class='topic-Title'>".$title."<li>";
            $outout .= "<li class='topic-Subtitle'>".$subt."</li>";
            $outout .= "<li class='topic'>".$time."<li>";
            $outout .= "<li class='topic'>".$language."</li>";*/
            $outout .= /*"        </ul>*/
            "</a>
            </nav>";
            $i--;
        }

        $outout .= "</div>
                    <div class='series'>
                        <a name='series'>
                            <h1>Séries</h1>
                        </a>";

        foreach($json_serie['series'] as $serie){
            $title = $serie['title'];
            $subt = $serie['subt'];
            $img = $serie['img'];
            $season = $serie['season'];
            $episodes = $serie['episodes'];
            $language = $serie['language'];
            $link = "contentPage.php?serie=$j";
            
            $outout .= "<nav class='title'>";
            $outout .= "<a href='$link'>";
            
            $outout .= "<img class='capa' src='$img'>";
            /*$outout .= "<ul class='info'>";
            $outout .= "<li class='topic-Title'>".$title."<li>";
            $outout .= "<li class='topic-Subtitle'>".$subt."</li>";
            $outout .= "<li class='topic'>".$time."<li>";
            $outout .= "<li class='topic'>".$language."</li>";*/
            $outout .= /*"        </ul>*/
            "</a>
            </nav>";
            $j--;
        }

        $outout .= "</div>";

        echo $outout;
        
        ?>
</html>