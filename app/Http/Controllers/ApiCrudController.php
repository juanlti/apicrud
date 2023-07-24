<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteApiRequest;
use App\Http\Resources\NoteApiResource;
use App\Models\NoteApi;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
class ApiCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        //
        $allData=NoteApi::all();
        return NoteApiResource::collection($allData);

    }

/*
 *  Api
    public function index(): JsonResponse{
        //
        $allData=NoteApi::all();
        return response()->json(['success'=>true,'data'=>$allData],200);

    }
*/

    /**
     * Show the form for creating a new resource.
     */

    public function store(NoteApiRequest $noteApiRequest):JsonResponse

    {
        //Es una clase controladora de api's. Por lo tanto no es de responsabilidad:
        // contener el metodo create. El metodo Store reemplaza al create

        //verifico los datos de creacion con una request
        /*
        $newNote=NoteApi::create([
            'title'=>$noteApiRequest->title,
                'content'=>$noteApiRequest->content
                ]);
        */



        $newNote=NoteApi::create($noteApiRequest->all());
        return response()->json(['success'=>true,'data'=>$newNote],201);

        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id):JsonResponse
    {
        $noteApi=NoteApi::find($id);
        return response()->json($noteApi,200);
    }

    public function update(NoteApiRequest $noteApiRequest, string $id):JsonResponse
    {





       // opc: n1

        $notaEncontrada=NoteApi::find($id);

        $notaEncontrada->update([
            'title'=>$noteApiRequest->title,
            'content'=>$noteApiRequest->content,

        ]);




            //opc: n2 (eloquent)
        //$notaEncontrada=NoteApi::find($id)->update($noteApiRequest->all());


        return response()->json(['success'=>true,'data'=>$notaEncontrada],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):JsonResponse
    {
        // borrar una nota en particual
        NoteApi::find($id)->delete();


        return response()->json(['success'=>true],200);


    }
    public function destroyAll():JsonResponse{
        NoteApi::query()->delete();

        return response()->json(['success'=>true],200);


    }
}
