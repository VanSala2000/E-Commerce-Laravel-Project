<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    
    public function welcome(){
        return view('welcome');
    }

    public function registervalidate(Request $request){
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10|max:11|unique:users',
            'address' => 'required|max:200',
            'pincode' => 'required|min:4|max:5',
            'password' => 'required|min:6|max:100|confirmed'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('login')->with('messager','Account successfully created!');
    }

    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'pincode' => $data['pincode'],
            'password' => Hash::make($data ['password'])
        ]);
    }

    public function loginvalidate(Request $request){
            $request->validate([
                'name'=>'required',
                'password'=>'required'
            ]);

            $credentials=$request->only('name','password');

            if(Auth::attempt($credentials)){
                return redirect('dashboard')->with('messages', 'Login Successfully!');
            }

            return redirect()->back()->with('messages', 'Invalid username or password');
        }


        public function userprofile()
        {
            $user = auth()->user();

            $admin = User::where('name',$user->name)->get();
            $count = Cart::where('email',$user->email)->count();

            return view('profile',compact('admin','count'));
        }

        public function passwordChange()
        {
            $user = auth()->user();
            $count = Cart::where('email',$user->email)->count();
            return view('changepass',compact('count'));
        }

        public function passwordConfirm(Request $request)
        {
            $request->validate([
                'current_password' => 'required|min:6|max:100',
                'password' => 'required|min:6|max:100|confirmed',
            ]);

            $currentPassword = Hash::check($request->current_password, auth()->user()->password);
            if($currentPassword)
            {
                User::findOrFail(Auth::user()->id)->update([
                    'password' => Hash::make($request->password),
                ]);
                return redirect('profile')->with('message','Updated Successfully!');
                
            }else{

            return redirect()->back()->with('message', 'Current password does not match with Old password');
            
            }
        }

        
        public function logout(Request $request): RedirectResponse
        {
            Auth::logout();
         
            $request->session()->invalidate();
         
            $request->session()->regenerateToken();
         
            return redirect('/');
        }

        public function editProfile($id)
        {
        $user = auth()->user();
        $count = Cart::where('email',$user->email)->count();

        $profile = User::find($id);
        return view('edit', compact('profile','count'));
        }
        
        public function update(Request $request,$id){

        $profile = User::find($id);
        $profile->address = $request->input('address');
        $profile->pincode = $request->input('pincode');
        $profile -> update();

        return redirect('profile')->with('message','Updated Successfully!');
        }


}
