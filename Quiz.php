<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Je crée un tableau contenant l'ensemble de mon quiz à savoir un tableau associatif dont les clés sont les questions et les valeurs associées étant eux mêmes des tableaux contenant des clés qui sont la lettre de la question et les valeurs associées les réponses en elles mêmes
        $QUIZ=[
            "Quelle est la capitale de la Russie ?" => [
                "A" => "Moscou",
                "B" => "Luxembourg",
                "C" => "Shibuya",
            ],
            "Quelle est la plus grande tour au monde ?" => [
                "A" => "Burj Khalifa",
                "B" => "Tour shanghai",
                "C" => "La tour eiffel"
            ],
            "Quelle année marque le début de la Première Guerre mondiale ?" => [
                "A" => "1912",
                "B" => "1914",
                "C" => "1918"
            ],
            "Quel organe produit l’insuline dans le corps humain ?" => [
                "A" => "Le foie",
                "B" => "Le pancréas",
                "C" => "Le cœur"
            ],
        ];
// D'abord pour ne pas repéter certaines tâches j'ai décidé de créer une fonction qui génère un input de type radio à partir du nom de son champ et de sa valeur
        function radio(string $name, $value){
            $checked = (isset($_POST[$name]) && $_POST[$name] === $value) ? 'checked' : ''; // Lorsque je choisis les éléments les checks des cases disparaissent après envoi du coup on ne peut pas savoir ce qu'on a coché donc j'ai mis une condition ternaire qui dit ceci "si une réponse à été envoyée dans le formulaire et que la valeur envoyée est la même que la valeur du champ alors cette variable reçoit l'attribut checked sinon rien"
            return <<<HTML
                <input type="radio" name = "$name" value="$value" $checked>
            HTML;
        }
        
    ?>


<form action="Quiz.php" method="post">
<!-- D'abord j'initialise un compteur à 1 qui numérotera les questions aux fur et à mesure -->
    <?php $i = 1;?>

<!-- Puis je parcours le tableau de mes quiz en utilisant un alias qui stock les clés c'est à dire les questions et un deuxième alias qui stock la réponse -->
    <?php foreach($QUIZ as $question => $reponse) {
        echo "Question $i: $question";

    // Comme dit auparavant les valeurs associées aux clés du tableau "$QUIZ" sont eux mêmes des tableaux associatifs qui contiennent des clés et des valeurs      

        foreach($reponse as $lettre => $rep){  // Donc je vais aussi les parcourir avec un alias qui prends la lettre de la réponse et l'autre alias qui prend la réponse concernée et avec ça je génère les différentes réponses et questions
            echo "<br>";
            echo "$lettre - $rep" ;
            echo radio("Q$i",$rep);
        };
        echo "<br>";
        echo "<br>";
        
        $i++; //J'incrémente le compteur de 1 à chaque fois qu'on passe à la prochaine question   
    }
    ?>

        
    <button type="submit">Envoyez les réponses</button>

</form>
    
</body>
</html>


