<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_admin';

    protected $fillable =  ["user_id", "jabatan", "ig", "fb",];

    // hasOne user
    public function user()
    {
        return $this->hasOne(Users::class, 'id_user', 'user_id');
    }
}
