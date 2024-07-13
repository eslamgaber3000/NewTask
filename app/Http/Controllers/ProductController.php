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
        $image=$request->image;

        // dd($request->all());

        // vlidate dataa
        
       $data=$request->validate([

        'name'=>'required|string|max:50',
        'price'=>'required|decimal:2,4',
        'qty'=>'required|integer',
        'category_id'=>'required|exists:categories,id',
        'image'=>'image|mimes:png,jpg,jpeg,gif,max:2000'
        
        ]);

        //image (catch image ,validate image , change name, move uplaoded file )

        //  , sore ,

        if($request->file('image')){

            $newName=time().'.'.$image->extension();
            $data['image']=$newName;
            $image->move('products',$newName);
            
        }
        
        Product::create($data);
        
        // redirect

        session()->flash('success','product added succssufly');

        return redirect(route('products.all'));


    }


    public function all(){


        $products=Product::all();
        return view("dashboard.user.product.all_products")->with('products',$products);




    }


    public function show($id){

        $product=Product::findOrFail($id);

        // dd($product);
        return view('dashboard.user.product.show_product',compact('product'));
    }
}
