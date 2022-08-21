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
    protected $fillable = ['slug', 'parent_id', 'is_active'];

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
    
    public function getActive()
    {
        $result = $this->is_active == 0 ? __('admin/general.not active'):__('admin/general.active');
        return $result;
    }
  

    public function scopeActive($query){
        return $query -> where('is_active',1) ;
    }
}
