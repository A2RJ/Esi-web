<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_winner extends Model
{
    use HasFactory;

    protected $table = 'event_winners';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_event_winner';

    protected $fillable =  ["event_id", "squad_id"];

    // squads
    public function squads()
    {
        return $this->hasOne(Squads::class, 'id_squad', 'squad_id');
    }

    // events
    public function events()
    {
        return $this->hasOne(Events::class, 'id_event', 'event_id');
    }
}
