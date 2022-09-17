<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Protfolio extends Model
{
    use HasFactory,softDeletes;
    protected $datas=["deleted_at"];
    protected $table="Protfolio";
    protected $promaryKey="ProtfolioID";

    protected $fillable=[
        "ProtfolioText",
        "ProtfolioSub"
    ];
    public function Pid()
    {
        return $this->hasOne(PageName::class);
    }
}
