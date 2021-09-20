<?php

namespace App\Http\Controllers;
use App\Models\Category;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view("admin.category.categories", [
            "categories"=>Category::all()
        ]);
    }

    public function create(){
        $data["main_cat"] = Category::where("parent_id",NULL)->get();
        return view("admin.category.insertCategory",$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'cat_title' => 'required',
            'description' => 'required',
        ]);

        $cat = new Category();
        $cat->cat_title = $request->cat_title;
        $cat->description = $request->description;
        $cat->parent_id = $request->input("parent_id",NULL);
        $cat->save();
        return redirect()->route('category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id){
        return view('admin.category.categoryEdit',[
            "category"=> Category::find($id),
            "main_cat" => Category::where("parent_id",NULL)->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cat_title' => 'required',
            'description' => 'required',
        ]);

        $cat = Category::find($id);
        $cat->cat_title = $request->cat_title;
        $cat->description = $request->description;
        $cat->parent_id = $request->input("parent_id",NULL);
        $cat->save();
        return redirect()->route('category.index');
    }

    public function destroy($id){
        $cat = Category::find($id);
        $cat->delete();
        return redirect()->back();
    }
}
