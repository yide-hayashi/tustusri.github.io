<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class ProtfolioContent extends Model
{
    use HasFactory,softDeletes;
    protected $datas=["deleted_at"];
    protected $table="ProtfolioContent";
    protected $promaryKey="ProtfolioContentID";

    protected $fillable=[
        "ProtfolioContentImg",
        "ProtfolioProjectName",
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
