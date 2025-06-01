<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CVExport extends Model
{
    /**
     * Available export types
     */
    const TYPE_PDF = 'PDF';
    const TYPE_DOCX = 'DOCX';
    const TYPE_PRINT = 'Print';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cv_id',
        'exported_at',
        'export_type',
        'template_id',
        'user_agent',
        'ip_address'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'exported_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get all available export types
     */
    public static function getExportTypes(): array
    {
        return [
            self::TYPE_PDF,
            self::TYPE_DOCX,
            self::TYPE_PRINT
        ];
    }

    /**
     * Get CV ID (even though there's no relationship, this helps with type hinting)
     */
    public function getCvIdAttribute($value): int
    {
        return (int) $value;
    }

    /**
     * Get Template ID (even though there's no relationship, this helps with type hinting)
     */
    public function getTemplateIdAttribute($value): ?int
    {
        return $value ? (int) $value : null;
    }
}
