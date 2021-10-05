<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemsController extends Controller
{
    public function index(Request $request): View
    {
        $items = Item::all();
        $message = $request->session()->get('message');
        return view('Item.index', compact('items', 'message'));
    }

    public function create(): View
    {
        return view('Item.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = Item::create($request->all());
        $request->session()->flash('message', "Item: $data->name criado com sucesso.");

        return redirect()->route('items');
    }

    public function show(Request $request): View
    {
        $data = Item::find($request->id);
        $message = $request->session()->get('message');
        return view('Item.show', compact('data', 'message'));
    }


    public function edit(Request $request): View
    {
        $data = Item::find($request->id);

        return view('Item.edit', compact('data'));
    }

    public function update(Request $request): RedirectResponse
    {
        $dataUpdate = $request->all([
            'name',
        ]);

        $data = Item::find($request->id);
        $data->update($dataUpdate);
        $data->save();

        $request->session()->flash(
            'message',
            "Item: $data->name foi atualizado com sucesso"
        );

        return redirect()->route('show_item', $data->id);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Item::destroy($request->id);

        $request->session()->flash('message', "Item excluído com sucesso.");
        return redirect()->route('items');
    }


}
