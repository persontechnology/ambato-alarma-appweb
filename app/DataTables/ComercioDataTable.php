<?php

namespace App\DataTables;

use App\Models\Comercio;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ComercioDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($comercio){
                return view('comercio.action',['comercio'=>$comercio])->render();
            })
            ->editColumn('foto',function($comercio){
                return view('comercio.foto',['comercio'=>$comercio])->render();
            })
            ->editColumn('latitud',function($comercio){
                return view('comercio.ubicacion',['comercio'=>$comercio])->render();
            })
            ->rawColumns(['action','foto','latitud'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Comercio $model): QueryBuilder
    {
        return $model->newQuery()
        ->with('user');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('comercio-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->title('Acción')
                  ->addClass('text-center'),
            Column::make('foto'),
            Column::make('nombre')->title('Comercio'),
            Column::make('user.name')->title('Usuario'),
            Column::make('descripcion')->title('Descripción'),
            Column::make('direccion')->title('Dirección'),
            Column::make('latitud')->searchable(false)->title('Ubicación'),
            Column::make('numero_celular')->title('Número celular'),
            Column::make('alarma_comunitaria_id'),
            Column::make('estado'),
            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Comercio_' . date('YmdHis');
    }
}
