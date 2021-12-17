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

    protected $fillable =  ["user_id", "squad_id", "game_id", "ingame_name", "ingame_id", "player_image"];

    public function user()
    {
        return $this->hasOne(Users::class, 'id_user', 'user_id');
    }

    public function game()
    {
        return $this->hasOne(Games::class, 'id_game', 'game_id');
    }

    public function squad()
    {
        return $this->hasOne(Squads::class, 'id_squad', 'squad_id');
    }

    public function management()
    {
        return $this->hasOneThrough(Managements::class, Squads::class, 'management_id', 'id_management', 'squad_id', 'id_squad');
    }
}
