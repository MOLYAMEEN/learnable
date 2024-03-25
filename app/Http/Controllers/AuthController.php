<?php

namespace App\Http\Controllers;
use App\Events\VerifyEmailByCode;
use Illuminate\Http\Request;
use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct( )
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function resendActiveCode(Request $request){
       $data = $request->validate([
        'code_type'=>'required|in:email,mobile'
    ]);
    if($request->code_type == 'mobile'){
       // event(new  VerifyEmailByCode(User::find(authApi()->id())));
    }
    
    elseif($request->code_type == 'email')
    {
        event(new  VerifyEmailByCode(User::find(authApi()->id())));
    }
    }



    public function register(Register   $request){
        $data =  $request->validated();
         $data['password'] =bcrypt($request->password);
         $data['mobile'] = ltrim($request->mobile,'0');
         $data['mobile_code'] = rand(0000,99999);
         $data['email_code'] = rand(0000,99999);
         //return $data;
         $user = User::create($data);

         $credentials = ['email'=>$user->email,'password'=>$request->password];

         return $this->login($credentials);
             
    }

   

    /**
     * Get a JWT via given credentials.
     *
     */
    public function login(array $creden=null)
    {
        $credentials = [
                   'password'=>request('password')          //اتحقق ان هذا باسورد 
        ];
        if(filter_var(request('account'),FILTER_VALIDATE_EMAIL,)){
            $credentials['email']=request('account');
        }
        elseif(intval(request('account'))){
            $credentials['mobile']=ltrim(request('account'),'0');
        }

        $attempt = !empty($creden)?$creden:$credentials;
         //return $attempt;

        if (! $token = authApi()->attempt($attempt)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $data =[];
        $data['token'] = $this->respondWithToken($token)?->original;
        
        $data['need_mobile_verfied'] = authApi()->user()->mobile_verified_at ==null;
        $data['need_email_verified'] = authApi()->user()->email_verified_at ==null;

        return res_data($data,__('main.login_msg'));
    }

    /**
     * Get the authenticated User.
     *
     */
    public function me()
    {
        $user =  authApi()->user()->only('id','name','mobile','email');
        return res_data($user);
        
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        authApi()->logout();

        return res_data([],__('main.logout_msg'));
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $token = $this->respondWithToken(authApi()->refresh());
        return res_data( $token);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => authApi()->factory()->getTTL() * 99999
        ]);
    }
}
