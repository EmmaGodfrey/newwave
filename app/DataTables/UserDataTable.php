<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\URL;

class UserDataTable extends DataTable
{
    
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('user_info', function ($user) {
                return '<div>
                            <h6 class="mb-0 font-size-14">' . e($user->name) . '</h6>
                            <small class="text-muted">' . e($user->email) . '</small>
                        </div>';
            })
            ->addColumn('created_date', function ($user) {
                return $user->created_at ? $user->created_at->format('M d, Y') : 'N/A';
            })
            ->addColumn('actions', function ($user) {
                $actions = '<ul class="list-inline font-size-20 contact-links mb-0">';
                $actions .= '<li class="list-inline-item px-2">
                            <a href="javascript:void(0)" data-id="' . $user->id . '" title="Edit" class="text-primary edit-user"><i class="bx bx-edit-alt"></i></a>
                         </li>';
                $actions .= '<li class="list-inline-item px-2">
                            <a href="javascript:void(0)" data-id="' . $user->id . '" title="Delete" class="text-danger delete-user"><i class="bx bx-trash"></i></a>
                         </li>';
                $actions .= '</ul>';
                return $actions;
            })
            ->rawColumns(['user_info', 'actions']);
    }

    public function query(User $model)
    {
        return $model->newQuery()->select('users.*')->orderBy('created_at', 'desc');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(3, 'desc')
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
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false)->width(60),
            Column::make('user_info')->title('User')->orderable(false)->searchable(true)->name('name'),
            Column::make('created_date')->title('Date Added')->name('created_at')->width(150),
            Column::computed('actions')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center')
                ->orderable(false)
                ->searchable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}