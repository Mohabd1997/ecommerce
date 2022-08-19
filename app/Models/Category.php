<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use Translatable;
    use HasFactory;
    
    /**
     * The relations to eager load on very query.
     * 
     * @var array
     */
    protected $with = ['translations'];


    protected $translatedAttributes = ['name'];

     /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['parent_id', 'slug', 'is_active'];

     /**
     * The attributes that should be cast to native types.
     * 
     * @var array
     */

    protected $hidden = ['translations'];

    /**
     * The attributes that should be cast to native types.
     * 
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

     /**
     * Set the given settings
     * 
     * @param array $settings
     * @return void
     */
    public static function setMany($settings)
    {
        foreach($settings as $key => $value)
        {
            self::set($key, $value);
        }
    }

     /**
     * Set the given settings
     * 
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set($key,$value)
    {
        if($key === 'translatable')
        {
            return static::setTranslatableSettings($value);
        }
        if(is_array($value))
        {
            $value = json_encode($value);
        }

        static::updateOrCreate(['key'=>$key],['plain_value'=>$value]);
    }

     /**
     * Set a translatable settings
     * 
     * @param array $settings
     * @return void
     */
    public static function setTranslatableSettings($settings = [])
    {
        foreach($settings as $key => $value)
        {
            static::updateOrCreate(['key'=>$key],['is_translatable'=>true,'value' => $value]);
        }
    }
    
}
