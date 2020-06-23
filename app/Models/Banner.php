<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
     // 指定表名
   protected $table = 'banner';
   protected $primaryKey = 'id';
   // 关闭时间戳
   public $timestamps = false;
   // 黑名单
   protected $guarded = [];
}
