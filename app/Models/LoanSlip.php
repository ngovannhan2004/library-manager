<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'borrowed_days',
        'returnd_days'

    ];
    protected $guarded = [];

    public function books(){
        return $this->belongsToMany(Book::class, Borrow::class,'loan_slip_id','book_id');
    }

    public function readers(){
        return $this->belongsToMany(Readers::class, Borrow::class,'loan_slip_id','reader_id');
    }
}
