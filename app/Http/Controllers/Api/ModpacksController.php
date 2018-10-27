<?php

namespace App\Http\Controllers\Api;

use App\Modpack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class ModpacksController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modpacks = QueryBuilder::for(Modpack::class)->get();

        return response()->json($modpacks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modpack = Modpack::create($request->all());

        return response()->json($modpack);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modpack = QueryBuilder::for(Modpack::where('id', $id))
            ->firstOrFail();

        return response()->json($modpack);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modpack  $modpack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modpack $modpack)
    {
        $modpack->update($request->all());

        return response()->json($modpack);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modpack $modpack
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Modpack $modpack)
    {
        $modpack->delete();

        return response()->json([], 204);
    }
}
