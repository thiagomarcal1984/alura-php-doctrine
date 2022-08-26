<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$student = $entityManager->find(Student::class, $argv[1]);
// A seguir um código que também funciona:
// $studentRepository = $entityManager->getRepository(Student::class);
// $student = $studentRepository->find($argv[1]);

// A classe Student atualmente não permite mudança no name.
// Se name não for readonly, a atribuição abaixo vai funcionar.
$student->name = $argv[2];

// O método persist não é necessário para atualizar, porque a entidade já está
// sendo gerenciada pelo $entityManager.
$entityManager->flush();
