<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContanctSoft extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="Contanct";
    protected $promaryKey="SoftID";
    protected $fillable=[
        "icon",
        "link",
    ];
    public function ContanctID() //(1對多的逆向查詢)
    {
        return $this->belongsTo('app\Models\Contanct',"ContanctID","ContanctID");
        //return $this->belongsTo('class path',"表t2的FK 原始名稱","表t1的對應名稱");
    }
}
