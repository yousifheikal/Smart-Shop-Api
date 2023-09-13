<?php

namespace App\Http\Controllers\SmartShopApi\Categories;

use App\Models\Category;
use Illuminate\Http\Request;
use App\ApiTrait\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Product\ProductCollection;

class CategoriesController extends Controller
{
    use GeneralTrait;


    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show', 'showByCategory', 'getSingleCategory');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Categories = Category::all();

        return  CategoryResource::collection($Categories);
    }

    public function getSingleCategory($id)
    {
        //
        $Category = Category::where('id', $id)->first();

        return $this->returnData('Category', $Category, 'Category successfully retrieved');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //Validation data before Add
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
        ]);

        //if any errors for validate show this error
        if ($validator->fails())
            return $this->returnError('404', $validator->errors());

        Category::create([
           'name' => $request->name,
        ]);

        return $this->returnSuccessMessage('200', 'Category successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        //Validation data before Add
        $validator = Validator::make($request->all(), [
            // 'id' => 'required',
            'name' => 'required|max:100'
        ]);

        //if any errors for validate show this error
        if ($validator->fails())
            return $this->returnError('404', $validator->errors());

        $category = Category::find($request->id);

        $category->update([
           'name' => $request->name,
        ]);
        return $this->returnSuccessMessage('200', 'Category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //data selected for deleted
        Category::findOrfail($id)->delete();

        //return success msg
        return $this->returnSuccessMessage('200', 'Category successfully deleted');

    }

    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products;
        return  ProductCollection::collection($products);

        return response()->json($products);
    }
}
