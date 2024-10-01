<?php

//Récupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

use App\Entity\Post;

$entityManager = require_once __DIR__.'/../../config/bootstrap.php';


// Récupérer un PostRepository généré automatiquement par Doctrine

$postRepository = $entityManager->getRepository(Post::class);



//2. Rechercher les posts parus depuis moins de 2 mois

//Écrivez une requête qui récupère tous les posts publiés depuis moins de deux
//mois.

echo PHP_EOL;
echo "renvoie tous les posts publiés depuis moins de 2 mois :\n";
echo PHP_EOL;



echo "DQL (requête) : \n";

$now = new \DateTime();
$date2MoisAvant = $now->modify('-2 month');

$dql = "SELECT p FROM App\Entity\Post p WHERE p.createdAt > :date";

// Création d'un objet "requête"

$requete = $entityManager->createQuery($dql);

$requete->setParameter('date',$date2MoisAvant);
// Execution de la requête avec le mapping des enregistrements en objets Post

$posts = $requete->getResult();

// Afficher les résultats

foreach ($posts as $post) {
    echo "  Le post ".$post->getTitre(). " à été crée il y a 2 mois \n";
}



echo PHP_EOL;



echo "QueryBuilder (php) : \n";

$date2MoisAvant = new \DateTime("-2 month");

//Création d'un objet de la classe QueryBuilder

$qb = $entityManager->createQueryBuilder();

$qb->select("p")
    ->from("App\Entity\Post","p")
    ->where("p.createdAt > :date")
    ->setParameter("date",$date2MoisAvant);

//Création d'un objet Query à partir du queryBuilder

$query = $qb->getQuery(); // $query est un objet qui contient maintenant la requête en DQL

//Exécution de la requête
$posts = $query->getResult();

// Affichage des résultat


foreach ($posts as $post) {
    echo "  Le post ".$post->getTitre(). " à été crée il y a 2 mois \n";
}

echo PHP_EOL;











