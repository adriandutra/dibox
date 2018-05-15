<?php

namespace Diboxadmin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'crm_user';
    
    protected $primary = 'i_user';
    
    public $timestamps = false;
    
    protected $fillable = [
        'i_parent',
        'user', 
        'fullname', 
        'email', 
        'i_country', 
        'phone', 
        'password', 
        'expiration_date', 
        'expiration_flag', 
        'last_update', 
        'acitve', 
        'trash',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
