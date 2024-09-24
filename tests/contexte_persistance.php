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



$contextePersistance = $entityManager->getUnitOfWork();

echo $contextePersistance->getEntityState($post); // 1



$entityManager->remove($post);

echo $contextePersistance->getEntityState($post); // 4



$nouveauPost = new Post();
$nouveauPost->setTitre("Nouveau Post");
$nouveauPost->setContenu("Nouveau contenu");
$nouveauPost->setCreatedAt(new \DateTime());

echo $contextePersistance->getEntityState($nouveauPost); // 2

$entityManager->persist($nouveauPost);

echo $contextePersistance->getEntityState($nouveauPost); // 1











