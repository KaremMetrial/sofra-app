@extends('layouts.master')

@section('content')
<div class="col">
    <div class="card card-primary card-outline shadow">
        <div class="card-header">
            <h4><i class="fas fa-edit"></i> Edit Governorate</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.governorates.update', $governorate->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Governorate Name</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           name="name"
                           placeholder="Enter governorate name"
                           value="{{ old('name', $governorate->name) }}"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('admin.governorates.index') }}"
                       class="btn btn-secondary mx-2">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
