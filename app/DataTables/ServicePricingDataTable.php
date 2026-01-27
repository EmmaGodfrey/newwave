<?php

namespace App\DataTables;

use App\Models\ServicePricing;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ServicePricingDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($service) {
                return '
                    <a href="' . route('admin.service-pricing.edit', $service->id) . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(' . $service->id . ', \'' . addslashes($service->name) . '\')">Delete</button>
                ';
            })
            ->addColumn('status', function ($service) {
                $badges = [];
                if ($service->is_active) {
                    $badges[] = '<span class="badge bg-success">Active</span>';
                } else {
                    $badges[] = '<span class="badge bg-secondary">Inactive</span>';
                }
                if ($service->is_featured) {
                    $badges[] = '<span class="badge bg-warning">Featured</span>';
                }
                return implode(' ', $badges);
            })
            ->editColumn('price', function ($service) {
                return '$' . number_format($service->price, 2);
            })
            ->editColumn('description', function ($service) {
                return '<div style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="' . htmlspecialchars($service->description ?? '') . '">' . htmlspecialchars($service->description ?? '-') . '</div>';
            })
            ->editColumn('created_at', function ($service) {
                return $service->created_at->format('M d, Y');
            })
            ->rawColumns(['action', 'status', 'description'])
            ->setRowId('id');
    }

    public function query(ServicePricing $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('order', 'asc');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('servicepricing-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->responsive(true)
            ->autoWidth(false)
            ->serverSide(true)
            ->processing(true)
            ->parameters([
                'columnDefs' => [
                    ['targets' => '_all', 'defaultContent' => ''],
                ],
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID')->width(50),
            Column::make('name')->title('Service Name'),
            Column::make('category')->title('Category'),
            Column::make('price')->title('Price')->width(100),
            Column::make('description')->title('Description'),
            Column::make('order')->title('Order')->width(80),
            Column::make('status')->title('Status')->orderable(false)->searchable(false),
            Column::make('created_at')->title('Created'),
            Column::computed('action')
                ->title('Actions')
                ->orderable(false)
                ->searchable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'ServicePricing_' . date('YmdHis');
    }
}
