<?php

namespace App\DataTables;

use App\Models\ContactMessage;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ContactMessageDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($query) {
                $viewBtn = "<a href='" . route('admin.contact.messages.show', $query->id) . "' class='btn btn-primary btn-sm'><i class='fa fa-eye'></i></a>";
                $deleteBtn = "<a href='" . route('admin.contact.messages.destroy', $query->id) . "' class='btn btn-danger btn-sm delete-item'><i class='fa fa-trash'></i></a>";

                return $viewBtn . ' ' . $deleteBtn;
            })
            ->addColumn('status', function ($query) {
                if ($query->is_read) {
                    return '<span class="badge badge-success">Read</span>';
                } else {
                    return '<span class="badge badge-warning">Unread</span>';
                }
            })
            ->addColumn('created_at', function ($query) {
                return $query->created_at->format('Y-m-d H:i');
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
    public function query(ContactMessage $model)
    {
        return $model->newQuery()->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('contactmessage-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0, 'desc')
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->width(60),
            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('subject'),
            Column::make('status'),
            Column::make('created_at'),
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
        return 'ContactMessage_' . date('YmdHis');
    }
}
