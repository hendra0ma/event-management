<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventModels extends Model
{
    protected $table = "event_models";
    protected $fillable = ["nama","tanggal"];
    public function kegiatanModel()
    {
        return $this->hasMany(KegiatanModel::class);
    }
}
