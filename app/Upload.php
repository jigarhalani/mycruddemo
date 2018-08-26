<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Upload extends Authenticatable
{
    use Notifiable;

    public $table="images";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imagename', 'user_id', 'imagesize',
    ];


}
