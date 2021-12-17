<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squads extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_squad';

    protected $fillable =  ["game_id", "squad_image", "squad_name", "squad_leader", "management_id"];

    public function game()
    {
        return $this->hasOne(Games::class, 'id_game', 'game_id');
    }

    public function players()
    {
        return $this->hasMany(Players::class, 'squad_id', 'id_squad');
    }

    public function user()
    {
        return $this->hasOne(Users::class, 'id_user', 'squad_leader');
    }

    public function leader()
    {
        return $this->hasOne(Players::class, 'id_player', 'squad_leader');
    }

    public function management()
    {
        return $this->hasOne(Managements::class, 'id_management', 'management_id');
    }
}
