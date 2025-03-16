<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Resources\RestaurantResource;
use App\Http\Requests\Api\RestaurantIndexRequest;

class RestaurantController extends Controller
{
    private const PAGINATION = 5;

    public function index(RestaurantIndexRequest $request)
    {
        $validated = $request->validated();
      
        $search = trim($validated['search'] ?? '');
        $cityId = $validated['city_id'] ?? null;

        $restaurants = Restaurant::select([
            'id',
            'logo',
            'images',
            'name',
            'description',
            'delivery_fee',
            'rating',
            'open_time',
            'close_time',
            'location',
            'city_id',
            'category_id'
        ])
        ->when($search, fn($query) => $query->where('name', 'like', "%{$search}%"))
        ->when($cityId, fn($query) => $query->where('city_id', $cityId))
        ->latest()
        ->cursorPaginate(self::PAGINATION);

        if ($restaurants->isEmpty()) {
            apiResponse(false, 'المطعم غير موجود.', null, 404);
         }

         return apiResponse(true, 'تم جلب البيانات بنجاح.', RestaurantResource::collection($restaurants), 200);
    }
    public function show($id)
    {
      $restaurants = Restaurant::findOrFail($id);
    }
}
