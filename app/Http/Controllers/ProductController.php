<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index(){
        return view('admin.product.products',[
            'products'=> Product::all()
        ]);
    }

    public function create(){
        return view("admin.product.insertProduct",[
            'categories' => Category::all()
        ]);
    }


    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'discount_price' => 'required',
            'price' => 'required',
            'descr' => 'required',
            'img1' => 'required',
            'brand' => 'required',
            'category_id' => 'required',
        ]);

        $file1 = $request->img1->getClientOriginalName();
        $file2 = $request->img2->getClientOriginalName();

        $request->img1->move(public_path("products"), $file1);
        $request->img2->move(public_path("products"), $file2);

        $p = new Product();
        $p->title  = $request->title;
        $p->discount_price = $request->discount_price;
        $p->price = $request->price;
        $p->brand = $request->brand;
        $p->category_id = $request->category_id;
        $p->descr = $request->descr;
        $p->img1  = $file1;
        $p->img2  = $file2;
        $p->save();
        return redirect()->route("product.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("admin.product.showProduct",[
            'product' => Product::find($id)
        ]);
    }
    public function edit($id){
        return view("admin.product.editProduct",[
            'product' => Product::find($id),
            'categories' => Category::all(),
        ]);
    }
    public function update(Request $request, $id){
        $file1 = $request->img1->getClientOriginalName();
        $file2 = $request->img2->getClientOriginalName();

        $request->img1->move(public_path("products"), $file1);
        $request->img2->move(public_path("products"), $file2);

        $p = Product::find($id);
        $p->title  = $request->title;
        $p->discount_price = $request->discount_price;
        $p->price = $request->price;
        $p->category_id = $request->category_id;
        $p->descr = $request->descr;
        $p->img1  = $file1;
        $p->img2  = $file2;
        $p->save();
        return redirect()->route("product.index");
    }
    public function destroy($id){
        $p = Product::find($id)->delete();
        return redirect()->back();
    }
}
