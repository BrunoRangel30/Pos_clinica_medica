<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role','user_roles');
    }

    public function hasAnyRole($roles){

       if( $this->roles()->whereIn('nome',$roles)->first()){
           return true;
       }
       else{
           return false;
       }
    }

    public function hasRole($roles){
        
        if( $this->roles()->where('nome',$roles)->first()){
            return true;
        }
        else{
            return false;
        }
     }

     public function paciente()
    {
        return $this->hasOne('App\Paciente','user_id');
    }

     public function getId($email){
        $user = User::select('id')
            ->where('email', '=', $email)
            ->first();
        return $user;
     }

     public function getUser($id){
        $user = User::where('id', '=', $id)
                ->first();
        return $user;
     }
}
