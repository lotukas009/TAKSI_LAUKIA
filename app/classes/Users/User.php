<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder
{
    protected array $properties = [
        'name',
        'lastname',
        'email',
        'password',
        'tel',
        'address',
        ];

    public function setName(?string $user)
    {
        $this->data['name'] = $user;
    }

    public function getName()
    {
        return $this->data['name'] ?? null;
    }

    public function setLastname(?string $lastname)
    {
        $this->data['lastname'] = $lastname;
    }

    public function getLastanme()
    {
        return $this->data['lastname'] ?? null;
    }

    public function setEmail(?string $email)
    {
        $this->data['email'] = $email;
    }

    public function getEmail()
    {
        return $this->data['email'] ?? null;
    }

    public function setPassword(?string $password)
    {
        $this->data['password'] = $password;
    }

    public function getPassword()
    {
        return $this->data['password'] ?? null;
    }

    public function setTel(?string $tel)
    {
        $this->data['tel'] = $tel;
    }

    public function getTel()
    {
        return $this->data['tel'] ?? null;
    }

    public function setAddress(?string $address)
    {
        $this->data['address'] = $address;
    }

    public function getAddress()
    {
        return $this->data['address'] ?? null;
    }
}