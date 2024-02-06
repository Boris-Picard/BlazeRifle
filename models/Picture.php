<?php

require_once __DIR__ . '/../helpers/Database.php';

class Picture
{
    private string $picture;
    private int $id_picture;

    public function __construct(string $picture = '', int $id_picture = 0)
    {
        $this->picture = $picture;
        $this->id_picture = $id_picture;
    }

    public function setPicture(string $picture)
    {
        $this->picture = $picture;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setIdPicture(int $id_picture)
    {
        $this->id_picture = $id_picture;
    }

    public function getIdPicture(): int
    {
        return $this->id_picture;
    }

    public function insert()
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `pictures` (`picture`)
        VALUES (:picture);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':picture', $this->getPicture());

        $sth->execute();

        return $sth->rowCount() > 0;
    }
}
