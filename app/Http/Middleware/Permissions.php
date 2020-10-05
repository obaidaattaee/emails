<?php

namespace App\Http\Middleware;

use Closure;

class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $return = $next($request);
        //dd($request->headers->get('referer'));
        //جبنا اليوزر الي فايت
        $loggedInUser = auth()->user();
        //جبنا الراوت المطلوب
        $requestedRouteName = request()->route()->getName();
        //جبنا اللنك من القاعدة بناء على الراوت المطلوب
        $link = \App\Models\Link::where('route',$requestedRouteName)->first();
        //اذا كان هناك لينك بالقاعدة وفي نفس الوقت
        //لا يحمل المستخدم الطالب صلاحية عليها
        if($link && !$link->users->contains($loggedInUser)){
            //روح يا عم
            return redirect(route('admin.no-access'));
        }
        return $return;
    }
}
