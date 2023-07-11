<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="card mb-4">
      <?php
      //require __DIR__ . '\..\vendor\autoload.php';

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

      if ($_GET['module'] == 'home') {
        echo '<div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Customer
                      </div>
                <section class="inner-page">
                    <div class="container">
                        <table class="table">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>';
        foreach ($customers as $customer) :
          echo "<tr>
                            <td>{$customer['id']}</td>
                            <td>{$customer['nik']}</td>
                            <td>{$customer['nama']}</td>
                            <td>{$customer['jenis_kelamin']}</td>
                            <td>{$customer['alamat']}</td>
                            <td>{$customer['nomor_telepon']}</td>
                            <td>{$customer['fotoktp']}</td>
                            <td>{$customer['id_paket']}</td>
                            <td><a href='user_action.php?action=batal&id=$customer[id]' class='btn btn-danger'>Batal</a></td>
                        </tr>";
        endforeach;
        echo '</tbody>
                    </table>
                </div>
            </section>';

        echo "<br><br>";

        echo "<form class='forms-sample' action='user_action.php?action=beli' method='POST'>
                        <div class='form-group'>
                            <h4 class='card-title'>Pemesanan Customer Baru</h4>
                      <label for='value'>NIK</label>
                        <input type='text' class='form-control' name='nik' placeholder='Nomor NIK'>
                        <label for='value'>Nama</label>
                        <input type='text' class='form-control' name='nama' placeholder='Nama Customer'>
                        <label for='jenis_kelamin'>Jenis Kelamin</label>
                        <select name='jenis_kelamin' class='form-select'>
                            <option value='Pria'>Pria</option>
                            <option value='Wanita'>Wanita</option>
                        </select>
                        <label for='value'>Alamat</label>
                        <input type='text' class='form-control' name='alamat' placeholder='Alamat Sales'>
                        <label for='value'>Nomor Telepon</label>
                        <input type='text' class='form-control' name='nomor_telepon' placeholder='Nomor Telepon'>
                        <label for='value'>Foto KTP</label>
                        <input type='file' class='form-control' name='fotoktp' placeholder='Foto KTP'>
                        <label for='id_paket'>ID Paket</label>
                            <select name='idpaket' class='form-select'>";
                            foreach ($pakets['data'] as $row) {
                              echo "<option value='$row[id]'>ID : '$row[id]', Nama Paket : '$row[nama_paket]', Kecepatan : '$row[kecepatan], Harga : '$row[harga]'</option>";
                            }
                            echo "</select>
                        <button type='submit' class='btn btn-primary mr-2'>Insert</button>
                    </div>
                </form>";

        echo "<br><br>";

        echo "<form class='forms-sample' action='user_action.php?action=update' method='POST'>
    <div class='form-group'>
        <h4 class='card-title'>Edit Pemesanan Customer</h4>
        <label for='id'>ID Sales</label>
        <select name='id' class='form-select'>";  
        foreach ($customers as $row) {
            echo "<option value='$row[id]'>ID : '$row[id]', NIK : '$row[nik]', Nama : '$row[nama]'</option>";
        }
        echo "</select>
        <label for='value'>NIK</label>
        <input type='text' class='form-control' name='nik' placeholder='Nomor NIK'>
        <label for='value'>Nama</label>
        <input type='text' class='form-control' name='nama' placeholder='Nama Customer'>
        <label for='jenis_kelamin'>Jenis Kelamin</label>
        <select name='jenis_kelamin' class='form-select'>
            <option value='Pria'>Pria</option>
            <option value='Wanita'>Wanita</option>
        </select>
        <label for='value'>Alamat</label>
        <input type='text' class='form-control' name='alamat' placeholder='Alamat Sales'>
        <label for='value'>Nomor Telepon</label>
        <input type='text' class='form-control' name='nomor_telepon' placeholder='Nomor Telepon'>
        <label for='value'>Foto KTP</label>
        <input type='file' class='form-control' name='fotoktp' placeholder='Foto KTP'>
        <label for='id'>ID Paket</label>
        <select name='id_paket' class='form-select'>";
        foreach ($pakets['data'] as $row) {
            echo "<option value='$row[id]'>ID : '$row[id]', Nama Paket : '$row[nama_paket]', Kecepatan : '$row[kecepatan]', Harga : '$row[harga]'</option>";
        }
        echo "</select>
        <button type='submit' class='btn btn-primary mr-2'>Update</button>
    </div>
</form>";

      }
      ?>
    </div>
  </div>
</main>