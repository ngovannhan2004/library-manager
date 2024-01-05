<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LoanSlip extends Model
{
    use HasFactory;

    protected $guarded = [];




    public function reader(): BelongsTo
    {
        return $this->belongsTo(Reader::class, 'reader_id');
    }

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, Borrow::class, 'loan_slip_id', 'book_id');
    }

    public static function countUniqueReaders()
    {
       return self::query()->distinct('reader_id')->count('reader_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function borrow()
    {
        return $this->hasMany(Borrow::class, 'loan_slip_id');
    }






}
