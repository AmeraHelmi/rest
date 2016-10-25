<?php namespace App\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Customer extends Eloquent {

	//
	protected $fillable= ['name','tel','address'];
}
