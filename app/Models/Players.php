<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_player';

    protected $fillable =  ["id_player", "user_id", "squad_id", "ingame_name", "ingame_id", "player_image", "created_at", "updated_at",];
}
