<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student('Vinícius Dias');

$entityManager->persist($student); 
// O método persist apenas guarda o objeto no EntityManager, não no database.
// O EntityManager passa a gerenciar o objeto $student.

$entityManager->flush(); 
// Comita no database todas as alterações gerenciadas pelo EntityManager,
// em uma única transação.
