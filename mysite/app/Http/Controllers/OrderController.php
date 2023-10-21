<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\Cart;

class OrderController extends Controller
{
   public function categories(){

    $categories = Category::where('status','0')->get();
    
    $user = auth()->user();
    $count = Cart::where('email',$user->email)->count();

    return view('dashboard',compact('categories','count'));

   }

   public function viewdashboard($category){
    if(Category::where('category',$category)->exists())
    {

        $user = auth()->user();
        $count = Cart::where('email',$user->email)->count();

        $category2 = Category::where('category',$category)->first();
        $products = Products::where('cate_id',$category2->id)->where('status','0')->get();
        return view('index',compact('category2','products','count'));

    }else{
        return redirect('/')->with('status',"Category not found!");
    }
   }

   public function productview($cate_cate,$prod_title)
   {
    if(Category::where('category',$cate_cate)->exists())
    {
        if(Products::where('title',$prod_title)->exists())
        {

            $user = auth()->user();
            $count = Cart::where('email',$user->email)->count();
            $categories = Category::where('status','0')->get();

            $products = Products::where('title',$prod_title)->first();
            return view('view',compact('products','count','categories'));
        }else
        {
            return redirect('/')->with('status','Check your connection!');
        }
    }
    else
        {
            return redirect('/')->with('status','No such product found!');
        }
   }


}
