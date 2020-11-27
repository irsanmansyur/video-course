<div class="row">
  <form action="<?= base_url("kalkulator/cagr"); ?>" method="post" id="cagr">
    <div class="col-12">
      <div class="card ">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr class="text-white bg-dark">
                  <th colspan="2" style="text-align: center;">Date</th>
                  <th></th>
                  <th>Value</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="bg-dark text-white">Start Value</td>
                  <td><input type="date" class="form-control" name="start_date" value="<?= set_value("start_date", null) ?? date("Y-m-d", time()); ?>">
                    <?= form_error("start_date", "<small class='text-danger'>", "</small>"); ?>
                  </td>
                  <td style="text-align: right;">Rp. </td>

                  <td>
                    <input type="number" class="form-control" name="start_date_value" value="<?= set_value("start_date_value") ?>">
                    <?= form_error("start_date_value", "<small class='text-danger'>", "</small>"); ?>

                  </td>
                </tr>
                <tr>
                  <td class="bg-dark text-white">End Value</td>
                  <td><input type="date" class="form-control" name="end_date" value="<?= set_value("end_date", null) ?? date("Y-m-d", time()); ?>">
                    <?= form_error("end_date", "<small class='text-danger'>", "</small>"); ?>
                  </td>
                  <td style="text-align: right;">Rp. </td>
                  <td>
                    <input type="number" class="form-control" name="end_date_value" value="<?= set_value("end_date_value") ?>">
                    <?= form_error("end_date_value", "<small class='text-danger'>", "</small>"); ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="3" class="bg-dark text-white">Years</td>
                  <td class="bg-danger text-white">
                    <?= @$years; ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="3" class="bg-dark text-white">Growth Rate</td>
                  <td class="bg-danger text-white">
                    <?= @$growthRate . "%"; ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="3" class="bg-dark text-white">Compound Annual Growth Rate (CAGR)</td>
                  <td class="bg-danger text-white align-right">
                    <?= @$compoundAnnual . "%"; ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="4">
                    <input type="submit" class="form-control bg-primary text-white"" name=" cagr" value="Hitung">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script>
  let formCagr = document.getElementById('cagr');
  formCagr.addEventListener("submit", function(e) {
    // e.preventDefault();
    let starValue = parseFloat(document.querySelector("[name=start_date_value]").value);
    let endValue = parseFloat(document.querySelector("[name=end_date_value]").value);
    let year = parseInt(document.querySelector("[name=year]").value);
  })
</script>