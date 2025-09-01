<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'text',
        'type',
        'order',
        'is_required'
    ];

    protected $casts = [
        'is_required' => 'boolean',
    ];
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class)->orderBy('id');
    }

    public function activeOptions(): HasMany
    {
        return $this->options()->where('is_active', true);
    }

    // Helper method to get badge class for type
    public function getTypeBadgeAttribute()
    {
        $badges = [
            'multiple_choice' => 'bg-info',
            'checkbox' => 'bg-warning text-dark',
            'textarea' => 'bg-primary'
        ];

        return $badges[$this->type] ?? 'bg-secondary';
    }

    // Helper method to get required badge
    public function getRequiredBadgeAttribute()
    {
        return $this->is_required
            ? '<span class="badge bg-success">Required</span>'
            : '<span class="badge bg-secondary">Optional</span>';
    }
}
