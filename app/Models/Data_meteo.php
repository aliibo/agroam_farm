<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_meteo extends Model
{
    use HasFactory;

    protected $fillable = [
        'humidite',
        'vitesse',
        'pluie',
        'temperature',
        'direction',
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
