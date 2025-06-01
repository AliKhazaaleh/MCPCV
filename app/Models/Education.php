<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cv_id',
        'degree',
        'school',
        'start_date',
        'end_date',
        'description'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the CV that owns the education.
     */
    public function cv()
    {
        return $this->belongsTo(CV::class);
    }

    /**
     * Get formatted duration (e.g., "2018 - 2022")
     */
    public function getFormattedDurationAttribute(): string
    {
        $start = $this->start_date->format('M Y');
        $end = $this->end_date->format('M Y');
        
        return "{$start} - {$end}";
    }
}
