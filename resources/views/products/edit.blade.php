<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="{{ asset('product-ui.css') }}">
</head>
<body>
    <main class="page-shell">
        <section class="panel">
            <div class="panel-header">
                <a href="{{ route('product.index') }}" class="back-link">Kembali ke daftar produk</a>
                <h1>Edit Produk</h1>
                <p class="lead">Perbarui informasi produk agar data inventory tetap akurat.</p>
            </div>

            @if($errors->any())
                <div class="notice notice-error">
                    <p>Periksa kembali input berikut:</p>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('product.update', ['product' => $product]) }}" class="product-form">
                @csrf
                @method('put')

                <div class="field">
                    <label for="name">Nama Produk</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="Contoh: Keyboard Mechanical">
                </div>

                <div class="form-grid">
                    <div class="field">
                        <label for="quantity">Quantity</label>
                        <input id="quantity" type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" placeholder="25">
                    </div>

                    <div class="field">
                        <label for="price">Harga</label>
                        <input id="price" type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" placeholder="150000.00">
                    </div>
                </div>

                <div class="field">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" rows="4" placeholder="Tulis detail singkat produk">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="form-actions">
                    <a href="{{ route('product.index') }}" class="button button-secondary">Batal</a>
                    <button type="submit" class="button button-primary">Simpan Perubahan</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
