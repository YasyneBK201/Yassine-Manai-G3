var film={
    init : function(titre,annee){
    this.titre=titre;
    this.anne=annee;
    },
    
    decrire : function (){
      let description = "le titre est " +this.titre+" l'annee est "+this.anne;
     return (description);
    }
  };

  //creation d'un tableau de film         
  var films = [];
  //affichage du tableau des film 
 function affiche(){
 Console.log(film.decrire()); 

  }
  
  
  function aj(ann,nom){
    film = Object.create(film);
    film.init(nom,ann);
    films.push(film);
  }
//creation d'un filme et rangement dans le table le tableau
var film = Object.create(film);
film.init("ta'ang",2016);
films.push(film);
//creation d'un filme et rangement dans le table le tableau
var film = Object.create(film);
film.init("juste la fin de mande",2016);
films.push(film);
//creation d'un filme et rangement dans le table le tableau
var film = Object.create(film);
film.init("divines",2016);
films.push(film);


 
  
 //affichage
 function affiche(){
       films.forEach(function (film){
    alert(film.decrire());
 });
 }

 

