<?php

namespace App\DataTables;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
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
            ->addColumn('action', function ($blog) {
                return '
                    <a href="' . route('admin.blogs.edit', $blog->id) . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(' . $blog->id . ', \'' . addslashes($blog->title) . '\')">Delete</button>
                ';
            })
            ->addColumn('image', function ($blog) {
                if ($blog->image) {
                    return '<img src="' . asset('storage/' . $blog->image) . '" alt="' . htmlspecialchars($blog->title) . '" style="max-width: 50px; height: auto;">';
                }
                return '<span class="badge bg-secondary">No Image</span>';
            })
            ->addColumn('status', function ($blog) {
                $badgeClass = $blog->status === 'published' ? 'success' : 'warning';
                return '<span class="badge bg-' . $badgeClass . '">' . ucfirst($blog->status) . '</span>';
            })
            ->editColumn('title', function ($blog) {
                return '<div style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="' . htmlspecialchars($blog->title) . '">' . htmlspecialchars($blog->title) . '</div>';
            })
            ->editColumn('created_at', function ($blog) {
                return $blog->created_at->format('M d, Y');
            })
            ->editColumn('published_at', function ($blog) {
                return $blog->published_at ? $blog->published_at->format('M d, Y') : '-';
            })
            ->rawColumns(['action', 'image', 'status', 'title'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Blog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Blog $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('blog-table')
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
            Column::make('image')->width(80),
            Column::make('title'),
            Column::make('category')->width(120),
            Column::make('author')->width(120),
            Column::make('status')->width(100),
            Column::make('published_at')->title('Published')->width(120),
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
        return 'Blog_' . date('YmdHis');
    }
}
