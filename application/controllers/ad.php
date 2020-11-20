<div class="card">
  <div class="card-header">
    <h5>Master Uang Jalan</h5>
  </div>
  <div class="card-block">
    <!-- Menampilkan notif !-->
    <?= $this->session->flashdata('notif') ?>
    <!-- Tombol untuk menambah data akun !-->
    <button data-toggle="modal" data-target="#addModal" class="btn btn-success waves-effect waves-light">New Data</button>

    <div class="table-responsive dt-responsive">
      <table id="dom-jqry" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>No Polisi</th>
            <th>PKS</th>
            <th>Divisi</th>
            <th>Kendaraan</th>
            <th>Uang Jalan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($c_t_m_a_uang_jalan as $key => $value) {
            echo "<tr>";
            echo "<td>" . ($key + 1) . "</td>";
            echo "<td>" . $value->NO_POLISI . "</td>";
            echo "<td>" . $value->PKS . "</td>";
            echo "<td>" . $value->DIVISI . "</td>";
            echo "<td>" . $value->KENDARAAN . "</td>";
            echo "<td>Rp" . number_format(intval($value->UANG_JALAN)) . "</td>";

            echo "<td>";

            echo "<a href='javascript:void(0);' data-toggle='modal' data-target='#Modal_Edit' class='btn-edit' data-id='" . $value->ID . "'>";
            echo "<i class='icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green'></i>";
            echo "</a>";
            echo "<a href='" . site_url('c_t_m_a_uang_jalan/delete/' . $value->ID) . "' ";
          ?>
            onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"
          <?php
            echo "> <i class='feather icon-trash-2 f-w-600 f-16 text-c-red'></i></a>";

            echo "</td>";


            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- MODAL TAMBAH Beban! !-->
<form action="<?php echo base_url('c_t_m_a_uang_jalan/tambah') ?>" method="post">
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="">

            <div class="form-group">
              <label>No Polisi</label>
              <select name="no_polisi_id" class='custom_width' id='select-state' placeholder='Pick a state...'>
                <?php
                foreach ($c_t_m_a_no_polisi as $key => $value) {
                  echo "<option value='" . $value->NO_POLISI_ID . "'>" . $value->NO_POLISI . "</option>";
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>PKS</label>
              <select name="pks_id" class='custom_width' id='select-state' placeholder='Pick a state...'>
                <?php
                foreach ($c_t_m_a_pks as $key => $value) {
                  echo "<option value='" . $value->PKS_ID . "'>" . $value->PKS . "</option>";
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Divisi</label>
              <select name="divisi_id" class='custom_width' id='select-state' placeholder='Pick a state...'>
                <?php
                foreach ($c_t_m_a_divisi as $key => $value) {
                  echo "<option value='" . $value->DIVISI_ID . "'>" . $value->DIVISI . "</option>";
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Kendaraan</label>
              <select name="kendaraan_id" class='custom_width' id='select-state' placeholder='Pick a state...'>
                <?php
                foreach ($c_t_m_a_kendaraan as $key => $value) {
                  echo "<option value='" . $value->KENDARAAN_ID . "'>" . $value->KENDARAAN . "</option>";
                }
                ?>
              </select>
            </div>


            <div class="form-group">
              <label>Uang Jalan</label>
              <input type='text' class='form-control' placeholder='Input Text' name='uang_jalan'>
            </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- MODAL TAMBAH AKUN! SELESAI !-->


<!-- MODAL EDIT AKUN !-->
<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form action="<?php echo base_url('c_t_m_a_uang_jalan/edit_action') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="">

            <input type="hidden" name="id" value="" class="form-control">

            <div class="form-group">
              <label>No Polisi</label>
              <select name="no_polisi_id" class="form-control" id="noPolis">
                <?php
                $no_polisi_id = $this->db->get('T_M_A_NO_POLISI');
                foreach ($no_polisi_id->result() as $row) { ?>
                  <option value="<?= $row->NO_POLISI_ID; ?>"><?php echo $row->NO_POLISI; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label>PKS</label>


              <select name="pks_id" class="form-control" value="pks_id">
                <?php
                foreach ($c_t_m_a_pks as $key => $value) {
                  echo "<option class='pks_id_o' value='" . $value->PKS_ID . "' >" . $value->PKS . "</option>";
                }
                ?>
              </select>






            </div>

            <div class="form-group">
              <label>Divisi</label>
              <select name="divisi_id" class='custom_width' id='select-state' placeholder='Pick a state...'>
                <?php
                foreach ($c_t_m_a_divisi as $key => $value) {
                  echo "<option value='" . $value->DIVISI_ID . "'>" . $value->DIVISI . "</option>";
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Kendaraan</label>
              <select name="kendaraan_id" class='custom_width' id='select-state' placeholder='Pick a state...'>
                <?php
                foreach ($c_t_m_a_kendaraan as $key => $value) {
                  echo "<option value='" . $value->KENDARAAN_ID . "'>" . $value->KENDARAAN . "</option>";
                }
                ?>
              </select>
            </div>


            <div class="form-group">
              <label>Uang Jalan</label>
              <input type='text' class='form-control' placeholder='Input Text' name='uang_jalan'>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
          </div>

        </div>
    </form>
  </div>
</div>
<script>
  const read_data = <?= json_encode($c_t_m_a_uang_jalan) ?>;
  console.log(read_data);
  let elModalEdit = document.querySelector("#Modal_Edit");
  console.log(elModalEdit);
  let elBtnEdits = document.querySelectorAll(".btn-edit");
  [...elBtnEdits].forEach(edit => {
    edit.addEventListener("click", (e) => {
      let id = edit.getAttribute("data-id");
      let User = read_data.filter(user => {
        if (user.ID == id)
          return user;
      });
      const {
        ID,
        NO_POLISI_ID: no_polisi_id,
        PKS_ID: pks_id,
        DIVISI_ID: divisi_id,
        KENDARAAN_ID: kendaraan_id,
        UANG_JALAN: uang_jalan
      } = User[0];
      // In your Javascript (external .js resource or <script> tag)
      $(document).ready(function() {
        var $select = $('#noPolis').selectize({
          sortField: 'text'
        });
        var selectize = $select[0].selectize;
        selectize.setValue(no_polisi_id, false);
      });

      elModalEdit.querySelector("[name=id]").value = ID;


      elModalEdit.querySelector("[name=uang_jalan]").value = uang_jalan;

      [...elModalEdit.querySelectorAll("option.pks_id_o")].forEach(rid => {
        if (rid.getAttribute("value") == pks_id) {
          rid.setAttribute("selected", 'selected')
        }
      })

    })
  })
</script>