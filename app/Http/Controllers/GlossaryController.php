<?php

namespace App\Http\Controllers;

use App\Models\Glossary;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as IlluminateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class GlossaryController extends Controller
{
    public function index()
    {
        // Retrieve and return all glossary items
        $glossaryItems = Glossary::all();
        $current_user = Auth::user();
        $languages = Language::all();
        return view('glossary', compact('languages', 'glossaryItems', 'current_user' ));
    }

    public function edit($id)
    {
        $current_user = Auth::user();
        $glossaryItem = Glossary::findOrFail($id);
        $languages = Language::all();

        return view('glossaryEdit', compact('glossaryItem', 'languages', 'current_user'));
    }

    public function update(IlluminateRequest $request, $id)
    {
        $glossaryItem = Glossary::findOrFail($id);

        $request->validate([
            'language_id' => 'required',
            'item_name' => 'required',
        ]);

        $glossaryItem->language_id = $request->input('language_id');
        $glossaryItem->item_name = $request->input('item_name');
        $glossaryItem->save();

        return redirect()->route('glossary')->with('success', 'Glossary item updated successfully');
    }
}
