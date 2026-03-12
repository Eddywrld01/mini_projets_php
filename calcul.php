<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calcul.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Iosevka+Charon+Mono:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <!-- Formulaire -->
     <?php
        // Créer différentes variables qui vont prendre les valeurs envoyées par le formulaire 
        if(isset($_POST['nombre1'])){
            $nb1 = (float) $_POST['nombre1'];
        }else{
            $nb1="";
        }


        if(isset($_POST['nombre2'])){
            $nb2 = (float) $_POST['nombre2'];;
        }else{
            $nb2="";
        }


        if(isset($_POST['operateurs'])){
            $op =  $_POST['operateurs'];;
        }else{
            $op="";
        }
        
        
    ?>
    <div class="formulaire">
        <h1>Calcul de 2 nombres</h1>
        <form action="calcul.php" method="POST">
            <label for="">Nombre 1:</label>
            <input type="number" name="nombre1" value="<?=$nb1?>">
            <br>
            <br>
            <label for="">Opérateur:</label>
            <select name="operateurs">
                <option value="+" <?= $op=='+'?'selected':''?>>Addition(+)</option>
                <option value="-" <?= $op=='-'?'selected':''?>>Soustraction(-)</option>
                <option value="*" <?= $op=='*'?'selected':''?>>Multiplication(*)</option>
                <option value="/" <?= $op=='/'?'selected':''?>>Division(/)</option>
                <!-- La condition ternaire signifie que si une opération à été choisie alors l'opération choisie reste selectionée. J'ai fait cela parceque si lorsque je choisie une operation, elle retourne à addition après le calcul -->
            </select>
            <br>
            <br>
            <label for="">Nombre 2:</label>
            <input type="number" name="nombre2" value="<?=$nb2?>">
            <br>
            <br>
            <button type="submit">Calculer</button>
        </form>

    </div>
    <div class="resultat">
        <?php
            // Une variable qui contiendra le résultat à afficher
            if ($_SERVER['REQUEST_METHOD']=="POST"){
                switch ($op){
                    case '+':
                        $resultat = $nb1 + $nb2;
                    break; 
                    case '-':
                        $resultat = $nb1 - $nb2;
                    break; 
                    case '*':
                        $resultat = $nb1 * $nb2;
                    break; 
                    case '/':
                        // Vérifie le cas où $nb1 est égal à 0
                        $resultat =($nb2>0) ? $nb1 / $nb2 : 'Erreur de division par zéro';
                    break;
                }    
                echo "<strong>$nb1 $op $nb2 = $resultat</strong?>";
            }
            
        
        ?>
    </div>
</body>
</html>