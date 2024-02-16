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

    public static function confirm(?int $id_user): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `users` set `confirmed_at`= NOW() WHERE `id_user`= :id_user;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_user', $id_user);

        $sth->execute();

        if ($sth->rowCount() <= 0) {
            throw new Exception('erreur confirmation');
        } else {
            return true;
        }
    }

    public static function getAll(?bool $showDeletedAt = null, ?string $order = 'DESC', ?int $nbMessages = 100): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT 
        `users`.`id_user`,
        `users`.`firstname`,
        `users`.`lastname`,
        `users`.`pseudo`,
        `users`.`email`,
        `users`.`user_picture`,
        `users`.`created_at` AS user_created_at,
        `users`.`role`,
        `users`.`confirmed_at` AS user_confirmed_at
        FROM `users`';

        $showDeletedAt ? $sql .= ' WHERE `users`.`deleted_at` IS NOT NULL ' : $sql .= ' WHERE `users`.`deleted_at` IS NULL ';

        $order == 'ASC' ? $sql .= ' ORDER BY `users`.`created_at` ASC ' : $sql .= ' ORDER BY `users`.`created_at` DESC ';

        if (!is_null($nbMessages)) {
            $sql .= ' LIMIT :nbMessages ';
            $sth = $pdo->prepare($sql);
            $sth->bindValue('nbMessages', $nbMessages, PDO::PARAM_INT);
            $sth->execute();
        } else {
            $sth = $pdo->query($sql);
        }

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get(?int $id_user = null): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT 
        `users`.`id_user`,
        `users`.`firstname`,
        `users`.`lastname`,
        `users`.`pseudo`,
        `users`.`user_picture`,
        `users`.`created_at` AS user_created_at,
        `users`.`role`,
        `users`.`deleted_at`,
        `users`.`confirmed_at` AS user_confirmed_at
        FROM `users`
        WHERE `id_user`=:id_user;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function update(): int
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `users` SET `firstname`=:firstname, `lastname`=:lastname, `pseudo`=:pseudo, `user_picture`=:user_picture, `role`=:role, `id_user`=:id_user
        WHERE `id_user`=:id_user;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':pseudo', $this->getPseudo());
        $sth->bindValue(':user_picture', $this->getUserPicture());
        $sth->bindValue(':role', $this->getRole());
        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);

        $sth->execute();

        return (int) ($sth->rowCount() > 0);
    }

    /**
     * Méthode spécifique pour mettre a jour l'image d'un article en récupérant son id
     * @param int $id
     * 
     * @return bool
     */
    public static function updateImg(int $id_user): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `users` SET `user_picture`= null WHERE `id_user`=:id_user;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function delete(int $id_user): int
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `users` WHERE `id_user`=:id_user;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue('id_user', $id_user, PDO::PARAM_INT);

        $sth->execute();

        return (int) ($sth->rowCount() > 0);
    }

    public static function archive(int $id_user, ?bool $archive = false): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `users` SET `deleted_at` =  ';

        if ($archive) {
            $sql .= 'NOW()';
        } else {
            $sql .= 'NULL';
        }

        $sql .= ' WHERE `id_user` = :id_user';

        // Prépare et exécute la requête
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }

    public static function getConfirmed(): int
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(*)
        FROM `users`
        WHERE `confirmed_at` IS NULL;';

        $sth = $pdo->query($sql);

        $result = $sth->fetchColumn();

        return $result > 0;
    }
    
}
