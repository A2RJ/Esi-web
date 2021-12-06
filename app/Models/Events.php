<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_event';

    protected $fillable =  ["game_id", "user_id", "event_name", "event_image", "slot", "pricepool", "detail", "peraturan", "start", "end"];

    // event_teams
    public function event_teams()
    {
        return $this->hasMany(Event_teams::class, 'event_id', 'id_event');
    }

    // event_inv_teams
    public function event_inv_teams()
    {
        return $this->hasMany(Event_inv_teams::class, 'event_id', 'id_event');
    }

    // event_winners
    public function event_winners()
    {
        return $this->hasMany(Event_winners::class, 'event_id', 'id_event');
    }

    // owner
    public function owner()
    {
        return $this->hasOne(User::class, 'id_user', 'user_id');
    }

    // game
    public function game()
    {
        return $this->hasOne(Games::class, 'id_game', 'game_id');
    }
}
