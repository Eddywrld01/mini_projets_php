<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_menu_fast_food.css">
    <title>Document</title>
</head>
<body>
    
    <!-- MENU FAST-FOOD -->
    <?php
    // Les tableaux des différentes catégories
    $burgers = [
        "simple" => 1500,
        "double" => 2500
    ];

    $boissons = [
        "coca" => 700,
        "fanta" => 700
    ];

    $desserts = [
        "glace" => 800,
        "donut" => 600
    ];
    // Total du menu
    $total=0;
    // Fonction qui génère les input de type radio
    function radio(string $name, string $value){
        return <<<HTML
        <input type="radio" name="$name" value="$value">
    HTML;
    }

    ?>

    <!-- Formulaire -->
    <div class="form_fast_food">
        <form action="Menu Fast-food.php" method="GET">
            <h1>Burgers : </h1>
            <!-- Afficher les différents burgers -->
            <?php foreach($burgers as $burger => $prix): ?>
            <label>
                <?=radio("burger",$burger)?>
                <?=$burger?> - <?= $prix ?>
            </label>
            <?php endforeach ?>


            <h1>boissons : </h1>
            <!-- Afficher les différentes boissons -->
            <?php foreach($boissons as $boisson => $prix): ?>
            <label>
                <?=radio("boisson",$boisson)?>
                <?=$boisson?> - <?= $prix ?>
            </label>
            <?php endforeach ?>


            <h1>desserts : </h1>
            <!-- Afficher les différents desserts -->
            <?php foreach($desserts as $dessert => $prix): ?>
            <label>
                <?=radio("dessert",$dessert)?>
                <?=$dessert?> - <?= $prix ?>
            </label>
            <?php endforeach ?>

            <div>
                <button type="submit">choix</button>
            </div>
        </form>
    </div>

    <?php
    // Vérifier si les radio ont été cliqués (envoie des données) 
        if (isset($_GET['burger'])) {
            $choix_burger = $_GET['burger'];
        } else{
            $choix_burger = null;
        }

        if (isset($_GET['boisson'])) {
            $choix_boisson = $_GET['boisson'];
        } else{
            $choix_boisson = null;
        }

        if (isset($_GET['dessert'])) {
            $choix_dessert = $_GET['dessert'];
        } else{
            $choix_dessert = null;
        }


    ?>
    <div class="Menu">

        <?php if(!empty($choix_boisson) || !empty($choix_burger) || !empty($choix_dessert)){
            echo "<h2>Votre menu :</h2>";
        }?>
        <ul>
            <!-- Si les données envoyées dans l'URL sont les mêmes que ceux figurant dans les différents tableaux (voir tableau des différentes catégories) alors on les calcule puis on les affiche -->
            <?php if(isset($burgers[$choix_burger])){
                $total += $burgers[$choix_burger];
                echo "<li>Burger : $choix_burger </li>";
            }
            ?>

            <?php if(isset($boissons[$choix_boisson])){
                $total += $boissons[$choix_boisson];
                echo "<li>Boisson : $choix_boisson</li>";
            }
            ?>

            <?php if(isset($desserts[$choix_dessert])){
                $total += $desserts[$choix_dessert];
                echo "<li>dessert : $choix_dessert</li>";
            }
            ?>

        </ul>
        
        <?php if(!empty($choix_boisson) || !empty($choix_burger) || !empty($choix_dessert)){
            echo "<p>Total : $total </p>";
        }?>
    </div>






</body>
</html>