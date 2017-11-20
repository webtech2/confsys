<?php

namespace App\Http\Controllers;

use App\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    // Middleware
    public function __construct()
    {
        // only Admin have access
        $this->middleware('admin');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discount_create');
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
            'code' => 'required|min:3|max:8|unique:discounts,code',
            'percent' => 'required|integer|min:1|max:99',
        );
        $this->validate($request, $rules);
      
        $discount = new Discount();
        $discount->code = $data['code'];
        $discount->percent = $data['percent'];
        $discount->save();

        return redirect('admin')->with('message','Discount added!');
    }
}
