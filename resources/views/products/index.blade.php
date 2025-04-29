<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg mb-4" style="background-color: blue;">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="#">Daftar Produk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link text-white" href="http://localhost:8000/customers/">Home</a>
                    <a class="nav-link text-white" href="http://localhost:8001/products/">Products</a>
                    <a class="nav-link text-white" href="http://localhost:8002/orders/">List of Order</a>
                    <a href="{{ route('products.create') }}" class="btn btn-sm ms-2"
                        style="background-color: #4040407f; color: #ffffff;">Create New Product</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow-sm rounded-4">
            <div class="card-body">
                <h5 class="card-title mb-4 fw-bold">Tabel Data Produk</h5>
                <div class="table-responsive">
                    <table id="products-table" class="table table-striped table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#products-table').DataTable({
                responsive: true,
                ajax: {
                    url: "{{ url('/api/products-api') }}",
                    dataSrc: 'data'
                },
                columns: [
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1; // Menampilkan nomor urut
                        }
                    },
                    { data: 'product_name' },
                    { data: 'price' },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <div class="d-flex gap-2">
                                    <form action="/products/${row.id}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <a href="/products/${row.id}/customers" class="btn btn-info btn-sm">Lihat Pembeli</a>
                                </div>
                            `;
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>
