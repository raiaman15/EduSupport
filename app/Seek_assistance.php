<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seek_assistance extends Model
{
    protected $table = 'seek_assistances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'subject', 'description', 'filename', 'file_count', 'country', 'university', 'course',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
