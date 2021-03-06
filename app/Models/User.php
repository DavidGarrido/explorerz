<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function roles () {
        return $this->belongsToMany('App\Models\Role')->withTimesTamps();
    }
    public function havePermission($permission){
        foreach($this->roles as $role)
        {
            if ($role['full-access'] === 'Yes') {
                return true;
            }
            foreach($role->permissions as $perm){
                if ($perm->slug == $permission) {
                    return true;
                }
            }
        }
        return false;
    }
    public function courses (){
        return $this->belongsToMany('App\Models\Course')->orderBy('id', 'DESC')->withTimestamps();
    }
    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function parent(){
        return $this->belongsTo(User::class, 'parent_id');
    }
    public function children(){
        return $this->hasMany(User::class, 'parent_id');
    }
    public function usertable(){
        return $this->morphTo();
    }
    
    public function request()
    {
        return $this->hasMany(Request::class);
    }
    
    public function evidences()
    {
        return $this->hasMany(Evidence::class);
    }
    
    
}
