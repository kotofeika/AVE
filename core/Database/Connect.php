<?php

namespace Core\Database;

use Core\App;
use \PDO;

class Connect
{
    public const AS_ARRAY = PDO::FETCH_ASSOC;
    public const AS_OBJECT = PDO::FETCH_CLASS;

    protected const AVAILABLE_MODES = [self::AS_ARRAY, self::AS_OBJECT];

    protected PDO $pdo;
    protected array $fetchMode = [self::AS_ARRAY];


    public function __construct()
    {
        $config = App::config('database');
        $dsn = "{$config['driver']}:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $this->pdo = new PDO($dsn, $config['user'], $config['password']);
    }

    public function setFetchMode(array $fetchMode): void
    {
        $this->fetchMode = $fetchMode;
    }

    /**
     * @param string $sql = "SELECT * FROM users WHERE id = ?"
     * @param array $params
     */
    public function executeAll($sql, $options = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($options);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function execute($sql, $options = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($options);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function insert($sql, $values = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($values);
    }

    public function select($sql)
    {
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectOne($sql, $options)
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($options);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($sql, $options = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($options);
    }

    public function fetchLazy(string $sql, array $params): \Generator
    {
        $statement = $this->execute($sql, $params);
        while ($row = $statement->fetch()) {
            yield $row;
        }
    }
}