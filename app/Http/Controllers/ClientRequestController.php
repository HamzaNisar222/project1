<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientRequest;

class ClientRequestController extends Controller
{
    public function store(Request $request)
    {
        // Check if a request with the same client_id and vendor_service_offering_id already exists
        $existingRequest = ClientRequest::where('client_id', $request->user->id)
                                        ->where('vendor_service_offering_id', $request['vendor_service_offering_id'])
                                        ->first();

        if ($existingRequest) {
            return response()->json(['message' => 'Request for this offer has already been made'], 400);
        }

        $clientRequest = new ClientRequest([
            'status' => 'pending',
            'details' => $request['details'],
        ]);

        $clientRequest->client_id = $request->user->id;
        $clientRequest->vendor_service_offering_id = $request['vendor_service_offering_id'];
        $clientRequest->save();

        return response()->json(['message' => 'Client request created successfully', 'client_request' => $clientRequest], 201);
    }
}
