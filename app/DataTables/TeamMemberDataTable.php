<?php

namespace App\DataTables;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TeamMemberDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($member) {
                return '
                    <a href="' . route('admin.team-members.edit', $member->id) . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(' . $member->id . ', \'' . addslashes($member->name) . '\')">Delete</button>
                ';
            })
            ->addColumn('image', function ($member) {
                if ($member->image) {
                    return '<img src="' . asset('storage/' . $member->image) . '" alt="' . htmlspecialchars($member->name) . '" style="max-width: 50px; height: auto; border-radius: 50%;">';
                }
                return '<span class="badge bg-secondary">No Image</span>';
            })
            ->addColumn('status', function ($member) {
                $badgeClass = $member->is_active ? 'success' : 'secondary';
                return '<span class="badge bg-' . $badgeClass . '">' . ($member->is_active ? 'Active' : 'Inactive') . '</span>';
            })
            ->editColumn('created_at', function ($member) {
                return $member->created_at->format('M d, Y');
            })
            ->rawColumns(['action', 'image', 'status'])
            ->setRowId('id');
    }

    public function query(TeamMember $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('order', 'asc');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('teammembers-table')
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
            Column::make('image')->title('Image')->orderable(false)->searchable(false),
            Column::make('name')->title('Name'),
            Column::make('position')->title('Position'),
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
        return 'TeamMembers_' . date('YmdHis');
    }
}
