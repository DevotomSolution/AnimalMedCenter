<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appoiment extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'p_time',
        'p_date',
        'p_name',
        'p_appoiment_to',
        'p_doctor',
        'p_reason',
        'p_phone',
        'p_email',
        'p_status_appoiment',
        'p_gdpr_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     *
     * protected $hidden = [
     * ];

    **
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     *
     * protected function casts(): array
     * {
     * }
     */
}
