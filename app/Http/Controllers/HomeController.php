<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CatagorySub;
use App\Models\Order;
use App\Models\UserData;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    public function index(){

        $product=Product::all();

        return view('pages.user_page',compact('product'));
    }

    public function product(){
        if(Auth :: id()){

        
        $product=Product::paginate(15);

        return view('pages.products',compact('product'));
    }
    else{
        return redirect('login');
    }
    }

    public function redirect(){
        $user_type=Auth::user()->user_type;

        if($user_type=='1'){
            $total_product=Product::all()->count();
            $total_order=Order::all()->count();
            $total_user=User::all()->count();

            $order=Order::all();
            $total_sale=0;

            foreach($order as $order)
            {
                $total_sale=$total_sale+$order->price;
            }

            $order_delivered=Order::where('delivery_status','like','Delivered')->get()->count();
            $order_processing=Order::where('delivery_status','like','processing')->get()->count();

            return view('admin.home',compact('total_product','total_order','total_user','total_sale','order_delivered','order_processing'));

        }
        else{
            $product=Product::all();
            return view('pages.user_page',compact('product'));  
         }
    }

    public function product_details($id)
    {
        $product=product :: find($id);
        return view('pages.product_details',compact('product'));
    }


    public function add_cart(Request $request, $id){

        if(Auth :: id())
    {
        $user=Auth::user();
        $userid=$user->id;
        $product=Product::find($id);
        $product_exist_id=Cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

   
        if($product_exist_id !=null)
        {
            $cart=Cart::find($product_exist_id)->first();
            $quantity=$cart->quantity;
            $cart->quantity=$quantity+$request->quantity;
            if($product->discount_price!=null)
            {
                $cart->price=$product->discount_price*$cart->quantity;
        
            }
            else
            {
                $cart->price=$product->price*$cart->quantity;    
            }
            $cart->save();
            return redirect()->back();
        }

        else{

            $cart=new Cart();
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
        
            $cart->Product_title=$product->title;
            $cart->size=$product->size;
            
            if($product->discount_price!=null)
            {
                $cart->price=$product->discount_price*$request->quantity;
        
            }
            else
            {
                $cart->price=$product->price*$request->quantity;    
            }
            $cart->image=$product->image;
            $cart->product_id=$product->id;
        
            $cart->quantity=$request->quantity;
        
            $cart->save();
            return redirect()->back();
        }
       
    
    
    
    }
    else
    {
        return redirect('login');
    
    }
          
    
       }
    
    
       public function show_cart(){

        if(Auth :: id())
        {
        $id=Auth :: user()->id;
        $cart=cart :: where('user_id','=',$id)->get();
        return view('pages.show_cart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }   
    }
    public function remove_cart($id){
        $cart = cart::find($id);
        
        
        $cart->delete();
        return redirect()->back();

    }


    public function cash_order(){
        $user=Auth::user();
        $userid=$user->id;
        $data=Cart::where('user_id','=',$userid)->get();
 
        foreach($data as $data){
 
         $order=new Order();
         $order->name=$data->name;
         $order->email=$data->email;
         $order->phone=$data->phone;
         $order->address=$data->address;
         $order->product_title=$data->product_title;
         $order->quantity=$data->quantity;
         $order->price	=$data->price;
         $order->size	=$data->size;
         $order->image	=$data->image;
         $order->user_id	=$data->user_id;
         $order->product_id	=$data->product_id;
         $order->payment_status	='cash on delivery';
         $order->delivery_status	='processing';
         $order->save();
 
         $cart_id=$data->id;
         $cart=Cart::find($cart_id);
         $cart->delete();
 
 
 
 
        }
        
        return redirect()->back()->with('message','category added successfully');
 
    }

    public function search(Request $request){
        $searchText=$request->search;

       $product=Product::where('title','LIKE',"%$searchText%")->get();
        return view("pages.products",compact('product'));
       }
       

    

    public function show_order(){

        if (Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $order=Order::where('user_id','=',$userid)->get();
            return view('pages.show_order',compact('order'));
            
           
        
        }
        else{
            return redirect('login');

        }
        
    }

    public function cancel_order($id){
        $order=Order::find($id);
        $order->delete();

        return redirect()->back()->with('message','Cancel order successfully');



    }

    public function user_data(){
        return view('pages.user_data');
    }

    public function submit_data(Request $request){

        $data=new UserData;
        
        $data->address =$request->address;

        
        $data->apartment_number=$request->apartment_number;


        
        
        
        $data->country_name =$request->country_name;

       
        $data->city_name =$request->city_name;
       
        $data->postal_code=$request->postal_code;
        

        $data->state_name=$request->state_name;
        $data->save();

        return redirect()->back();
        
    }

    public function men(){
        
            $product=Product::where('category_nameB','LIKE',"men")->get();
            return view("pages.men",compact('product'));
        
        

        
    }

    public function women(Request $request){
        

        $product=Product::where('category_nameB','LIKE',"women")->get();

        return view("pages.women",compact('product'));
        
       
    }

    public function children(Request $request){
        
        $product=Product::where('category_nameB','LIKE',"children")->get();

        return view("pages.children",compact('product'));
        
     
    }

   
    

    public function sub(Request $request){

        $selectOption1=$request->shoes;
        $selectOption2=$request->coats;
        $selectOption3=$request->pants;
        $selectOption4=$request->tshirts;
        $selectOption5=$request->bags;
        $selectOption6=$request->S;
        $selectOption7=$request->X;
        $selectOption8=$request->L;
        $selectOption9=$request->XL;
        $selectOption10=$request->M;
       








        $product=Product::where('category_nameS','LIKE',"$selectOption1") ->where('category_nameB','=','men')->
        orWhere('category_nameS','LIKE',"$selectOption2")->where('category_nameB','=','men')->
        orWhere('category_nameS','LIKE',"$selectOption3")->where('category_nameB','=','men')->
        orWhere('category_nameS','LIKE',"$selectOption4")->where('category_nameB','=','men')->
        orWhere('category_nameS','LIKE',"$selectOption5")->where('category_nameB','=','men')->
        orWhere('size','LIKE',"$selectOption6")->where('category_nameB','=','men')->
        orWhere('size','LIKE',"$selectOption7")->where('category_nameB','=','men')->
        orWhere('size','LIKE',"$selectOption8")->where('category_nameB','=','men')->
        orWhere('size','LIKE',"$selectOption9")->where('category_nameB','=','men')->
        orWhere('size','LIKE',"$selectOption10")->where('category_nameB','=','men')->
        get();

       

        
        return view("pages.men",compact('product'));
    }



    public function sub2(Request $request){

        $selectOption1=$request->shoes;
        $selectOption2=$request->coats;
        $selectOption3=$request->pants;
        $selectOption4=$request->tshirts;
        $selectOption5=$request->bags;
        $selectOption6=$request->S;
        $selectOption7=$request->X;
        $selectOption8=$request->L;
        $selectOption9=$request->XL;
        $selectOption10=$request->M;
        







        $product=Product::where('category_nameS','LIKE',"$selectOption1") ->where('category_nameB','=','women')->
        
        orWhere('category_nameS','LIKE',"$selectOption2")->where('category_nameB','=','women')->
        orWhere('category_nameS','LIKE',"$selectOption3")->where('category_nameB','=','women')->
        orWhere('category_nameS','LIKE',"$selectOption4")->where('category_nameB','=','women')->
        orWhere('category_nameS','LIKE',"$selectOption5")->where('category_nameB','=','women')->
        orWhere('size','LIKE',"$selectOption6")->where('category_nameB','=','women')->
        orWhere('size','LIKE',"$selectOption7")->where('category_nameB','=','women')->
        orWhere('size','LIKE',"$selectOption8")->where('category_nameB','=','women')->
        orWhere('size','LIKE',"$selectOption9")->where('category_nameB','=','women')->
        orWhere('size','LIKE',"$selectOption10")->where('category_nameB','=','women')->
        get();

       

        
        return view("pages.women",compact('product'));
    }


    public function sub3(Request $request){

        $selectOption1=$request->shoes;
        $selectOption2=$request->coats;
        $selectOption3=$request->pants;
        $selectOption4=$request->tshirts;
        $selectOption5=$request->bags;
        $selectOption6=$request->S;
        $selectOption7=$request->X;
        $selectOption8=$request->L;
        $selectOption9=$request->XL;
        $selectOption10=$request->M;
        







        $product=Product::where('category_nameS','LIKE',"$selectOption1") ->where('category_nameB','=','children')->
        orWhere('category_nameS','LIKE',"$selectOption2")->where('category_nameB','=','children')->
        orWhere('category_nameS','LIKE',"$selectOption3")->where('category_nameB','=','children')->
        orWhere('category_nameS','LIKE',"$selectOption4")->where('category_nameB','=','children')->
        orWhere('category_nameS','LIKE',"$selectOption5")->where('category_nameB','=','children')->
        orWhere('size','LIKE',"$selectOption6")->where('category_nameB','=','children')->
        orWhere('size','LIKE',"$selectOption7")->where('category_nameB','=','children')->
        orWhere('size','LIKE',"$selectOption8")->where('category_nameB','=','children')->
        orWhere('size','LIKE',"$selectOption9")->where('category_nameB','=','children')->
        orWhere('size','LIKE',"$selectOption10")->where('category_nameB','=','children')->
        get();

       

        
        return view("pages.children",compact('product'));
    }


    






   
}
