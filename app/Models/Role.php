<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMIN = 1;

    public static function getRoles(): array
    {
        return [
            self::ROLE_ADMIN => 'admin'
        ];
    }
}
