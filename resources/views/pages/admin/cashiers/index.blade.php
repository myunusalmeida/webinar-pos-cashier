@extends('layouts.admin')

@section('content')
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Kasir</h2>
        <a href="{{ route('kasir.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Kasir
        </a>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Total Penjualan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cashiers as $item)
                            <tr class="align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>40 Penjualan</td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('kasir.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm py-1 px-3 rounded-1 text-white">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('kasir.destroy', $item->id) }}" method="post">
                                            @csrf @method('DELETE')

                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="btn btn-light btn-sm py-1 px-3 rounded-1">
                                                <i class="bx bx-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
