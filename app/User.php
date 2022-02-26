<?php

namespace App;

use App\Notifications\InscriptionEmail;
use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use Eloquent;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 * @mixin Eloquent
 */
class User extends Authenticatable implements CanResetPassword, MustVerifyEmail
{
    use Notifiable, \Illuminate\Auth\Passwords\CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'firstname', 'username', 'password', 'email', 'hideEmail', 'loggedOnce', 'mobile', 'hideMobile', 'description', 'group_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Return true if user has to change his password, false either.
     *
     * @return bool
     */
    public function hasToChangePassword(): bool
    {
        return (bool) ! $this->loggedOnce;
    }

    /**
     * Envoie l'email d'inscription, via le package Invytr
     */
    public function sendPasswordSetNotification ()
    {
        $this->notify(new InscriptionEmail());
    }

    /**
     * Envoie l'email de reset de mot de passe
     *
     * @param string $token
     */
    public function sendPasswordResetNotification ($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
