<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class EditProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Show Edit Profile    
           return view('editprofile', array('user'=>Auth::user()));
           $user = User::all();
        
   }


   public function update_avatar(Request $request){
           
         if($request->hasFile('avatar')){
             $avatar = $request->file('avatar');
             $filename = time() . '.' . $avatar->getClientOriginalExtension();
             Image::make($avatar)->resize(300, 300)->save(public_path('/images/avatars/' . $filename));

             $user = Auth::user();
             $user->avatar = $filename;
             $user->save();

         }
         return view('editprofile', array('user'=>Auth::user()));

   
   
   
        }

        public function edit($id){
            $user = User::find($id);
            return view('editprofilename', compact('user'));
        }



        public function update(Request $request, $id){
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->usertype = $request->input('usertype');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->contact_no = $request->input('contact_no');
        
            $user->update();
            return redirect('editprofile');
          
         }


}