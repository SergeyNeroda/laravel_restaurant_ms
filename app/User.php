<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id','created_at',
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

    //встановлюю зв'язок багато до багатьох з таблицею ролей
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // //перевіряю чи користувач адміністратор
    public function isAdmin()
    {
        return $this->role->name == 'admin';
    }

    //перевіряю чи користувач офіціант
    public function isWaiter()
    {
        return $this->role->name ==  'waiter';
    }
    //перевіряю чи користувач кухар
    public function isCook()
    {
        return $this->role->name ==  'cook';
    }
    //зв'язок з таблицею покупок
    public function orders () {
      return $this->hasMany('App\Order');
    }
    //онлайн
    public function isOnline() {
      return Cache::has('user-is-online-'.$this->id);
    }
}
