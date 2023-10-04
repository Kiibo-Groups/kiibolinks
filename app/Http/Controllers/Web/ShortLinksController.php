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

        $isSuperAdmin = $user->hasRole('SUPER-ADMIN');

        if ($isSuperAdmin) {
            $links = Link::where('link_type', 'shortlink')->orderBy('created_at', 'desc')->paginate(10);
            return view('pages.admin.short-links.index', compact('links'));
  
        } else {
            $links = Link::where('user_id', $user->id)->where('link_type', 'shortlink')->orderBy('created_at', 'desc')->paginate(10);
            $plan = PricingPlan::where('id', $user->pricing_plan_id)->first();
  
            if ($plan->biolinks == 'Unlimited') {
                $limit_over = false;
                return view('pages.short-links.index', compact('links', 'limit_over'));
            }
  
            if ($links->count() >=  intval($plan->biolinks)) {
                $limit_over = true;
                return view('pages.short-links.index', compact('links', 'limit_over'));
            } else {
                $limit_over = false;
                return view('pages.short-links.index', compact('links', 'limit_over'));
            }
        }
    }
}
