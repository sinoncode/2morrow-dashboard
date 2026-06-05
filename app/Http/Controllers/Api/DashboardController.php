<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Agent;
use App\Models\Contact;
use App\Models\EmailMessage;
use App\Models\Lead;
use App\Models\Property;
use App\Models\PropertyRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->authorizePermission($request, 'view_dashboard');
        return response()->json([
            'counts' => [
                'users' => User::count(),
                'agents' => Agent::count(),
                'properties' => Property::count(),
                'contacts' => Contact::count(),
                'leads' => Lead::count(),
                'requests' => PropertyRequest::count(),
                'activities' => Activity::count(),
                'emails' => EmailMessage::count(),
            ],
            'status' => [
                'active_properties' => Property::where('status', 'active')->count(),
                'completed_activities' => Activity::where('status', 'completed')->count(),
                'open_requests' => PropertyRequest::where('status', 'open')->count(),
            ],
            'latest' => [
                'leads' => Lead::latest()->limit(5)->get(),
                'requests' => PropertyRequest::latest()->limit(5)->get(),
                'activities' => Activity::latest()->limit(5)->get(),
            ],
        ]);
    }
}
