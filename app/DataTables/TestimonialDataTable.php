<?php

namespace App\DataTables;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TestimonialDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($testimonial) {
                $deleteUrl = route('admin.testimonials.destroy', $testimonial->id);
                return '
                    <a href="' . route('admin.testimonials.edit', $testimonial->id) . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $testimonial->id . '" data-name="' . htmlspecialchars($testimonial->client_name, ENT_QUOTES) . '" data-url="' . htmlspecialchars($deleteUrl, ENT_QUOTES) . '">Delete</button>
                ';
            })
            ->addColumn('status', function ($testimonial) {
                $badgeClass = $testimonial->is_active ? 'success' : 'secondary';
                return '<span class="badge bg-' . $badgeClass . '">' . ($testimonial->is_active ? 'Active' : 'Inactive') . '</span>';
            })
            ->editColumn('testimonial', function ($testimonial) {
                return '<div style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="' . htmlspecialchars($testimonial->testimonial) . '">' . htmlspecialchars($testimonial->testimonial) . '</div>';
            })
            ->editColumn('created_at', function ($testimonial) {
                return $testimonial->created_at->format('M d, Y');
            })
            ->rawColumns(['action', 'status', 'testimonial'])
            ->setRowId('id');
    }

    public function query(Testimonial $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('order', 'asc');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('testimonials-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle();
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID')->width(50),
            Column::make('client_name')->title('Client Name'),
            Column::make('client_position')->title('Position'),
            Column::make('testimonial')->title('Testimonial'),
            Column::make('rating')->title('Rating')->width(80),
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
        return 'Testimonials_' . date('YmdHis');
    }
}
