<html>
    <head>
        <link rel="stylesheet" href="styles/contentPage.css"/>
    </head>
    <body>
        <?php 
            include_once('header.php');
        ?>


        <div id="content">
            <?php
                $data = file_get_contents("content.json");
                $json = json_decode($data, true);

                $id = $_GET['id'];

                $movie = $json['movies'][$id];
                $title = $movie['title'];
                $subt = $movie['subt'];
                $link = $movie['link'];

                echo "<h1 class='title'>". $title. "</h1>";
                echo "<h2>". $subt. "</h2>";
                echo "<iframe src='$link'
                        frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen>
                    </iframe>"
            ?>
        </div>
    </body>
</html>
