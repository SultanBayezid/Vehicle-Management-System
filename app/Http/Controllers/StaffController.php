<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Validation\Rule;
use App\Models\User;
use Validator;
use Hash;
use Image;
class StaffController extends Controller
{
    public function index()
    {
        $users = User::where("user_type","staff")
                     ->Where("company_id",company_id())
                     ->orderBy("id","desc")->get();
        return view('backend.staff.list',compact('users'));
    }

    public function create(Request $request)
    {
		if( ! $request->ajax()){
		   return view('backend.staff.create');
		}else{
           return view('backend.staff.modal.create');
		}
    }

    public function store(Request $request)
    {	
		$validator = Validator::make($request->all(), [
			'name'     => 'required|max:191',
			'email'    => 'required|email|unique:users|max:191',
			'password' => 'required|max:20|min:6|confirmed',
            'status'   => 'required',
			'role_id'  => 'required',
			'profile_picture' => 'nullable|image|max:5120',
		]);
		
		if ($validator->fails()) {
			if($request->ajax()){ 
			    return response()->json(['result'=>'error','message'=>$validator->errors()->all()]);
			}else{
				return redirect('users/create')
							->withErrors($validator)
							->withInput();
			}			
		}
			
        $user = new User();
	    $user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->email_verified_at = date('Y-m-d H:i:s');
		$user->password = Hash::make($request->password);
		$user->user_type = 'staff';
		$user->status = $request->input('status');
		$user->role_id = $request->input('role_id');
	    $user->profile_picture = 'default.png';
        
		if ($request->hasFile('profile_picture')){
           $image = $request->file('profile_picture');
           $file_name = "profile_".time().'.'.$image->getClientOriginalExtension();
           //$image->move(base_path('public/uploads/profile/'),$file_name);
           Image::make($image)->crop(300, 300)->save(base_path('public/uploads/profile/') .$file_name);
		   $user->profile_picture = $file_name;
		}
		$user->company_id = company_id();
        $user->save();
      
	    //Update Package limit
        update_package_limit( 'staff_limit' );
		
		//Set Data
        $user->user_type = ucwords($user->user_type);
		$user->role_id = $user->role->name;
		$user->status = $user->status == 1 ? _lang('Active') : _lang('In-Active');
		
        
		if(! $request->ajax()){
           return redirect('staffs/create')->with('success', _lang('Saved Sucessfully'));
        }else{
		   return response()->json(['result'=>'success','action'=>'store','message'=>_lang('Saved Sucessfully'),'data'=>$user]);
		}
        
   }
	
}
