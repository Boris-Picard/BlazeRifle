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

    public function __construct(
        int $id_user = 0,
        string $firstname = '',
        string $lastname = '',
        string $pseudo = '',
        string $email = '',
        string $password = '',
        int $role = 0,
        ?string $user_picture = '',
        ?string $created_at = '',
        ?string $updated_at = '',
        ?string $deleted_at = '',
        ?string $adress = '',
        ?int $zipcode = 0,
        ?string $city = ''
    )
    {
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
    }
}
