<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Data Hasil Penjualan</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="dashboard_user.php?module=home">Dashboard</a></li>
      <li class="breadcrumb-item active">Penjualan</li>
    </ol>

    <div class="card mb-4">
      <div class="card-body">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Pembelian Pelanggan</h4>
              <p class="card-description">
                Data Transaksi
              </p>
              <?php

              $aksi = 'module/jual/jual_action.php';

              use GuzzleHttp\Client;
              use GuzzleHttp\Exception\RequestException;

              try {
                $client = new Client([
                  'base_uri' => 'http://127.0.0.1:6969',
                  'timeout' => 5
                ]);

                $client2 = new Client([
                  'base_uri' => 'http://127.0.0.1:7676',
                  'timeout' => 5
                ]);

                $response = $client->request('GET', '/api/paket'); //Untuk data penjualan
                $data = $response->getBody();
                $pakets = json_decode($data, true);

                $response2 = $client2->request('GET', '/api/customer');
                $data2 = $response2->getBody();
                $customers = json_decode($data2, true);
              } catch (RequestException $e) {
                if ($e->hasResponse()) {
                  $error = (string) $e->getResponse()->getBody();
                  echo $error;
                } else {
                  echo $e->getMessage();
                }
              }


              echo '<h4 class="mt-4"><i class="fas fa-table me-1"></i>Form Pembelian Customer</h4>';

              if ($_GET['module'] == 'penjualan') {
                echo '<div class="card-header">
                        <i class="fas fa-table me-1"></i>
                            Data Customer</div>
                        <section class="inner-page">
                          <div class="container">
                            <table class="table" id="table">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>NIK</th>
                                  <th>Nama</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Alamat</th>
                                  <th>Nomor Telepon</th>
                                  <th>Foto KTP</th>
                                  <th>ID Paket</th>
                                  <th>Harga</th>
                                </tr>
                              </thead>
                              <tbody>';
                $paketMap = [];
                foreach ($pakets['data'] as $paket) {
                  $paketMap[$paket['id']] = $paket['harga'];
                }

                foreach ($customers as $customer) {
                  $harga = $paketMap[$customer['id_paket']];
                  echo "<tr>
            <td>{$customer['id']}</td>
            <td>{$customer['nik']}</td>
            <td>{$customer['nama']}</td>
            <td>{$customer['jenis_kelamin']}</td>
            <td>{$customer['alamat']}</td>
            <td>{$customer['nomor_telepon']}</td>
            <td>{$customer['fotoktp']}</td>
            <td>{$customer['id_paket']}</td>
            <td>{$harga}<td>
            </tr>";
                }

                echo '</tbody>
                        </table>
                        <button onclick="printTable()">Print</button>
                      </div>
                    </section>';
              } ?>

              <script>
                function printTable() {
                  var table = document.getElementById("table");
                  var newWin = window.open('', '_blank');
                  newWin.document.write('<html><head><title>Print</title></head><body>');
                  newWin.document.write(table.outerHTML);
                  newWin.document.write('</body></html>');
                  newWin.document.close();
                  newWin.print();
                }
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>