<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PublishingCompany extends Model
{
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'gender',

    ];
}
