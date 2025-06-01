<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cv_id',
        'name',
        'level',
        'certificate',
        'link'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Predefined language levels
     */
    const LEVEL_BASIC = 'Basic';
    const LEVEL_INTERMEDIATE = 'Intermediate';
    const LEVEL_ADVANCED = 'Advanced';
    const LEVEL_FLUENT = 'Fluent';
    const LEVEL_NATIVE = 'Native';

    /**
     * Get all available language levels
     */
    public static function getAvailableLevels(): array
    {
        return [
            self::LEVEL_BASIC,
            self::LEVEL_INTERMEDIATE,
            self::LEVEL_ADVANCED,
            self::LEVEL_FLUENT,
            self::LEVEL_NATIVE
        ];
    }

    /**
     * Get the CV that owns the language.
     */
    public function cv()
    {
        return $this->belongsTo(CV::class);
    }

    /**
     * Check if the language has a certificate
     */
    public function getHasCertificateAttribute(): bool
    {
        return !empty($this->certificate);
    }

    /**
     * Check if the language has a certificate link
     */
    public function getHasLinkAttribute(): bool
    {
        return !empty($this->link);
    }

    /**
     * Get formatted URL (removes http:// or https:// for display)
     */
    public function getFormattedLinkAttribute(): ?string
    {
        if (!$this->has_link) {
            return null;
        }
        
        return preg_replace('#^https?://#', '', $this->link);
    }
}
