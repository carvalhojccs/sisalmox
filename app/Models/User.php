<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    
    public function papeis()
    {
        return $this->belongsToMany(Papel::class);
    }
    
    public function temPermissao(Permissao $permissao) 
    {
	    	return $this->temAlgumPapel($permissao->papeis);
    }
        
    public function temAlgumPapel($papeis) 
    {
	if(is_array($papeis) || is_object($papeis))
	{
		foreach ($papeis as $papel)
		{
			return !! $papeis->intersect($this->papeis)->count();
		}
	}
	return $this->papeis->contains('nome',$papeis);
    }
}
