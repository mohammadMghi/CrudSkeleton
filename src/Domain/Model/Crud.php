<?php

declare(strict_types=1);

namespace App\Domain\Model;

use JsonSerializable;

class Crud implements JsonSerializable
{
    /**
     * @var string|null
     */
    private ?string $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

 

     
    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }



    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstname)
    {
        $this->firstName = $firstname;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastname)
    {
       $this->lastName = $lastname;
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
        ];
    }



    public function getUser(): array
    {
        $params = get_object_vars($this);
        $user = [];
        foreach ($params as $key => $param) {
            if (empty($param) || $key == 'dispatcher') {
                continue;
            }
            $user[$key] = (string)$param;
        }
        return $user;
    }
}
