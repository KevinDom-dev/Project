<?php
declare(strict_types=1);
ini_set('display_errors', (string)1);
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
/*
"define" makes things a constant and global
if (empty($_get
$moves = array_rand ($data[moves])
*/
function fetch($url)
{
    $data = file_get_contents($url);
    return json_decode($data, true);
}
if (isset($_GET["getID"])){
    if (($_GET["getID"]) === ""){ //if (empty($_get...)) is also possible
        $data = fetch("https://pokeapi.co/api/v2/pokemon/1");
    }
    else{
        $data = fetch("https://pokeapi.co/api/v2/pokemon/".$_GET["getID"]);
    }
} else{
    $data = fetch("https://pokeapi.co/api/v2/pokemon/1");
}
//$evolData = fetch("https://pokeapi.co/api/v2/evolution-chain/".$_GET["getID"]."/");
//var_dump($evolData.["chain"].["species"].["name"]);
?>
<html>
<head>
    <title>pokedex</title>
    <!-- link to main stylesheet -->
    <!-- project built on https://github.com/bloodstorms/pokedex -->
    <link rel="stylesheet" type="text/css" href="/Project/pokedex/assets/css/main.css">
    <link rel="icon" sizes="144x144" href="/Project/pokedex/assets/img/pokedex/pokeball.png">
</head>
<body>


<div id="pokedex">
    <div id="left">
        <div id="top-left"></div>
        <div id="top-left1">
            <div id="glass-button">
                <div id="reflect"></div>
            </div>
            <div id="top-buttons">
                <div id="top-button-red"></div>
                <div id="top-button-yellow"></div>
                <div id="top-button-green"></div>
            </div>
        </div>
        <div id="top-left2"></div>
        <div id="logo"><img src="/Project/pokedex/assets/img/pokedex/logo-pokemon.png" alt="logo pokedex"/>
        </div>
        <div id="border-screen">
            <div id="button-top1"></div>
            <div id="button-top2"></div>
            <div id="button-bottom" onclick="ShinyPicture()" title="shiny pokemon"></div>
            <p class="selectDisable">&equiv;&equiv;</p>
        </div>
        <div id="screen">
            <!--   <img class="selectDisable" src="<?php echo $evolPre["sprites"]["front_default"]; ?>" alt=""/> -->
            <img class="selectDisable" src="<?php echo $data["sprites"]["front_default"]; ?>" alt=""/>
            <!--  <img class="selectDisable" src="<?php echo $evolNext["sprites"]["front_default"]; ?>" alt=""/> -->
        </div>
        <div id="triangle"></div>
        <div id="blue-button-left" title="search pokemon by name"></div>
        <div id="green-button-left" onclick="PicturePokemon()" title="front pokemon"></div>
        <div id="orange-button-left" onclick="retroPicturePokemon()" title="background pokemon"></div>
        <div id="square-button-left">
            <form action="index.php" method="get">
                <input id="nb" type="text" name="getID" value="" title="search pokemon">
                <input type="submit">
            </form>
        </div>
        <div id="cross">
            <div id="mid-cross">
                <div id="mid-circle"></div>
            </div>
            <div id="top-cross" onclick="increaseIdPokemon()"  title="next pokemon">
                <div id="upC"></div>
            </div>
            <div id="right-cross" onclick="increaseIdPokemon()" title="next pokemon">
                <div id="rightC"></div>
            </div>
            <!--<div id="bot-cross" onclick="decreaseIdPokemon()" title="previous pokemon" onerror="alert('err');">-->
            <div id="bot-cross" onclick="decreaseIdPokemon()" title="dd">
                <div id="downC"></div>
            </div>
            <div id="left-cross" onclick="decreaseIdPokemon()" title="previous pokemon">
                <div id="leftC"></div>
            </div>
        </div>
    </div>
    <div id="middle">
        <div id="hinge1"></div>
        <div id="hinge2"></div>
        <div id="hinge3"></div>
    </div>
    <div id="right">
        <div id="info-screen">
            <?php
            echo ($data["name"]."   "."ID: ".$data["id"]."<br>");
            echo ("height: ".$data["height"]." ft"."<br>");
            echo ("weight: ".$data["weight"]." lb");
            ?>
        </div>
        <div id="keyboard">
            <div class="key" id="blue1" data-move="0" title="show move #1"></div>
            <div class="key" id="blue2" data-move="1" title="show move #2"></div>
            <div class="key" id="blue3" data-move="2" title="show move #3"></div>
            <div class="key" id="blue4" data-move="3" title="show move #4"></div>
            <div class="key" id="blue5" data-move="4" title="show move #5"></div>
            <div class="key" id="blue6" data-move="5" title="show move #6"></div>
            <div class="key" id="blue7" data-move="6" title="show move #7"></div>
            <div class="key" id="blue8" data-move="7" title="show move #8"></div>
            <div class="key" id="blue9" data-move="8" title="show move #9"></div>
            <div class="key" id="blue10" data-move="9" title="show move #10"></div>
        </div>
        <div id="leaf-button-right" title="play song #1"></div>
        <div id="yellow-button-right"  title="play song #2"></div>
        <div id="green-button-right" title="show height"></div>
        <div id="orange-button-right" title="show weight"></div>
        <div id="left-cross-button" title="show previous evolution">
            <div id="leftT"></div>
        </div>
        <div id="right-cross-button"  title="show next evolution">
            <div id="rightT"></div>
        </div>
        <div id="cross-button" title="show ID">
            <div id="left-red-cross"></div>
        </div>
        <div id="square-button-right1"></div>
        <div id="square-button-right2"></div>
    </div>
    <div id="top-right1"></div>
    <div id="top-right2"></div>
</div>
</body>
</html>


