<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable=[
        'semeseter',
        'branch',
        'regno',
        'exam',
        'mark1',
        'mark2',
        'mark3',
        'mark4',
        'mark5',
        'mark6',
        
        
    ];
}
