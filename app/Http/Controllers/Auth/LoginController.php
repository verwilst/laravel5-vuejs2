<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function username()
    {
        return 'username';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @SWG\Post(
     *     tags={"auth"},
     *     path="/auth/token",
     *     operationId="token",
     *     summary="Request new JWT Token.",
     *     description="",
     *     consumes={"application/json", "application/xml"},
     *     produces={"application/xml", "application/json"},
     *     @SWG\Parameter(
     *         name="username",
     *         in="query",
     *         type="string",
     *         description="ID",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="password",
     *         in="query",
     *         type="string",
     *         description="Password",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Token successful",
     *     )
     * )
     */
    public function login(Request $request)
    {

        $credentials = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];

        $this->validateLogin($request);

        if ($token = $this->guard()->attempt($credentials)) {
            $this->clearLoginAttempts($request);
            return response()->json([
                'token' => $token,
            ]);
        }

        return response()->json([
            'message' => Lang::get('auth.failed'),
        ], 401);

    }
}
