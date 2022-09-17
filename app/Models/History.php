<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class History extends Model
{
    use HasFactory,softDeletes;
    protected $table="History";
    protected $promaryKey="HistoryID";
    protected $fillable=[
        "Startyear",
        "Endyear",
        "PageText",
        "ContentTitle",
        "ContentSub",
        "img"
    ];
    public function Pid()
    {
        return $this->hasOne(PageName::class);
    }
}
