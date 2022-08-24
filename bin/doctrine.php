<?php

use Alura\Doctrine\Helper\EntityManagerCreator;

use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once __DIR__ . '/../vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = EntityManagerCreator::createEntityManager();

$commands = [
    // If you want to add your own custom console commands, you can do so here.
];

ConsoleRunner::run(
    new SingleManagerProvider($entityManager),
    // $commands
);
