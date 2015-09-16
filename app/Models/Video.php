<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

    protected $guarded = ['_token'];

    public function categories()
    {
        return $this->belongsToMany('\App\Models\Category');
    }

    public function owner()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

    public function getCategoriesShowAttribute()
    {
        //dd($this->categories->lists('name'));
        return implode($this->categories->sortBy('name')->lists('name'), ', ');
    }

    public function getFilenameAttribute()
    {
        return head(array_filter(explode('.', $this->video)));
    }

    public function getExtensionAttribute()
    {
        return last(array_filter(explode('.', $this->video)));
    }

}
