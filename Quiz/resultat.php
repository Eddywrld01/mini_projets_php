<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resultats.css">
</head>
<body>
<?php
#Stocker toutes les réponses dans un tableau
$reponses = [
    "Q1" => "Moscou",
    "Q2" => "Burj Khalifa",
    "Q3" => "1914",
    "Q4" => "Le pancréas",
    "Q5" => "Leonardo da Vinci",
    "Q6" => "Mark Zuckerberg",
    "Q7" => "7",
    "Q8" => "JavaScript",
    "Q9" => "Isaac Newton",
    "Q10" => "Au",
    "Q11" => "6",
    "Q12" => "Amazone",
    "Q13" => "Mars",
    "Q14" => "Thomas Edison",
    "Q15" => "Amérique du sud",
    "Q16" => "Hydrogène",
    "Q17" => "Neil Armstrong",
    "Q18" => "Japon",
    "Q19" => "Peau",
    "Q20" => "366"
];

$total = 0; # initialisation de la varaible total à 0

echo "<h1>Résultats</h1>";

foreach ($reponses as $question => $bonneReponse) { #Je parcours le tableau
    $user = $_POST[$question] ?? "Non répondu"; #Si l'utilisateur à répondu alors on stock cette réponse dans $user sinon on affecte "non répondu"

    if ($user === $bonneReponse) { #Si la réponse envoyée par l'utilisateur est la même que celle figurant dans le tableau alors...
        echo "$question : ✅ Bonne réponse ($user) <br> ";
        echo "<br>";
        $total++;
    } else {
        echo "$question : ❌ Mauvaise réponse (Votre réponse : $user / Bonne réponse : $bonneReponse)<br>";
        echo "<br>";
    }
}

echo "<h2>Score : $total / 20</h2>";
?>

</body>
</html>