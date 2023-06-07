<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request as IlluminateRequest;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function index()
    {
        // Retrieve and return all glossary items
        $allLanguages = Language::all();
        $current_user = Auth::user();
        return view('languages', compact('allLanguages', 'current_user'));
    }
    public function create()
    {
        $current_user = Auth::user();
        return view('languagesAdd', compact('current_user'));
    }

    public function store(IlluminateRequest $request)
    {
        $request->validate([
            'language' => 'required|string|max:255',
        ]);

        Language::create([
            'language' => $request->language,
        ]);

        return redirect()->route('glossary')->with('success', 'Language added successfully!');
    }
}
