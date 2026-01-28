<?php

namespace App\DataTables;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FaqDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($faq) {
                return '
                    <a href="' . route('admin.faqs.edit', $faq->id) . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(' . $faq->id . ', \'' . addslashes($faq->question) . '\')">Delete</button>
                ';
            })
            ->addColumn('status', function ($faq) {
                $badgeClass = $faq->is_active ? 'success' : 'secondary';
                return '<span class="badge bg-' . $badgeClass . '">' . ($faq->is_active ? 'Active' : 'Inactive') . '</span>';
            })
            ->editColumn('question', function ($faq) {
                return '<div style="max-width: 400px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="' . htmlspecialchars($faq->question) . '">' . htmlspecialchars($faq->question) . '</div>';
            })
            ->editColumn('created_at', function ($faq) {
                return $faq->created_at->format('M d, Y');
            })
            ->rawColumns(['action', 'status', 'question'])
            ->setRowId('id');
    }

    public function query(Faq $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('order', 'asc')->orderBy('id', 'asc');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('faqs-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle();
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')->width(60),
            Column::make('order')->width(80),
            Column::make('question'),
            Column::make('status')->width(100),
            Column::make('created_at')->width(120),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'FAQs_' . date('YmdHis');
    }
}
