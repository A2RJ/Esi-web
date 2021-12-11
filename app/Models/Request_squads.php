<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_squads extends Model
{
    use HasFactory;

    // table name
    protected $table = 'request_squads';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_request_squad';

    protected $fillable =  ["player_id", "squad_id", "status", ];
}
