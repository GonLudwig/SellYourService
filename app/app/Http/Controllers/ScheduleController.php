<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Response;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Schedule::all([
            'id',
            'product_id',
            'period_id',
            'client_id',
            'check_in',
            'check_out',
            'confirmation'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScheduleRequest $request)
    {
        $schedule = Schedule::create($request->all());

        if (!$schedule) {
            return response()->json([
                'message' => 'Error desconhecido!'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'Criado com sucesso'
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return response()->json([
            'id' => $schedule->id,
            'product_id' => $schedule->product_id,
            'period_id' => $schedule->period_id,
            'client_id' => $schedule->client_id,
            'check_in' => $schedule->check_in,
            'check_out' => $schedule->check_out,
            'confirmation' => $schedule->confirmation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScheduleRequest  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $update = $schedule->update($request->validated());

        if (!$update) {
            return response()->json([
                'message' => 'Não foi possivel realizar a atualização'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'Preço atualizado com sucesso'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $destroy = $schedule->delete();

        if (!$destroy) {
            return response()->json([
                'message' => 'Não foi possivel excluir.'
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'Foi excluido com sucesso.'
        ]);
    }
}
