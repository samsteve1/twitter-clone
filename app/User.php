<?php

namespace App;

use App\Tweet;
use App\Follower;
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
        'name', 'email', 'password', 'username',
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
     * Return the user's avatar
     *
     * @return void
     */
    public function avatar()
    {
        return 'https://api.adorable.io/avatars/285/' . $this->username . 'png';
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'following_id');
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'user_id');
    }
    /**
     * Get tweet from users following
     *
     * @return void
     */
    public function tweetsFromFollowing()
    {
        return $this->hasManyThrough(
            Tweet::class, Follower::class, 'user_id', 'user_id', 'id', 'following_id'
        );
    }
}
