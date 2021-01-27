<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(City $city=null)
    {
        if (!$city) {
            $city = new City;
        }
        $cities=City::latest()->paginate(20);
        return view('city.index',compact('cities','city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        City::create($request->validated());
        return redirect()->back()->with('success', 'City Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return $this->index($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
        $city->update($request->validated());
        return redirect()->route('cities.index')->with('success', 'City Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->back()->with('success','City Deleted');
    }

    public function search(Request $request){
        $cities = new City;
        if ($request->has('provinces')) {
            if ($request->provinces != null)
                $cities = $cities->where('provinces', ["$request->provinces"]);
        }
        if ($request->has('name')) {
            if ($request->name != null)
                $cities = $cities->where('name', 'LIKE', ["$request->name%"]);
        }
        $cities=$cities->paginate();
        $city=null;
        if (!$city) {
            $city = new City;
        }
        return view('city.index',compact('cities','city'));
    }
}
