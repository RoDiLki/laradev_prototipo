<?php

namespace LaraDev\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaraDev\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$properties = DB::select("SELECT * FROM properties");
        $properties = Property::all();

        return view("property.index")->with('properties',$properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("property.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = $this->setName($request->title);

        //$properties = DB::insert("INSERT INTO properties SET title=?, name=?, description=?, rental_price=?, sale_price=?",
        //    [$request->title, $name, $request->description, $request->rental_price, $request->sale_price]);

        $d = ['title' => $request->title,
            'name' => $name,
            'description' => $request->description,
            'rental_price' => $request->rental_price,
            'sale_price' => $request->sale_price];

        Property::create($d);

        return redirect()->action('PropertyController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //$property = DB::select("SELECT * FROM properties WHERE name=?", [$name]);
        $property = Property::where('name', $name)->get();

        if (!empty($property))
            return view("property.show")->with('property',$property);
        else
            return redirect()->action('PropertyController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        //$property = DB::select("SELECT * FROM properties WHERE name=?", [$name]);
        $property = Property::where('name', $name)->get();
        if (!empty($property))
            return view("property.edit")->with('prop',$property);
        else
            return redirect()->action('PropertyController@index');
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
        $name = $this->setName($request->title);

        $property = Property::find($id);

        $property->title = $request->title;
        $property->name = $name;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;

        $property->save();

        //$properties = DB::update("UPDATE properties SET title=?, name=?, description=?, rental_price=?, sale_price=? WHERE id=?",
        //    [$request->title, $name, $request->description, $request->rental_price, $request->sale_price, $id]);

        return redirect()->action('PropertyController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        DB::delete("DELETE FROM properties WHERE name=?", [$name]);

        //Property::delete();

        return redirect()->action('PropertyController@index');
    }

    private function setName($name){

        $slug = str_slug($name);

        //$property = DB::select("SELECT * FROM properties");
        $property = Property::all();
        $occur = 0;
        foreach ($property as $p) {
            if (str_slug($p->title) == $slug){
                $occur ++;
            }
        }
        if ($occur > 0){
            $slug = $slug."-".$occur;
        }
        return $slug;
    }
}
