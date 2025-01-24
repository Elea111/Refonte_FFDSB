<?php

namespace identification;

class UserRepository {

    public function __construct(private \PDO $dbConnexion) { }

    public function saveUser(Utilisateurs $user) : bool {
        // TODO: Implement saveUser() method.
        $stmt = $this->dbConnexion->prepare(
            "INSERT INTO utilisateurs (email, password, username) VALUES (:email, :password, :username)"
        );

        return $stmt->execute([
            'email' => $user->getEmail(),
            'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
            'username' => $user->getUsername(),
        ]);
    }

    public function findUserByEmail(string $email) : ?Utilisateurs {
        // TODO: Implement findUserByEmail() method.
        $stmt = $this->dbConnexion->prepare(
            "SELECT * FROM utilisateurs WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($result) {
            return new Utilisateurs($result['email'], $result['password'], $result['username'], $result['id'],
                $result['role']);
        }
        return null;
    }
}