<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maxmin_temp extends Model
{
    use HasFactory;

    protected $fillable = [
        'max_temp',
        'min_temp',
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
