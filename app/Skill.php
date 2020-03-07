<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Skill extends Model
{
    protected $fillable = [
        'name', 'level', 'category', 'slug', 'description'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function (Skill $skill) {
            $skill->slug = Str::slug($skill->name);
        });

        static::updating(function (Skill $skill) {
            $skill->slug = Str::slug($skill->name);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopefrontEnd(Builder $builder)
    {
        return $builder->where('category', '=', 'frontend');
    }

    public function scopebackEnd(Builder $builder)
    {
        return $builder->where('category', '=', 'backend');
    }

    public function scopedevops(Builder $builder)
    {
        return $builder->where('category', '=', 'devops');
    }

    public function scopetools(Builder $builder)
    {
        return $builder->where('category', '=', 'tools');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

}
