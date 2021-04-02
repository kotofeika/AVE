<?php


namespace App\Models;

use \Core\Database\Model;

class User extends Model
{
    public int $id;
    public string $name;
    public int $age;

    protected static function table()
    {
        return 'users';
    }
}