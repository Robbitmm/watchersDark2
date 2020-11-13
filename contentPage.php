<html>
    <head>
        <link rel="stylesheet" href="styles/contentPage.css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <?php 
            include_once('header.php');
        ?>


        <div id="content">
            <?php
                $data = file_get_contents("content.json");
                $json = json_decode(substr($data, 3), true);

                $id = count($json['movies']) - 1 - $_GET['id'];

                $movie = $json['movies'][$id];
                $title = $movie['title'];
                $subt = $movie['subt'];
                $link = $movie['link'];
                $lang = $movie['language'];

                echo "<h1 class='title'>". $title. "</h1>";
                echo "<h2>". $subt. "</h2>";
                echo "<div class='c-video'>
                    <iframe id='ifvideo' src='$link'
                        frameborder='0' allow='accelerometer; autoplay=1; encrypted-media; gyroscope;' frameborder='0' controls='0' allowfullscreen>
                    </iframe></div>
                    <p>" . $lang . "</p>"
            ?>
        </div>
    </body>
</html>
