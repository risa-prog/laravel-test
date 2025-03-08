<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded=array('id');

    protected $fillable=[
        'first_name',
        'last_name',
        'category_id',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category',
        'detail'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function scopeKeywordSearch($query, $keyword){
        if(!empty($keyword)){
            $query->where('first_name','like','%'.$keyword.'%')->orWhere('last_name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%');
        }
    }

    public function scopeGenderSearch($query,$gender){
        if(!empty($gender)){
            $query->where('gender',$gender);
        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
        $query->where('category_id', $category_id);
        }
    }

    public function scopeDateSearch($query,$created_at){
        if (!empty($created_at)) {
        $query->where('created_at', $created_at);
        }
    }
    

}
