<?php

namespace App\Http\Controllers;

use App\ShopList;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopListsController extends Controller
{
    public function index(): View
    {
        $lists = ShopList::all();

        return view('Shop.index', compact('lists'));
    }

    public function create(): View
    {
        return view('Shop.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = ShopList::create($request->all());


        return redirect()->route('lists');
    }

    public function show(Request $request): View
    {
        $data = ShopList::find($request->id);

        return view('Shop.show', compact('data'));
    }


    public function edit(Request $request): View
    {
        $data = ShopList::find($request->id);

        return view('Shop.edit', compact('data'));
    }

    public function update(Request $request): RedirectResponse
    {
        $dataUpdate = $request->all([
            'name',
        ]);

        $data = ShopList::find($request->id);
        $data->update($dataUpdate);
        $data->save();

        return redirect()->route('show_list', $data->id);
    }

    public function destroy(Request $request): RedirectResponse
    {
        ShopList::destroy($request->id);
        return redirect()->route('lists');
    }


}
