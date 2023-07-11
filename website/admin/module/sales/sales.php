<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pengaturan Sales</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard_user.php?module=home">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sales</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-body">
                              <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Form Sales</h4>
                                    <p class="card-description">
                                      Input Sales Baru
                                    </p>
                                    <?php
                                      $aksi = 'module/sales/sales_action.php';
                                        use GuzzleHttp\Client;

                                        try {
                                            $client = new Client([
                                                'base_uri' => 'http://127.0.0.1:7676',
                                                'timeout' => 5
                                            ]);
            
                                            $response =  $client->request('GET', '/api/sales'); //Untuk data film
                                            $body = $response->getBody();
                                            $data_body = json_decode($body, true);
                                        } catch (RuntimeException $e) {
                                            echo $e->getMessage();
                                        }

                                        echo '<div class="card-header">
                                                  <i class="fas fa-table me-1"></i>
                                                  List Sales
                                              </div>
                                              <section class="inner-page">
                                                <div class="container">
                                                  <table class="table">';

                                                  echo '<thead>
                                                  <tr>
                                                    <th scope="col">ID Sales</th>  
                                                    <th scope="col">NIP</th>  
                                                    <th scope="col">Nama Sales</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Divisi</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Password</th>
                                                    <th scope="col">Aksi</th>
                                                  </tr>
                                                </thead>';
                      
                                                try {
                                                  if (!empty($data_body)) {
                                                      foreach ($data_body as $row) {
                                                          echo @ "<tbody>
                                                              <tr>
                                                                  <td>" . @$row['id'] . "</td>
                                                                  <td>" . @$row['nip'] . "</td>
                                                                  <td>" . @$row['name'] . "</td>
                                                                  <td>" . @$row['alamat'] . "</td>
                                                                  <td>" . @$row['divisi'] . "</td>
                                                                  <td>" . @$row['email'] . "</td>
                                                                  <td>" . @$row['password'] . "</td>
                                                                  <td>
                                                                      <a href='{$aksi}?module=sales&act=hapus&id=" . @$row['id'] . "' class='btn btn-danger'>Hapus</a>
                                                                  </td>
                                                              </tr>
                                                          </tbody>";
                                                      }
                                                  } else {
                                                      echo "No data available.";
                                                  }
                                              } catch (\Exception $e) {
                                                  echo "An error occurred: " . $e->getMessage();
                                              }
                                              
                                              
                                                echo      '</table>
                                                        </div>
                                                      </section>';

                                        echo "<form class='forms-sample' action='$aksi?module=sales&act=insert' method='POST'>
                                            <div class='form-group'>
                                            <h4 class='card-title'>Create Sales</h4>
                                            <label for='value'>NIP</label>
                                            <input type='text' class='form-control' name='nip' placeholder='Nomor Induk Pegawai'>
                                            <label for='value'>Nama</label>
                                            <input type='text' class='form-control' name='name' placeholder='Nama Sales'>
                                            <label for='value'>Alamat</label>
                                            <input type='text' class='form-control' name='alamat' placeholder='Alamat Sales'>
                                            <label for='value'>Divisi</label>
                                            <input type='text' class='form-control' name='divisi' placeholder='Divisi Sales'>
                                            <label for='value'>Email</label>
                                            <input type='text' class='form-control' name='email' placeholder='Email Sales'>
                                            <label for='value'>Password</label>
                                            <input type='password' class='form-control' name='password' placeholder='Masukkan Password'>
                                            <label for='value'>Confirm Password</label>
                                            <input type='password' class='form-control' name='confirm_password' placeholder='Masukkan Kembali Password'>
                                            <button type='submit' class='btn btn-primary mr-2'>Insert</button>
                                            </div>
                                            </form>";


                                            echo "<br><br>";



                                        echo "<form class='forms-sample' action='$aksi?module=sales&act=update' method='POST'>
                                            <div class='form-group'>
                                            <h4 class='card-title'>Update Sales</h4>";
                                          echo "<label for='id'>ID Sales</label>
                                          <select name='id' class='form-select'>";
                                            foreach ($data_body as $row) {
                                              echo "<option value='$row[id]'>ID : '$row[id]', NIP : '$row[nip]', Nama : '$row[name]'</option>";
                                            }
                                            echo "</select>
                                            <label for='value'>NIP</label>
                                            <input type='text' class='form-control' name='nip' placeholder='Nomor Induk Pegawai'>
                                            <label for='value'>Nama</label>
                                            <input type='text' class='form-control' name='name' placeholder='Nama Sales'>
                                            <label for='value'>Alamat</label>
                                            <input type='text' class='form-control' name='alamat' placeholder='Alamat Sales'>
                                            <label for='value'>Divisi</label>
                                            <input type='text' class='form-control' name='divisi' placeholder='Divisi Sales'>
                                            <label for='value'>Email</label>
                                            <input type='text' class='form-control' name='email' placeholder='Email Sales'>
                                            <label for='value'>Password</label>
                                            <input type='password' class='form-control' name='password' placeholder='Masukkan Password'>
                                            <label for='value'>Confirm Password</label>
                                            <input type='password' class='form-control' name='confirm_password' placeholder='Masukkan Kembali Password'>
                                            <button type='submit' class='btn btn-primary mr-2'>Update</button>
                                            </div>
                                            </form>";
                                    ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </main>