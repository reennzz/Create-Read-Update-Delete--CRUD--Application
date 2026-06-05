<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Dashboard</title>
    <link rel="stylesheet" href="{{ asset('product-ui.css') }}">
</head>
<body>
    <main class="page-shell page-shell-wide">
        <section class="panel">
            <div class="panel-header header-grid">
                <div>
                    <p class="eyebrow">Inventory</p>
                    <h1>Product Dashboard</h1>
                    <p class="lead">Kelola daftar produk, stok, harga, dan deskripsi dalam satu tampilan yang bersih.</p>
                </div>

                <a href="{{ route('product.create') }}" class="button button-primary">Tambah Produk</a>
            </div>

            @if(session()->has('success'))
                <div class="notice notice-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="stats-grid">
                <div class="stat-card">
                    <p>Total Produk</p>
                    <strong>{{ $products->count() }}</strong>
                </div>
                <div class="stat-card">
                    <p>Total Stok</p>
                    <strong>{{ $products->sum('quantity') }}</strong>
                </div>
                <div class="stat-card">
                    <p>Nilai Produk</p>
                    <strong>Rp {{ number_format($products->sum(fn ($product) => $product->quantity * $product->price), 0, ',', '.') }}</strong>
                </div>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <div class="product-name">{{ $product->name }}</div>
                                    <div class="muted">ID #{{ $product->id }}</div>
                                </td>
                                <td>
                                    <span class="badge">{{ $product->quantity }} unit</span>
                                </td>
                                <td class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="description">{{ $product->description }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('product.edit', ['product' => $product]) }}" class="button button-secondary">Edit</a>
                                        <form method="post" action="{{ route('product.delete', ['product' => $product]) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="button button-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">
                                    <strong>Belum ada produk</strong>
                                    <span>Tambahkan produk pertama untuk mulai mengisi inventory.</span>
                                    <a href="{{ route('product.create') }}" class="button button-primary">Tambah Produk</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
