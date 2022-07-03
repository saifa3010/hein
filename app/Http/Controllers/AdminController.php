<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\CatagoryBasic;
use App\Models\CatagorySub;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   public function view_categoryB(){
       $dataB=CatagoryBasic::all();

       
       $user_type=Auth::user()->user_type;

       if($user_type=='1'){
           return view('admin.view_categoryB',compact('dataB'));
       }
       else{
           return redirect()->back(); 
        }

    

   }

   public function view_categoryS(){
    $dataS=CatagorySub::all();
    $user_type=Auth::user()->user_type;

    if($user_type=='1'){
        return view('admin.view_categoryS',compact('dataS'));
    }
    else{
        return redirect()->back(); 
     }

}

   public function add_categoryB(Request $request){
    $request->validate([
        'categoryB' => ['required', 'string', 'between:3,20', 'unique:catagory_basics,category_nameB']
    ]);
    $dataB=new CatagoryBasic;
    $dataB->category_nameB =$request->input('categoryB');
    
    $dataB->save();
    return redirect()->back()->with('message','category added successfully');
 }


 public function update_basic(){
    $dataB=CatagoryBasic::all();
    
    return view('admin.update_basic',compact('dataB'));



 }

 public function update_sub(){
    $dataS=CatagorySub::all();
    
    return view('admin.update_sub',compact('dataS'));



 }


 public function update_categoryB(Request $request,$id){
    $dataB=CatagoryBasic::find($id);
    
    return view('admin.update_categoryB',compact('dataB'));



 }

 public function update_category_nameB_confirm(Request $request,$id)
    {
    $dataB=CatagoryBasic::find($id);

    
    $dataB->category_nameB=$request->category_nameB;
   
    $dataB->save();
    return redirect()->back()->with('message','Category modified successfully');


    }

    public function delete_categoryB($id){
        CatagoryBasic::destroy($id);

        $user_type=Auth::user()->user_type;
        if($user_type=='1'){
            return redirect()->back()->with('message','category deleted');
        }
        else{
            return redirect()->back(); 
         }

    }



    public function update_categoryS(Request $request,$id){
        $dataS=CatagorySub::find($id);
        
        return view('admin.update_categoryS',compact('dataS'));
    
    
    
     }
    
     public function update_category_nameS_confirm(Request $request,$id)
        {
        $dataS=CatagorySub::find($id);
    
        
        $dataS->category_nameS=$request->category_nameS;
       
        $dataS->save();
        return redirect()->back()->with('message','Category modified successfully');
    
    
        }
    
        public function delete_categoryS($id){
            CatagorySub::destroy($id);
    
            $user_type=Auth::user()->user_type;
            if($user_type=='1'){
                return redirect()->back()->with('message','category deleted');
            }
            else{
                return redirect()->back(); 
             }
    
        }
    


   public function add_categoryS(Request $request){
    $request->validate([
        'categoryS' => ['required', 'string', 'between:3,20', 'unique:catagory_subs,category_nameS']
    ]);
    $dataS=new CatagorySub;
    $dataS->category_nameS =$request->input('categoryS');
       $dataS->save();
       return redirect()->back()->with('message','category added successfully');
   }


   public function view_productB(){
    $categoryB=CatagoryBasic :: all();
     $categoryS=CatagorySub :: all();

     $user_type=Auth::user()->user_type;


    if($user_type=='1'){
        return view('admin.add_product', compact('categoryB','categoryS'))->with('message','product added successfully');
    }
    else{
        return redirect()->back(); 
     }

   }



   public function add_product(Request $request){
    $product=new product;
    $product->title=$request->title;
    $product->description=$request->description;
    $product->price=$request->price;
    $product->size=$request->size;
    $product->discount_price=$request->discount_price;
    $product->category_nameB=$request->category_nameB;
    $product->category_nameS=$request->category_nameS;
    $image=$request->image;
    
    if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
    
    }

    else{
        $product->image=$request->NULL;
    }
    

    $product->save();
    return redirect()->back()->with('message','product added successfully');
}

    public function show_product(){
        $product=Product::paginate(15);
        $user_type=Auth::user()->user_type;
        if($user_type=='1'){
            return view('admin.show_product',compact('product'));        }
        else{
            return redirect()->back(); 
         }

        
    }
 
    public function delete_product($id){
        Product::destroy($id);
        

        $user_type=Auth::user()->user_type;
        if($user_type=='1'){
            return redirect('/show_product')->with('message','Product deleted');       }
        else{
            return redirect()->back(); 
         }

    }

    public function update_product($id){
        $product=Product::find($id);
        $categoryB=CatagoryBasic :: all();
        $categoryS=CatagorySub :: all();

        return view('admin.update_product',compact('product','categoryB','categoryS'));
    }

    public function update_product_confirm(Request $request,$id)
    {
    $product=Product :: find($id);
    $product->title=$request->title;
    $product->description=$request->description;
    $product->price=$request->price;
    $product->size=$request->size;
    $product->discount_price=$request->discount_price;
    $product->category_nameB=$request->category_nameB;
    $product->category_nameS=$request->category_nameS;
    $image=$request->image;
    
    if($image)
    {
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('product',$imagename);
    $product->image=$imagename;
    }
    $product->save();
    return redirect()->back()->with('message','The product has been modified successfully');


    }

    public function customer_orders(){
    
        $order=Order::paginate(15);

        

        $user_type=Auth::user()->user_type;

        if($user_type=='1'){
            return view('admin.customer_orders',compact('order'));
        }
        else{
            return redirect()->back(); 
         }

    }

    public function delivered(Request $request,$id){
        $order=Order::find($id);
        $order->delivery_status=$request->delivery_status;
        $order->save();

        
        return redirect()->back()->with('message','Changed successfully');
    }


  


    
    }




