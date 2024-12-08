<?php

class Combat {
    private $pokemon1;
    private $pokemon2;

    public function __construct(Pokemon $pokemon1, Pokemon $pokemon2) {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    private function tourDeCombat(Pokemon $attaquant, Pokemon $defenseur) {
        $degats = $attaquant->attaquer($defenseur);
        echo "<p class='combat-turn'><span class='pokemon-attacker'>{$attaquant->getStatus()}</span> attaque et inflige <span class='combat-damage'>$degats</span> dégâts à <span class='pokemon-defender'>{$defenseur->getStatus()}</span></p>";
    }

    public function demarrerCombat() {
        echo '<!DOCTYPE html>';
        echo '<html lang="fr">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Combat Pokémon</title>';
        echo '<link rel="stylesheet" href="./css/style.css">';
        echo '</head>';
        echo '<body>';
        echo '<div class="combat">';
        echo '<h2 class="combat-title">Le combat commence !</h2>';
        echo "<p class='combat-intro'>Le combat entre <span class='pokemon-status'>{$this->pokemon1->getStatus()}</span> et <span class='pokemon-status'>{$this->pokemon2->getStatus()}</span> commence !</p>";

        while (!$this->pokemon1->estKO() && !$this->pokemon2->estKO()) {
            $this->tourDeCombat($this->pokemon1, $this->pokemon2);
            if ($this->pokemon2->estKO()) break;

            $this->tourDeCombat($this->pokemon2, $this->pokemon1);
        }

        $vainqueur = $this->pokemon1->estKO() ? $this->pokemon2->getStatus() : $this->pokemon1->getStatus();
        echo "<p class='combat-winner'>Vainqueur: <span class='pokemon-winner'>$vainqueur</span></p>";

        $gifPath = $this->pokemon1->estKO() ? $this->pokemon2->getGifPath() : $this->pokemon1->getGifPath();
        echo "<div class='pokemon-winner'>";
        echo "<img src='" . $gifPath . "' alt='Gif du Pokémon gagnant' class='pokemon-winner-gif'>";
        echo "</div>";
        echo '</div>';
        echo '</body>';
        echo '</html>';
    }
}

?>