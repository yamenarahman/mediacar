<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    protected $appends = ['hours', 'allHours'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope('hours', function (Builder $builder) {
    //         $builder->count();
    //     });
    // }

    public function information()
    {
        return $this->hasOne(Information::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function getAllHoursAttribute()
    {
        $hours = floor($this->shifts()->sum('minutes') / 60);
        $minutes = ($this->shifts()->sum('minutes') % 60);

        return $hours.' hours, '.$minutes.' minutes.';
    }

    public function getHoursAttribute()
    {
        return floor($this->shifts()->sum('minutes') / 60);
    }
}
