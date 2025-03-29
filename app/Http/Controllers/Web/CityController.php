<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
 public function index(Request $request)
 {
     if ($request->ajax()) {
            $cities = City::with('governorate')->select('cities.*');

          return DataTables::of($cities)
                ->addIndexColumn()
                ->addColumn('governorate', function ($city) {
                    return $city->governorate ? $city->governorate->name : 'N/A';
             })
                ->addColumn('action', function ($city) {
                 return '
                        <a href="' . route('admin.cities.edit', $city->id) . '" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                     <button class="btn btn-xs btn-danger delete-btn" data-id="' . $city->id . '"><i class="fas fa-trash"></i></button>
                    ';
             })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('cities.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
     {
         $validated = $request->validate([
             'name' => ['required'],
             'governorate_id' => ['required', 'exist:governorates,id'],
         ]);

         try {
             City::create([
                 'name' => $validated['name'],
                 'governorate_id' => $validated['governorate_id'],
             ]);

             return redirect()->route('admin.cities.index')
                              ->with('success', 'City created successfully!');
         } catch (\Exception $e) {
             return redirect()->back()
                              ->withInput()
                              ->with('error', 'Failed to create city. Please try again.');
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
      $city = City::findOrFail($id);

      return view('cities.edit', compact('city'));
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
