﻿function Condition_menu() {
    var $element = document.getElementById("Btn");

    if ($element.classList.contains('close')) {
        Open();
    }

    else if ($element.classList.contains('open')) {
        Close();
    }
}

function Open() {
    var $element = document.getElementById("Btn");
    var $Conteudo = document.getElementById("content");

    $element.classList.remove("close");
    $element.classList.add("open");
    
    $Conteudo.style.display = 'none';
}

function Close() {
    var $element = document.getElementById("Btn");
    var $Conteudo = document.getElementById("content");

    $element.classList.remove("open");
    $element.classList.add("close");

    $Conteudo.style.display = 'block';
}
    
                /*SEARCH*/


function Condition_search() {
    var search = document.getElementById("search_input");

    if (search.classList.contains('close')) {
        Open_Search();
    }

    else if (search.classList.contains('open')) {
        Close_Search();
    }
}


function Open_Search() {
    var $OpenMenu = document.getElementById("search_input"),
        $CloseBtn = document.getElementById("BtnMenu"),
        $CloseLogo = document.getElementById("logo");

    $OpenMenu.classList.remove("close");
    $OpenMenu.classList.add("open");

    $OpenMenu.style.display = 'block';
    $OpenMenu.focus();

    $CloseBtn.style.display = 'none';
    $CloseLogo.style.opacity = '0';
}

function Close_Search() {
    var $OpenMenu = document.getElementById("search_input"),
        $CloseBtn = document.getElementById("BtnMenu"),
    	$ShowLogo = document.getElementById("logo");

    if (window.screen.width < 1280) {
        $OpenMenu.classList.remove("open");
        $OpenMenu.classList.add("close");

        $OpenMenu.style.display = 'none';
        $OpenMenu.blur();

        $CloseBtn.style.display = 'block';
        $ShowLogo.style.opacity = '100';
    }
    else {
        $OpenMenu.style.display = 'initial';

        $CloseBtn.style.display = 'none';
        $ShowLogo.style.opacity = 'initial';
    }
}

            /*Desktop Button*/
function D_button() {
    if (window.screen.width >= 1280) {
        var $Btn = document.getElementById("Btn");
        var $Menu = document.getElementById("search_input");

        $Menu.classList.remove("close");
        $Menu.classList.add("open");

        $Btn.classList.remove("close");
        $Btn.classList.add("open");
    }
}

function rotate(){
    let iframe = document.getElementById('ifvideo');
    if(window.innerHeight == screen.height){
        iframe.classList.add('fullscreen');
        //screen.orientation.lock("landscape");
    }else{
        iframe.classList.remove('fullscreen');
        //screen.orientation.unlock();
    }
}

function Category(){
    let category = document.getElementById("category"),
        categories = [
            "Animação","Aventura","Ação","Biografia","Comédia",
            "Drama","Família","Fantasia","Ficção Científica",
            "Guerra","História","Musical","Policial","Romance",
            "Suspense","Terror"
        ];

    for(let i = 0; i < categories.length; i++){
        let option = document.createElement('option');

        option.text = categories[i];
        option.setAttribute("value", categories[i].toLowerCase());

        category.add(option);
    }
}

$(document).ready(function(){
    $('#search_input').keydown(function(){
        var search = $('#search_input').val(),
            file;

        if(search == "segredos" || search == "megalodon"){
            file = "secrets.json";
        }else if (search == "cursos"){
            file = "cursos.json"
        }else{
            file = "movies.json";
        }

        $.getJSON(file, function(data){
            var regexp = new RegExp(search, "i"),
                link = "contentPage.php?id=",
                output;
            output = "<div class='movies'>"
            output += "<a name='movies'>"
            output += "<h1>Filmes</h1>"
            output += "</a>";
            
            $.each(data, function(key, val){
                for(let i = 0; i < val.length; i++){
                    let id = val.length - i - 1;

                    if((val[i].title.search(regexp) != -1) || (val[i].subt.search(regexp) != -1)){
                        //output += "<p>" + val[i].title + ":" + val[i].subt + "</p>";

                        output += "<nav class='title'>";
                        output += "<a href='"+ link + id +"'>";
                        output += "<img class='capa' src='"+ val[i].img + "'>";
                        output += "</a></nav>"

                    }else if(file == "secrets.json"){
                        var link = "contentPage.php?secrets=";

                        output += "<nav class='title'>";
                        output += "<a href='"+ link + id +"'>";
                        output += "<img class='capa' src='"+ val[i].img + "'>";
                        output += "</a></nav>"
                    }
                }
            });

            output += "</nav>"

            $('#content').html(output);
        })
    })

    $("#category").change(function(){
        let category = $("#category").val(),
            file = "movies.json";
        
        $.getJSON(file, function(data){   
            var regexp = new RegExp(category, "i"),
                link = "contentPage.php?id=",
                output;


            output = "<div class='movies'>"
            output += "<a name='movies'>"
            output += "<h1>Filmes</h1>"
            output += "</a>";
            
            $.each(data, function(key, val){
                for(let i = 0; i < val.length; i++){
                    let id = val.length - i - 1;

                    if(category != 'tudo'){
                        for(let a = 0; a < val[i].gender.length; a++){
                            if(category == val[i].gender[a]){
        
                                output += "<nav class='title'>";
                                output += "<a href='"+ link + id +"'>";
                                output += "<img class='capa' src='"+ val[i].img + "'>";
                                output += "</a></nav>"
        
                            }
                        }
                    }else{
                        output += "<nav class='title'>";
                        output += "<a href='"+ link + id +"'>";
                        output += "<img class='capa' src='"+ val[i].img + "'>";
                        output += "</a></nav>"
                    }
                }
            });
            output += "</nav>"
    
            $('#content').html(output);
        })
    })
})
