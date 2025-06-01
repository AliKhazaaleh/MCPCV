<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cv_id',
        'description',
        'url'
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
     * Get the CV that owns the certificate.
     */
    public function cv()
    {
        return $this->belongsTo(CV::class);
    }

    /**
     * Check if the certificate has a URL
     */
    public function getHasUrlAttribute(): bool
    {
        return !empty($this->url);
    }

    /**
     * Get formatted URL (removes http:// or https:// for display)
     */
    public function getFormattedUrlAttribute(): ?string
    {
        if (!$this->has_url) {
            return null;
        }
        
        return preg_replace('#^https?://#', '', $this->url);
    }
}
