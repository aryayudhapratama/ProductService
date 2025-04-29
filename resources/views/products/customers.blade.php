<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk - Pelanggan</title>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg mb-4" style="background-color: blue;">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="#">Daftar Produk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="http://localhost:8000/customers/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="http://localhost:8001/products/">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="http://localhost:8002/orders/">List of Order</a>
                    </li>
                </ul>
                <div class="ms-3">
                    <a href="{{ route('products.create') }}" class="btn btn-sm" style="background-color: #4040407f; color: #ffffff;">
                        Create New Product
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow-sm rounded-4">
            <div class="card-body">
                <h4 class="card-title fw-bold mb-4">Pelanggan yang Membeli Produk: <span class="text-primary">{{ $product->product_name }}</span></h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Phone</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $customer['name'] }}</td>
                                    <td>{{ $customer['phone'] }}</td>
                                    <td>{{ $customer['address'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>

</body>

</html>
