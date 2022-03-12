<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable
{
    protected $fillable =
        [   'username',
            'nominativo',
            'email',
            'password'];
    protected $primaryKey = "idUtente";
}
