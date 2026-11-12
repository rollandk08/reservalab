<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'laboratory_id', 'date', 'start_time', 'end_time', 'purpose', 'status', 'rejection_reason',];
    protected function casts(): array{
        return ['date' => 'date:Y-m-d',];
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function laboratory(): BelongsTo{
        return $this->belongsTo(Laboratory::class);
    }
}
