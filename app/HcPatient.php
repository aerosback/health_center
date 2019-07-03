<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HcPatient extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
         'first_name',
         'last_name',
         'phone_number',
         'sex',
         'birth_date',
         'idoc_type',
         'idoc_code',
         'email',
         'sys_user'
    ];


    public function sysUser(){
    	return $this->hasOne(User::class, 'id', 'sys_user');
    }

    public function idocType(){
    	return $this->belongsTo(HcDocType::class);
    }
}
