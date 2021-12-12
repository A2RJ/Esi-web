<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_managements extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_request_management';

    protected $fillable =  ["squad_id", "management_id", "status"];

    // hasOne squads
    public function squad()
    {
        return $this->hasOne(Squads::class, 'id_squad', 'squad_id');
    }

    // hasOne management
    public function management()
    {
        return $this->hasOne(Managements::class, 'id_management', 'management_id');
    }
}
