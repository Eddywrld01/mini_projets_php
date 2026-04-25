<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Form1.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body>
    
    <!-- Réaliser un formulaire permettant de renseigner le nom et le prénom , le genre, les diplômes obtenus, puis les afficher après validation -->
    <form action="Form1.php" method="POST" enctype="multipart/form-data">
        <h1>Inscription</h1>
        <label>Nom & Prénoms : </label> <input type="text" name="Nom_Prenom" placeholder="Saisie du nom et des prénoms" size=25>
        <br>
        <label >Sexe : </label> 
        <span>M</span> <input type="radio" name="sexe" value="Masculin"> 
        <span>F</span> <input type="radio" name="sexe" value="Féminin">
        <br>
        <label>ANNEE ACADEMIQUE : </label> 
        <select name="annee_ac">
            <option value="2025-2026">2025-2026</option>
            <option value="2024-2025">2024-2025</option>
            <option value="2023-2024">2023-2024</option>
            <option value="2022-2023">2022-2023</option>
            <option value="2021-2022">2021-2022</option>
            <option value="2020-2021">2020-2021</option>
            <option value="2019-2020">2019-2020</option>
            <option value="2018-2019">2018-2019</option>
            <option value="2017-2018">2017-2018</option>
            <option value="2016-2017">2016-2017</option>
            <option value="2015-2016">2015-2016</option>
            <option value="2014-2015">2014-2015</option>
            <option value="2013-2014">2013-2014</option>
            <option value="2012-2013">2012-2013</option>
            <option value="2011-2012">2011-2012</option>
            <option value="2010-2011">2010-2011</option>
        </select>
        <br>
        <label>Diplôme obtenu(s) : </label> 
        <span>BAC</span> <input type="checkbox" name="diplome[]" value="BAC"> 

        <span>BTS</span> <input type="checkbox" name="diplome[]" value="BTS"> 
        <span>LICENCE</span> <input type="checkbox" name="diplome[]" value="Licence">

        <br>
        <label>Joindre votre CV : </label> <input type="file" name="fichier">
        <br>
        <textarea name="Observation" placeholder="Observation" rows="7" cols="50"></textarea>
        <br>
        <button type="submit">Valider</button>
        <button type="">Annuler</button>
    </form>
    <?php
    //Récuperer les informations de chaque champs dans des variables s'ils existent sinon les variables reçoivent null
    //Pour cela on utilisera la fonction isset() qui vérife si une variable est définie ou pas
        if(isset($_POST['Nom_Prenom'])){
            $nom = $_POST['Nom_Prenom'];
        }else {
            $nom = null;
        };
        
        if(isset($_POST['sexe'])){
            $sexe = $_POST['sexe'];
        }else {
            $sexe = null;
        };

        if(isset($_POST['annee_ac'])){
            $annee = $_POST['annee_ac'];
        }else {
            $annee = null;
        }
        
        if(isset($_POST['diplome'])){
            $diplome = $_POST['diplome'];
        }else {
            $diplome = null;
        }
        
        if(isset($_POST['Observation'])){
            $Observation = $_POST['Observation'];
        }else {
            $Observation = null;
        }

        
        
    ?>
    
    <div class="affichage">
        
        <?php
        //On affiche enfin les informations saisies sur le formulaire
            echo "Vous vous appellez : <span>".$nom."</span> <br>";
            
            echo "Sexe : <span>".$sexe."</span> <br>";
            echo "Année Académique : <span>".$annee."</span> <br>";
            echo "Diplômes obtenus : " ;
            if ($diplome != null){
                foreach ($diplome as $dip){
                    echo "<span>$dip</span> ";
                };
            }
            
            echo "<br>";
            echo "Votre observation : <span>".$Observation."</span> <br>";
            if (isset($_FILES['fichier']) ) {
                $fichier = $_FILES['fichier'];
                echo "Nom du fichier : <span>" . $fichier['name'] . "</span>";
            } else {
                echo "Nom du fichier : <span>Aucun fichier</span>";
            }
            
        ?>
    </div>
</body>
</html>
