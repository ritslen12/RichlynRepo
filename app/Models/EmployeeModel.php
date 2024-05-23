<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'phone',
    ];
}
