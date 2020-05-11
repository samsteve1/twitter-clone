<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = ['body'];
    /**
     * Tweets user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
