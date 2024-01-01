<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reader extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['reader_code', 'name', 'phone', 'email', 'address', 'gender', 'year_birth'];

//    protected static function boot()
//    {
//        parent::boot();
//        static::creating(function ($book) {
//            $book->reader_code = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6)); // Tạo mã  ngẫu nhiên có 6 ký tự
//        });
//    }

    public function loanSlips(): HasMany
    {
        return $this->hasMany(LoanSlip::class, 'reader_id');
    }

    /**
     * Define a many-to-many relationship with the Book model
     * through the Borrow model to get borrowed books.
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'borrow', 'reader_id', 'book_id');
    }

}
