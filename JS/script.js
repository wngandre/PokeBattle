const pokemon1Select = document.getElementById("pokemon1");
const pokemon2Select = document.getElementById("pokemon2");
const imgPokemon1 = document.getElementById("img-pokemon1");
const imgPokemon2 = document.getElementById("img-pokemon2");

const pokemonImages = {
  feu: "https://img.pokemondb.net/sprites/black-white/anim/normal/charizard.gif",
  eau: "https://img.pokemondb.net/sprites/black-white/anim/normal/blastoise.gif",
  plante:
    "https://img.pokemondb.net/sprites/black-white/anim/normal/bulbasaur.gif",
  electrique:
    "https://img.pokemondb.net/sprites/black-white/anim/normal/pikachu.gif",
};

if (pokemon1Select && imgPokemon1) {
  pokemon1Select.addEventListener("change", function () {
    imgPokemon1.src = pokemonImages[pokemon1Select.value];
  });
}

if (pokemon2Select && imgPokemon2) {
  pokemon2Select.addEventListener("change", function () {
    imgPokemon2.src = pokemonImages[pokemon2Select.value];
  });
}
