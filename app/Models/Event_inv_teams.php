<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_inv_teams extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_event_inv_teams';

    protected $fillable =  [ "id_event_int_teams", "event_id", "squad_id", "created_at", "updated_at",  ];
}
