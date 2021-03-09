<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $guarded = [];


    public function deleteFromStorage($url)
    {
    	$file_path_review = public_path() . '/' . $url;

        if (file_exists($file_path_review)) {
            unlink($file_path_review);
        }
    }

    protected static function findOrCreateFromString(string $url, string $type = null)
    {

        $file = static::findFromString($url, $type);

        if (! $file) {
            $file = static::create([
                'url' => $url,
                'type' => $type,
            ]);
        }

        return $file;
    }

    public static function findFromString(string $url, string $type = null)
    {

        return static::query()
            ->where("url", $url)
            ->where('type', $type)
            ->first();
    }
}
