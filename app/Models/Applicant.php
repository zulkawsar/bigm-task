<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Models\District;
use App\Models\Division;
use App\Traits\HasFiles;
use App\Models\ThanaUpzila;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasSlug, HasFiles;
    
    protected $fillable = [
    	'name','slug','email','mailing_address','division_id','district_id','status',
    	'thana_upzila_id','address_details','language','education','training'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class,'division_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function thanaUpazila()
    {
        return $this->belongsTo(ThanaUpzila::class,'thana_upzila_id');
    }

    public function setEducationAttribute( $value ) {
        $this->attributes['education'] = json_encode( $value );
    }

    public function getEducationAttribute( $value ) {
    	return json_decode( $value );
    }

    public function setLanguageAttribute( $value ) {
        $this->attributes['language'] = json_encode( $value );
    }

    public function getLanguageAttribute( $value ) {
    	return json_decode( $value );
    }

    public function setTrainingAttribute( $value ) {
        $this->attributes['training'] = json_encode( $value );
    }

    public function getTrainingAttribute( $value ) {
    	return json_decode( $value );
    }
}
