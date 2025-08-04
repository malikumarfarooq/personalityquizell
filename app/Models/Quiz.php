<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'is_active'];

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
        return $this->questions()->whereHas('activeOptions');
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
        // Or whatever condition makes a quiz "active"
    }

}
