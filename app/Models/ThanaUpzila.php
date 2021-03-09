<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;

class ThanaUpzila extends Model
{
    use HasSlug;
	
    protected $fillable = [
    	'name','district_id','slug','status'
    ];

    public function district()
    {
    	return $this->belongsTo(District::class,'district_id');
    }
}
