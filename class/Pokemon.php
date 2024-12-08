<?php

abstract class Pokemon {
    protected $nom;
    protected $type;
    protected $pointsDeVie;
    protected $puissanceAttaque;
    protected $defense;

    public function __construct($nom, $type, $pointsDeVie, $puissanceAttaque, $defense) {
        $this->nom = $nom;
        $this->type = $type;
        $this->pointsDeVie = $pointsDeVie;
        $this->puissanceAttaque = $puissanceAttaque;
        $this->defense = $defense;
    }

    public function attaquer(Pokemon $adversaire) {
        $degats = max(0, $this->puissanceAttaque - $adversaire->defense);
        $adversaire->recevoirDegats($degats);
        return $degats;
    }

    public function recevoirDegats($degats) {
        $this->pointsDeVie -= $degats;
    }

    public function estKO() {
        return $this->pointsDeVie <= 0;
    }

    abstract public function capaciteSpeciale(Pokemon $adversaire);
    
    public function getStatus() {
        return "{$this->nom} ({$this->type}): {$this->pointsDeVie} PV";
    }

    public function getNom() {
        return $this->nom;
    }

    public function getGifPath() {
        $baseUrl = "https://img.pokemondb.net/sprites/black-white/anim/normal/";
        $pokemonName = strtolower($this->nom);
        return "{$baseUrl}{$pokemonName}.gif";
    }
}

?>