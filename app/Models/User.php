<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime'
    ];

    public function role(){
       return $this->belongsTo(Role::class);
    }
    
    // scope example to get admin users only by roles relation

    // note : scopes are just methods in models but they

    public function scopeFilterByAdmin($query){
        return $query->whereHas('role',function($q){
              $q->where('name', 'Administrator');
        });
    }


    // search logic for users datatable as laravel local scope : this is dynamic scope

    public function scopeFilter($query, $search){

    // note: whereHas and orWhereHas to search related model data

    // note: learn about where clause logical grouping () brakets in sql        
      
       return $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhereHas('role', function($q) use ($search){
                    $q->where('name', 'LIKE', "%{$search}%");
                });
    }
}
