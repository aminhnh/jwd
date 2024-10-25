<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeasiswaRegistration extends Model
{
    /** @use HasFactory<\Database\Factories\BeasiswaRegistrationFactory> */
    use HasFactory;
    
    protected $table = 'beasiswa_registrations';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone_number',
        'semester',
        'ipk',
        'jenis_pilihan_beasiswa',
        'file_path',
        'status_ajuan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}