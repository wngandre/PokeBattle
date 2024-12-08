<?php

// Require

require_once "class/PokemonFeu.php";
require_once "class/PokemonEau.php";
require_once "class/PokemonPlante.php";
require_once "class/PokemonElectrique.php";
require_once "system/Combat.php";

// Créer un pokémon

$feu = new PokemonFeu("Charizard", 220, 40, 14); // Nom, points de vie, puissance attaque, défense
$eau = new PokemonEau("Blastoise", 280, 40, 17);
$plante = new PokemonPlante("Bulbasaur", 120, 45, 14);
$electrique = new PokemonElectrique("Pikachu", 130, 25, 12);

?>

<!-- Front Formulaire -->

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PokeBattle</title>
    <link rel="stylesheet" href="./css/style.css"/>
  </head>
  <body>
    <div class="title">
      <h1 class="btn-shine">PokeBattle</h1>
      <img src="img/Icône Poké Ball.svg" alt=""/>
    </div>


    <form method="POST" class="pokemon-form">

        <h2>Choisissez vos Pokémons</h2>
        
        <div class="pokemon-container">

      <div class="left-bloc">
        <label for="pokemon1">Choisissez le premier Pokémon :</label>
        <select name="pokemon1" id="pokemon1">
          <option value="feu">Dracaufeu</option>
          <option value="eau">Tortank</option>
          <option value="plante">Bulbizarre</option>
          <option value="electrique">Pikachu</option>
        </select>
      </div>

      <div class="right-bloc">
        <label for="pokemon2">Choisissez le deuxième Pokémon :</label>
        <select name="pokemon2" id="pokemon2">
          <option value="feu">Dracaufeu</option>
          <option value="eau">Tortank</option>
          <option value="plante">Bulbizarre</option>
          <option value="electrique">Pikachu</option>
        </select>
      </div>
    </div>

    <div class="pokemon-img">
        <img src="https://img.pokemondb.net/sprites/black-white/anim/normal/charizard.gif" id="img-pokemon1" alt="Pokemon 1">
        <div class="versus"><h1>Vs</h1></div>
        <img src="https://img.pokemondb.net/sprites/black-white/anim/normal/charizard.gif" id="img-pokemon2" alt="Pokemon 2">
    </div>

    <div class="btn">
        <button type="submit">Lancer le combat</button>
    </div>
    </form>

    <script src="/JS/script.js"></script>
  </body>
</html>


<?php

// Lancer le combat si un formulaire a été soumis

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pokemon1 = $_POST['pokemon1'];
    $pokemon2 = $_POST['pokemon2'];

    $pokemons = [
    'feu' => $feu,
    'eau' => $eau,
    'plante' => $plante,
    'electrique' => $electrique
    ];

    $combat = new Combat($pokemons[$pokemon1], $pokemons[$pokemon2]);
    $combat->demarrerCombat();
}

?>