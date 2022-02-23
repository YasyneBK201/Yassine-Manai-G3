var Personnage = {
    initPerso: function (nom, sante, force) {
        this.nom = nom;
        this.sante = sante;
        this.force = force;
    }
};

var Joueur = Object.create(Personnage); //l Prototype du Joueu
Joueur.initJoueur = function (nom, sante, force) {
    this.initPerso(nom, sante, force); // appelle init Perso
    this.Xp = 0;
};

//init la partie joueur

//on ajoute 1a function décrire au prototyppe
Joueur.decrire = function () {

    var description = this.nom + " a " + this.sante + " points devie , " +
        this.force + " en torce et " + this.xp + " pointsd'expérience";

    return document.getElementById("output").innerHTML = description;
};


//on crée le prototype Adversaire

var Adversaire = Object.create(Personnage);

// on ajoute la function initAdversai re au prototype

Adversaire.initAdversaire = function (nom, sante, force, race, valeur) {
    this.initPerso(nom, sante, force);
    this.race = race;
    this.valeur = valeur;
};