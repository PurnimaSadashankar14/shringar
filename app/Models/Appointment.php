<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
   protected $fillable = ['status'];


   public function package()
{
    return $this->belongsTo(Package::class, 'package_id');
}

public function service()
{
    return $this->belongsTo(Service::class, 'service_id');
}

}
