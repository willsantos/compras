<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopListFormRequest;
use App\Item;
use App\ListItem;
use App\ShopList;
use ErrorException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopListsControllerApi extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $lists = ShopList::all();
        return Response()->json($lists);
    }


    public function store(ShopListFormRequest $request): JsonResponse
    {
        try {
            $data = ShopList::create($request->all());
            return Response()->json('Cadastrado com sucesso');
        } catch (ErrorException $e) {
            return Response()->json('Falha ao cadastraar');
        }

    }

    public function storeItems(Request $request): RedirectResponse
    {
        $item = Item::findOrCreate($request->name);


        $listItem = (new ListItem)->findOrCreate($request->id, $item->id, $request->priority);

        if ($listItem) {
            $request->session()->flash('message', "$item->name adicionado com sucesso.");
        } else {
            $request->session()->flash('error_add', "$item->name já esta na lista.");
        }


        return redirect()->route('show_list', $request->id);
    }

    public function updateItems(Request $request): RedirectResponse
    {
        $data = $request->all([
            'status',

        ]);
        $listItem = ListItem::find($request->id);
        $listItem->update($data);

        $data->save();

        $request->session()->flash(
            'message',
            "foi atualizada com sucesso"
        );

        return redirect()->route('show_list', 1);

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
