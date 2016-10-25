<?php namespace App\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Invoice extends Eloquent {

	//
	protected $fillable= ['date','total','customer_id','type'];
}
