<?php

use App\Entity\Post;


//Récupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

    $entityManager = require_once __DIR__.'/../config/bootstrap.php';

// Récupérer l'entité à supprimer

$post = $entityManager

    ->getRepository(Post::class)
    ->find(5);

if ($post) {

    //suppression

    $entityManager->remove($post);
    $entityManager ->flush();

}else{
    echo "le post à supprimer n'existe pas";
}

































