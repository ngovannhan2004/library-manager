<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LoanSlip extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reader(): BelongsTo
    {
        return $this->belongsTo(Reader::class, 'reader_id');
    }

    public function borrows(): HasMany
    {
        return $this->hasMany(Borrow::class, 'loan_slip_id');
    }

    public function books()
    {
        return $this->hasManyThrough(Book::class, LoanSlip::class, Borrow::class, 'loan_slip_id', 'id', 'id');
    }

}
