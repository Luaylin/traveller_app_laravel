<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Site
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $state
 * @property $image_path
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Site extends Model
{
    
    static $rules = [
		'name' => 'required',
		'description' => 'required',
		'state' => 'required',
		'image_path' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','state','image_path'];



}
