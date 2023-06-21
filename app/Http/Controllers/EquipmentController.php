<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Http\Request as IlluminateRequest;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all();
        $current_user = Auth::user();

        return view('equipments', compact('current_user'), compact('equipments'));

    }

    public function edit(Equipment $equipment)
    {
        $current_user = Auth::user();
        return view('equipmentEdit', compact('equipment'), compact('current_user'));
    }


    public function update(IlluminateRequest $request, Equipment $equipment)
    {
        $validatedData = $request->validate([
            'code' => 'required|string',
            'short_description' => 'required|string',
            'detailed_description' => 'required|string',
            'price' => 'required|numeric',
            'unite_for_sale' => 'required|numeric',
            'validity_starts' => 'date',
            'validity_ends' => 'date',

        ]);

        $equipment->update($validatedData);

        return redirect()->route('equipments')->with('success', 'Equipment updated successfully');
    }

    public function destroy($id)
    {
        //$equipment->delete();
        Equipment::where('id', $id)->delete();

        return response()->json(['success' => true, 'message' => 'Equipment deleted successfully.']);
    }
}
