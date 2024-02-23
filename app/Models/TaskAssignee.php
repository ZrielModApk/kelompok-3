<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(student::class, 'student_id');
    }

    public function task()
    {
        return $this->belongsTo(task::class, 'task_id');
    }
}
