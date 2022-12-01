<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\PermissionRol;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class PermissionAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // verificar si hay usuario
        if (!auth('api')->user()) {
            return response()->json(['msg'=>'you do not have permission for this page',401]);
        } else{
            $user = auth('api')->user();
            $url = $request->path();
            $newUrl = $this->getNewUrl($url);
            error_log($newUrl);
            $method = $request->method();
            $permission = Permission::where([
                ['url',$newUrl],
                ['method', $method]
            ])->first();

            if($permission){
                $permission_rol = PermissionRol::where(
                    ['rol_id','=',$user->rol_id],
                    ['permission_id','=',$permission]
                );

                if($permission_rol){
                    return $next($request);
                }else {
                    return response()->json(['msg'=>'yo do not permission access for this page',401]);
                }
            }else{
                return response()->json(['msg'=>'yo do not permission access for this page',401]);

            }

        }
    }

    public function getNewUrl($url){
        $p = explode("/", $url);
        $newURL = "";
        for ($i = 1; $i < count($p); $i++) {
            $pattern = '/[0-9]/';
            if (preg_match_all($pattern, $p[$i]) >= 1) {
                $newURL = $newURL . "?" . "/";

            } else {
                $newURL = $newURL . $p[$i] . "/";

            }
        }
        $newURL = substr($newURL, 0, strlen($newURL) - 1);
        return $newURL;
    }
}
