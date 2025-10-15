@extends('template.master')
@section('content')
    <div class="content">
        <h1>Data Produk</h1>
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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Kategori
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="btnSimpanKategori" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm">Tambah produk</a>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Kategori</th>
                            <th>SKU</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $produk->name }}</td>
                                <td>{{ $produk->categori->name }}</td>
                                <td>{{ $produk->sku }}</td>
                                <td>{{ $produk->price }}</td>
                                <td>{{ $produk->stock }}</td>
                                <td>
                                    <a href="{{ route('produk.edit', $produk->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
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


@section('script')
    <script>
        $(document).ready(function() {
            $('#btnSimpanKategori').click(function() {
                var name = $('#name').val();
                $.ajax({
                    url: "{{ route('produk.tambah_kategori') }}",
                    method: 'POST',
                    data: {
                        name: name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire(
                            'Berhasil!',
                            response.message,
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function(key, value) {
                            errorMessage += value + '<br>';
                        });
                        Swal.fire(
                            'Gagal!',
                            errorMessage,
                            'error'
                        );
                    }
                });
            });
        });
    </script>
@endsection