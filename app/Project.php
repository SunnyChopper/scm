<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
    protected $table = "premium_contents";
    public $primaryKey = "id";

    public function client() {
    	return $this->hasOne('App\Client', 'id', 'client_id');
    }

    public function order() {
    	return $this->hasOne('App\Invoice', 'id', 'order_id');
    }

    public function tasks() {
    	return $this->hasMany('App\ProjectTask', 'project_id', 'id');
    }

    public function scopeActive($query) {
    	return $query->where('status', 1);
    }

    public function scopeComplete($query) {
    	return $query->where('status', 2);
    }

}
