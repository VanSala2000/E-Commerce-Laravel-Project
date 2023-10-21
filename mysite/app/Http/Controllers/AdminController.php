<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminlogin(){
        return view('admin.admin');
    }

    public function dashboard(){
        $count = User::all()->count();
        $counts = Order::all()->count();
        $countss = Products::all()->count();
        return view('admin.dashboard',compact('count','counts','countss'));
    }

    public function clientorder(){
        
        $carts = Order::all();
        return view('clientorder',compact('carts'));
    }

    public function adminvalidate(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $data=$request->only('username','password');

        if(Admin::where('username',$data)->exists()){
            return redirect('admin.dashboard')->with('messages', 'Login Successfully!');
        }

        return redirect()->back()->with('messages', 'Invalid username or password');
    }

    public function delete(){
        
        $carts = Products::all();
        return view('admin.delete',compact('carts'));
    }

    public function deleteorder($id){
        
        $data = Products::find($id);
        $data->delete();

        return redirect()->back()->with('messages',"Product Delete Successfully!");
    }

    public function product(){
        
        $product = Products::all();
        return view('admin.addproduct',compact('product'));
    }

    public function addproduct(Request $request){
        
        $product = new Products;
        
        $product->cate_id=$request->cate_id;
        $product->title=$request->title;
        $product->image=$request->image;
        $product->type=$request->type;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->status=$request->status;

        $product->save();

        return redirect()->back()->with('message','Added product successfully');
    }

    public function edproduct(){
        
        $carts = Products::all();
        return view('admin.editproduct',compact('carts'));
    }

    public function updateproduct($id){
        
        $profile = Products::find($id);
        $product = Products::all();
        return view('admin.update',compact('product','profile'));
    }
        
    public function update(Request $request,$id){

        $profile = Products::find($id);
        $profile->cate_id = $request->input('cate_id');
        $profile->title = $request->input('title');
        $profile->image = $request->input('image');
        $profile->type = $request->input('type');
        $profile->description = $request->input('description');
        $profile->quantity = $request->input('quantity');
        $profile->price = $request->input('price');
        $profile->status = $request->input('status');
        $profile -> update();

        return redirect('admin.editproduct')->with('message','Updated Successfully!');
    }

    public function adminlogout(Request $request): RedirectResponse
        {
            Auth::logout();
         
            $request->session()->invalidate();
         
            $request->session()->regenerateToken();
         
            return redirect('/');
        }

}
