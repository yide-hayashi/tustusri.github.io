<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="Categories";
    protected $promaryKey="CategoryID";

    protected $fillable=[
        "PopupCategory",
        "ProtfolioContentID"
    ];
    public function ProtfolioContentID()
    {
        return $this->hasOne(ProtfolioContent::class);
    }
}
