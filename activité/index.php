<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtm" Xml:lang="fr">

<head>
    <title>Ajout POO</title>
    <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="styless.css">
</head>

<body>

    <div class="body">
        <?php


        function chargerClasse($classname)
        {
            require $classname . '.class.php';
        }

        spl_autoload_register('chargerClasse');
        $Con = new PDO('mysql:host=localhost;dbname=bdjoueurs', 'root', '');
        $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


        $mysqli = new mysqli('localhost', 'root', '', 'bdjoueurs') or die(mysqli_error($mysqli));
        $res = $mysqli->query("SELECT * FROM joueurs") or die($mysqli->error);
        // pre($res) ;
        /*pre($res->fetch_assoc());
    pre($res->fetch_assoc());
    function pre($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    } */
        ?>
        <style>
            th {
                border: 1px solid black;
                width: 300px;
            }
        </style>




        <form action="" method="post">
            <p>
            <div class="wrapper">
                <header>Joueurs</header>
                <section class="input-part">
                    <p class="info-txt"></p>
                    <div class="content">

                        <header> Nom: </header>
                        <input type="text" name="n" maxlength="30" onfocus="this.value=''" spellcheck="false" placeholder=" entrer votre Nom ">

                        <br>
                        <div class="separator"></div>

                        <header> Prenom: </header>
                        <input type="text" name="p" maxlength="30" onfocus="this.value=''" spellcheck="false" placeholder=" Entrer Votre Prenom ">
                        <br>
                        <br>

                        <input type="submit" value="Creer un joueur" name="creer" />
                        <input type="submit" value="effacer un joueur" name="Del" />
                        <input type="submit" value="modification un joueur" name="mod" />
                        <input type="submit" value="Recherche un joueur" name="rech" />
                    </div>

                    <header>Table de Joueurs </header>


                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row = $res->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['Nom']; ?></td>
                                <td><?php echo $row['Prenom']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>



                </section>
            </div>


        </form>


        <?php

        $manager = new ManagerJoueurs($Con);
        if (isset($_POST['creer']) && isset($_POST['n']) && isset($_POST['p'])) {
            $jou = new Joueur(array('Nom' => $_POST['n'], 'Prenom' => $_POST['p']));
            $manager->ajouter($jou);
        }




        if (isset($_POST['Del']) && isset($_POST['n']) && isset($_POST['p'])) {
            $jou = $manager->recup($_POST['n']);
            $manager->Del($jou);
        }


        if (isset($_POST['mod']) && isset($_POST['n']) && isset($_POST['p'])) {
            $jou = $manager->recup($_POST['n']);
            $jou->setPrenom($_POST['p']);
            $manager->mod($jou);
        }

        if (isset($_POST['rech']) && isset($_POST['n']) && isset($_POST['p'])) {
            $jou = $manager->recup($_POST['n']);
            echo "id===" . $jou->getId() . "   Nom=== " . $jou->getNom() . "     Prenom=== " . $jou->getPrenom() . "<br>";
            $tab = $manager->rech($jou);
            var_dump($tab);
           
          /*  foreach ($tab as $key => $val ) {
               echo $val = $jou->afficheJouer();
            }*/
        }




        ?>
    </div>
</body>

</html>