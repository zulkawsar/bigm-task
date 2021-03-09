<?php 

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

trait HasSlug
{

	public static function bootHasSlug()
	{
	    static::creating(function ($model) {
	        $make_slug = Str::slug($model->name);
	        if (Schema::hasColumn($model->getTable(), 'deleted_at'))
	        {
		        $exists = $model->where('slug', $make_slug)->withTrashed()->count();
	        }else{
		        $exists = $model->where('slug', $make_slug)->count();
	        }
	        while ($exists > 0) {
	            $make_slug = $make_slug.'-'.rand(1, 9999);
                if (Schema::hasColumn($model->getTable(), 'deleted_at'))
                {
        	        $exists = $model->where('slug', $make_slug)->withTrashed()->count();
                }else{
		            $exists = $model->where('slug', $make_slug)->count();
                }
	        }
	        $model->slug = $make_slug;
	    });
	}

	public function getRouteKeyName()
	{
	    return 'slug';
	}
}