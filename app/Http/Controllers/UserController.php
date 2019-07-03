<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag as MessageBag;

use App\Http\Requests;

use App\User;
use App\HcPatient;
use App\HcDocType;
use App\HcSpecDoctor;

use Session;

use Auth;

class UserController extends Controller
{	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = '';
        return view('user.index', array('user' => $user, 'title' => 'Pagina de Inicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        if(Auth::check()){
            return redirect()->route('user.index');
        }
        $items = HcDocType::pluck('doc_short_name', 'id');

        //->map(function ($entry){
        //    return array('id' => $entry->id, 'name' => $entry->doc_short_name);
        //});
        return view('user.register', array('title' => 'Registro', 'items' => $items));
    }
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
								'first_name' => 'required|max:70',
                                'last_name' => 'required|max:70',
                                'phone_number' => 'nullable|max:20',
                                'sex' => 'required|numeric',
                                'birth_date' => 'required|date',
                                'idoc_type' => 'required|numeric',
                                'idoc_code' => 'required|max:11',
								'email' => 'required|email|max:70|unique:users',
								'password' => 'required|min:6|confirmed',
							)
						);
		
        //$input = $request->all();        
        //dd($request->email);
        //dd($input); // dd() helper function is print_r alternative
		
		$user = User::create(array(
						'name' => $request->first_name . ' ' .  $request->last_name, 
						'email' => $request->email,
						'password' => bcrypt($request->password),
					));

		$patient = HcPatient::create(array(
                                'first_name' => $request->first_name,
                                'last_name' => $request->last_name,
                                'phone_number' => $request->phone_number,
                                'sex' => $request->sex,
                                'birth_date' => $request->birth_date,
                                'idoc_type' => $request->idoc_type,
                                'idoc_code' => $request->idoc_code,
                                'email' => $request->email,
                                'sys_user' => $user->id,
                    ));
        
		Session::flash('flash_message', 'Registro de Usuario Exitoso!');

		//return redirect()->back();
		//return redirect('user');
		return redirect()->route('user.login');
    }
    
    /**
     * Show the login form
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('user.index');
        }
        return view('user.login', array('title' => 'Login'));
    }
	
	/**
     * Authenticate user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {		
		if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {
			return redirect()->route('user.index');
		} else {
            $errors = new MessageBag();
            $errors->add('login error', 'datos erroneos, intente otra vez!');
			return redirect()->route('user.login')->withErrors($errors);
		}		
    }
    
    /**
     * Logout user
     *
     * @return \Illuminate\Http\Response
     */
    public function logout() {
		Auth::logout();		
		return redirect()->route('user.login');
	}
	
	/**
     * Show account
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        if(!Auth::check()){
            return redirect()->route('user.login');
        }
        return view('user.account', array('title' => 'Mi Cuenta'));
    }

    /**
     * Show List of Medics & specialties
     *
     * @return \Illuminate\Http\Response
     */
    public function medics()
    {
        if(!Auth::check()){
            return redirect()->route('user.login');
        }
        $spec_docs = HcSpecDoctor::with(['specialty','doctor'])->get();
        return view('user.medics', array('title' => 'Medicos y especialidades', 'entries' => $spec_docs));
    }  
}
