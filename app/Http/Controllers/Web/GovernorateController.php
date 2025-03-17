<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use Yajra\DataTables\Facades\DataTables;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      if ($request->ajax()) {
            $governorates = Governorate::select(['id', 'name'])->latest();

            return DataTables::of($governorates)
                ->addIndexColumn()
                ->addColumn('action', function ($governorate) {
                    return '
                        <a href="' . route('admin.governorates.edit', $governorate->id) . '" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-xs btn-danger delete-btn" data-id="' . $governorate->id . '"><i class="fas fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('governorate.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('governorate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
     {
         $validated = $request->validate([
             'name' => ['required', 'unique:governorates,name']
         ]);

         try {
             Governorate::create([
                 'name' => $validated['name']
             ]);

             return redirect()->route('admin.governorates.index')
                              ->with('success', 'Governorate created successfully!');
         } catch (\Exception $e) {
             return redirect()->back()
                              ->withInput()
                              ->with('error', 'Failed to create governorate. Please try again.');
         }
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $governorate = Governorate::findOrFail($id);

      return view('governorate.edit', compact('governorate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $validated = $request->validate([
                'name' => ['required', 'unique:governorates,name,' . $id]
            ]);

          $governorate = Governorate::findOrFail($id);

          try {
                $governorate->update([
                    'name' => $validated['name']
                ]);

                return redirect()->route('admin.governorates.index')
                                ->with('success', 'Governorate updated successfully!');
            } catch (\Exception $e) {
                return redirect()->back()
                                ->withInput()
                                ->with('error', 'Failed to update governorate: ' . $e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $governorate = Governorate::findOrFail($id);
            $governorate->delete();
            return response()->json(['success' => 'Governorate deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete governorate: ' . $e->getMessage()], 500);
        }
    }
}
