<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function viewForm (){
        return view('dashboard.user.category');
    }
    public function store(Request $request){
        //catch data
        $name=$request->input('cat_name');
        $desc=$request->input('desc');
        
      
        //validation 

        // don't forget multipart/form data in form
    // image  part one :catech |vlaidation |change name | move upladede file and save the same name to database save it in storage

    // image part two :show image from from public by assets method so we should (change file system ,and take short link to bublic)
        
    $data=$request->validate([
        
        'cat_name'=>'required |max:20 |string',
        'desc'=>'required |string',
       
        ]);


   
      
        //create
        
        $category=Category::create([
            'name'=>$name,
            'desc'=>$desc,
            

        ]);
        session()->flash('success','category add successfully');
       return redirect(url('dashboard/home'));
    }
}
