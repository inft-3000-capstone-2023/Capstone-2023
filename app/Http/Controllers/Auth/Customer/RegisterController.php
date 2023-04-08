<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Models\Client_User;
use App\Models\Client_Customer;
use App\Models\Client;
use App\Models\Preference;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    //will have to change this to redirect to the client's home page
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showRegistrationForm(Client $client)
    {
        return view('customer.customer_client_views.register', compact('client'));
    }

    public function register(Request $request, Client $client)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all(), $client->id)));

        $this->guard()->login($user);

        $this->redirectTo = route('client_page', $client->id);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data, int $client_id)
    {
        //create a new user of type client user
        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 2,
        ]);

        //if they want to receive marketing and promotional material
        if(in_array('marketing', $data)){
            $preferences = Preference::all()->pluck('id')->toArray();
            Client_Customer::create([
                'user_id' => $newUser->id,
                'client_id' => $client_id,
                'created_at' => Carbon::now(),
            ])->preferences()->attach($preferences);
        } else {
            Client_Customer::create([
                'user_id' => $newUser->id,
                'client_id' => $client_id,
                'created_at' => Carbon::now(),
            ]);
        }

        return $newUser;
    }
}
