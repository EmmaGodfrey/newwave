<?php

namespace App\DataTables;

use App\Models\PortfolioCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PortfolioCategoryDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('category_info', function ($category) {
                return '<div>
                            <h6 class="mb-0 font-size-14">' . e($category->name) . '</h6>
                            <small class="text-muted"><code>' . e($category->slug) . '</code></small>
                        </div>';
            })
            ->addColumn('description', function ($category) {
                return $category->description ? \Illuminate\Support\Str::limit($category->description, 50) : '<span class="text-muted">No description</span>';
            })
            ->addColumn('events_count', function ($category) {
                $count = $category->events_count;
                return '<span class="badge badge-soft-info">' . $count . ' events</span>';
            })
            ->addColumn('status', function ($category) {
                if($category->is_active) {
                    return '<span class="badge badge-soft-success">Active</span>';
                } else {
                    return '<span class="badge badge-soft-danger">Inactive</span>';
                }
            })
            ->addColumn('actions', function ($category) {
                $actions = '<div class="btn-group" role="group">';
                $actions .= '<a href="' . route('admin.portfolio.categories.show', $category) . '" class="btn btn-sm btn-outline-info" title="View">';
                $actions .= '<i class="bx bx-show"></i></a>';
                $actions .= '<a href="' . route('admin.portfolio.categories.edit', $category) . '" class="btn btn-sm btn-outline-primary" title="Edit">';
                $actions .= '<i class="bx bx-edit"></i></a>';
                $actions .= '<button type="button" class="btn btn-sm btn-outline-danger delete-category" data-id="' . $category->id . '" data-name="' . e($category->name) . '" title="Delete">';
                $actions .= '<i class="bx bx-trash"></i></button>';
                $actions .= '</div>';
                return $actions;
            })
            ->rawColumns(['category_info', 'description', 'events_count', 'status', 'actions'])
            ->setRowId('id');
    }

    public function query(PortfolioCategory $model): QueryBuilder
    {
        return $model->newQuery()->withCount('events')->orderBy('sort_order', 'asc');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('categories-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' . 
                 '<"row"<"col-sm-12"tr>>' . 
                 '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>')
            ->orderBy(2)
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
            Column::make('category_info')
                ->title('Category')
                ->orderable(false)
                ->searchable(true),
            Column::make('description')
                ->title('Description')
                ->orderable(false)
                ->searchable(true),
            Column::make('events_count')
                ->title('Events')
                ->orderable(false)
                ->searchable(false)
                ->width(100),
            Column::make('sort_order')
                ->title('Order')
                ->width(80),
            Column::make('status')
                ->title('Status')
                ->orderable(false)
                ->searchable(false)
                ->width(100),
            Column::make('actions')
                ->title('Actions')
                ->orderable(false)
                ->searchable(false)
                ->width(120),
        ];
    }

    protected function filename(): string
    {
        return 'PortfolioCategory_' . date('YmdHis');
    }
}
