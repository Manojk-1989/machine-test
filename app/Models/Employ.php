<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employ extends Model
{
    use HasFactory;
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employs';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'company_id', 'mobile_number', 'image', 'join_date', 'created_by', 'created_at', 'updated_by', 'updated_at', 'country'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
