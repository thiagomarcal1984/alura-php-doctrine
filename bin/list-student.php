<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

// Este comentário a seguir serve para ajudar a IDE a identificar os objetos dentro do array retornado.
/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    echo "ID: $student->id\nNome: $student->name\n";
    echo "Telefones:\n";

    foreach ($student->phones() as $phone) {
        echo "\t" .$phone->number . PHP_EOL;
    }

    echo PHP_EOL . PHP_EOL;
}

// Para buscar um único objeto pelo ID, use find.
// De novo: o comentário abaixo serve para facilitar o autocomplete da IDE.
/** @var Student $alunoTeste */
/*
$alunoTeste = $studentRepository->find(2);
echo $alunoTeste->name;

// Para filtrar o repositório, use um array com chave/valor com o método findBy:
echo PHP_EOL . "Usando o método findBy:" . PHP_EOL;
$result = $studentRepository->findBy(['name' => "Maria José"]);
var_dump($result);

// O método findBy retorna um array; já o método findOneBy retorna um único objeto:
echo PHP_EOL . "Usando o método findOneBy:" . PHP_EOL;
$result = $studentRepository->findOneBy(['name'=> "João da Silva"]);
var_dump($result);

// Para contar elementos, use o método count (e forneça algum array, mesmo que vazio).
echo PHP_EOL . "Número de Students: " . $studentRepository->count([]) . PHP_EOL;
*/