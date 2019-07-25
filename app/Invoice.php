<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

	protected $table = "invoices";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('status', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('status', 0);
    }

    public function scopeComplete($query) {
    	return $query->where('status', 2);
    }

}
