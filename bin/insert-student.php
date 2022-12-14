<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
// $student = new Student($argv[1]); // $argv[1] significa o primeiro parâmetro ao usar o script na linha de comando.
// $argv[0] é o caminho para o arquivo do script PHP: neste caso, .\bin\insert-student.php.

$student = new Student("Aluno com telefone");
$student->addPhone(new Phone("(21) 99999-9999"));
$student->addPhone(new Phone("(21) 2222-2222")); 


$entityManager->persist($student); 
// O método persist apenas guarda o objeto no EntityManager, não no database.
// O EntityManager passa a gerenciar o objeto $student.

$entityManager->flush(); 
// Comita no database todas as alterações gerenciadas pelo EntityManager,
// em uma única transação.
