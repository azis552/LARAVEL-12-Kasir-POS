@extends('template.master')
@section('content')
<div class="content">
    <h1>Tambah Menu</h1>
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
            <form action="{{ route('role_menus.update', $role_menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="role_id" class="form-label">Nama Role</label>
                    <select class="form-select" id="role_id" name="role_id" required>
                        <option value="">Pilih Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $role_menu->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="menu_id" class="form-label">Nama Menu</label>
                    <select class="form-select" id="menu_id" name="menu_id" required>
                        <option value="">Pilih Menu</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}" {{ $menu->id == $role_menu->menu_id ? 'selected' : '' }}>{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hak Akses</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="can_view" name="can_view"  value="1" {{ $role_menu->can_view ? 'checked' : '' }} >
                        <label class="form-check-label" for="can_view">Lihat</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="can_create" name="can_create" value="1" {{ $role_menu->can_create ? 'checked' : '' }}>
                        <label class="form-check-label" for="can_create">Tambah</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="can_update" name="can_update" value="1" {{ $role_menu->can_update ? 'checked' : '' }}>
                        <label class="form-check-label" for="can_update">Edit</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="can_delete" name="can_delete" value="1" {{ $role_menu->can_delete ? 'checked' : '' }}>
                        <label class="form-check-label" for="can_delete">Hapus</label>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection