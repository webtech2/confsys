<?php

namespace App\Http\Controllers;

use App\City;
use App\Conference;
use App\Country;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    // Middleware
    public function __construct() {
        // only Admin has access
        $this->middleware('admin')->only(['create','store']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('conferences', array('title' => 'Conferences', 'conferences' => Conference::orderBy('start_date')->get()));
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
            'image_small' => 'required|image|mimes:png',
            'image_large' => 'required|image|mimes:png',
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

        $images = $conference->images();
        $file = $request->file('image_small')->move($images['server_path'], $images['image_small']);
        $file = $request->file('image_large')->move($images['server_path'], $images['image_large']);

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

    public function indexByCountry()
    {
        return view('countries', array('countries' => Country::all()));
    }    
    
    // AJAX view
    public function getSearch() {
        return view('search');
    }
    // AJAX search
    public function postSearch(Request $request) {
        return Conference::where('name', 'LIKE', '%'.$request->get('search').'%')
                ->orWhere('acronym', 'LIKE', '%'.$request->get('search').'%')->get();
    }
    
}
