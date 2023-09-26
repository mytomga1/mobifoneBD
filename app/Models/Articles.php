<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
    use HasFactory, SoftDeletes; // add SoftDeletes vào model

    //tạo mối quan hệ bài viết và Danh mục
    public function Article_Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    //tạo mối quan hệ bài viết và user
    public function Article_User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
