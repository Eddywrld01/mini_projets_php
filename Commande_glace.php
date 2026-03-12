<?php
// Liste de parfums
$parfums = [
    "vanille" => 500,
    "chocolat" => 500,
    "fraise" => 500
];
// Liste de supplements
$supplements = [
    "chantilly" => 300,
    "caramel" => 200,
    "amande" => 400
];
// Liste de conets
$cornets = [
    "petit" => 200,
    "grand" => 400
];
// Fonction qui crée les checkbox
// $name : nom du champ du formulaire
// $value = valeur du champ du formulaire
// $liste : liste contenant les données envoyées à l'URL par le formulaire
function checkbox($name,$value,$liste){
    // Tout d'abord l'on vérifie si la valeur du champ du formulaire est la même que celle figurant dans l'URL 
    if (in_array($value,$liste)){
        $checked = "checked";
    } else {
        $checked = "";
    }
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $checked>
    HTML;
}
// Fonction qui crée des radio
function radio($name,$value){
    
    return <<<HTML
    <input type="radio" name="$name" value="$value" >
    HTML;
}
// Fonction qui calcule le prix total de chaque catégorie
// $liste : tableau contenant les données envoyées dans le formulaire par $_GET
// $prix : le tableau contenant les différents elements des catégories et leurs prix. Mais ici ce sont les prix qui nous intérresse 
function calcul_prix($liste,$prix){
    $total = 0;
    foreach ($liste as $element){
        if (isset($prix[$element])){
            $total += $prix[$element];
        }
    }
    return $total;
    }
?>

<!-- Stocker les tableaux contenant les données de chaque catégorie qui ont été envoyées par le formulaire dans des variables -->
<?php 
if(isset($_GET['parfum'])){
    $liste_parfum = $_GET['parfum'];
}else{
    $liste_parfum = [];
} 

if(isset($_GET['supplement'])){
    $liste_supplement = $_GET['supplement'];
}else{
    $liste_supplement = [];
} 

if(isset($_GET['cornet'])){
    $liste_cornet = $_GET['cornet'];
}else{
    $liste_cornet = null;
} 
?>

<!-- Formulaire -->

<form action="Commande_glace.php" method="GET">
    <h2>Liste des parfums:</h2>
    <?php foreach($parfums as $parfum => $prix): ?>
    <label>
        <?= checkbox("parfum", $parfum,$liste_parfum) ?>
        <?= $parfum ?> - <?= $prix ?>F
    </label>
    <?php endforeach ?>

    <h2>Liste des supplements:</h2>
    <?php foreach($supplements as $supplement => $prix): ?>
    <label>
        <?= checkbox("supplement", "$supplement",$liste_supplement) ?>
        <?= $supplement ?> - <?= $prix ?>F
    </label>
    <?php endforeach ?>
    
    <h2>Liste des cornets:</h2>
    <?php foreach($cornets as $cornet => $prix): ?>
    <label>
        <?= radio("cornet", $cornet,$liste_cornet) ?>
        <?= $cornet ?> - <?= $prix ?>F
    </label>
    <?php endforeach ?>
    <div>
        <button type="submit">Choix</button>
    </div>
</form>


<!-- Vérifier si les valeurs envoyées par le formualaire sont conformes à leurs tableaux(voir tableau des différentes catégories) respectifs -->
<div class="menu">
    <?php if(!empty($liste_parfum) || !empty($liste_cornet) || !empty($liste_supplement)):?>
        <h2>Votre glace :</h2>
        <p>parfum(s) : </p>
        <ul>
            <?php foreach($liste_parfum as $parfum):?>
                <?php if (isset($parfums[$parfum])):?>
                    <li><?=$parfum?></li>
                <?php endif ?>
            <?php endforeach ?>            
        </ul>

        <p>Supplement(s) : </p>
        <ul>
            <?php foreach($liste_supplement as $supplement):?>
                <?php if (isset($supplements[$supplement])):?>
                    <li><?=$supplement?></li>
                <?php endif ?>
            <?php endforeach ?>            
        </ul>
        
        <p>cornet(s) : </p>
        <ul>
            <?php if (isset($cornets[$liste_cornet])):?>
                <li><?=$liste_cornet?></li>
            <?php endif ?>         
        </ul>
    

        <?php $total_parfum =  calcul_prix($liste_parfum,$parfums)?>
        <?php $total_supplement = calcul_prix($liste_supplement,$supplements)?>
        <?php $total_cornets = 0; 
            if (isset($cornets[$liste_cornet])){
                $total_cornets = $cornets[$liste_cornet];
            }
        ?>
        <?php 

            $totaux = 
            $total_parfum + 
            $total_supplement + 
            $total_cornets
        ?>
        <p>Total: <?=$totaux?></p>
    <?php endif ?>
</div>