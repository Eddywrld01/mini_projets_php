<?php
// Tableau contenant les ingrédients et leur prix
$ingredients = [
    "fromage" => 500,
    "jambon" => 800,
    "champignon" => 600,
    "olive" => 400
];
// Fonction qui calcule le prix
// $liste : tableau contenant les données envoyées dans le formulaire par $_GET
// $prix : le tableau contenant les différents ingredients et leurs prix. Mais ici ce sont les prix qui nous intérresse 
function calculer_prix($liste,$prix){
    $total = 0;
    foreach ($liste as $element){
        if (isset($prix[$element])){
            $total += $prix[$element];
        }
    }
    return $total;
}
?>
<!-- Formulaire -->
<form action="test.php" method="GET">
    <label >
        <input type="checkbox" name="ingredient[]" value="fromage"> fromage (500)
    </label>
    <label >
        <input type="checkbox" name="ingredient[]" value="jambon"> jambon (800)
    </label>
    <label >
        <input type="checkbox" name="ingredient[]" value="champignon"> champignon (600)
    </label>
    <label >
        <input type="checkbox" name="ingredient[]" value="olive"> olive (400)
    </label>
    <button type="submit">Choix</button>
</form>
<?php
// Verifie si le tableau contient des données envoyées dans par le formulaire. Si c'est le cas on l'attribut à une variable
if (isset($_GET['ingredient'])){
    $liste_ingredient = $_GET['ingredient'];
}else{
    $liste_ingredient = [];
}
?>
<?php if(!empty($liste_ingredient)):?>
<h3>Pizza avec : </h3>
<ul>
    <?php foreach ($liste_ingredient as $element){
    echo "<li>$element</li>";
    }?>
</ul>
<h3>Total : <?=calculer_prix($liste_ingredient,$ingredients)?></h3>
<?php endif ?>