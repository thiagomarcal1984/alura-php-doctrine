<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        // Create a simple "default" Doctrine ORM configuration for Annotations
        $isDevMode = true;

        // $config = ORMSetup::createAnnotationMetadataConfiguration( // Este método usa a sintaxe de anotações nas entidades.
        // or if you prefer YAML or XML
        // $config = ORMSetup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
        // $config = ORMSetup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);
        $config = ORMSetup::createAttributeMetadataConfiguration( // Este método usa a sintasxe de atributos nas entidades.
            [__DIR__."/src"], // Array de paths que podem conter as entidades. No caso, só a pasta src contém as entidades.
            $isDevMode, // Booleano pra informar se o ambiente é de desenvolvimento ou de produção.
            // $proxyDir, // Caminho onde o Doctrine pode criar classes em tempo de execução. Se nulo, o Doctrine cria automaticamente.
            // $cache // Onde está a interface que vai tratar o armazenamento de cache. Se nulo, o Doctrine cria automaticamente.
        );
        
        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite', // O banco vai ser criado fora de src, na raiz do projeto.
        );

        return EntityManager::create($conn, $config);
    }
}
