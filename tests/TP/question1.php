<?php

//Récupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

use App\Entity\Post;

$entityManager = require_once __DIR__.'/../../config/bootstrap.php';


// Récupérer un PostRepository généré automatiquement par Doctrine

$postRepository = $entityManager->getRepository(Post::class);



//1. Rechercher le nombre de likes pour un post donné (son id_post)

//Écrivez une requête qui récupère le nombre de likes pour un post dont l'identifiant
//est fourni.

echo PHP_EOL;
echo "donne l'id d'un post et renvoie le nombre de like :\n";
echo PHP_EOL;



echo "DQL (requête) : \n";


$id = 4;

$dql = "SELECT p.nbLikes FROM App\Entity\Post p WHERE p.id = :id";

// Création d'un objet "requête"

$post = $entityManager->createQuery($dql)
    ->setParameter('id',$id)
    ->getSingleScalarResult();

// Afficher les résultats

echo "  Le post $id à $post likes \n";



echo PHP_EOL;



echo "QueryBuilder (php) : \n";

$id = 4;

//Création d'un objet de la classe QueryBuilder

$qb = $entityManager->createQueryBuilder();

$post = $qb->select("p.nbLikes")
    ->from("App\Entity\Post","p")
    ->where("p.id = :id")
    ->setParameter("id",$id)
    ->getQuery()
    ->getSingleScalarResult();

// Afficher les résultats

echo "  Le post $id à $post likes \n";

echo PHP_EOL;











