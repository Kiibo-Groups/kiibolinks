<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\PricingPlan;

class ShortLinksController extends Controller
{
    public function index(Request $req)
    {
        $linkLimit = 0;
        $user = auth()->user();
        $SA = $user->hasRole('SUPER-ADMIN');
        $plan = PricingPlan::where('id', $user->pricing_plan_id)->first();
  
        if ($SA) {
            $links = Link::where('link_type', 'shortlink')->orderBy('created_at', 'desc')->paginate(10);
            return view('pages.admin.short-links', compact('links'));
  
        } else {
            $links = Link::where('user_id', $user->id)->where('link_type', 'shortlink')->orderBy('created_at', 'desc')->paginate(10);
  
            if ($plan->biolinks == 'Unlimited') {
                $limit_over = false;
                return view('pages.short_links', compact('links', 'limit_over'));
            }
  
            if ($links->count() >=  intval($plan->biolinks)) {
                $limit_over = true;
                return view('pages.short_links', compact('links', 'limit_over'));
            } else {
                $limit_over = false;
                return view('pages.short_links', compact('links', 'limit_over'));
            }
        }
    }
}
