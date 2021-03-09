<?php

namespace App\Traits;

use App\Models\Image;
use InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasFiles
{
	protected $queuedFiles = [];

	public static function getFileClassName(): string
	{
	    return Image::class;
	}

	public static function bootHasFiles()
	{
	    static::created(function (Model $imageableModel) {
	        if (count($imageableModel->queuedFiles) > 0) {
	            $imageableModel->attachTags($imageableModel->queuedFiles);

	            $imageableModel->queuedFiles = [];
	        }
	    });

	    static::deleting(function (Model $deletedModel) {
	    	if ($deletedModel->isForceDeleting()) {
	    		// dd($deletedModel);
	    		$files = $deletedModel->Files()->get();
	    		$deletedModel->detachFiles($files);
	    	}
	    });
	}

	public function files(): MorphToMany
	{
	    return $this->morphToMany(self::getFileClassName(), 'imageable');
	}


	/**
	 * @param array|\ArrayAccess|
	 * @param string|null $type
	 * @return $this
	 */
	public function attachFiles($files, string $type = null)
	{
	    $className = static::getFileClassName();

	    $files = collect($className::findOrCreate($files, $type));

	    $this->files()->syncWithoutDetaching($files->pluck('id')->toArray());

	    return $this;
	}

	/**
	 * @param array|\ArrayAccess $tags
	 *
	 * @param string|null $type
	 * @return $this
	 */
	public function detachFiles($files, string $type = null)
	{
	    $files = static::convertToFiles($files, $type);
	    collect($files)
	        ->filter()
	        ->each(function (Image $file) {
	            $this->files()->detach($file);
	            $file->deleteFromStorage($file->url);
	            $file->delete();
	        });

	    return $this;
	}

	protected static function convertToFiles($values, $type = null)
	{
	    return collect($values)->map(function ($value) use ($type) {
	        if ($value instanceof Image) {
	            if (isset($type) && $value->type != $type) {
	                throw new InvalidArgumentException("Type was set to {$type} but tag is of type {$value->type}");
	            }
	            return $value;
	        }

	        $className = static::getFileClassName();

	        return $className::findFromString($value, $type);
	    });
	}


	/**
	 * @param string|array|\ArrayAccess|
	 */
	public function setFilesAttribute($files)
	{
	    if (! $this->exists) {
	        $this->queuedFiles = $files;

	        return;
	    }

	    $this->syncFiles($files);
	}


	/**
	 * @param array|\ArrayAccess $files
	 *
	 * @return $this
	 */
	public function syncFiles($files)
	{
	    $className = static::getFileClassName();

	    $files = collect($className::findOrCreate($files));

	    $this->files()->sync($files->pluck('id')->toArray());

	    return $this;
	}

	/**
	 * @param string|
	 *
	 * @param string|null $type
	 * @return $this
	 */
	public function attachFile($file, string $type = null)
	{
	    return $this->attachFiles([$file], $type);
	}

	/**
	 * @param array|\ArrayAccess $files
	 * @param string|null $type
	 *
	 * @return $this
	 */
	public function syncFilesWithType($files, string $type = null)
	{
	    $className = static::getFileClassName();

	    $files = collect($className::findOrCreate($files, $type));

	    $this->syncFileIds($files->pluck('id')->toArray(), $type);

	    return $this;
	}

	/**
	 * Use in place of eloquent's sync() method so that the tag type may be optionally specified.
	 *
	 * @param $ids
	 * @param string|null $type
	 * @param bool $detaching
	 */
	public function syncFileIds($ids, string $type = null, $detaching = true)
	{
	    $isUpdated = false;
        $ids = explode(',', $ids);
	    // Get a list of file_ids for all current tags
	    $current = $this->files()
	        ->newPivotStatement()
	        ->where('imageable_id', $this->getKey())
	        ->where('imageable_type', $this->getMorphClass())
	        ->when($type !== null, function ($query) use ($type) {
	            $fileModel = $this->files()->getRelated();

	            return $query->join(
	                $fileModel->getTable(),
	                'imageables.image_id',
	                '=',
	                $fileModel->getTable().'.'.$fileModel->getKeyName()
	            )
	                ->where('images.type', $type);
	        })
	        ->pluck('image_id')
	        ->all();

	    // Compare to the list of ids given to find the tags to remove
	    $detach = array_diff($current, $ids);
	    if ($detaching && count($detach) > 0) {
	        $this->files()->detach($detach);
	        $isUpdated = true;
	    }
	    // Attach any new ids
	    $attach = array_unique(array_diff($ids, $current));
	    if (count($attach) > 0) {
	        collect($attach)->each(function ($id) {
	            $this->files()->attach($id, []);
	        });
	        $isUpdated = true;
	    }

	    // Once we have finished attaching or detaching the records, we will see if we
	    // have done any attaching or detaching, and if we have we will touch these
	    // relationships if they are configured to touch on any database updates.
	    if ($isUpdated) {
	        $this->files()->touchIfTouching();
	    }
	}


	public function getDefaultImage()
	{
		if($this->files){
			return $this->files()->where([['default', 1], ['type', 'thumb']])->pluck('url')->first();
		}
		return '';
	}

	public function getDefaultCv()
	{
		if($this->files){
			return $this->files()->where([['type', 'cv']])->pluck('url')->first();
		}
		return '';
	}
}