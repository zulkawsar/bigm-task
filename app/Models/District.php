<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Models\Division;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    
	use HasSlug;
	
    protected $fillable = [
    	'name','division_id','slug','status'
    ];

    public function division()
    {
    	return $this->belongsTo(Division::class,'division_id');
    }
}
