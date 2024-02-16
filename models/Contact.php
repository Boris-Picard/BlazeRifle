<?php

class Contact
{
    private int $id_contact;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $description;
    private ?string $created_at;

    public function __construct(
        int $id_contact = 0, 
        string $firstname = '',
        string $lastname = '',
        string $email = '',
        string $description = '',
        ?string $created_at = '')
    {
        $this->id_contact = $id_contact;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->description = $description;
        $this->created_at = $created_at;
    }

    public function setIdContact(int $id_contact): void {
        $this->id_contact = $id_contact;
    }

    public function getIdContact(): int {
        return $this->id_contact;
    }

    public function setFirstname(string $firstname): void {
        $this->firstname = $firstname;
    }

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function setLastname(string $lastname): void {
        $this->lastname = $lastname;
    }

    public function getLastname(): string {
        return $this->lastname;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setCreatedAt(?string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string {
        return $this->created_at;
    }
}
