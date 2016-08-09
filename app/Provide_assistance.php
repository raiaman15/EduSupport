<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provide_assistance extends Model
{
    protected $table = 'provide_assistances';

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
