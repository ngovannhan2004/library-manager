<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'namsinh',
        'sdt',
        'gender',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function details(): BelongsTo
    {
        return $this->belongsTo(UserDetail::class, 'id_user');
    }



    public function isAdmin()
    {
        return $this->role == 'admin';
    }
    public function getParent()
    {
        $permissions = $this->permissions();
        $parent = [];
        foreach ($permissions as $permission){

            $parent_name = strtolower($permission->permissionCategory->slug);
            if(!in_array($parent_name,$parent)){
                $parent[] = $parent_name;
            }
        }
        return $parent;
    }
    public function checkAllow($value)
    {
        if ($this->isAdmin()){
            return true;
        }

    }

}