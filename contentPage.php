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
                if(isset($_GET['secrets'])){
                    $file = "secrets.json";
                    $arr = "secret";
                    $get = $_GET['secrets'];

                    $data = file_get_contents($file);
                    $json = json_decode($data, true);

                }else{
                    $file = "content.json";
                    $arr = "movies";
                    $get = $_GET['id'];

                    $data = file_get_contents($file);
                    $json = json_decode(substr($data, 3), true);
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
        </div>
    </body>
</html>
