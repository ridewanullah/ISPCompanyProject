<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pengaturan Paket</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard_user.php?module=home">Dashboard</a></li>
                            <li class="breadcrumb-item active">Movies</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-body">
                              <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Pengaturan Paket</h4>
                                    
                                    <?php
                                      $aksi = 'module/paket/paket_action.php';
                                        use GuzzleHttp\Client;

                                        try {
                                            $client = new Client([
                                                'base_uri' => 'http://127.0.0.1:6969',
                                                'timeout' => 5
                                            ]);

                                            $response =  $client->request('GET', '/api/paket'); //Untuk data penjualan
                                            $body = $response->getBody();
                                            $data_body = json_decode($body, true);
                                        } catch (RuntimeException $e) {
                                            echo $e->getMessage();
                                        }

                                        echo '<div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Paket
                                  </div>
                            <section class="inner-page">
                              <div class="container">
                                <table class="table">';

                                echo '<thead>
                                  <tr>
                                    <th scope="col">ID Paket</th>  
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Kecepatan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                  </tr>
                                </thead>';

                                foreach ($data_body['data'] as $row) {
                                  echo "<tbody>
                                        <tr>
                                          <td>$row[id]</td>
                                          <td>$row[nama_paket]</td>
                                          <td>$row[kecepatan]</td>
                                          <td>$row[harga]</td>
                                          <td>
                                            <a href='$aksi?module=paket&act=hapus&id=$row[id]' class='btn btn-danger'>Hapus</a>
                                          </td>
                                        </tr>
                                        </tbody>";
                                }
                                echo      '</table>
                                        </div>
                                      </section>';

                                      

                                        echo "<form class='forms-sample' action='$aksi?module=paket&act=insert' method='POST'>
                                            <div class='form-group'>
                                            <h4 class='card-description'>Input Paket Baru</h4>";
                                            echo "
                                            <label for='value'>Nama Paket</label>
                                            <input type='text' class='form-control' name='nama_paket' placeholder='Masukkan Nama Paket'>
                                            <label for='value'>Kecepatan</label>
                                            <input type='text' class='form-control' name='kecepatan' placeholder='Masukkan Keterangan Kecepatan Paket'>
                                            <label for='value'>Harga</label>
                                            <input type='text' class='form-control' name='harga' placeholder='Harga'>
                                            </div>
                                            <button type='submit' class='btn btn-primary mr-2'>Insert</button>
                                            </form>";
                                            
                                            
                                            echo "<br><br>";
                                            
                                            
                                            
                                            echo "<form class='forms-sample' action='$aksi?module=paket&act=update' method='POST'>
                                            <div class='form-group'>
                                            <h4 class='card-description'>Update Paket</h4>";
                                            echo "<label for='id'>ID Paket</label>
                                            <select name='id' class='form-select'>";
                                            foreach ($data_body['data'] as $row) {
                                              echo "<option value='$row[id]'>ID : '$row[id]', Nama Paket : '$row[nama_paket]'</option>";
                                            }
                                            echo "</select>
                                            <label for='value'>Nama Paket</label>
                                            <input type='text' class='form-control' name='nama_paket' placeholder='Masukkan Nama Paket'>
                                            <label for='value'>Kecepatan</label>
                                            <input type='text' class='form-control' name='kecepatan' placeholder='Masukkan Keterangan Kecepatan Paket'>
                                            <label for='value'>Harga</label>
                                            <input type='text' class='form-control' name='harga' placeholder='Harga'>
                                            </div>
                                            <button type='submit' class='btn btn-primary mr-2'>Update</button>
                                            </form>";
                                            
                                            
                                            echo "<br><br>";
                                            ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                </main>