<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'is_active', 'status', 'duration', 'passing_score'];

    protected $casts = [
        'is_active' => 'boolean',
        'duration' => 'integer',
        'passing_score' => 'integer',
    ];

    // Fix the status attribute accessor
    public function getStatusAttribute($value)
    {
        // If is_active is false and status was active, show as archived
        if (!$this->is_active && $value === 'active') {
            return 'archived';
        }
        return $value ?? 'draft';
    }

    // Add this method to get status badge class
    public function getStatusBadgeAttribute()
    {
        $status = $this->status;

        $badges = [
            'active' => 'bg-success',
            'draft' => 'bg-warning text-dark',
            'archived' => 'bg-secondary'
        ];

        return $badges[$status] ?? 'bg-secondary';
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class)->orderBy('order');
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    public function activeQuestions(): HasMany
    {
        return $this->questions()->where('is_active', true);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
