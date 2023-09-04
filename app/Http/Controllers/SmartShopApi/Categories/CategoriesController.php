<?php

namespace App\Http\Controllers\SmartShopApi\Categories;

use App\ApiTrait\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Categories = Category::all();

        return $this->returnData('categories', $Categories, 'Categories successfully retrieved');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        //Validation data before Add
        $validator = Validator::make($request->all(), [
            'id' => 'required',
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
    public function destroy(Request $request)
    {
        //
        //Validation data before update
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        //if any errors for validate show this error
        if ($validator->fails())
            return $this->returnError('404', $validator->errors());

        //data selected for deleted
        Category::find($request->id)->delete();

        //return success msg
        return $this->returnSuccessMessage('200', 'Category successfully deleted');

    }
}
