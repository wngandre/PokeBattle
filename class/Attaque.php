<?php

class Attaque {
    private $nom;
    private $puissance;
    private $precision;

    public function __construct($nom, $puissance, $precision) {
        $this->nom = $nom;
        $this->puissance = $puissance;
        $this->precision = $precision;
    }

    public function executerAttaque(Pokemon $adversaire) {
        if (rand(0, 100) <= $this->precision) {
            $adversaire->recevoirDegats($this->puissance);
            return $this->puissance;
        }
        return 0;
    }
}

?>