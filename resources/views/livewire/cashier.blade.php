<div>
    <div class="row g-4">
        <div class="col-md-7">
            <h2 class="text-dark fw-bold mb-4">Kasir</h2>

            <ul class="nav nav-pills gap-1 pb-3 mb-4 border-bottom">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Semua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Makanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Minuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Snack</a>
                </li>
            </ul>

            <div class="row g-3">
                @foreach ($menus as $item)
                    <div class="col-6 col-lg-4">
                        <div class="card" style="cursor: pointer;" wire:click="addToCart({{ $item->id }})">
                            <div class="card-body p-4">
                                <img src="{{ url('storage/' . $item->image) }}" class="w-75 d-block mx-auto"
                                    alt="Dish 01">
                                <h4 class="card-title mt-4 mb-2">{{ $item->name }}</h4>
                                <div
                                    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-1">
                                    <p class="mb-0 text-secondary fs-7">{{ $item->category }}</p>
                                    <p class="mb-0 text-primary fw-semibold">Rp. {{ number_format($item->price) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-5">
            <div class="card border-0">
                <div class="card-body px-4">
                    @if ($transaction != null)
                        <h4 class="text-dark fw-semibold mb-3">Order #003</h4>

                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach ($transaction->details as $item)
                            <div class="row align-items-center g-3 mt-3">
                                <div class="col-3 col-lg-2">
                                    <img src="{{ url('storage/' . $item->menu->image) }}" alt=""
                                        class="rounded-2">
                                </div>
                                <div class="col-9 col-lg-4">
                                    <p class="mb-0 fw-semibold text-dark">{{ $item->menu->name }}</p>
                                    <p class="mb-0 fw-semibold text-secondary fs-7">Rp.
                                        {{ number_format($item->menu->price) }}</p>
                                </div>
                                <div class="col-4 col-lg-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn btn-sm btn-quantity rounded-circle"
                                            wire:click="quantity_minus({{ $item->id }})">
                                            <i class="bx bx-minus"></i>
                                        </button>
                                        <p class="mb-0 text-dark">
                                            {{ $item->quantity }}
                                        </p>
                                        <button class="btn btn-sm btn-quantity rounded-circle"
                                            wire:click="addToCart({{ $item->menu_id }})">
                                            <i class="bx bx-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <p class="mb-0 text-dark fw-bold text-end">
                                        Rp. {{ number_format($item->menu->price * $item->quantity) }}
                                    </p>
                                </div>
                                <div class="col-2 col-lg-1">
                                    <button class="btn btn-sm btn-light btn-delete" type="button"
                                        wire:click="delete({{ $item->id }})">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </div>

                            @php
                                $subtotal += $item->price * $item->quantity;
                            @endphp
                        @endforeach

                        <hr class="mt-5 mb-4">

                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p class="mb-0 text-secondary">Subtotal</p>
                            <p class="mb-0 text-dark fw-bold">Rp. {{ number_format($subtotal) }}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 text-secondary">Pajak</p>
                            <p class="mb-0 text-dark fw-bold">Rp. 12,000</p>
                        </div>

                        <hr class="my-4" style="border-style: dashed;">

                        <div class="d-flex align-items-center justify-content-between mb-5">
                            <p class="mb-0 text-secondary">Total</p>
                            <p class="mb-0 text-dark fw-bold fs-5">Rp. {{ number_format($subtotal + 12000) }}</p>
                        </div>

                        <button class="btn btn-primary rounded-3 d-block py-3 w-100" type="button"
                            data-bs-toggle="modal" data-bs-target="#checkoutModal">
                            Checkout
                        </button>
                    @else
                        <p class="mb-0 text-center text-secondary">Pilih untuk membeli</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="checkoutModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Checkout</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="checkout">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="customer_name"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control" wire:model="customer_name" id="name">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nominalInput">Rp.</span>
                            <input type="text" class="form-control" wire:model="pay">
                        </div>

                        <button class="btn btn-primary w-100" type="submit">Proses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
