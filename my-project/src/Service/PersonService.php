<?php

namespace App\Service;

use App\Entity\Person;

class PersonService
{
    public function createPerson($personData) : Person
    {
        $person = new Person($personData);
        
        if ($person->validateAge() && $person->validateName()) {
            return $person;
        }

        $person = $person->setName('Erro');

        return $person;
    }
}
