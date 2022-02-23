var t = [8, 12, 9, 12, 17, 18, 15, 13];
var t1 = ["tata", "tete", "titi", "toto", "tutu", "tate", "tati", "tato"];
//var t2 = ["img1","img2","img3","img4","img5","img6","img7","img8",]
var image =["image/img1.png", "image/img2.png", "image/img3.png", "image/img4.png"];
e = new Array;


//----------------------- creation  tableau e --------------------
/*
let i = 0
t.forEach(function(element) {  // il travail sur tab de note (t) = note
    e.push(                       // push => ajoute element dans tableau a la fin de tableau
        { name: t1[i], note: element }
        );
    i++
});  */

//-------------------- pour affiche objet img -----------

let i = 0
t.forEach(function(element) { 

    e.push( 
        { name: t1[i], note: element, image:myimg(),  }
        );
    i++
}); 

//---------------------------- affichage  tableau e ---------------------- 
 e.forEach(function(element) {


    document.getElementById("tt").innerHTML += "<tr >" + "<th>" + element.name + "</th>" + "<th>" + element.note + "</th>" + "<th>" + element.image +"</th>" + "</tr>";
});


//-------------------- fonction de tableau image ------------------

//var imgage =["image/img1.png", "image/img2.png", "image/img3.png", "image/img4.png"];

function myimg()
{
    //document.getElementById("im").src = image[i];
    //var m = document.getElementById("im").src = image[i];
    var m = document.getElementById("im").innerHTML = src=image[i];
    return m;
}