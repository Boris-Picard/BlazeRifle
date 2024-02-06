<?php

require_once __DIR__ . '/../helpers/Database.php';

class Console
{
    private string $console_name;
    private string $console_picture;
    private int $id_console;

    public function __construct(string $console_name = '', string $console_picture = '', int $id_console = 0)
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
    public static function getAll(): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `consoles`;';

        $sth = $pdo->query($sql);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * Méthode qui permet de récuper une donnée précise via son id
     * @param int $id_console
     * 
     * @return [type]
     */
    public static function get(int $id_console)
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `consoles`
        WHERE `id_console`=:id_console;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_console', $id_console, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * Méthode qui permet de mettre a jour une console
     * @return [type]
     */
    public function update()
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `consoles` SET `console_name`=:console_name, `console_picture`=:console_picture
        WHERE `id_console`=:id_console;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':console_name', $this->getConsoleName());
        $sth->bindValue(':console_picture', $this->getConsolePicture());
        $sth->bindValue(':id_console', $this->getIdConsole(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    /**
     * Méthode spécifique pour mettre a jour l'image d'une console en récupérant son id
     * @param int $id
     * 
     * @return bool
     */
    public static function updateImg(int $id_console): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `consoles` SET `console_picture`= null WHERE `id_console`=:console_picture;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':console_picture', $id_console, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function delete(int $id_console): int
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `consoles` WHERE `id_console`=:id_console;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_console', $id_console, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }
}
