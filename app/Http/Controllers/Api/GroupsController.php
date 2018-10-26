<?php

namespace App\Http\Controllers\Api;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = QueryBuilder::for(Group::class)->get();

        return response()->json($groups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = Group::create($request->all());

        return response()->json($group);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = QueryBuilder::for(Group::where('id', $id))
            ->firstOrFail();

        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->update($request->all());

        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group $group
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return response()->json([], 204);
    }
}
