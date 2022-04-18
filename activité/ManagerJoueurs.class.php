
<?php
require("connect.php");
$Con = new PDO('mysql:host=localhost;dbname=bdjoueurs', 'root', '');

class ManagerJoueurs
{
    private $Con;
    public function __Construct($Con)
    {
        $this->SetDb($Con);
      
    }
    public function setDb(PDO $Con)
    {
        $this->Con = $Con;
    }
    public function recup($info){
        $q = $this->Con->prepare('SELECT id, Nom, Prenom FROM joueurs WHERE Nom=:Nom');
        $q->execute(array(':Nom'=> $info)); 
      return new Joueur ($q->fetch (PDO :: FETCH_ASSOC));
    }

    public function ajouter(joueur $jou)
    {
       
        $q = $this->Con->prepare('INSERT INTO joueurs(Nom,Prenom) Values (:Nom,:Prenom)');

        $q->bindvalue(':Nom', $jou->getNom());
        $q->bindvalue(':Prenom', $jou->getPrenom());
        $q->execute();
        
    }

    public function mod (joueur $jou){
        $q = $this->Con->prepare('UPDATE joueurs SET Prenom = :Prenom WHERE Nom = :Nom ');

        $q->bindvalue(':Nom', $jou->getNom());
        $q->bindvalue(':Prenom', $jou->getPrenom());
        $q->execute();

    }

    public function rech(joueur $jou){
        $jousjous =[];
        $q = $this->Con->prepare('SELECT id, Nom,Prenom FROM joueurs WHERE Nom=:Nom');

        $q->bindvalue(':Nom', $jou->getNom());
        $q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            $jousjous[] = new joueur($donnees) ;
        }
        return $jousjous;
    }
    public function Del(joueur $jou)
    {
        $this->Con->exec('DELETE FROM joueurs where id = '.$jou->getId());
    }
    





  
}


?>
