<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management_inv_squads extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_management_inv_squad';

    protected $fillable =  ["management_id", "squad_id"];

    public function squad()
    {
        return $this->hasOne(Squads::class, 'id_squad', 'squad_id');
    }
}
