<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'publisher_id',
        'category_id',
        'status_id',
    ];
    protected $guarded = [];


    public function authors(){
        return $this->belongsToMany(Author::class,Composed::class,'book_id','author_id');
    }

  public function payment_slips(){
    return $this->belongsToMany(PaymentSlip::class, Pay::class,'book_id','payment_slip_id');
  }

  public function loan_slips(){
    return $this->belongsToMany(LoanSlip::class, Borrow::class,'book_id','loan_slip_id');
  }

}
