<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
	use HasSlug;
	
    protected $fillable = [
    	'name','slug','status'
    ];
}
