<?php while ($data = mysqli_fetch_array($query)) { ?>
<div class="col-md-6 col-lg-3">

      <div class="card h-70">
         <img class="card-img-top" src="../dashboard/pages/fungsi_buku/image/<?php echo $data['cover_b']; ?>"
            alt="Card image cap" style="max-height: 200px; object-fit: cover;" />
         <div class="card-body">
            <h5 class="card-title"><?php echo $data['judul_b']; ?></h5>
            <p class="card-text"
               style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
               <?php echo $data['sinopsis_b']; ?>
            </p>
            <button
               type="button"
               class="btn btn-primary"
               data-bs-toggle="modal"
               data-bs-target="#modalScrollable-<?= $data['kode_b']; ?>">
               View Detail
            </button>

            <!-- MODALS -->
            <div class="modal fade" id="modalScrollable-<?= $data['kode_b']; ?>" tabindex="-1" aria-hidden="true">
               <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content w-100">
                     <div class="modal-header shadow">
                        <h3 class="modal-title mb-5 ms-10" id="modalScrollableTitle"> Detail Buku</h3>
                        <button
                           type="button"
                           class="btn btn-close btn-lg btn-danger mb-3 me-3"
                           data-bs-dismiss="modal"></button>
                     </div>
                     <!-- CONTENT DETAIL -->
                     <div class="modal-body">
                        <div class="d-flex align-items-center mb-5">
                           <img class="shadow rounded me-5" style="width: 35%;" src="../dashboard/pages/fungsi_buku/image/<?= $data['cover_b']; ?>" alt="">
                           <div class="">
                              <h5>Judul : <?= $data['judul_b']; ?></h5>
                              <h5>kategori : <?= $data['nama_k']; ?></h5>
                              <h5>ISBN : <?= $data['isbn_b']; ?></h5>
                              <h5>Penulis : <?= $data['penulis_b']; ?></h5>
                              <h5>Penerbit : <?= $data['nama_p']; ?></h5>
                              <h5>Tahun : <?= $data['tahun']; ?></h5>
                              <h5>Bahasa : <?= $data['bahasa_b']; ?></h5>
                              <h5>Synopsis :</h5>
                                <h5><?= $data['sinopsis_b']; ?></h5>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
   </div>
   <?php } ?>
