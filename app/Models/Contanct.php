<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Contanct extends Model
{
    use HasFactory,softDeletes;
    protected $table="Contancts";
    protected $promaryKey="ContanctID";
    protected $fillable=[
        "Pid",
        "img",
        "ContanctTitle",
        "ContanctText"
    ];
    public function Pid()
    {
        return $this->hasOne(PageName::class);
    }
    public function Soft()
    {
        return $this->hasMany(ContanctSoft::class);
    }
}
