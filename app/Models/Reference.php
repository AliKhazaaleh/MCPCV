<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cv_id',
        'name',
        'position',
        'company',
        'email',
        'phone',
        'relation'
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
     * Get the CV that owns the reference.
     */
    public function cv()
    {
        return $this->belongsTo(CV::class);
    }

    /**
     * Get the full title (position at company)
     */
    public function getFullTitleAttribute(): string
    {
        return "{$this->position} at {$this->company}";
    }

    /**
     * Check if the reference has contact information
     */
    public function getHasContactInfoAttribute(): bool
    {
        return !empty($this->email) || !empty($this->phone);
    }

    /**
     * Get available contact methods as array
     */
    public function getContactMethodsAttribute(): array
    {
        $methods = [];
        
        if (!empty($this->email)) {
            $methods['email'] = $this->email;
        }
        
        if (!empty($this->phone)) {
            $methods['phone'] = $this->phone;
        }
        
        return $methods;
    }
}
