<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\HcPatient;
use App\HcDocType;
use App\HcSpecDoctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Auth;

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
    protected $redirectTo = '/home';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required', 'string', 'max:70'],
            'last_name' => ['required', 'string', 'max:70'],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'sex' => ['required', 'numeric'],
            'birth_date' => ['required', 'date'],
            'idoc_type' => ['required', 'numeric'],
            'idoc_code' => ['required', 'string', 'max:11'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $patient = HcPatient::create(array(
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'phone_number' => $data['phone_number'],
                        'sex' => $data['sex'],
                        'birth_date' => $data['birth_date'],
                        'idoc_type' => $data['idoc_type'],
                        'idoc_code' => $data['idoc_code'],
                        'email' => $data['email'],
                        'sys_user' => $user->id,
            ));
        return $user;
    }

    protected function showRegistrationForm(){

        if(Auth::check()){
            return redirect()->route('welcome');
        }
        $items = HcDocType::pluck('doc_short_name', 'id');
        $sexes = array('0' => 'Male', '1' => 'Female');
        return view('auth.register', array('items' => $items, 'sexes' => $sexes));
    }
}
