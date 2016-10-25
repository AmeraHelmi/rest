<?php namespace App\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class item extends Eloquent {

	//
	protected $fillable= ['name','s_price','category_id','m_price','l_price'];
}
