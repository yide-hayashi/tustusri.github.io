<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class History extends Model
{
    use HasFactory;
    protected $table="Histories";
    protected $promaryKey="HistoryID";
    protected $fillable=[
        "Startyear",
        "Endyear",
        "ContentTitle",
        "ContentSub",
        "img"
    ];
    public function Pid()
    {
        return $this->hasOne(PageName::class);
    }
}
