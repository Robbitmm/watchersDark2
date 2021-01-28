<html>
    <head>
        <meta name="viewport" content="width=device-width, inicial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="scripts/Btn.js"></script>

        <link rel="icon" href="images\header\Logo.png" type="image/png type">
        <link rel="stylesheet" href="styles/header.css"/>

        <title>Home - Watchers</title>
    </head>
    <body>
        <header>
            <nav>
                <ul id="Btn" class="Menu Menu_bar close">
                    <li><a href="index.php">Menu</a></li>
                    <!--<li><a href="#">Categorias</a></li>-->
                    <li><a href="index.php#movies">Filmes</a></li>
                    <!--<li><a href="index.php#Series">Séries</a></li>-->
                    <li id="li-category">
                        <a><label for='category'>Categorias</label></a>
                        <select id='category' name='category'>
                            <option value="tudo">Tudo</option>
                        </select>
                    </li>
                </ul>
            </nav>
    
            <img id="BtnMenu" class="btnMenu" src="images/header/Btn_menu.png" onclick="Condition_menu()"/>
            <img class="search_icon" src="images/header/Search.png" onclick="Condition_search()"/>
            <a href="index.php">
                <img id="logo" class="Logo" src="images/header/Logo black.png"/>
            </a>
    
            <input id="search_input" class="search close" name="search_input"/>
        </header>
    </body>
</html>