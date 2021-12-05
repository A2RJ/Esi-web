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

    protected $fillable =  [ "id_event", "game_id", "user_id", "event_name", "event_image", "slot", "pricepool", "detail", "peraturan", "start", "end", "created_at", "updated_at",  ];
}
