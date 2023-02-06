<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Models\Period;
use Illuminate\Http\Response;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Period::all([
            'name',
            'started_at',
            'ended_at'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeriodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodRequest $request)
    {
        $period = Period::create($request->all());

        if (!$period) {
            return response()->json([
                'message' => 'Error desconhecido!'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'Periodo criado com sucesso'
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        return response()->json([
            'name' => $period->name,
            'started_at' => $period->started_at,
            'ended_at' => $period->ended_at
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriodRequest  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodRequest $request, Period $period)
    {
        $update = $period->update($request->validated());

        if (!$update) {
            return response()->json([
                'message' => 'Não foi possivel realizar a atualização'
            ]);
        }

        return response()->json([
            'message' => 'Preço atualizado com sucesso'
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $destroy = $period->delete();

        if (!$destroy) {
            return response()->json([
                'message' => 'Não foi possivel excluir.'
            ]);
        }

        return response()->json([
            'message' => 'Preço foi excluido com sucesso.'
        ], Response::HTTP_CREATED);
    }
}
