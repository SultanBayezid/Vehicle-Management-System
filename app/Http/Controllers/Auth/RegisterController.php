<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_type' => 'admin',
            'status' => '1',
            'password' => Hash::make($data['password']),
        ]);
    }



    	
	public function client_signup(Request $request){
		if($request->isMethod('get')){
			
			return view('auth.client_signup');
			
		}else if($request->isMethod('post')){
			
			$validator = Validator::make($request->all(), [
				'name' => 'required|max:191',
				'email' => 'required|email|unique:users|max:191',
				'password' => 'required|max:20|min:6|confirmed',
			]);
			
			if ($validator->fails()) {
				if($request->ajax()){ 
					return response()->json(['result'=>'error','message'=>$validator->errors()->all()]);
				}else{
					return back()->withErrors($validator)
								 ->withInput();
				}			
			}
			
			//Create User	
			DB::beginTransaction();
			
			$user = new User();
			$user->name = $request->name;
			$user->email = $request->email;
			if( get_option('email_verification') == 'disabled' ){
				$user->email_verified_at = now();
			}
			$user->password = Hash::make($request->password);
			$user->user_type = 'client';
			$user->status = 1;
			$user->profile_picture = 'default.png';
			$user->save();
			
			//Update contacts with user_id
			$contact = Contact::where('contact_email',$user->email)
                              ->update(['user_id' => $user->id]);
			
			
			DB::commit();
			
			if($user->id > 0){ 
			   return redirect('login')->with('registration_success', _lang('Registration Sucessfully. You May Login to your account.'));
			}
		
		}
	}
}
