<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; 
    protected $table = 'companies';

    protected $fillable = [
        'company_name', 
        'company_description', 
        'company_logo', 
        'company_contact_number', 
        'annual_turnover', 
        'created_by', 
        'created_at', 
        'country',
        'updated_by', 
        'updated_at'
    ];

    public function employs()
    {
        return $this->hasMany(Employ::class, 'company_id');
    }
}
