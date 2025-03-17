@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Governorates List</h3>
        <div class="card-tools">
            <a href="{{ route('admin.governorates.create') }}" class="btn btn-sm btn-success">Add New Governorate</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table id="governoratesTable" class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th style="width: 100px">Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@push('js')
<script>
$(document).ready(function() {
    $('#governoratesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.governorates.index') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '5%' },
            { data: 'name', name: 'name', width: '75%' },
            { data: 'action', name: 'action', orderable: false, searchable: false, width: '20%' }
        ],
        columnDefs: [
            { targets: 0, className: 'text-center' },
            { targets: 2, className: 'text-center' }
        ],
        language: {
            "emptyTable": "No governorates found. Click 'Add New Governorate' to create one.",
            "zeroRecords": "No matching governorates found",
            "processing": "Loading..."
        }
    });
    $('#governoratesTable tbody').on('click', '.delete-btn', function() {
        if (confirm('Are you sure you want to delete this governorate?')) {
            var id = $(this).data('id');
            $.ajax({
                url: '/admin/governorates/' + id,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                  $('#governoratesTable').DataTable().ajax.reload(null, false);
                  toastr.success(response.success);
                },
                error: function(xhr) {
                    toastr.error('Error deleting governorate');
                }
            });
        }
    });
});
</script>
@endpush
