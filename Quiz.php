<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Quiz.css">
    <title>Document</title>
</head>
<body>
    <h2>CULTURE G</h2>
    <p>Bienvenue! <br> Participez au quiz pour tester vos connaissances en culture générale.</p>
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
            "Qui a peint La Joconde ?" => [
                "A" => "Pablo Picasso",
                "B" => "Leonardo da Vinci",
                "C" => "Vincent van Gogh"
            ],
            "Qui est le créateur de Facebook ?" => [
                "A" => "Bill Gates$",
                "B" => "Mark Zuckerberg",
                "C" => "Steve Jobs"
            ],
            "Combien de continents y a-t-il sur Terre" => [
                "A" => "5",
                "B" => "6",
                "C" => "7"
            ],
            "Quel est le langage principal du web côté client" => [
                "A" => "PHP",
                "B" => "Java",
                "C" => "JavaScript"
            ],
            "Qui a découvert la gravité en observant une pomme tomber ?" => [
                "A" => "Albert Einstein",
                "B" => "Isaac Newton",
                "C" => "Galileo Galilei"
            ],
            "Quel est le symbole chimique de l’or ?" => [
                "A" => "Au",
                "B" => "Ag",
                "C" => "Fe"
            ],
            "Combien de côtés a un hexagone ?" => [
                "A" => "5",
                "B" => "6",
                "C" => "8"
            ],
            "Quel est le plus long fleuve du monde ?" => [
                "A" => "Amazone",
                "B" => "Nil",
                "C" => "Mississipi"
            ],
            "Quelle planète est appelée la planète rouge ?" => [
                "A" => "Vénus",
                "B" => "Mars",
                "C" => "Jupiter"
            ],
            "Qui a inventé l’ampoule électrique ?" => [
                "A" => "Nikola Tesla",
                "B" => "Thomas Edison",
                "C" => "Alexander Graham Bell"
            ],
            "Dans quel continent se trouve le Brésil ?" => [
                "A" => "Europe",
                "B" => "Afrique",
                "C" => "Amérique du sud"
            ],
            "Quel est l’élément le plus abondant dans l’univers ?" => [
                "A" => "Oxygène",
                "B" => "Hydrogène",
                "C" => "Carbone"
            ],
            "Qui est le premier homme à avoir marché sur la Lune ?" => [
                "A" => "Yuri Gagarin",
                "B" => "Neil Armstrong",
                "C" => "Buzz Aldrin"
            ],
            "Quel pays a pour capitale Tokyo ?" => [
                "A" => "Chine",
                "B" => "Corée du Sud",
                "C" => "Japon"
            ],
            "Quel est le plus grand organe du corps humain ?" => [
                "A" => "Coeur",
                "B" => "Peau",
                "C" => "Foie"
            ],
            "Combien de jours y a-t-il dans une année bissextile ?" => [
                "A" => "365",
                "B" => "366",
                "C" => "367"
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


<form id="Monquiz" action="Quiz.php" method="POST">
<!-- D'abord j'initialise un compteur à 1 qui numérotera les questions aux fur et à mesure -->
    <?php $i = 1;?>

<!-- Puis je parcours le tableau de mes quiz en utilisant un alias qui stock les clés c'est à dire les questions et un deuxième alias qui stock la réponse -->

    <?php foreach($QUIZ as $question => $reponse) :?>
        <div class="questions">
            <?php echo  "Question $i: <span class='question-text'>$question</span>";
            echo "<br>";

        // Comme dit auparavant les valeurs associées aux clés du tableau "$QUIZ" sont eux mêmes des tableaux associatifs qui contiennent des clés et des valeurs      

            foreach($reponse as $lettre => $rep){  // Donc je vais aussi les parcourir avec un alias qui prends la lettre de la réponse et l'autre alias qui prend la réponse concernée et avec ça je génère les différentes réponses et questions
                echo "<br>";
                echo "<span class='reponse-text'>$lettre - $rep</span>" ;
                echo radio("Q$i",$rep);
            };
            echo "<br>";
            echo "<br>";
            
            $i++; //J'incrémente le compteur de 1 à chaque fois qu'on passe à la prochaine question  
            ?> 
        </div>
    <?php endforeach ?>
    <?php
    $total = 0;
        if(isset($_POST['Q1']) && $_POST['Q1']=="Moscou"){
            $total+=1;
        }else{
            $total+=0;
        }

    echo "$total";
    ?>
    
</form>
<button type="submit" form="Monquiz">TESTEZ</button>
</body>
</html>


