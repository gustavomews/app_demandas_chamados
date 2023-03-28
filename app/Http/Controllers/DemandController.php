<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Interaction;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //
    public function __construct()
    {
        //$this->middleware('auth'); -> Transferido para a rota
    }


    public function index()
    {
        //
        $demands = Demand::with(['user', 'status'])->orderBy('status_id')->orderBy('id')->get();
        return view('demand.index', ['demands' => $demands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('demand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ---------------------------------------------------------------------- Validate
        $regras = [
            'title' => 'required|min:5|max:40',
            'description' => 'max:2000'
        ];

        $feedback = [
            'required' => 'O preenchimento é obrigatório!',
            'title.min' => 'O título deve possuir no mínimo 5 caracteres!',
            'title.max' => 'O título deve possuir no máximo 40 caracteres!',
            'description.max' => 'A descrição deve possuir no maximo 2000 caracteres!',
        ];

        $request->validate($regras, $feedback);

        // ---------------------------------------------------------------------- Create demand
        $demand = $request->all('title', 'description');
        $demand['user_id'] = auth()->user()->id;

        $demand = Demand::create($demand);
        $demand_id = $demand->id;

        // ---------------------------------------------------------------------- Create interaction
        $interaction['demand_id'] = $demand_id;
        $interaction['user_id'] = auth()->user()->id;
        $interaction['description'] = 'Demanda criada';
        Interaction::create($interaction);

        // ---------------------------------------------------------------------- Return index view
        return redirect()->route('demand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $demand = Demand::find($id);
        $interactions = Interaction::where('demand_id', $id)->get();
        return view('demand.show', ['demand' => $demand, 'interactions' => $interactions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified demand set in progress in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function open($id)
    {
        // ---------------------------------------------------------------------- Open demand
        $demand = Demand::find($id);
        $demand->status_id = 2;
        $demand->save();

        // ---------------------------------------------------------------------- Create interaction
        $interaction['demand_id'] = $id;
        $interaction['user_id'] = auth()->user()->id;
        $interaction['description'] = 'Status alterado para: Em Andamento';
        Interaction::create($interaction);

        // ---------------------------------------------------------------------- Return index show
        return redirect()->route('demand.show', ['demand' => $id]);
    }

    /**
     * Update the specified demand set conclude in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function conclude($id)
    {
        // ---------------------------------------------------------------------- Open demand
        $demand = Demand::find($id);
        $demand->status_id = 3;
        $demand->save();

        // ---------------------------------------------------------------------- Create interaction
        $interaction['demand_id'] = $id;
        $interaction['user_id'] = auth()->user()->id;
        $interaction['description'] = 'Status alterado para: Concluído';
        Interaction::create($interaction);

        // ---------------------------------------------------------------------- Return index show
        return redirect()->route('demand.show', ['demand' => $id]);
    }

    /**
     * Update the specified demand set cancel in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        // ---------------------------------------------------------------------- Open demand
        $demand = Demand::find($id);
        $demand->status_id = 4;
        $demand->save();

        // ---------------------------------------------------------------------- Create interaction
        $interaction['demand_id'] = $id;
        $interaction['user_id'] = auth()->user()->id;
        $interaction['description'] = 'Status alterado para: Cancelado';
        Interaction::create($interaction);

        // ---------------------------------------------------------------------- Return index show
        return redirect()->route('demand.show', ['demand' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
