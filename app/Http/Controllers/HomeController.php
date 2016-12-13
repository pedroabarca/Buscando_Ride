<?php

namespace App\Http\Controllers;

use App\Day;
use App\day_ride;
use App\Ride;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Echo_;
use Validator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $days = Day::all();
        $rides = Auth::user()->rides;
        return view('home',['days' => $days],['rides'=>$rides]);
    }

    protected function create(array $data)
    {

    }

    /**
     * @param Request $request
     * @return static
     */
    public function store(Request $request)
    {

        $userId = Auth::id();
        $ride = Ride::create([
            'name' => $request['name'],
            'user_id' => $userId,
            'departure' => $request['departure'],
            'destination' => $request['destination'],
            'description' => $request['description'],
            'departure_time' => $request['departure_time'],
        ]);

        if ($ride->save()){
            $insertedId = $ride->id;

            foreach ($request['days'] as $day)
            {
                day_ride::create([
                    'ride_id' => $insertedId,
                    'day_id' => $day,
                ]);
            }
        }else{
            Session::flash('message','Ha ocurrido un error!');
            Session::flash('class', 'danger');
        }


        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
