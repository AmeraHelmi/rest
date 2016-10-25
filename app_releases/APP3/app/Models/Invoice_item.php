<?php namespace App\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Invoice_item extends Eloquent {

	//
	protected $fillable= ['invoice_id','item_id','no_items'];
}
