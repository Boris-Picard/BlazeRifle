<?php

require_once __DIR__ . '/../helpers/Database.php';

class Console_Game
{
    private int $id_game;
    private int $id_console;

    public function __construct(int $id_game = 0, int $id_console = 0)
    {
        $this->id_game = $id_game;
        $this->id_console = $id_console;
    }

    public function setIdGame(int $id_game)
    {
        $this->id_game = $id_game;
    }

    public function getIdGame(): int
    {
        return $this->id_game;
    }

    public function setidConsole(int $id_console)
    {
        $this->id_console = $id_console;
    }

    public function getidConsole(): int
    {
        return $this->id_console;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `consoles_games` (`id_game`, `id_console`)
        VALUES(:id_game, :id_console);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);
        $sth->bindValue(':id_console', $this->getidConsole(), PDO::PARAM_INT);

        $sth->execute();

        if ($sth->rowCount() <= 0) {
            throw new Exception('Erreur dans consoles_games');
        } else {
            return true;
        }
    }
}
