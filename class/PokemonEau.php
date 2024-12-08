<?php

require_once "Pokemon.php";

class PokemonEau extends Pokemon {
    public function __construct($nom, $pointsDeVie, $puissanceAttaque, $defense) {
        parent::__construct($nom, "Eau", $pointsDeVie, $puissanceAttaque, $defense);
    }

    public function capaciteSpeciale(Pokemon $adversaire) {
        if ($adversaire->type === "Feu") {
            $bonus = 20;
        } else {
            $bonus = 10;
        }
        // Calcule les dégâts en ajoutant la puissance d'attaque et le bonus
        $degats = $this->puissanceAttaque + $bonus;
        $adversaire->recevoirDegats($degats);
        return $degats;
    }
}

?>