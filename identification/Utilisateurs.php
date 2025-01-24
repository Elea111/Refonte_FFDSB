<?php

namespace identification;

class Utilisateurs {

    public function __construct(private string $email, private string $password, private string $username,
                                private int $id, private string $role) { }

    public function getEmail() : string { return $this->email; }
    public function getPassword() : string { return $this->password; }
    public function getUsername() : string { return $this->username; }
    public function getId() : int { return $this->id; }
    public function getRole() : string { return $this->role; }



}