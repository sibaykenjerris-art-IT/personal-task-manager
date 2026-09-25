<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //task model
    //so this are the fields that allow Task::create() to fill it
    protected $fillable = 
    [
        'task_name',
        'discription',
        'status',
        'due_date',
    ];
}
