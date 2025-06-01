<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cv_id',
        'job_title',
        'company',
        'start_date',
        'end_date',
        'location',
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
     * Get the CV that owns the experience.
     */
    public function cv()
    {
        return $this->belongsTo(CV::class);
    }

    /**
     * Check if this is a current job (no end date)
     */
    public function getCurrentAttribute(): bool
    {
        return is_null($this->end_date);
    }

    /**
     * Get formatted duration (e.g., "Jan 2020 - Present" or "Jan 2020 - Dec 2022")
     */
    public function getFormattedDurationAttribute(): string
    {
        $start = $this->start_date->format('M Y');
        $end = $this->current ? 'Present' : $this->end_date->format('M Y');
        
        return "{$start} - {$end}";
    }
}
