<?php

namespace App\DataTables;

use App\Models\PortfolioEvent;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PortfolioEventDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('event_info', function ($event) {
                $html = '<div class="d-flex align-items-center">';
                if($event->featured_image) {
                    $html .= '<div class="avatar-sm me-3">';
                    $html .= '<div class="avatar-title rounded">';
                    $html .= '<img src="' . asset('storage/' . $event->featured_image) . '" alt="' . e($event->title) . '" class="img-fluid rounded" style="width: 40px; height: 40px; object-fit: cover;">';
                    $html .= '</div></div>';
                }
                $html .= '<div>';
                $html .= '<h6 class="mb-0 font-size-14">' . e($event->title) . '</h6>';
                if($event->is_featured) {
                    $html .= '<span class="badge badge-soft-warning ms-1">Featured</span>';
                }
                $html .= '<br><small class="text-muted">' . \Illuminate\Support\Str::limit($event->description ?? '', 50) . '</small>';
                $html .= '</div></div>';
                return $html;
            })
            ->addColumn('category_name', function ($event) {
                return '<span class="badge badge-soft-primary">' . e($event->category->name) . '</span>';
            })
            ->addColumn('event_details', function ($event) {
                $html = '';
                if($event->event_date) {
                    $html .= '<div><i class="bx bx-calendar"></i> ' . $event->event_date->format('M j, Y') . '</div>';
                }
                if($event->location) {
                    $html .= '<div><i class="bx bx-map"></i> ' . e($event->location) . '</div>';
                }
                return $html ?: '<span class="text-muted">No details</span>';
            })
            ->addColumn('images_count', function ($event) {
                $count = $event->images_count;
                return '<span class="badge badge-soft-info">' . $count . ' images</span>';
            })
            ->addColumn('status', function ($event) {
                if($event->is_active) {
                    return '<span class="badge badge-soft-success">Active</span>';
                } else {
                    return '<span class="badge badge-soft-danger">Inactive</span>';
                }
            })
            ->addColumn('actions', function ($event) {
                $actions = '<div class="btn-group" role="group">';
                $actions .= '<a href="' . route('admin.portfolio.events.show', $event) . '" class="btn btn-sm btn-outline-info" title="View">';
                $actions .= '<i class="bx bx-show"></i></a>';
                $actions .= '<a href="' . route('admin.portfolio.events.edit', $event) . '" class="btn btn-sm btn-outline-primary" title="Edit">';
                $actions .= '<i class="bx bx-edit"></i></a>';
                $actions .= '<a href="' . route('portfolio.event', $event->slug) . '" target="_blank" class="btn btn-sm btn-outline-secondary" title="View on Site">';
                $actions .= '<i class="bx bx-link-external"></i></a>';
                $actions .= '<button type="button" class="btn btn-sm btn-outline-danger delete-event" data-id="' . $event->id . '" data-name="' . e($event->title) . '" title="Delete">';
                $actions .= '<i class="bx bx-trash"></i></button>';
                $actions .= '</div>';
                return $actions;
            })
            ->rawColumns(['event_info', 'category_name', 'event_details', 'images_count', 'status', 'actions'])
            ->setRowId('id');
    }

    public function query(PortfolioEvent $model): QueryBuilder
    {
        return $model->newQuery()->with(['category'])->withCount('images')->orderBy('created_at', 'desc');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('events-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' . 
                 '<"row"<"col-sm-12"tr>>' . 
                 '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>')
            ->orderBy(1)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, 'All']],
                'pageLength' => 25,
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->orderable(false)
                ->searchable(false)
                ->width(50),
            Column::make('event_info')
                ->title('Event')
                ->orderable(false)
                ->searchable(true),
            Column::make('category_name')
                ->title('Category')
                ->orderable(false)
                ->searchable(true)
                ->width(120),
            Column::make('event_details')
                ->title('Date & Location')
                ->orderable(false)
                ->searchable(true),
            Column::make('images_count')
                ->title('Images')
                ->orderable(false)
                ->searchable(false)
                ->width(100),
            Column::make('status')
                ->title('Status')
                ->orderable(false)
                ->searchable(false)
                ->width(100),
            Column::make('actions')
                ->title('Actions')
                ->orderable(false)
                ->searchable(false)
                ->width(140),
        ];
    }

    protected function filename(): string
    {
        return 'PortfolioEvent_' . date('YmdHis');
    }
}
