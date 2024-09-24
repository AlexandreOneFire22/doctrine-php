<?php

use App\Entity\Post;


//Récupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

$entityManager = require_once __DIR__.'/../config/bootstrap.php';



// Creer un nouveau post

$post = new Post();

$post->setTitre("Un nouveau post");
$post->setContenu("Un nouveau contenu");
$post->setCreatedAt(new \DateTime());

//Demmander à l'entityManager de persister l'entité $post dans la table post


$entityManager->persist($post); //persist n'exécute pas directement le insert

//Valider le Insert

$entityManager->flush(); // flush Réalise le Insert


















