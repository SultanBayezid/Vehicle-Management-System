<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Transaction;
use App\Models\Issue;
use App\Models\Fuel;
use App\Models\Trip;
use App\Models\Service;
use DB;
use Illuminate\Support\Carbon;

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
			
			$datetwo = Carbon::today();
			$dateone = $datetwo->copy()->subMonth(); // Clone $datetwo and then subtract one month
			
			$date1 = $dateone->toDateString(); // Format: 'Y-m-d'
			$date2 = $datetwo->toDateString(); // Format: 'Y-m-d'
	  
			$type = Auth::user()->user_type;
			// Expense by category
			$account    = NULL;
			$category   = NULL;
			$company_id = company_id();
	
			$account_query  = $account != '' ? 'AND transactions.account_id = ' . $account : '';
			$category_query = $category != '' ? 'AND transactions.chart_id = ' . $category : '';
	
			$data = array();
	
			$expenses = DB::select("
				SELECT 
					chart_of_accounts.name AS expense_type,
					SUM(transactions.amount) AS total_amount
				FROM 
					transactions 
				JOIN 
					chart_of_accounts ON transactions.chart_id = chart_of_accounts.id
				WHERE 
					transactions.trans_date BETWEEN '$date1' AND '$date2' 
					AND transactions.dr_cr='dr' 
					$account_query 
					$category_query 
					AND transactions.company_id='$company_id' 
				GROUP BY 
					transactions.chart_id, 
					chart_of_accounts.name
			");
	
			// Prepare data for the chart
			$chart_data = [];
			foreach ($expenses as $expense) {
				$chart_data[$expense->expense_type] = $expense->total_amount;
			}
	        $data['chart_data'] = $chart_data;
	
			$data['account']  = NULL;
			$data['category'] = NULL;

			// Expense by categorty 
			$data['day_wise_data'] = $this->getDayWiseIncomeExpense($date1, $date2);
			$data['issue'] = Issue::whereBetween('report_date', [$date1, $date2])->count();
			$data['service'] = Service::whereBetween('completed_date', [$date1, $date2])->count();

			$data['tincome'] =  Transaction::where('type', 'income')
			->where('company_id', company_id())
			->whereBetween('trans_date', [$date1, $date2])
			->sum('amount');

			$data['texpense'] = Transaction::where('type', 'expense')
			->where('company_id', company_id())
			->whereBetween('trans_date', [$date1, $date2])
			->sum('amount');

		   $data['day_wise_trip_data'] = Trip::whereBetween('trip_date', [$date1, $date2])
		   ->select('trip_date', DB::raw('COUNT(*) as trip_count'))
		   ->groupBy('trip_date')
		   ->orderBy('trip_date')
		   ->get();
		   $data['selectedOption'] = 'this-month';
		   $data['date1'] = $date1;
		   $data['date2'] = $date2;
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






	public function in_vs_ex(Request $request) {

		// dd($request->all());
		$selectedOption = $request->input('selected_option');

		switch ($selectedOption) {
			case 'today':
				$date1 = Carbon::today()->toDateString();
				$date2 = Carbon::today()->toDateString();
				break;
			case 'yesterday':
				$date1 = Carbon::yesterday()->toDateString();
				$date2 = Carbon::yesterday()->toDateString();
				break;
			case 'this-week':
				$date1 = Carbon::now()->startOfWeek()->toDateString();
				$date2 = Carbon::now()->endOfWeek()->toDateString();
				break;
			case 'last-week':
				$date1 = Carbon::now()->startOfWeek()->subWeek()->toDateString();
				$date2 = Carbon::now()->endOfWeek()->subWeek()->toDateString();
				break;
			case 'this-month':
				$date1 = Carbon::now()->startOfMonth()->toDateString();
				$date2 = Carbon::now()->endOfMonth()->toDateString();
				break;
			case 'last-month':
				$date1 = Carbon::now()->subMonth()->startOfMonth()->toDateString();
				$date2 = Carbon::now()->subMonth()->endOfMonth()->toDateString();
				break;
			case 'custom':
				// Get the values of date1 and date2 inputs
				$date1Input = $request->input('date1');
				$date2Input = $request->input('date2');
				
				// Parse the dates and convert them to strings
				$date1 = Carbon::parse($date1Input)->startOfDay()->toDateString();
				$date2 = Carbon::parse($date2Input)->endOfDay()->toDateString();
				break;
			default:
				// Default to today's date if selected_option is not provided or invalid
				$date1 = $request->date1;
				$date2 = $request->date2;
				break;
		}
	
		    
			$date1      = $date1;
			$date2      = $date2;
			$type = Auth::user()->user_type;
			

			
			



			// Expense by category
			$account    = $request->account;
			$category   = $request->category;
			$company_id = company_id();
	
			$account_query  = $account != '' ? 'AND transactions.account_id = ' . $account : '';
			$category_query = $category != '' ? 'AND transactions.chart_id = ' . $category : '';
	
			$data = array();
	
			$expenses = DB::select("
				SELECT 
					chart_of_accounts.name AS expense_type,
					SUM(transactions.amount) AS total_amount
				FROM 
					transactions 
				JOIN 
					chart_of_accounts ON transactions.chart_id = chart_of_accounts.id
				WHERE 
					transactions.trans_date BETWEEN '$date1' AND '$date2' 
					AND transactions.dr_cr='dr' 
					$account_query 
					$category_query 
					AND transactions.company_id='$company_id' 
				GROUP BY 
					transactions.chart_id, 
					chart_of_accounts.name
			");
	
			// Prepare data for the chart
			$chart_data = [];
			foreach ($expenses as $expense) {
				$chart_data[$expense->expense_type] = $expense->total_amount;
			}
	        $data['chart_data'] = $chart_data;
	
			$data['account']  = $request->account;
			$data['category'] = $request->category;

			// Expense by categorty 
			$data['day_wise_data'] = $this->getDayWiseIncomeExpense($date1, $date2);
			$data['issue'] = Issue::whereBetween('report_date', [$date1, $date2])->count();
			$data['service'] = Service::whereBetween('completed_date', [$date1, $date2])->count();

			$data['tincome'] =  Transaction::where('type', 'income')
			->where('company_id', company_id())
			->whereBetween('trans_date', [$date1, $date2])
			->sum('amount');

			$data['texpense'] = Transaction::where('type', 'expense')
			->where('company_id', company_id())
			->whereBetween('trans_date', [$date1, $date2])
			->sum('amount');

		   $data['day_wise_trip_data'] = Trip::whereBetween('trip_date', [$date1, $date2])
		   ->select('trip_date', DB::raw('COUNT(*) as trip_count'))
		   ->groupBy('trip_date')
		   ->orderBy('trip_date')
		   ->get();
		    if($request->input('selected_option')==NULL){
				$data['selectedOption'] = 'custom';
			}else{
				$data['selectedOption'] = $request->input('selected_option');
			}
			$data['date1'] = $date1;
			$data['date2'] = $date2;
		
			return view('backend/dashboard-'.$type,$data);
		
	}

 
	
	private function getDayWiseIncomeExpense($date1, $date2) {
		return DB::table('transactions')
			->select(
				'trans_date',
				DB::raw('SUM(CASE WHEN dr_cr = "cr" THEN amount ELSE 0 END) as income'),
				DB::raw('SUM(CASE WHEN dr_cr = "dr" THEN amount ELSE 0 END) as expense')
			)
			->whereBetween('trans_date', [$date1, $date2])
			->groupBy('trans_date')
			->orderBy('trans_date')
			->get();
	}

}
