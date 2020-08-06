<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    protected $table = "kegiatan_models";
    protected $fillable = ["nama_kegiatan","event_models_id","created_at","updated_at"];
    public function eventModel()
    {
        return $this->belongsTo(EventModels::class);
    }
}
