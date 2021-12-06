<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squad_inv_players extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_squad_inv_player';

    protected $fillable =  ["squad_id", "player_id", "status"];

    public function player()
    {
        return $this->hasMany(Players::class, 'id_player', 'player_id');
    }
}
