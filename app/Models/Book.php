<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Library;

class Book extends Model
{
    use HasFactory;

    public function library()
    {
        return $this->belongsTo(library::class);
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
