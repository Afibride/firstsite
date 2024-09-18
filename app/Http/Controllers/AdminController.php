<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function AdminDashboard(){

      $id= auth::user()->id;
      $profileData=User::find($id);

    return view('admin.index', compact('profileData'));
   }  //end method

   public function AdminLogout(Request $request)
   {
       Auth::guard('web')->logout();

       $request->session()->invalidate();

       $request->session()->regenerateToken();

       return redirect('/admin/login');
   }  //end method

   public function AdminLogin(Request $request)
   {
      return view('admin.admin_login');
   }  //end method


   public function AdminProfile(){

      $id= auth::user()->id;
      $profileData=User::find($id);

      return view('admin.admin_profile_view', compact('profileData'));
   }//end method

   public function AdminProfileStore(Request $request){

      $id = Auth::user()->id;
      $data = User::find($id);
      $data->username = $request->username;
      $data->name = $request->name;
      $data->email = $request->email;
      $data->phone = $request->phone;
      $data->address = $request->address;

      if($request->file('photo')){
         $file = $request->file('photo');
         @unlink(public_path('upload/admin_images/'. $data->photo) );
         $filename = date('YmdHi').$file->getClientOriginalName();
         $file->move(public_path('upload/admin_images'),$filename);
         $data['photo'] = $filename;
   }

   $data->save();

   $notification = array(
      'message' => 'Admin profile Updated Successfully',
      'alert-type'=> 'success'

   );

   return redirect()->back()->with($notification);


  }//end method

}
