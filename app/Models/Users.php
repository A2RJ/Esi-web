<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_user';

    protected $fillable =  ["id_user", "user_role", "email", "password", "kontak", "alamat", "gender", "user_image", "created_at", "updated_at",];
}
