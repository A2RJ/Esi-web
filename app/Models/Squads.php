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

    protected $fillable =  [ "squad_name", "squad_leader", "management_id"  ];

    // hasMany players
    public function players()
    {
        return $this->belongsTo(Players::class, 'squad_id', 'id_squad');
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
