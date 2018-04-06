<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use Session;
use App\Role;
use DateTime;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        Validator::extend('olderThan', function($attribute, $value, $parameters)
        {
            $minAge = ( ! empty($parameters)) ? (int) $parameters[0] : 17;
            return (new DateTime)->diff(new DateTime($value))->y >= $minAge;

        // or the same using Carbon:
        // return Carbon\Carbon::now()->diff(new Carbon\Carbon($value))->y >= $minAge;
        });

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'birth_date' => 'required|olderThan:17',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);

        // $tanggal = strtotime('10/16/2003');
        // $newformat = date('Y-m-d',$tanggal);
        $birth = date('Y-m-d', strtotime($data['birth_date']));
        $dbDate = Carbon::parse($birth);
        $diffYears = Carbon::now()->diffInYears($dbDate);
        // dd($diffYears);

        //diffInYears
        // $status = UserDetail::where([['id','=', Auth::id()]])->first();
        // $file_status;

        if($diffYears < 17) {
            Session::flash('error', 'Your age must be above 17'); 
            return redirect()->back()->withMessage("Your age must be above 17");
        } else {
            // $userrole = Sentinel::findRoleByName('User');
            // $storeuser = Sentinel::registerAndActivate($request->all());
            // $storeuser->roles()->attach($userrole);
            Session::flash('notice', 'Success create new user');
            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => bcrypt($data['password']),
                
              ]);
              $user
                 ->roles()
                 ->attach(Role::where('name', 'employee')->first());
          
              return $user;
        }

        
    }
}
