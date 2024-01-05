<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Reader extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['reader_code', 'name', 'phone', 'email', 'address', 'gender', 'year_birth'];

    public function loanSlips()
    {
        return $this->hasMany(LoanSlip::class, 'reader_id');
    }
    // Phương thức để lấy danh sách sách đang mượn

    /**
     * Define a many-to-many relationship with the Book model
     * through the Borrow model to get borrowed books.
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'borrow', 'reader_id', 'book_id');
    }

}
