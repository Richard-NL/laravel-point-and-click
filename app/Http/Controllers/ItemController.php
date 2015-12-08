<?php

namespace App\Http\Controllers;

use App\Model\Item;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemFormRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index', ['items' => $items]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('item.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param ItemFormRequest $request
     * @return mixed
     */
    public function store(ItemFormRequest $request)
    {
        $item = new Item();
        $item->name = $request->get('name');
        $item->active = $request->get('active');
        $item->save();
        return \Redirect::route('item')
            ->with('message', 'Item saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
