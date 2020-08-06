<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeralatanModel extends Model
{
    protected $table = "peralatan_models";
    protected $fillable = ["nama","jumlah","created_at","updated_at"];
}
