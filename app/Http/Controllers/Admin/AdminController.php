<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DateTime;
use DateInterval;
use DatePeriod;
use Validator;
use Carbon\Carbon;
use Auth;
use DB;
use Input;
use Curl;
use App\Appointment;
use App\Service;
use App\Customer;
use App\User;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getDashboard(){
		$start    = new DateTime('09:00:00');
		$end      = new DateTime('20:30:00');
		$interval = new DateInterval('PT30M');
		$period   = new DatePeriod($start, $interval, $end);

		foreach ($period as $dt)
		{
		    $timeVal[] = $dt->format('h:i A');
		}
		$output = ['customers' => Customer::all() ,'users' => User::all() , 'services' => Service::all(),'timeVal' => $timeVal,'tab' => 'Appointments'];
		return view('admin.appointments',$output);
	}

	public function getCalendar(){
		$start    = new DateTime('09:00:00');
		$end      = new DateTime('20:30:00');
		$interval = new DateInterval('PT30M');
		$period   = new DatePeriod($start, $interval, $end);

		foreach ($period as $dt)
		{
		    $timeVal[] = $dt->format('h:i A');
		}
		$output = ['customers' => Customer::all() ,'users' => User::all() , 'services' => Service::all(),'timeVal' => $timeVal,'tab' => 'Appointments'];
		return view('admin.calendar',$output);
	}

	private function sendSMS($mobile,$message){
		$message = urlencode($message);
        $sms = Curl::to('https://control.msg91.com/api/sendhttp.php?authkey=101670ALSycXxv0ZZX56920dcd&mobiles='.$mobile.'&message='.$message.'&sender=KACHIN&route=4')
        ->get(); 
	}

	public function getAppointments(request $request){
		$columns = $request->get('columns');
		//return $columns;
		$query = Appointment::leftJoin('customers','appointments.customer_id','=','customers.id')
							->leftJoin('services','appointments.service_id','=','services.id')
							->leftJoin('users','appointments.user_id','=','users.id')
							->where('appointments.status',true)
							->select(array('appointments.id','appointments.priority','appointments.appointment_at','customers.name as customer_name','services.name as service_name','users.name as staff_name'));
		return Datatables::of($query)->addColumn('edit','<a class="show-editApp-modal"><i class="fa fa-pencil-square-o"></i></a>&nbsp&nbsp<a class="show-delApp-modal"><i class="fa fa-trash"></i></a>')
										->filter(function($query) use ($columns) {
						                    if(!empty($columns[0]['search']['value']) ) { // problem clause
						                    	$query->where('appointments.id','=',$columns[0]['search']['value']);
									        }elseif(!empty($columns[1]['search']['value'])){ // this condition is working fine too
									            $query->whereRaw('DATE(appointments.appointment_at) = DATE("'.$columns[1]['search']['value'].'")');
									        }
									        elseif(!empty($columns[2]['search']['value'])){ // this condition is working fine too
									            $query->where('appointments.user_id', '=', $columns[2]['search']['value']);
									        }elseif( !empty($columns[3]['search']['value']) ){ // this condition is working fine too
									            $query->where('appointments.customer_id', '=', $columns[3]['search']['value']);
									        }elseif(!empty($columns[4]['search']['value'])){ // this condition is working fine too
									            $query->where('appointments.service_id', '=', $columns[4]['search']['value']);
									        }
								        })
										->make(true);
	}

	public function addAppointment(request $request){
		$validator = Validator::make($request->all(), [
            'customer_id' => 'required',
			'service_id' => 'required',
			'date' => 'required',
			'time' => 'required',
			'priority' => 'required',
        ]);

		
		if($validator->fails()){
			 return response()->json(['status'=>'fail' ,'message' =>  $validator->errors()->all()]); 
		}


		$insertVal = $request->only('customer_id','service_id','priority');
		$insertVal['appointment_at'] = date('Y-m-d H:i' ,strtotime($request->input('date').' '.$request->input('time')));
		$insertVal['user_id'] = Auth::User()->id;
		$insertVal['branch_id'] = '2';

		$appointment = Appointment::create($insertVal);
		$appointmentDetails = Appointment::with('Customer','Service')->where('id',$appointment->id)->first();
		
		$this->sendSMS($appointmentDetails->Customer->mobile,'Hi '.$appointmentDetails->Customer->name.', Your Appointment with Shakshiwellnness is booked on '.date('d M y h:i A' ,strtotime($appointmentDetails->appointment_at)));
		return response()->json(['status'=>'success']);

	}

	public function editAppointment(request $request){
		$validator = Validator::make($request->all(), [
			'appointment_id' => 'required',
			'service_id' => 'required',
			'date' => 'required',
			'time' => 'required',
			'priority' => 'required',
        ]);

		
		if($validator->fails()){
			 return response()->json(['status'=>'fail' ,'message' =>  $validator->errors()->all()]); 
		}

		$appointment = Appointment::find($request->input('appointment_id'));


		$insertVal = $request->only('service_id','priority');
		$insertVal['appointment_at'] = date('Y-m-d H:i' ,strtotime($request->input('date').' '.$request->input('time')));
		
		foreach ($insertVal as $key => $value) {
			$appointment->$key = $value;
		}

		$appointment->save();
		$appointmentDetails = Appointment::with('Customer','Service')->where('id',$appointment->id)->first();

		$this->sendSMS($appointmentDetails->Customer->mobile,'Hi '.$appointmentDetails->Customer->name.', Your Appointment with ShakshiiWellnness is Rescheduled to '.date('d M y h:i A' ,strtotime($appointmentDetails->appointment_at)));
		return response()->json(['status'=>'success']);

	}


	public function addCustomer(request $request){
		$validator = Validator::make($request->all(), [
            'name' => 'required',
			'mobile' => 'required|size:10',
        ]);
		if($validator->fails()){
			 return response()->json(['status'=>'fail' ,'message' =>  $validator->errors()->all()]); 
		}
		$insertVal = $request->only('name','email','mobile','age','sex','address');
		$insertVal['branch_id'] = '2';

		$customer = Customer::create($insertVal);
		return response()->json(['status'=>'success','name' => $customer->name, 'id' => $customer->id ]);

	}

	public function getAppointmentDetails(request $request){
		$validator = Validator::make($request->all(), [
            'appointment_id' => 'required',
        ]);
		if($validator->fails()){
			 return response()->json(['status'=>'fail' ,'message' =>  $validator->errors()->all()]); 
		}

		$appointment = Appointment::with('Service','Customer')->find($request->input('appointment_id'));
		$response['id'] = $appointment->id; 
		$response['service_id'] = $appointment->service_id;
		$response['service_name'] = $appointment->Service->name;
		$response['customer_id'] = $appointment->customer_id;
		$response['customer_name'] = $appointment->Customer->name;
		$response['appointment_date'] = date('d-m-Y', strtotime($appointment->appointment_at));
		$response['appointment_time'] = date('h:i A', strtotime($appointment->appointment_at));
		$response['priority'] = $appointment->priority;
		$response['status'] ='success'; 

		return response()->json($response);
	}

	public function getCalendarData(request $request){
		$day = date("d", $request->input('start'));
        $tempYear = date("Y", $request->input('start'));
        $tempMonth = date("m", $request->input('start'));
        if($day == 01){
        	$year = $tempYear;
        	$month = $tempMonth;
        }
        else{
        	$dateValue = $tempYear.'-'.$tempMonth.'-01';
        	$year = date("Y", strtotime("+1 month", strtotime($dateValue)));
        	$month = date("m", strtotime("+1 month", strtotime($dateValue)));
        }  

        $matchThese = ['appointments.branch_id' => 2 , 'status' => true];

        $appointments = Appointment::select(DB::Raw('CONCAT_WS(" \n " ,appointments.appointment_at,customers.name,customers.mobile,appointments.priority) as title'),DB::Raw('DATE(appointments.appointment_at) start'),'appointments.priority as type','appointments.id as id')  
                     ->where($matchThese)
                     ->leftJoin('customers','customers.id', '=','appointments.customer_id')    
                     ->whereRaw('MONTH(appointments.appointment_at) = '.$month.' AND YEAR(appointments.appointment_at) = '.$year)
                     ->orderBy('start')
                     ->get();

        foreach ($appointments as $key => $value) {
        	if($value->type == 'high'){
        		$appointments[$key]['backgroundColor'] = '#AD1A48';
        	}elseif ($value->type == 'low') {
        		$appointments[$key]['backgroundColor'] = '#007ACC';
        	}elseif ($value->type == 'medium') {
        		$appointments[$key]['backgroundColor'] = '#02A109';
        	}
        }

        return response()->json($appointments);

	}

	public function deleteAppointment(request $request){
		$validator = Validator::make($request->all(), [
            'appointment_id' => 'required',
        ]);
		if($validator->fails()){
			 return response()->json(['status'=>'fail' ,'message' =>  $validator->errors()->all()]); 
		}

		$appointment = Appointment::find($request->input('appointment_id'));
		$appointment->delete();
		return response()->json(['status'=>'success']);
	}

	public function getCustomersPage(){
		$output = ['tab' => 'Customers'];
		return view('admin.customers',$output);
	}


	public function getCustomers(request $request){
		$query = Customer::all();

		return Datatables::of($query)->addColumn('edit','<a class="show-editCustomer-modal"><i class="fa fa-pencil-square-o"></i></a>&nbsp&nbsp<a class="show-delCustomer-modal"><i class="fa fa-trash"></i></a>')
							->make(true);

	}

	public function getCustomer(request $request){
		$validator = Validator::make($request->all(), [
            'customer_id' => 'required',
        ]);
		if($validator->fails()){
			 return response()->json(['status'=>'fail' ,'message' =>  $validator->errors()->all()]); 
		}

		$customer = Customer::find($request->input('customer_id'));

		return response()->json($customer);
	}

	public function editCustomer(request $request){
		$validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'name' => 'required',
            'mobile' => 'required'
        ]);
		if($validator->fails()){
			 return response()->json(['status'=>'fail' ,'message' =>  $validator->errors()->all()]); 
		}

		$customer = Customer::find($request->input('customer_id'));

		foreach ($request->except('customer_id') as $key => $value) {
			$customer->$key = $value;
		}
		$customer->save();

		return response()->json(['status' => 'success']);
	}

	public function deleteCustomer(request $request){
		$validator = Validator::make($request->all(), [
            'customer_id' => 'required',
        ]);
		if($validator->fails()){
			 return response()->json(['status'=>'fail' ,'message' =>  $validator->errors()->all()]); 
		}

		$customer = Customer::find($request->input('customer_id'));
		$customer->delete();
		return response()->json(['status'=>'success']);
	}
}