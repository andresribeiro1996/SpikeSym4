<?php

namespace App\Entity;

class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @param array $personData
     */
    public function __construct(array $personData)
    {
        $this->name = $personData['name'];
        $this->age = $personData['age'];
    }

    public function toString() : string
    {
        return 'My name is ' . $this->name . ' and Im ' . $this->age . ' years old';
    }

    public function validateAge() : bool
    {
        if ($this->age > 0 && $this->age < 100) {
            return true;
        }
        return false;
    }

    public function validateName() : bool
    {
        if (!empty($this->name)) {
            return true;
        }
        return false;
    }

    

    /**
     * Get the value of name
     *
     * @return  string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  Person
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }
}
