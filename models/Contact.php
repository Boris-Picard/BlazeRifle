<?php
require_once __DIR__ . '/../helpers/Database.php';

class Contact
{
    private int $id_contact;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $description;
    private ?string $created_at;


    public function setIdContact(int $id_contact): void
    {
        $this->id_contact = $id_contact;
    }

    public function getIdContact(): int
    {
        return $this->id_contact;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setCreatedAt(?string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function insert()
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `contacts` (`firstname`, `lastname`, `email`, `description`)
        VALUES (:firstname, :lastname, :email, :description);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':email', $this->getEmail());
        $sth->bindValue(':description', $this->getDescription());

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function getAll(): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT *
        FROM `contacts`;';

        $sth = $pdo->query($sql);

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getMail(string $email): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT `contacts`.`firstname`, `contacts`.`lastname`, `contacts`.`email`, `contacts`.`description`, `contacts`.`created_at`
        FROM `contacts`;';

        $sth = $pdo->query($sql);

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public static function get(int $id_contact): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `contacts`
            WHERE `id_contact`=:id_contact;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_contact', $id_contact, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public static function delete(int $id_contact): int
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `contacts`
            WHERE `id_contact`=:id_contact;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_contact', $id_contact, PDO::PARAM_INT);

        $sth->execute();

        return (int) ($sth->rowCount() > 0);
    }
}
