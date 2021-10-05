<?php

namespace App\Http\Controllers;

use App\ShopList;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopListsController extends Controller
{
    public function index(Request $request): View
    {
        $lists = ShopList::all();
        $message = $request->session()->get('message');
        return view('Shop.index', compact('lists', 'message'));
    }

    public function create(): View
    {
        return view('Shop.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = ShopList::create($request->all());
        $request->session()->flash('message', "$data->name criada com sucesso.");

        return redirect()->route('lists');
    }

    public function show(Request $request): View
    {
        $data = ShopList::find($request->id);
        $message = $request->session()->get('message');
        return view('Shop.show', compact('data', 'message'));
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

        $request->session()->flash(
            'message',
            "$data->name foi atualizada com sucesso"
        );

        return redirect()->route('show_list', $data->id);
    }

    public function destroy(Request $request): RedirectResponse
    {
        ShopList::destroy($request->id);

        $request->session()->flash('message', "Lista excluída com sucesso.");
        return redirect()->route('lists');
    }


}
