<?php


use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;


//Récupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */



$entityManager = require_once __DIR__.'/../config/bootstrap.php';

ConsoleRunner::run(new SingleManagerProvider($entityManager));


















