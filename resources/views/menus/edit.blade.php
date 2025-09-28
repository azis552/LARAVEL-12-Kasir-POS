@extends('template.master')
@section('content')
<div class="content">
    <h1>Update Menu</h1>
     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Route</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $menu->slug }}" required>
                </div>
                <div class="mb-3">
                    <label for="parent_id" class="form-label">Parent Menu</label>
                    <select class="form-select" id="parent_id" name="parent_id">
                        <option value="">Pilih Parent Menu (Opsional)</option>
                        @foreach ($menus as $menuDetail)
                            <option value="{{ $menuDetail->id }}" {{ $menuDetail->id == $menu->parent_id ? 'selected' : '' }}>{{ $menuDetail->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection