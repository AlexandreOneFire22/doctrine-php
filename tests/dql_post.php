<?php


//Récupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

use App\Entity\Post;

$entityManager = require_once __DIR__.'/../config/bootstrap.php';


// Récupérer un PostRepository généré automatiquement par Doctrine

$postRepository = $entityManager->getRepository(Post::class);


// Lister tous les posts dont le nombre de likes est superieur à un nombre donné (nbLikes)

echo "liste un post via son nombre de likes \n";

$nbLikes = 4;

$dql = "SELECT p FROM App\Entity\Post p WHERE p.nbLikes > :nbLikes";
// Création d'un objet "requête"
$requete = $entityManager->createQuery($dql);

$requete->setParameter('nbLikes',$nbLikes);
// Execution de la requête avec le mapping des enregistrements en objets Post

$posts = $requete->getResult();

// Afficher les résultats

foreach ($posts as $post) {
    echo $post->getTitre()."\n";
}


//Lister tous les posts parue à partir d'une date donnée



echo "lister les posts via une date donnée \n";

$date = date_create_from_format("d/m/Y","10/08/2024");

$dql = "SELECT p FROM App\Entity\Post p WHERE p.createdAt > :date ORDER BY p.createdAt DESC";
// Création d'un objet "requête"
$requete = $entityManager->createQuery($dql);

$requete->setParameter('date',$date);
// Execution de la requête avec le mapping des enregistrements en objets Post

$sql = $requete->getSQL(); // Permet Uniquement de voir la requête SQL

$posts = $requete->getResult();

// Afficher les résultats

foreach ($posts as $post) {
    echo $post->getTitre()."\n";
}

echo "requête SQL : \n $sql \n";


// Rechercher les 3 posts les plus récents (du plus récent au plus ancien)


echo "lister les 3 posts les plus récent \n";

$date = date_create_from_format("d/m/Y","10/08/2024");

$dql = "SELECT p FROM App\Entity\Post p ORDER BY p.createdAt DESC";
// Création d'un objet "requête"
$requete = $entityManager->createQuery($dql);

// Execution de la requête avec le mapping des enregistrements en objets Post

$requete->setMaxResults(3);

$posts = $requete->getResult();

// Afficher les résultats

foreach ($posts as $post) {
    echo $post->getTitre()."\n";
}








