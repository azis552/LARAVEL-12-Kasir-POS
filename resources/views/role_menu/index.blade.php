@extends('template.master')
@section('content')
    <div class="content">
        <h1>Role Menus Aplikasi</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <a href="{{ route('role_menus.create') }}" class="btn btn-primary btn-sm">Tambah Role Menu Aplikasi</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Role</th>
                            <th>Nama Menu</th>
                            <th>Hak Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($role_menus as $role_menu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role_menu->role->name }}</td>
                                <td>{{ $role_menu->menu->name }}</td>
                                <td>{{ ( $role_menu->can_view ? 'Lihat' : '') . ( $role_menu->can_create ? ', Tambah' : '') . ($role_menu->can_update ? ', Ubah' : '') . ($role_menu->can_delete ? ', Hapus' : '') }}</td>
                                <td>
                                    <a href="{{ route('role_menus.edit', $role_menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('role_menus.destroy', $role_menu->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
