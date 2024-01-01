<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Định nghĩa trường để lưu trữ mã sách
    protected $fillable = ['book_code', 'name', 'publisher_id', 'category_id', 'condition_id', 'quantity'];


    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, Composed::class, 'book_id', 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function condition(): BelongsTo
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }

    public function publishingCompany(): BelongsTo
    {
        return $this->belongsTo(PublishingCompany::class, 'publisher_id');
    }

    public static function countBorrows()
    {
        return DB::table('books')
            ->select('books.id', 'books.name', DB::raw('COUNT(borrows.id) as borrow_count'))
            ->leftJoin('borrows', 'books.id', '=', 'borrows.book_id')
            ->groupBy('books.id', 'books.name')
            ->get();

    }



}
