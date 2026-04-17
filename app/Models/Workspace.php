<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workspace extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
        'teacher_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_workspace', 'workspace_id', 'student_id')
            ->withPivot('joined_at')
            ->withTimestamps();
    }

    public function chatMessages()
    {
        return $this->hasMany(ChatMessage::class)->latest();
    }
}
