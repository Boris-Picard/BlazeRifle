<?php

require_once __DIR__ . '/../helpers/Database.php';

class Console
{
    private string $console_name;
    private string $console_picture;
    private ?int $id_console;

    public function __construct(string $console_name = '', string $console_picture = '', ?int $id_console = null)
    {
        $this->console_name = $console_name;
        $this->console_picture = $console_picture;
        $this->id_console = $id_console;
    }

    public function setConsoleName(string $console_name)
    {
        $this->console_name = $console_name;
    }

    public function getConsoleName(): string
    {
        return $this->console_name;
    }

    public function setConsolePicture(string $console_picture)
    {
        $this->console_picture = $console_picture;
    }

    public function getConsolePicture(): string
    {
        return $this->console_picture;
    }

    public function setIdConsole(int $id_console)
    {
        $this->id_console = $id_console;
    }

    public function getIdConsole(): int
    {
        return $this->id_console;
    }

    /**
     * Méthode d'insertion des données dans la table consoles
     * @return int
     */
    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `consoles` (`console_name`, `console_picture`)
        VALUES (:console_name, :console_picture);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':console_name', $this->getConsoleName());
        $sth->bindValue(':console_picture', $this->getConsolePicture());

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    /**
     * Méthode de récupération des données dans la table console
     * @return [type]
     */
    public static function getAll()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `consoles`;';

        $sth = $pdo->query($sql);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
