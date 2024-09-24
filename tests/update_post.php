<?php

use App\Entity\Post;


//Récupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

$entityManager = require_once __DIR__.'/../config/bootstrap.php';


// Récupérer l'entité à modifier

$post = $entityManager

    ->getRepository(Post::class)
    ->find(4);

if ($post) {

    //modifier

    $post->setContenu("Le contenu à été modifier !");
    $entityManager->flush();

}else{
    echo "le post à modifier n'existe pas";
}