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
                if(isset($_GET['secrets']) || isset($_GET['movie'])){
                    include_once('moviePage.php');
                }elseif(isset($_GET['serie'])){
                    include_once('serieContent.php');
                }elseif(isset($_GET['season']) && isset($_GET['episode'])){
                    include_once('seriePage.php');
                }
            ?>
        </div>
    </body>
</html>
