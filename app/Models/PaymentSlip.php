<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'borrowed_days',
        'returnd_days',
        'violated'
    ];

    protected $guarded = [];


    public function books(){
        return $this->belongsToMany(Book::class, Borrow::class,'payment_slip_id','book_id');
    }

    public function readers(){
        return $this->belongsToMany(Readers::class, Borrow::class,'payment_slip_id','reader_id');
    }
}
