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
     * Show List of Medics & specialties
     *
     * @return \Illuminate\Http\Response
     */
    public function medics()
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $spec_docs = HcSpecDoctor::with(['specialty','doctor'])->get();
        return view('medics', array('title' => 'Medicos y especialidades', 'entries' => $spec_docs));
    }

}
