<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class AccessControlMiddleware
{
    use AuthorizesRequests;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            //code...
            $user = auth()->user();
            
            if ($user->is_active) {
                $this->authorize( $request->route()->getName() );
        
                return $next($request);
            }

            throw new Exception("Acesso não autorizado", 1);
            
        } catch (\Exception $e) {

            // dd($e->getMessage());
            
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return view('auth.login')->with("danger", "Acesso interrompido, entre em contato com o administrador do sistema através do E-mail: 'suporte.savedocs@teste.com', para mais informações.");
        }

    }
}
