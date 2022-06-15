<?php

namespace App\DataTables;

use App\Models\Event;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Barryvdh\DomPDF\Facade as PDF;

class EventDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
        ->editColumn('event_cost', function ($event) {
            return $event->event_cost?$event->event_cost:"";
        })
        // ->editColumn('event_time', function ($event) {
        //     return $event->event_time?$event->event_time->format('h:m:s'):"";
        // })
        ->editColumn('event_date', function ($event) {
            return $event->event_date->format('Y-m-d');
        })
        ->editColumn('user_id', function ($event) {
            return $event->user->name;
        })
        ->addColumn('action', 'events.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Event $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Event $model)
    {
        if (auth()->user()->can('Super-Admin') ||auth()->user()->can('Admin-Pro')) {
            return $model->newQuery();
        } else {
            return $model->newQuery()->where('user_id',auth()->user()->id);
        }

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'excel', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        if (auth()->user()->can('Super Admin') ||auth()->user()->can('Admin-Pro')) {
            return [
                'name',
                // 'event_specialty_id',
                // 'event_location_id',
                'event_number',
                [
                    'data' => 'event_date',
                    'title' => 'date',
                    'searchable' => false,
                ],
                'visitors_number',
                [
                    'data' => 'event_time',
                    'title' => 'time',
                    'searchable' => false,
                ],
                [
                    'data' => 'event_cost',
                    'title' => 'cost',
                    'searchable' => false,
                ],
                [
                    'data' => 'user_id',
                    'title' => 'User name',
                    'searchable' => false,
                ],
            ];
        } else {
            return [
                'name',
                // 'event_specialty_id',
                // 'event_location_id',
                [
                    'data' => 'event_date',
                    'title' => 'date',
                    'searchable' => false,
                ],
                [
                    'data' => 'event_cost',
                    'title' => 'cost',
                    'searchable' => false,
                ],
                [
                    'data' => 'user_id',
                    'title' => 'User name',
                    'searchable' => false,
                ],
            ];
        }


    }
    /**
     * Export PDF using DOMPDF
     * @return mixed
     */
    public function pdf()
    {
        $data = $this->getDataForPrint();
        $pdf = PDF::loadView($this->printPreview, compact('data'));
        return $pdf->download($this->filename() . '.pdf');
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'events_datatable_' . time();
    }
}
