<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_game';

    protected $fillable =  [ "game_name", "game_image", "game_category_id"  ];

    // with game category
    public function category()
    {
        return $this->hasOne(Game_categories::class, 'id_game_category', 'game_category_id');
    }
}
