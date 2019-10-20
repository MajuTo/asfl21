<?php

namespace App;

use App\Notifications\InscriptionEmail;
use App\Notifications\VerifyEmail;
use Eloquent;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 * @mixin Eloquent
 */
class User extends Authenticatable implements CanResetPassword, MustVerifyEmail
{
    use Notifiable, \Illuminate\Auth\Passwords\CanResetPassword, \Illuminate\Auth\MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'firstname', 'username', 'password', 'email', 'hideEmail', 'mobile', 'hideMobile', 'description', 'group_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendInscriptionEmail()
    {
        $this->notify(new InscriptionEmail);
    }

    /**
     * Return true if user has to change his password, false either.
     *
     * @return bool
     */
    public function hasToChangePassword()
    {
        return (bool) ! $this->loggedOnce;
    }
}
