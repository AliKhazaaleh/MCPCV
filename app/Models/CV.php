<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'job_title',
        'summary',
        'email',
        'phone',
        'linkedin',
        'github',
        'dob',
        'nationality',
        'address',
        'profile_photo',
        'stack_overflow',
        'is_deleted'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dob' => 'date',
        'is_deleted' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the user that owns the CV.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the skills for the CV.
     */
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * Get the experiences for the CV.
     */
    public function experiences()
    {
        return $this->hasMany(Experience::class)->orderBy('start_date', 'desc');
    }

    /**
     * Get the education records for the CV.
     */
    public function educations()
    {
        return $this->hasMany(Education::class)->orderBy('end_date', 'desc');
    }

    /**
     * Get the projects for the CV.
     */
    public function projects()
    {
        return $this->hasMany(Project::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get the references for the CV.
     */
    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    /**
     * Get the languages for the CV.
     */
    public function languages()
    {
        return $this->hasMany(Language::class);
    }

    /**
     * Get the courses for the CV.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Get the certificates for the CV.
     */
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    /**
     * Get the awards for the CV.
     */
    public function awards()
    {
        return $this->hasMany(Award::class);
    }

    /**
     * Get the publications for the CV.
     */
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
