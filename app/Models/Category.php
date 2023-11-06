<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category  extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'parent_id'];
    use SoftDeletes;

    public function parent(): HasOne
{
    return $this->hasOne(Category::class, 'id_category', 'parent_id');
}
    public function children(): HasMany
{
    return $this->hasMany(Category::class, 'parent_id', 'id_category');
}


}
