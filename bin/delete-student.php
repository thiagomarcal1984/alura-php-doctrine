<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
// O comando do comentário abaixo funfa, mas é uma consulta a mais no database.
// $student = $entityManager->find(Student::class, $argv[1]); 
$student = $entityManager->find(Student::class, $argv[1]);

$entityManager->remove($student);
// Por baixo dos panos, o método "remove" tira o ID da entidade:
//    unset($student->id);
// Por isso, a classe da entidade precisa permitir escrita no ID.
$entityManager->flush();
