<?php

namespace App\Http\Controllers;

use App\City;
use App\Conference;
use App\Country;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('conferences', array('title' => 'Conferences', 'conferences' => Conference::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all()->map(function ($country) {
            return ['name'=>$country->name, 'cities' => $country->cities->pluck('name', 'id')];
        })->pluck('cities', 'name')->toArray();
        return view('conference_create', array('countries' => $countries));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $rules = $rules = array(
            'acronym' => 'required|min:3|max:250',
            'name' => 'required|min:3',
            'city' => 'required|exists:cities,id',
            'rating' => 'required|integer|min:1|max:5',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric|min:0',
        );
        
        $this->validate($request, $rules);
        
        $conference = new Conference();

        $conference->acronym = $data['acronym'];
        $conference->name = $data['name'];
        $conference->city()->associate(City::find($data['city']));
        $conference->rating = $data['rating'];
        $conference->start_date = $data['start_date'];
        $conference->end_date = $data['end_date'];
        $conference->price = $data['price'];

        $conference->save();

        return redirect()->action('ConferenceController@show', array($conference->id))->withMessage('Successfully added new conference!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('conference_show', array('conf' => Conference::findOrFail($id)));
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
