<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class AboutmeTitle extends Model
{
    use HasFactory,softDeletes;
    protected $table="AboutmeTitle";
    protected $promaryKey="Pid";
    protected $fillable=[
        "Pid",
        "PageSubtext",
        "PageTitle"
    ];
}
