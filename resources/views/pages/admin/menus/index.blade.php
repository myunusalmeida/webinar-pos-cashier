@extends('layouts.admin')

@section('content')
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Menu</h2>
        <a href="{{ route('menu.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Menu
        </a>
    </div>
    <div class="card border-0">
        <div class="card-body">
            @if ($menus->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Menu</th>
                                <th>Kategori Menu</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $item)
                                <tr class="align-middle">
                                    <td>
                                        <img src="{{ url('storage/' . $item->image) }}" alt=""
                                            class="rounded object-fit-cover" width="40">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>Rp. {{ number_format($item->price) }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end gap-1">
                                            <a href="{{ route('menu.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm py-1 px-3 rounded-1 text-white">
                                                <i class="bx bx-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('menu.destroy', $item->id) }}" method="post">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-light btn-sm py-1 px-3 rounded-1" type="submit"
                                                    onclick="return confirm('Kamu yakin ingin menghapusnya?')">
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
            @else
                <p class="text-secondary text-center">No Data</p>
            @endif
        </div>
    </div>
@endsection
