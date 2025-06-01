<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CVTemplate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime'
    ];

    /**
     * Get the CVs that use this template.
     */
    public function cvs()
    {
        return $this->hasMany(CV::class, 'template_id');
    }
}
