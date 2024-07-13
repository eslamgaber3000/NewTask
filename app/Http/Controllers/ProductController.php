<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){


        $categories=Category::all(['name','id']);
        // dd($categories);
        return view('dashboard.user.product.creat_product',compact('categories'));
    }
    public function store( Request $request){

        //catch data , 
        $name=$request->name;
        $qty=$request->qty;
        $price=$request->price;
        $category_id=$request->category_id;

        // dd($request->all());

        // vlidate dataa
        
       $data=$request->validate([

        'name'=>'required|string|max:50',
        'price'=>'required|decimal:2,4',
        'qty'=>'required|integer',
        'category_id'=>'required|exists:categories,id',
        
        ]);
        //  , sore ,
        
        Product::create($data);
        
        // redirect

        session()->flash('success','product added succssufly');

        return redirect(route('products.create'));


    }
}
