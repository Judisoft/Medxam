<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;

     // Table Name
     protected $table  = 'questions';
     // Primary Key
     public $primaryKey = 'id';
     //Time Stamps
     public $timestamps = true;

    protected $fillable = [
        'content',
        'A',
        'B',
        'C',
        'D',
        'answer',
        'subject',
        'title',
        'year',
    ];

    public function  user()
    {
       return $this->belongsTo(User::class);
    }
}
