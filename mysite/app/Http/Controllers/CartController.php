<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function addCart(Request $request,$id){

        if(Auth::id()){
            $user = auth()->user();

            $products = products::find($id);
            
            $cart = new Cart;

            $cart->name = $user->name;
            $cart->email= $user->email;
            $cart->phone = $user->phone;
            $cart->pincode = $user->pincode;
            $cart->address = $user->address;

            $cart->product_title = $products->title;
            $cart->price = $products->price;
            $cart->quantity = $request->quantity;

            $cart->save();

           return redirect()->back()->with('message',"Added to Cart Successfully!");

        }else{

            return redirect('login');
       }
        
       
    }

    public function showcart(){
        $user = auth()->user();

        $carts = Cart::where('name',Auth::user()->name)->orderBy('created_at','desc')->get();

        $count = Cart::where('email',$user->email)->count();
    
        return view('cart',compact('count','carts'));
    }

    public function deletecart($id){
        $data = Cart::find($id);
        $data->delete();

        return redirect()->back()->with('messages',"Product Removed Successfully!");
    }

    public function removecart($id){
        $data = Order::find($id);
        $data->delete();

        return redirect()->back()->with('message',"Removed Successfully!");
    }

    public function confirmorder(Request $request){
        $user = auth()->user('name');

        $name = $user->name;
        $email = $user->email;
        $phone = $user->phone;
        $pincode = $user->pincode;
        $address = $user->address;

        if ($request->productname == null) 
        { 
            return redirect()->back()->with('message', 'Add Something in Cart'); 
        }
        
        foreach( $request->productname as $key => $productname)
        {
            $order = new Order;

            $order->product_title=$request->productname[$key];
            $order->quantity=$request->quantity[$key];
            $order->price=$request->price[$key];
            $order->paymentmode=$request->paymentmode;

            $order->name = $name;
            $order->email = $email;
            $order->phone = $phone;
            $order->pincode = $pincode;
            $order->address = $address;

            $order->status = 'in progress';

            $order->save();

        }
        DB::table('carts')->where('email',$email)->delete();

        return redirect('dashboard')->with('message',"Your Order is Successfully Placed!");
    }

    public function orderdetails(){

        $user = auth()->user();
        $carts = Order::where('name',Auth::user()->name)->orderBy('created_at','desc')->paginate(10);
        $count = Cart::where('email',$user->email)->count();
        return view('orderdetails',compact('count','carts'));
    }


}
