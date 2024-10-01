<?php

//Récupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

use App\Entity\Post;

$entityManager = require_once __DIR__.'/../../config/bootstrap.php';


// Récupérer un PostRepository généré automatiquement par Doctrine

$postRepository = $entityManager->getRepository(Post::class);



//3. Rechercher le nombre de posts en 2024 groupés par mois

//Écrivez une requête qui récupère le nombre de posts publiés en 2024, groupés
//par mois.

echo PHP_EOL;
echo "renvoie le nombre de posts publiés en 2024 groupé par mois :\n";
echo PHP_EOL;


echo "DQL (requête) : \n";

//$dql = "SELECT COUNT(p.titre) FROM App\Entity\Post p WHERE p.createdAt LIKE '2024-__%' ORDER BY p.createdAt";
$dql = "SELECT SUBSTRING(p.createdAt, 6, 2) AS mois, COUNT(p) 
        FROM App\Entity\Post p 
        WHERE SUBSTRING(p.createdAt, 1, 4) = 2024 
        GROUP BY mois";

// Création d'un objet "requête"

$requete = $entityManager->createQuery($dql);

// Execution de la requête avec le mapping des enregistrements en objets Post

$posts = $requete->getResult();

// Afficher les résultats

foreach ($posts as $post) {
    foreach ($post as $post2) {
        echo $post2. "\n";
    }
}



echo PHP_EOL;


echo "QueryBuilder (php) : \n";


//Création d'un objet de la classe QueryBuilder

$qb = $entityManager->createQueryBuilder();

$qb->select("SUBSTRING(p.createdAt, 6, 2) AS mois", "COUNT(p)")
    ->from("App\Entity\Post","p")
    ->where('SUBSTRING(p.createdAt, 1, 4) = 2024')
    ->groupBy("mois");

//Création d'un objet Query à partir du queryBuilder

$query = $qb->getQuery(); // $query est un objet qui contient maintenant la requête en DQL

//Exécution de la requête
$posts = $query->getResult();

// Affichage des résultat


foreach ($posts as $post) {
    foreach ($post as $post2) {
        echo $post2. "\n";
    }
}

echo PHP_EOL;









