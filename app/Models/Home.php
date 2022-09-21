<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Home extends Model
{
    use HasFactory,SoftDeletes;
    protected $datas=["deleted_at"];
    protected $table="Homes";
    protected $promaryKey="HomeID";

    protected $fillable=[
        "LogoImg",
        "HomePageSubhead",
        "HomeText",
        "HomeSubtext"
    ];
    public function Pids()
    {
        return $this->hasOne(PageName::class,"Pid","Pid");
    }
}
