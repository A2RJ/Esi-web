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

    protected $fillable =  ["id_event_teams", "squad_id", "isfree", "ispaid", "created_at", "updated_at",];
}
