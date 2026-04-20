<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Add the new columns to the $fillable array
    protected $fillable = [
        'package_id',       // Links to the package
        'service_id',       // Links to the service
        'name',             // User's name
        'email',            // User's email
        'phone',            // User's phone
        'skin_type',        // User's skin type
        'booking_date',     // Date of the appointment
        'booking_time',     // Time of the appointment
        'comments',         // Optional comments
    ];

    // Relationship with Package
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    // Relationship with Service (ADD THIS)
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
?>
