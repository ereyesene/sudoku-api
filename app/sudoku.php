<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sudoku extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'solution', 'to_solve',
    ];
}
