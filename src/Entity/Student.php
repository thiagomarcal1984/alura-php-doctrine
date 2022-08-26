<?php 

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Student
{    
    #[Id, GeneratedValue, Column]
    public int $id; // O Doctrine prcisa que a id esteja acessível.

    #[OneToMany(targetEntity: Phone::class, mappedBy: "student")]
    private Collection $phones; // Este objeto não é um array nativo do PHP.
    
    // Sintaxe de construtor nova no PHP 8. Se chama Promoção de Propriedades.
    public function __construct(
        #[Column()]
        public readonly string $name
        // public string $name // o arquivo bin\rename-student.php precisa que 
        // esta propriedade permita escrita.
    )
    {
        $this->phones = new ArrayCollection();
    }

    public function addPhone(Phone $phone): void
    {
        // $this->phones->add($phone); // Sintaxe possível, se $phones fosse 
        // da classe Collection do Doctrine.
        $this->phones[] = $phone; // Este objeto não é um array nativo do PHP.
        $phone->setStudent($this);
    }

    /**
     * @return Collection<Phone>
     */
    public function phones(): iterable
    {
        return $this->phones;
    }
}
