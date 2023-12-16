<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentSlip extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function pays(): HasMany
    {
        return $this->hasMany(Pay::class, 'payment_slip_id');
    }

    public function reader(): BelongsTo
    {
        return $this->belongsTo(Reader::class, 'reader_id');
    }

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, Pay::class, 'payment_slip_id', 'book_id');
    }


}
