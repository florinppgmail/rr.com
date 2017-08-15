<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;


class CategoryController extends Controller
{
    public function index(){
        return view('admin.categories.index');
    }

    public function all(){
        $categories = (new Category())->orderBy('created_at', 'desc')->get()->map(function ($item){
            $rootCategory = $item->category()->get();

            $item->subcategories = $item->subcategories()->count();
            //$item->created_at = date("F j, Y", strtotime($item->created_at));
            $item->root_category = count($rootCategory) ? $rootCategory[0] : null;

            return $item;
        });

        return response()->json($categories, 200);
    }

    public function store(StoreCategory $request){
        Category::create($request->all());

        return response()->json(['Category created.'], 200);
    }

    public function update(StoreCategory $request, $id){
        if($cat = Category::find($request->input('id'))){
            $cat->fill($request->all());
            $cat->save();
        }

        return response()->json(['Category with id ' . $id . ' updated.'], 200);
    }
}
