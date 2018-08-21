<?php

namespace App\Http\Controllers\api;

use App\Codes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Codes[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Codes::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Codes::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Codes::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $codes = Codes::findOrFail($id);
        $codes->update($request->all());

        return $codes;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return bool
     */
    public function destroy($id)
    {
        $codes = Codes::findOrFail($id);
        $codes->delete();

        return true;
    }
}
