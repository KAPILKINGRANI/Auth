<?php

class DatabaseConnection
{
    //? allows null object
    private ?PDO $pdo = null;

    //private: This keyword makes the $config parameter private, restricting its access to within the class itself. if u are passing a parameter in the constructor u can access within the same class

    //asking the value in the constructor is dependency injection
    //normal script mai jo objects bante hai unko agar class mai use karna hai toh we have to inject dependencies

    public function __construct(private AppConfig $config)
    {
        $this->connect();
    }

    private function connect(): void
    {
        try {
            $dsn = "mysql:host={$this->config->DB_HOST};dbname={$this->config->DB_NAME}";
            $this->pdo = new PDO($dsn, $this->config->DB_USERNAME, $this->config->DB_PASSWORD);

            if ($this->config->APP_DEBUG) {
                // Overall, this line of code essentially instructs the PDO object to raise exceptions whenever an error is encountered while interacting with the database
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            die($this->config->APP_DEBUG ? $e->getMessage() : "unable to connect database");
        }
    }

    public function getPdo(): ?PDO
    {
        return $this->pdo;
    }
}
