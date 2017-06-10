<?php

namespace App;

use App\InvoiceModel;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='order';

    public function customer(){
    	return $this->hasone('App\Customer');
    }

    public function invoices(){
    	return $this->hasMany('App\Invoice');
    }
}
