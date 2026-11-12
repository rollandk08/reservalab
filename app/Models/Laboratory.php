<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Laboratory extends Model
{
    protected $fillable = ['code', 'name', 'description', 'capacity', 'location', 'is_active',];

    protected function casts():array
    {
        return ['capacity' => 'integer', 'is_active' => 'boolean',];
    }

    public function reservations(): HasMany{
        return $this->hasMany(Reservation::class);
    }

}
