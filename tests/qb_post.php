<?php

//Utilisation du query builder afin de construire des requête dynamique


//Récupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

use App\Entity\Post;

$entityManager = require_once __DIR__.'/../config/bootstrap.php';


// Récupérer un PostRepository généré automatiquement par Doctrine

$postRepository = $entityManager->getRepository(Post::class);


//Création d'un objet de la classe QueryBuilder

$qb = $entityManager->createQueryBuilder();

$qb->select("p")
    ->from("App\Entity\Post","p")
    ->where("p.nbLikes > :nbLikes")
    ->setParameter("nbLikes",4);

//Création d'un objet Query à partir du queryBuilder

$query = $qb->getQuery(); // $query est un objet qui contient maintenant la requête en DQL

//Exécution de la requête
$posts = $query->getResult();

// Affichage des résultat


foreach ($posts as $post) {
    echo $post->getTitre()."\n";
}

// Rechercher les 3 posts les plus récents (du plus récent au plus ancien)


$qb = $entityManager->createQueryBuilder();

$qb->select("p")
    ->from("App\Entity\Post","p");

//Création d'un objet Query à partir du queryBuilder

$query = $qb->getQuery(); // $query est un objet qui contient maintenant la requête en DQL

//Exécution de la requête

$posts = $query->getResult();

// Affichage des résultat


foreach ($posts as $post) {
    echo $post->getTitre()."\n";
}





















