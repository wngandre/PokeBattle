<?php

require_once "Pokemon.php";

class PokemonElectrique extends Pokemon {
    public function __construct($nom, $pointsDeVie, $puissanceAttaque, $defense) {
        parent::__construct($nom, "Electrique", $pointsDeVie, $puissanceAttaque, $defense);
    }

    public function capaciteSpeciale(Pokemon $adversaire) {
        if ($adversaire->type === "Electrique") {
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