<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birthday', 'age', 'employment_status_id'];

    public function employmentStatus()
    {
        return $this->belongsTo(EmploymentStatus::class);
    }
}
