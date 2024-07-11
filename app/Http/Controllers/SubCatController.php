<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCat;
use Illuminate\Http\Request;

class SubCatController extends Controller
{
    public function viewForm (){
        $categories=Category::all();
        return view('dashboard.user.subcategory',compact('categories'));
    }


    public function store(Request $request){
        //catch data
        $name=$request->input('sub_name');
        $desc=$request->input('sub_desc');
        $category_id=$request->input('category_id');
        $image=$request->input('image');
        
      

        // dd($name,$desc);
        //validation 

  // don't forget multipart/form data in form
    // image  part one :catech |vlaidation |change name | move upladede file and save the same name to database save it in storage

    // image part two :show image from from public by assets method so we should (change file system ,and take short link to bublic)
        $data=$request->validate([

            'sub_name'=>'required |max:20 |string',
            'sub_desc'=>'required |string',
            'category_id'=>'required |exists:categories,id',
            'image'=>'required|image|mimes:png,jpg,jpeg,gif'

        ]);
        $NewName=time().'.'.$request->image->extension();
        $request->image->move('subcategories',$NewName);
      
        //create
        
        $subCategory=SubCat::create([
            'name'=>$name,
            'desc'=>$desc,
            'category_id'=>$category_id,
            'image'=>$NewName


        ]);
        session()->flash('success','subCategory  added successfully');
       return redirect(url('dashboard/home'));
    }



    //function show all subcategories

    public function all (){

        $subCategories=SubCat::all();

        return view('dashboard.user.home')->with('subCategories',$subCategories);

    }
    public function show ($id){

        $subCategory=SubCat::findOrFail($id);

        return view('dashboard.user.showSub')->with('subCategory',$subCategory);

    }
}
