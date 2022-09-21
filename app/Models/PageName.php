<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Home;
class PageName extends Model
{
    use HasFactory,SoftDeletes;
    protected $datas=["deleted_at"];
    protected $table="PageNames";
    protected $promaryKey="Pid";

    protected $fillable=[
        "PageName"
    ];
    public function HomePid()
    {
       return $this->belongsTo(Home::class,"Pid","Pid");
    }
    public function ProtfolioPid()
    {
       return $this->belongsTo(Protfolio::class);
    }
    public function ProtfolioContentPid()
    {
       return $this->belongsTo(ProtfolioContent::class);
    }
}
