<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopListFormRequest;
use App\Item;
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

    public function store(ShopListFormRequest $request): RedirectResponse
    {
        $data = ShopList::create($request->all());

        $request->session()->flash('message', "$data->name criada com sucesso.");

        return redirect()->route('lists');
    }

    public function storeItems(Request $request): RedirectResponse
    {
        $item = Item::findOrCreate($request->name);


        $listItem = (new \App\ListItem)->findOrCreate($request->id, $item->id, $request->priority);

        if ($listItem) {
            $request->session()->flash('message', "$item->name adicionado com sucesso.");
        } else {
            $request->session()->flash('error_add', "$item->name já esta na lista.");
        }


        return redirect()->route('show_list', $request->id);
    }

    public function show(Request $request): View
    {
        $data = ShopList::find($request->id);

        $items = $data->items()->orderBy('priority', 'ASC')->get();

        $message = $request->session()->get('message');
        $error_add = $request->session()->get('error_add');

        return view('Shop.show', compact('data', 'items', 'message', 'error_add'));

    }


    public function edit(Request $request): View
    {
        $data = ShopList::find($request->id);

        return view('Shop.edit', compact('data'));
    }

    public function update(ShopListFormRequest $request): RedirectResponse
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
