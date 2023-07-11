<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISP Website Customers</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .form-control.capsule {
            border-radius: 30px;
        }

        .btn-primary {
            border-radius: 30px;
        }

        .table {
            border-radius: 10px;
        }

        .page-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="page-title">ISP Website Customers</h1>
        <div class="card">
            <div class="card-body">
                <!-- Add Customer Form -->
                <form id="addCustomerForm">
                    <div class="form-group">
                        <label for="nik">NIK:</label>
                        <input type="text" class="form-control capsule mb-2" id="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control capsule mb-2" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="jenisKelamin">Jenis Kelamin:</label>
                        <select class="form-control capsule mb-2" id="jenisKelamin" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control capsule mb-2" id="alamat" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nomorTelepon">Nomor Telepon:</label>
                        <input type="text" class="form-control capsule mb-2" id="nomorTelepon" required>
                    </div>
                    <div class="form-group">
                        <label for="fotoKTP">Foto KTP:</label>
                        <input type="file" class="form-control-file capsule mb-2" id="fotoKTP">
                    </div>
                    <div class="form-group">
                        <label for="paket">Paket:</label>
                        <select class="form-control capsule mb-2" id="paket" required>
                            <option value="">Select Package</option>
                            <option value="Package A">Package A</option>
                            <option value="Package B">Package B</option>
                            <option value="Package C">Package C</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Add</button>
                </form>

                <!-- Customer List -->
                <div class="table-responsive">
                    <table id="customerTable" class="table table-striped table-bordered table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="capsule">NIK</th>
                                <th class="capsule">Nama</th>
                                <th class="capsule">Jenis Kelamin</th>
                                <th class="capsule">Alamat</th>
                                <th class="capsule">Nomor Telepon</th>
                                <th class="capsule">Foto KTP</th>
                                <th class="capsule">Paket</th>
                                <th class="capsule">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Customer Rows -->
                            <tr>
                                <td class="capsule">123456789</td>
                                <td class="capsule">John Doe</td>
                                <td class="capsule">Male</td>
                                <td class="capsule">123 Main Street, City</td>
                                <td class="capsule">1234567890</td>
                                <td class="capsule">[Foto KTP]</td>
                                <td class="capsule">Package A</td>
                                <td class="capsule">[Actions]</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
