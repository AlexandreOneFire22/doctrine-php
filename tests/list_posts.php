<?php

//Récupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

$entityManager = require_once __DIR__.'/../config/bootstrap.php';


// Récupérer un PostRepository généré automatiquement par Doctrine

$postRepository = $entityManager->getRepository(\App\Entity\Post::class);


//Liste des posts

echo "Liste des posts : \n";

$posts = $postRepository->findAll(); // SELECT * FROM posts

foreach ($posts as $post) {
    echo $post->getTitre()."\n";
}

// Lister un post recherché via son id

echo "liste le post id=1 \n ";

$post = $postRepository->find(1); // SELECT * FROM posts WHERE id_post=1

if ($post){
    echo $post->getTitre()."\n";
} else {
    echo "post non trouvé \n";
}

//Lister un post via son titre

echo "liste un post via son titre \n";

$post = $postRepository->findOneBy(['titre' => 'titre 2']); // SELECT * FROM posts WHERE titre_post = titre 2


if ($post){
    echo $post->getTitre()."\n";
} else {
    echo "post non trouvé \n";
}

// Lister tous les posts dont le nombre de likes est superieur à un nombre donné (nbLikes)

echo "liste un post via son nombre de likes \n";

$nbLikes = 4;

$posts =$postRepository->findBy(['nbLikes' => $nbLikes ]);
// impossible d'utiliser l'opération > avec la méthode findBy !
// Elle se limite uniquement à l'opérateur d'égalité '='





if ($posts){
    foreach ($posts as $post) {
        echo $post->getTitre()."\n";
    }
} else {
    echo "post non trouvé \n";
}





