<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = "films";
    protected $fillable = ["title", "year", "summary", "poster", "genre_id"];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
