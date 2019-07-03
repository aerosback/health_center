<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HcSpecDoctor extends Model
{
    public function doctorId(){
    	//return $this->belongsTo('App\HcDoctor', 'id');
    	return $this->belongsTo(HcDoctor::class);
    	
    }
    
    
    public function doctor(){
    	return $this->belongsTo(HcDoctor::class);
    }

    public function specialty(){
    	return $this->belongsTo(HcSpecialty::class);
    }

    /*
    public function doctorIdList(){
    	return HcDoctor::all();
	}

    public function specialtyIdList(){
    	return HcSpecialty::all();
	}
	*/

    public function specialtyId(){
    	//return $this->belongsTo('App\HcSpecialty', 'id');
    	return $this->belongsTo(HcSpecialty::class);
    }
}
