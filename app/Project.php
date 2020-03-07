<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'website',
        'githubUrl',
        'description',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function (Project $project) {
            $project->slug = Str::slug($project->name);
        });

        static::updating(function (Project $project) {
            $project->slug = Str::slug($project->name);
        });
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
