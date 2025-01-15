<?php

namespace App\Http\Controllers;

use App\Models\AccessRequest;
use Illuminate\Http\Request;

class AccessRequestController extends Controller
{
    public function index()
    {
        $requests = AccessRequest::paginate(10);
        return view('access_requests.index', compact('requests'));
    }

    public function approve(AccessRequest $accessRequest)
    {
        $accessRequest->update(['status' => 'approved']);
        return redirect()->route('access-requests.index');
    }

    public function reject(AccessRequest $accessRequest)
    {
        $accessRequest->update(['status' => 'rejected']);
        return redirect()->route('access-requests.index');
    }
}
