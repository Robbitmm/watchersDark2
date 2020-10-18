<html>
    <head>
        <link rel="stylesheet" href="styles/page.css"/>
    </head>

    <?php
        $data = file_get_contents("content.json");

        //substr($string, numOfBits) -> Remove the first 3 bits
        //https://stackoverflow.com/questions/689185/json-decode-returns-null-after-webservice-call

        $json = json_decode(substr($data, 3), true);
        $i = 0;

        $outout = "<div class='movies'>
                    <a name='movies'>
                        <h1>Filmes</h1>
                    </a>";

        foreach($json['movies'] as $movie){
            $title = $movie['title'];
            $subt = $movie['subt'];
            $img = $movie['img'];
            $time = $movie['duration'];
            $language = $movie['language'];
            $link = "contentPage.php?id=$i";

            $outout .= "<nav class='title'>";
            $outout .= "<a href='$link'>";
            $outout .= "<img class='capa' src='$img'>";
            $outout .= "<ul class='info'>";
            $outout .= "<li class='topic-Title'>".$title."<li>";
            $outout .= "<li class='topic-Subtitle'>".$subt."</li>";
            $outout .= "<li class='topic'>".$time."<li>";
            $outout .= "<li class='topic'>".$language."</li>";
            $outout .= "        </ul>
                        </a>
                    </nav>";
            $i++;
        }

        $outout .= "</div>";
        echo $outout;
    ?>
</html>