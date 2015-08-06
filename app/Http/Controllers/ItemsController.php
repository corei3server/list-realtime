<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;

use Vinkla\Pusher\PusherManager;

class ItemsController extends Controller {
    protected $item;
    protected $pusher;

    public function __construct( Item $item, PusherManager $pusher )
    {
        $this->item   = $item;
        $this->pusher = $pusher;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->item->orderBy('id', 'desc')->get();

        return new JsonResponse([
            'items' => $items->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function store( Request $request )
    {
        $item = $request->all();

        $item = $this->item->create($item);

        $this->pusher->trigger('list', 'item-new', ['item' => $item->toArray()]);

        return new JsonResponse( [
            'item' => $item->toArray()
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int     $id
     *
     * @return Response
     */
    public function update( Request $request, $id )
    {
        $item = $message = $this->item->findOrFail($id);
        $item->title = $request->get('title');
        $item->save();

        $this->pusher->trigger('list', 'item-updated', ['item' => $item->toArray()]);

        return new JsonResponse( [
            'item' => $item->toArray()
        ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy( $id )
    {
        $item = $message = $this->item->findOrFail($id);

        $this->item->destroy($id);

        $this->pusher->trigger('list', 'item-delete', ['item' => $item->toArray()]);

        return new JsonResponse( [
            'item' => $item->toArray()
        ] );
    }
}
