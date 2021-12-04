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

    public function storeItems(Request $request): JsonResponse
    {
        $item = Item::findOrCreate($request->name);


        $listItem = (new ListItem)->findOrCreate($request->id, $item->id, $request->priority);

        if ($listItem) {

            return Response()->json("$item->name adicionado com sucesso");
        } else {

            return Response()->json("$item->name já está na lista");
        }

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

    public function show(Request $request): JsonResponse
    {
        $data = ShopList::find($request->id);

        $items = $data->items()->orderBy('priority', 'ASC')->get();

        return Response()->json($items);


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

    public function destroy(Request $request): JsonResponse
    {

        if (!ShopList::find($request->id)) {
            return Response()->json('Lista não existe');
        }

        try {
            ShopList::destroy($request->id);
            return Response()->json('Lista excluída com sucesso');
        } catch (\Exception $e) {
            return Response()->json('Falha ao excluir');
        }

    }


}
