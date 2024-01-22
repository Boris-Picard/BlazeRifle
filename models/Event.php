<?php

require_once __DIR__ . '/../helpers/Database.php';

class Event
{
    private ?int $id_event;
    private string $title;
    private string $description;
    private string $picture;
    private string $place;
    private string $event_date;

    public function __construct(string $title = '', string $description = '', string $picture = '', string $place = '', string $event_date = '', ?int $id_event = 0)
    {
        $this->title = $title;
        $this->description = $description;
        $this->picture = $picture;
        $this->place = $place;
        $this->event_date = $event_date;
        $this->id_event = $id_event;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setPicture(?string $picture)
    {
        $this->picture = $picture;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPlace(string $place)
    {
        $this->place = $place;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setEventDate(string $event_date)
    {
        $this->event_date = $event_date;
    }

    public function getEventDate(): ?string
    {
        return $this->event_date;
    }

    public function setIdEvent(?int $id_event)
    {
        $this->$id_event = $id_event;
    }

    public function getIdEvent(): int
    {
        return $this->id_event;
    }

    public function insert(): int
    {
        $pdo = Database::connect(DSN, USER, PASSWORD);

        $sql = 'INSERT INTO `events` (`title`, `description`, `picture`, `place`, `event_date`)
        VALUES (:title, :description, :picture, :place, :event_date)';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':title', $this->getTitle());
        $sth->bindValue(':description', $this->getDescription());
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':place', $this->getPlace());
        $sth->bindValue(':event_date', $this->getEventDate());

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function getAll(): array|false
    {
        $pdo = Database::connect(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM `events`;';

        $sth = $pdo->query($sql);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function get(int $id)
    {
        $pdo = Database::connect(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM `events` WHERE `id_event`=:id_event;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_event', $id, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }
}
