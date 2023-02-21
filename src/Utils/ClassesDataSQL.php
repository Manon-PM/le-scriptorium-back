<?php

namespace App\Utils;

use Doctrine\ORM\EntityManagerInterface;

class ClassesDataSQL {
    /**
     * @var EntityManagerInterface $manager
     */
    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function getClasses() {
        $connexion = $this->manager->getConnection();

        $statement = $connexion->prepare(
            "SELECT classe.id, classe.name, classe.description, classe.picture, classe.hit_die, classe.stats FROM classe"
        );
        
        $result = $statement->executeQuery();
        $classesData = $result->fetchAllAssociative();
        
        $classes = [];

        foreach($classesData as $classe) {
            $statement = $connexion->prepare(
                "SELECT equipment.name, equipment.description FROM equipment JOIN classe_equipment ON classe_equipment.equipment_id = equipment.id WHERE classe_equipment.classe_id = :classe"
            );
            $result = $statement->executeQuery(["classe" => $classe["id"]]);

            $equipments = $result->fetchAllAssociative();
            
            $classe["equipments"] = $equipments;
            $classes[] = $classe;
        }
        
        return $classes;
    }
}

