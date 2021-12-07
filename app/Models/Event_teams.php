<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_teams extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_event_teams';

    protected $fillable =  ["event_id", "squad_id", "ispaid"];

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
