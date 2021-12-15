<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Managements extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_management';

    protected $fillable =  ["user_id", "management_name", "management_image", "kontak", "web_url", "alamat"];

    // hasMany squads
    public function squads()
    {
        return $this->hasMany(Squads::class, 'management_id', 'id_management');
    }
}
