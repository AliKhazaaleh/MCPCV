<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cv_id',
        'text',
        'level'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'level' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Skill level constants
     */
    const LEVEL_BEGINNER = 1;
    const LEVEL_MID = 2;
    const LEVEL_PRO = 3;
    const LEVEL_EXPERT = 4;

    /**
     * Get the CV that owns the skill.
     */
    public function cv()
    {
        return $this->belongsTo(CV::class);
    }

    /**
     * Get the level description
     */
    public function getLevelDescriptionAttribute(): string
    {
        return match($this->level) {
            self::LEVEL_BEGINNER => 'Beginner',
            self::LEVEL_MID => 'Mid',
            self::LEVEL_PRO => 'Pro',
            self::LEVEL_EXPERT => 'Expert',
            default => 'Unknown'
        };
    }
}
