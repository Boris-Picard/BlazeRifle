<?php

require_once __DIR__ . '/../helpers/Database.php';

class User
{
    private int $id_user;
    private string $firstname;
    private string $lastname;
    private string $pseudo;
    private string $email;
    private string $password;
    private int $role;
    private ?string $user_picture;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;
    private ?string $adress;
    private ?int $zipcode;
    private ?string $city;
    private ?string $confirmed_at;

    public function __construct(
        int $id_user = 0,
        string $firstname = '',
        string $lastname = '',
        string $pseudo = '',
        string $email = '',
        string $password = '',
        int $role = 0,
        ?string $user_picture = null,
        ?string $created_at = '',
        ?string $updated_at = '',
        ?string $deleted_at = '',
        ?string $adress = null,
        ?int $zipcode = 0,
        ?string $city = null,
        ?string $confirmed_at = ''
    ) {
        $this->id_user = $id_user;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->user_picture = $user_picture;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
        $this->adress = $adress;
        $this->zipcode = $zipcode;
        $this->city = $city;
        $this->confirmed_at = $confirmed_at;
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setRole(string $role)
    {
        $this->role = $role;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setUserPicture(?string $user_picture)
    {
        $this->user_picture = $user_picture;
    }

    public function getUserPicture(): ?string
    {
        return $this->user_picture;
    }

    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setUpdatedAt(?string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    public function setDeletedAt(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }

    public function setAdress(?string $adress)
    {
        $this->adress = $adress;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setZipCode(?int $zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function getZipCode(): ?int
    {
        return $this->zipcode;
    }

    public function setCity(?string $city)
    {
        $this->city = $city;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setConfirmedAt(?string $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }

    public function getConfirmedAt(): ?string
    {
        return $this->confirmed_at;
    }

    public function setIdUser(?string $id_user)
    {
        $this->id_user = $id_user;
    }

    public function getIdUser(): ?string
    {
        return $this->id_user;
    }

    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `users` 
        (`firstname`, `lastname`, `pseudo`, `email`, `password`, `role`, `user_picture`, `adress`, `zipcode`, `city`)
        VALUES (:firstname, :lastname, :pseudo, :email, :password, :role, :user_picture, :adress, :zipcode, :city);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':pseudo', $this->getPseudo());
        $sth->bindValue(':email', $this->getEmail());
        $sth->bindValue(':password', $this->getPassword());
        $sth->bindValue(':role', $this->getRole());
        $sth->bindValue(':user_picture', $this->getUserPicture());
        $sth->bindValue(':adress', $this->getAdress());
        $sth->bindValue(':zipcode', $this->getZipCode());
        $sth->bindValue(':city', $this->getCity());

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function getUserMail(string $email): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `users` WHERE `email`=:email;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':email', $email);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public static function confirm(?string $email): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `users` set `confirmed_at`= NOW() WHERE `email`= :email;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':email', $email);

        $sth->execute();

        if($sth->rowCount() <= 0) {
            throw new Exception('erreur mail');
        } else {
            return true;
        }
    }
}
