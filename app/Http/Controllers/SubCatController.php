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

    public function edit($id){
        $subCategory=SubCat::findOrFail($id);
        $categories=Category::all();
        return view("dashboard.user.editSub",['subCategory'=>$subCategory,'categories'=>$categories]);
        // dd($subCategory);
    }

    public function update(Request $request , $id){

        //catch update data
        $name=$request->sub_name;
        $desc=$request->sub_desc;
        $category_id=$request->category_id;

    //validateio on comming data
    $data=$request->validate([

    'sub_name'=>'required |max:20 |string',
    'sub_desc'=>'required |string',
    'category_id'=>'required |exists:categories,id',
    'image'=>'image|mimes:png,jpg,jpeg,gif'

]);
$subCategory=SubCat::findOrFail($id);
$destination='subcategories/';
$old_image=$subCategory->image;
//check on image if it exists on request (delete old image, change image and move it to folder in my app and update image name in database)
if($image=$request->file('image')){
    // unlink($destination.$old_image);

    $NewImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    $image->move($destination, $NewImage);

    }else{

        $NewImage=$old_image;

        }
  $subCategory->update([
            'name'=>$name,
            'desc'=>$desc,
            'category_id'=>$category_id,
            'image'=>$NewImage

  ]);

    session()->flash('success','subCategory updated successfully');
     return redirect(url("dashboard/show/$subCategory->id"));
    

        // dd($name,$desc,$category_id);



        //validation 
        //check on image if he uptated or not if updted unset to old image and add new image to database and my app
    }


    //delete in laravel ( take id , unlink image if exist ,)

    public function destroy($id){

        $subCategory=SubCat::findOrFail($id);
        $oldImage=$subCategory->image;
        $destination='subcategories/';

        $subCategory->delete();

        //check if file exists
        unlink( $destination.$oldImage);

        session()->flash('success','subCategory deleted successfully');
        return redirect(url("dashboard/home"));

        
    }
}
