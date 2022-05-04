<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prevision extends Model
{
    use HasFactory;   
    
    protected $fillable = [
        'max_temp',
        'low_temp',
        'clouds',
        'icon',
        'wind_dir',
        'humidity',
        'snow',
        'wind_spd',
        'datetime',
        'created_at',
    ];

    const UPDATED_AT = null;

    public function setUpdatedAt($value): self
    {
        // Do nothing.
        return $this;
    }

    public function getUpdatedAtColumn()
    {
        return null;
    }

}
