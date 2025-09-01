<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class AISetting extends Model
{
    protected $table = 'ai_settings';
    protected $fillable = [
        'openai_api_key',
        'default_language',
        'free_analysis_prompt',
        'premium_analysis_prompt'
    ];

    // Encrypt API key when setting it
    public function setOpenaiApiKeyAttribute($value)
    {
        $this->attributes['openai_api_key'] = $value ? Crypt::encryptString($value) : null;
    }

    // Decrypt API key when retrieving it
    public function getOpenaiApiKeyAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }

    // Get singleton instance
    public static function getSettings()
    {
        $settings = self::first();
        if (!$settings) {
            $settings = self::create();
        }
        return $settings;
    }
}
