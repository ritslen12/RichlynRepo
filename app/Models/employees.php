<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    protected $table = '_employeetbl';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'midlle_name',
        'last_name',
        'birthday',
    ];
}
