<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher()
    {
       return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function taskAssignee()
    {
       return $this->hasMany(taskAssignee::class, 'task_id');
    }


}
