<!-- start table -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Users</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status verification</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                  <th class="text-secondary opacity-7">Action</th>
                </tr>
              </thead>
              <?php
              include "../config/db.php";
              $data = mysqli_query($connect, "SELECT * FROM user");
              while ($d = mysqli_fetch_assoc($data)) {

              ?>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $d['username'] ?></h6>
                          <p class="text-xs text-secondary mb-0"><?= $d['email'] ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">Role</p>
                      <p class="text-xs text-secondary mb-0"><?= $d['role'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-<?= ($d['is_verifica'] == 1) ? "success" : "danger" ?>"><i class='bi bi-<?= ($d['is_verifica'] == 1) ? "person-check" : "person-fill-x"  ?> fs-5'></i></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $d['create_at'] ?></span>
                    </td>
                    <td class="align-middle">
                      <a href="" class="btn btn-sm btn-primary mt-2">Edit</a>
                      <a href="" class="btn btn-sm btn-danger mt-2">hapus</a>
                    </td>
                  </tr>
                </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div> 
  <!-- end table -->