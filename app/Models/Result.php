<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'answers',
        'title',
        'description',
        'traits',
        'min_score',
        'max_score',
        'image_path',
        'is_paid',
        'payment_id',
        'payment_amount',
        'paid_at',
        'premium_content'
    ];

    protected $casts = [
        'answers' => 'array',
        'traits' => 'array',
        'premium_content' => 'array',
        'paid_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
    public function scopeFree($query)
    {
        return $query->where('is_paid', false);
    }

    public function scopePremium($query)
    {
        return $query->where('is_paid', true);
    }

    public function getSectionIcon(string $section): string
    {
        $icons = [
            'career_paths' => 'briefcase',
            'relationship_insights' => 'heart',
            'growth_plan' => 'graph-up',
            'detailed_analysis' => 'search'
        ];

        return $icons[$section] ?? 'info-circle';
    }
}
