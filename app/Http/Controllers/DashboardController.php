<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Transaction;
use App\Models\Invoice;
use DB;

class DashboardController extends Controller
{

    public function __construct()
    {	
		date_default_timezone_set(get_company_option('timezone',get_option('timezone','Asia/Dhaka')));	
    }
    public function index()
    {

		$type = Auth::user()->user_type;

		if( $type  == 'admin' ){
			$data = array();
			$data['total_user'] = \App\Models\User::where('user_type','user')
										   ->count();

															 
			
			return view('backend/dashboard-'.$type,$data);
		}else if( $type  == 'client' ){
			return redirect('/');

		}else if( $type  == 'user' ){	
			$company_id = company_id();
			$data = array();
			$data['current_month_income'] = current_month_income();
			$data['current_month_expense'] = current_month_expense();
                       
                    

			return view('backend/dashboard-'.$type,$data);
		}else if($type  == 'staff' ){
			$company_id = company_id();
			$data = array();
 
         

			return view('backend/dashboard-'.$type,$data);
		}
		else if($type  == 'driver' ){


			$company_id = company_id();
			$data = array();
			return view('backend/dashboard-'.$type, $data);
			

         

			return view('backend/dashboard-'.$type,$data);
		}
    }

}
