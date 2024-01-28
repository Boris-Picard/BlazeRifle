<?php

require_once __DIR__ . '/../helpers/Database.php';

class Event
{
    private ?int $id_event;
    private string $event_title;
    private string $event_description;
    private string $event_picture;
    private string $event_link;
    private string $place;
    private string $event_date;
    private ?int $id_game;

    public function __construct(string $event_title = '', string $event_description = '', string $event_picture = '', string $event_link = '', string $place = '', string $event_date = '', ?int $id_event = 0, ?int $id_game = null)
    {
        $this->event_title = $event_title;
        $this->event_description = $event_description;
        $this->event_picture = $event_picture;
        $this->event_link = $event_link;
        $this->place = $place;
        $this->event_date = $event_date;
        $this->id_event = $id_event;
        $this->id_game = $id_game;
    }

    public function setEventTitle(string $event_title)
    {
        $this->event_title = $event_title;
    }

    public function getEventTitle(): string
    {
        return $this->event_title;
    }

    public function setEventDescription(string $event_description)
    {
        $this->event_description = $event_description;
    }

    public function getEventDescription(): string
    {
        return $this->event_description;
    }

    public function setEventPicture(?string $event_picture)
    {
        $this->event_picture = $event_picture;
    }

    public function getEventPicture(): ?string
    {
        return $this->event_picture;
    }

    public function setEventLink(string $event_link)
    {
        $this->event_link = $event_link;
    }

    public function getEventLink(): string
    {
        return $this->event_link;
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
        $this->id_event = $id_event;
    }

    public function getIdEvent(): ?int
    {
        return $this->id_event;
    }

    public function setIdGame(?int $id_game)
    {
        $this->id_game = $id_game;
    }

    public function getIdGame(): ?int
    {
        return $this->id_game;
    }

    public function insert(): int
    {
        $pdo = Database::connect(DSN, USER, PASSWORD);

        $sql = 'INSERT INTO `events` (`event_title`, `event_description`, `event_picture`, `event_link`, `place`, `event_date`, `id_game`)
        VALUES (:event_title, :event_description, :event_picture, :event_link, :place, :event_date, :id_game)';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':event_title', $this->getEventTitle());
        $sth->bindValue(':event_description', $this->getEventDescription());
        $sth->bindValue(':event_picture', $this->getEventPicture());
        $sth->bindValue(':event_link', $this->getEventLink());
        $sth->bindValue(':place', $this->getPlace());
        $sth->bindValue(':event_date', $this->getEventDate());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function getAll(?int $id_game = null, string $order = 'ASC'): array|false
    {
        $pdo = Database::connect(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM `events`
        INNER JOIN `games` ON `games`.`id_game`=`events`.`id_game`
        WHERE 1=1';

        isset($id_game) ? $sql .= ' AND `games`.`id_game`=:id_game ' : '';

        $order == 'ASC' ? $sql .= ' ORDER BY `event_date` ASC ' : ' ORDER BY `event_date` DESC ';

        if (isset($id_game)) {
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_game', $id_game, PDO::PARAM_INT);
        } else {
            $sth = $pdo->query($sql);
        }

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function get(int $id_event)
    {
        $pdo = Database::connect(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM `events`
        INNER JOIN `games` ON `games`.`id_game`=`events`.`id_game`
        WHERE `events`.`id_event`=:id_event;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_event', $id_event, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function update()
    {
        $pdo = Database::connect(DSN, USER, PASSWORD);

        $sql = 'UPDATE `events` SET `event_title`=:event_title, `event_description`=:event_description, `event_picture`=:event_picture, `event_link`=:event_link, `place`=:place, `event_date`=:event_date, `id_game`=:id_game
        WHERE `id_event`=`id_event`;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':event_title', $this->getEventTitle());
        $sth->bindValue(':event_description', $this->getEventDescription());
        $sth->bindValue(':event_picture', $this->getEventPicture());
        $sth->bindValue(':event_link', $this->getEventLink());
        $sth->bindValue(':place', $this->getPlace());
        $sth->bindValue(':event_date', $this->getEventDate());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);
        $sth->bindValue(':id_event', $this->getIdEvent(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }
}
