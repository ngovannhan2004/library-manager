<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

}
