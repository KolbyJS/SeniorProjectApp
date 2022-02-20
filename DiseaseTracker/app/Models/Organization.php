<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'leader_id', 'organization_name'
    ];

    /**
     * Cesar: This function establishes the relationship that
     * each organization has one owner 
     */
    public function owner(){
        return $this->hasOne(User::class, 'id', 'organization_id');
    }
}
