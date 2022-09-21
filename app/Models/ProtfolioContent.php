<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProtfolioContent extends Model
{
    use HasFactory,SoftDeletes;
    protected $datas=["deleted_at"];
    protected $table="ProtfolioContents";
    protected $promaryKey="ProtfolioContentID";
    protected $save=[

        "ProtfolioProjectName",
    ];

    protected $fillable=[
        "Pid",
        "ProtfolioContentImg",
        "ProtfolioProjectContent",
        "PopupImg",
        "PopupName",
        "PopupSubtext",
        "PopupContent",
        "PopupLink",
    ];
    public function Pid()
    {
        return $this->hasOne(PageName::class);
    }
    public function Category()
    {
        return $this->belongTos(Category::class);
    }
}
