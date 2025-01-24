<?php

namespace identification;

class BddConnect {
    public \PDO $pdo;
    protected string $filebdd;

    public function __construct() {
        $this->filebdd = __DIR__ .'/database.db';
    }

    /**
     * @throws BddConnectException
     */
    public function connexion() : \PDO {
        try {
            $dsn = "sqlite:" . $this->filebdd;
            $this->pdo = new \PDO($dsn);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        catch(\PDOException $e) {
            die("Erreur de connexion BDD : " . $e->getMessage());
        }
        return $this->pdo;
    }
}