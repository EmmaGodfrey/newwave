<?php

namespace App\DataTables;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BlogCategoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($category) {
                return '
                    <a href="' . route('admin.blog-categories.edit', $category->id) . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(' . $category->id . ', \'' . addslashes($category->name) . '\')">Delete</button>
                ';
            })
            ->addColumn('is_active', function ($category) {
                $badgeClass = $category->is_active ? 'success' : 'secondary';
                $status = $category->is_active ? 'Active' : 'Inactive';
                return '<span class="badge bg-' . $badgeClass . '">' . $status . '</span>';
            })
            ->addColumn('blogs_count', function ($category) {
                return $category->blogs()->count();
            })
            ->editColumn('created_at', function ($category) {
                return $category->created_at->format('M d, Y');
            })
            ->rawColumns(['action', 'is_active'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BlogCategory $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('sort_order')->orderBy('name');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('blog-category-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(60),
            Column::make('name'),
            Column::make('slug')->width(200),
            Column::make('blogs_count')->title('Posts')->width(100),
            Column::make('sort_order')->width(100),
            Column::make('is_active')->title('Status')->width(100),
            Column::make('created_at')->width(120),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(150)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'BlogCategory_' . date('YmdHis');
    }
}
