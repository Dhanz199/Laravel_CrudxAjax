<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasFactory;

    public $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'username', 'password'];
}
