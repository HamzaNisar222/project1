<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorServiceOffering extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'subservice_id',
        'price',
        'time_slot',
    ];


    public function clientRequests()
    {
        return $this->hasMany(ClientRequest::class, 'vendor_service_offering_id');
    }


}
