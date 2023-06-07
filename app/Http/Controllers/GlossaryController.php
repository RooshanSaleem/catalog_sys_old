<?php

namespace App\Http\Controllers;

use App\Models\Glossary;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as IlluminateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        return view('glossary', compact('languages', 'glossaryItems', 'current_user'));
    }

    public function edit($id)
    {
        $current_user = Auth::user();
        $glossaryItem = Glossary::where('item_id', $id)->first();
        $glossaryItem->languages = Glossary::where('item_id', $id)->select('language_id', 'item_name')->get()->toArray();
        $languages = Language::all();
        return view('glossaryEdit', compact('glossaryItem', 'languages', 'current_user'));
    }

    public function update(IlluminateRequest $request, $id)
    {
        $request->validate([
            'language_id' => 'required',
            'item_name' => 'required',
        ]);
        $itemId = $request->input('item_id');
        $itemNames = $request->input('item_name');
        $languageIds = $request->input('language_id');

        // Check if the number of item names and language IDs match
        if (count($itemNames) !== count($languageIds)) {
            return back()->with('error', 'Write the value for each language.');
        }

        // Create glossary entries for each language
        foreach ($languageIds as $index => $languageId) {
            Glossary::updateOrCreate(
                ['item_id' => $itemId, 'language_id' => $languageId],
                ['item_name' => $itemNames[$index]]
            );
        }

        return redirect()->route('glossary')->with('success', 'Glossary item updated successfully');
    }


    public function create()
    {
        $glossaryItemNew = new Glossary(); // Create a new empty glossary object
        $languages = Language::all();
        $current_user = Auth::user();
        $lastItemId = DB::table('glossary')->max('item_id'); // finding the last item_id
        return view('glossaryEdit', compact('current_user', 'glossaryItemNew', 'languages', 'lastItemId'));
    }

    public function store(IlluminateRequest $request)
    {
        // Retrieve the values from the request
        $itemId = $request->input('item_id');
        $itemNames = $request->input('item_name');
        $languageIds = $request->input('language_id');

        // Check if the number of item names and language IDs match
        if (count($itemNames) !== count($languageIds)) {
            return back()->with('error', 'Write the value for each language.');
        }

        // Create glossary entries for each language
        foreach ($languageIds as $index => $languageId) {
            Glossary::create([
                'item_id' => $itemId,
                'item_name' => $itemNames[$index],
                'language_id' => $languageId,
            ]);
        }

        // Validate the form input that Italian value is unique
        $validator = Validator::make($request->all(), [
            'item_id' => 'required',
            'item_name.*' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $languageId = 1;
                    $duplicateCount = DB::table('glossary')
                        ->where('item_name', $value)
                        ->where('language_id', $languageId)
                        ->count();

                    if ($duplicateCount > 0) {
                        $fail("The $attribute with value '$value' already exists for language_id = $languageId.");
                    }
                },
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return redirect()->route('glossary')->with('success', 'Glossary item add successfully.');
    }

}