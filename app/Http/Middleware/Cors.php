<?php namespace App\Http\Middleware;

use App\Entities\User;
use Closure;

class Cors
{

    public function handle($request, Closure $next)
    {

        // ALLOW OPTIONS METHOD

//        $headers = [
//            'Access-Control-Allow-Origin' => '*',
//            'Access-Control-Allow-Headers' => 'Origin, Content-Type',
//            'Access-Control-Allow-Credentials: true',
//
//        ];


        //$token = $request->headers->all();
        //$token = '$2y$10$WqqbMZ/W4njUOe3DQDTBy.OHXdzY/QdXbxIT1Pc.jGSa3g.b2qC7G';

//    if(isset($token['x-csrf-token']))
//    {
//        $user = User::where('token', $token['x-csrf-token'])->get();
//
//        if ($user->count() != 0) {
//            Auth::loginUsingId($user->first()->id);
//
//            header('Access-Control-Allow-Origin:  *');
//            header('Access-Control-Allow-Credentials: true');
//            header('Acces-Control-Allow-Headers: Origin, Content-Type ');
//
//            return $next($request);
//        }
//        return response()->json('invalid Token');
//    }
//    else
//    {
//        return response()->json('Token not found');
//    }


        // if($request->server('HTTP_HOST') == 'localhost')
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Credentials', 'true')
            //->header('Acces-Control-Allow-Headers: Origin, Content-Type ')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');


        /*

        if ($request->getMethod() != "OPTIONS") {
            return $next($request);
        }

        $response = $next($request);

        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }
*/

    }
}