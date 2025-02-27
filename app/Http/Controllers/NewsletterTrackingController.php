<?php

namespace App\Http\Controllers;

use App\Models\NewsletterCampaign;
use Illuminate\Http\Request;

class NewsletterTrackingController extends Controller
{
    /**
     * Track email opens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function trackOpen(Request $request, $id)
    {
        // Here you can implement more sophisticated tracking logic
        // For now, we'll just increment the open count of the most recent active campaign

        $campaign = NewsletterCampaign::where('status', 'sent')
            ->orderBy('sent_at', 'desc')
            ->first();

        if ($campaign) {
            $campaign->increment('opened_count');
        }

        // Return a transparent 1x1 pixel
        $pixel = base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
        return response($pixel, 200)->header('Content-Type', 'image/gif');
    }
}
