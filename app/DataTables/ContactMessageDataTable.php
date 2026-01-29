<?php

namespace App\DataTables;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ContactMessageDataTable extends DataTable
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
            ->addColumn('action', function ($message) {
                $viewBtn = "<a href='" . route('admin.contact.messages.show', $message->id) . "' class='btn btn-primary btn-sm'><i class='fa fa-eye'></i></a>";
                $deleteBtn = "<a href='" . route('admin.contact.messages.destroy', $message->id) . "' class='btn btn-danger btn-sm delete-item'><i class='fa fa-trash'></i></a>";

                return $viewBtn . ' ' . $deleteBtn;
            })
            ->addColumn('status', function ($message) {
                if ($message->is_read) {
                    return '<span class="badge bg-success">Read</span>';
                } else {
                    return '<span class="badge bg-warning">Unread</span>';
                }
            })
            ->editColumn('created_at', function ($message) {
                return $message->created_at->format('Y-m-d H:i');
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ContactMessage $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ContactMessage $model): QueryBuilder
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
            ->setTableId('contactmessage-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0, 'desc')
            ->selectStyleSingle();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(60),
            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('subject'),
            Column::make('status')->orderable(false)->searchable(false),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
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
        return 'ContactMessage_' . date('YmdHis');
    }
}
