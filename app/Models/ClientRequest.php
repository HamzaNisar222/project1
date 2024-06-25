<?php
// app/Models/ClientRequest.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'vendor_service_offering_id', 'status', 'details', 'requested_at',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
    public function vendorServiceOffering()
    {
        return $this->belongsTo(VendorServiceOffering::class, 'vendor_service_offering_id');
    }


}
