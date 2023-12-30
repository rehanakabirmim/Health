<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',

        'specialty',
        'room_no',
    ];

    public function specialityInfo() {
        return $this->belongsTo('App\Models\Speciality', 'specialty_id', 'id');

    }
}
