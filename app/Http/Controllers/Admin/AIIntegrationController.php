<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AISetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AIIntegrationController extends Controller
{
    public function index()
    {
        $settings = AISetting::getSettings();
        return view('admin.ai-integration.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'openai_api_key' => 'nullable|string',
            'default_language' => 'required|string|max:50',
            'free_analysis_prompt' => 'required|string',
            'premium_analysis_prompt' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $settings = AISetting::getSettings();

        // Only update API key if a new one was provided
        $data = $request->only(['default_language', 'free_analysis_prompt', 'premium_analysis_prompt']);
        if ($request->filled('openai_api_key')) {
            $data['openai_api_key'] = $request->openai_api_key;
        }

        $settings->update($data);

        return redirect()->route('admin.ai-integration.index')
            ->with('success', 'AI settings updated successfully!');
    }
}
