@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Cities List</h3>
        <div class="card-tools">
            <a href="{{ route('admin.cities.create') }}" class="btn btn-sm btn-success">Add New City</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table id="citiesTable" class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Governorate</th>
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
    $('#citiesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.cities.index') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '5%' },
            { data: 'name', name: 'name', width: '40%' },
            { data: 'governorate.name', name: 'governorate.name', width: '35%' },
            { data: 'action', name: 'action', orderable: false, searchable: false, width: '20%' }
        ],
        columnDefs: [
            { targets: 0, className: 'text-center' },
            { targets: 2, className: 'text-center' }
        ],
        language: {
            "emptyTable": "No cities found. Click 'Add New City' to create one.",
            "zeroRecords": "No matching cities found",
            "processing": "Loading..."
        }
    });

    $('#citiesTable tbody').on('click', '.delete-btn', function() {
        if (confirm('Are you sure you want to delete this city?')) {
            var id = $(this).data('id');
            $.ajax({
                url: '/admin/cities/' + id,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#citiesTable').DataTable().ajax.reload(null, false);
                    toastr.success(response.success);
                },
                error: function(xhr) {
                    toastr.error('Error deleting city');
                }
            });
        }
    });
});
</script>
@endpush

