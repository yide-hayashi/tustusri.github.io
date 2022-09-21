<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutmeTitle extends Model
{
    use HasFactory;
    protected $table="AboutmeTitle";
    protected $promaryKey="Pid";
    protected $fillable=[
        "Pid",
        "PageSubtext",
        "PageTitle"
    ];
}
