<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'attendance_date_id',
        'user_id',
        'status',
        'date'
    ];

    public function attendance_dates() : BelongsTo
    {
        return $this->belongsTo(AttendanceDate::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
