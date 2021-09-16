<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicants';
    public $timestamps = true;

    protected $fillable = [
        'firstname',
        'surname',
        'age',
        'category',
        'email',
        'about',
        'file'
    ];
}
