<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $val_data = $request->validate([
            'name' => ['required', 'unique:technologies']
        ]);
        $val_data['slug'] = Str::slug($val_data['name'], '-');

        $technology = Technology::create($val_data);

        return redirect()->back()->with('message', "La tecnologia $technology->name è stata creata correttamente");
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $val_data = $request->validate([
            'name' => ['required', Rule::unique('technologies')->ignore($technology)]
        ]);
        $val_data['slug'] = Str::slug($val_data['name']);
        $technology->update($val_data);
        return redirect()->back()->with('message', "Tecnologia $technology->name è stata aggiornata con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->back()->with('message', "Tecnologia $technology->name è stata cancellata");
    }
}
