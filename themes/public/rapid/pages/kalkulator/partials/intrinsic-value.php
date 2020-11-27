<form action="<?= base_url('kalkulator'); ?>" method="post">
  <div class="row">
    <div class="col-md-7">
      <div class="card ">
        <div class="card-body">
          <div class="table-responsive-xl">
            <table class="table">
              <tbody>
                <tr>
                  <td style="width:200px!important">Name of Stock</td>
                  <td style="width:20px!important"></td>
                  <td colspan="2"><input type="text" class="form-control" name="name_of_stock" value="<?= set_value("name_of_stock"); ?>"></td>
                </tr>

                <tr>
                  <td>Stock Symbol</td>
                  <td style="width:20px!important"></td>

                  <td colspan="2"><input type="text" class="form-control" name="stock_symbol" value="<?= set_value("stock_symbol"); ?>"></td>
                </tr>

                <tr>
                  <td>Operating Cash Flow (Current)</td>
                  <td><b>Rp. </b></td>
                  <td colspan="2">
                    <input type="number" class="form-control twoDgt" min="0" name="cash_flow" value="<?= set_value("cash_flow"); ?>">
                    <?= form_error("cash_flow", "<small class='text-danger'>", "</small>"); ?>
                  </td>
                </tr>
                <tr>
                  <td>Total Debt (Short Term Debt + Long Tern Debt)</td>
                  <td style="width:20px!important"><b>Rp. </b></td>
                  <td colspan="2"><input type="number" value="<?= set_value("total_debt"); ?>" class="form-control twoDgt" name="total_debt" min="0">
                    <?= form_error("total_debt", "<small class='text-danger'>", "</small>"); ?>
                  </td>
                </tr>

                <tr>
                  <td>Cash and Short Term Investments</td>
                  <td style="width:20px!important"><b>Rp. </b></td>
                  <td colspan="2"><input type="number" class="form-control twoDgt" name="cash_and_short" min="0" step="1" value="<?= set_value("cash_and_short"); ?>">
                    <?= form_error("cash_and_short", "<small class='text-danger'>", "</small>"); ?>
                  </td>
                </tr>

                <tr>
                  <td colspan="2">Cash Flow Growth Rate (Year 1 - Year 4)</td>
                  <td><input type="number" class="form-control" name="percent_tp" step=".01" value="<?= set_value("percent_tp"); ?>">
                    <?= form_error("percent_tp", "<small class='text-danger'>", "</small>"); ?>
                  </td>
                  <td style="width:12px" class="my-0"><b>%</b></td>
                </tr>
                <tr>
                  <td colspan="2">Cash Flow Growth Rate (Year 6 - Year 8)</td>
                  <td><input type="number" class="form-control" name="percent_te" step=".01" value="<?= set_value('percent_te'); ?>">
                    <?= form_error("percent_te", "<small class='text-danger'>", "</small>"); ?>
                  </td>
                  <td style="width:12px" class="my-0"><b>%</b></td>
                </tr>

                <tr>
                  <td>No. of Shares Outstanding</td>
                  <td></td>
                  <td colspan="2"><input type="number" min="0" name="shares_outstanding" step=".01" class="form-control twoDgt" value="<?= set_value('shares_outstanding'); ?>">
                    <?= form_error("shares_outstanding", "<small class='text-danger'>", "</small>"); ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card ">
        <div class="card-body">
          <div class="table-responsive-xl">
            <table class="table">
              <tbody>
                <tr>
                  <td>PV of 10 Years Cash Flow</td>
                  <td colspan="2"><input type="text" class="form-control" readonly value="<?= number_format($year10 ?? '0', 2); ?>"> </td>

                </tr>
                <tr>
                  <td>Intrinsic Value before Cash / Debt</td>
                  <td colspan="2"><input type="text" class="form-control" readonly value="<?= number_format($intrinsicValue ?? '0', 2); ?>"></td>

                </tr>
                <tr>
                  <td>(Less) Debt per Share</td>
                  <td colspan="2"><input type="text" class="form-control" readonly value="<?= number_format($debtPerShare ?? '0', 2); ?>"> </td>

                </tr>
                <tr>
                  <td>(Plus) Cash per Share</td>
                  <td colspan="2"><input type="text" class="form-control" readonly value="<?= number_format($cashPerShare ?? '0', 2); ?>"> </td>

                </tr>
                <tr>
                  <td><b> Final Intrinsic Value per Share</b></td>
                  <td colspan="2"><input type="text" class="form-control" readonly value="<?= number_format($finalIntrinsicValuePerShare ?? '0', 2); ?>"> </td>
                </tr>
                <tr>
                  <td>Current Year</td>
                  <td colspan="2">
                    <input type="text" class="form-control" readonly value="<?= date("Y", time()); ?>">
                  </td>

                </tr>
                <tr>
                  <td>Discount Rate</td>
                  <td><input type="number" class="form-control" name="discount_rate" min="0" step="1" value="<?= set_value('discount_rate'); ?>">
                    <?= form_error("discount_rate", "<small class='text-danger'>", "</small>"); ?>
                  </td>
                  <td><b>%</b></td>

                </tr>
              </tbody>
            </table>
            <input type="submit" value="Hitung" class="d-block my-3 btn btn-primary w-100">
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<?php if (isset($years)) : ?>
  <div class="row my-5">
    <div class="col-12">
      <div class="card ">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr class="text-white bg-dark">
                  <th>Year</th>
                  <?php for ($i = 0; $i < 10; $i++) :; ?>
                    <th><?= date("Y", time()) + $i; ?></th>
                  <?php endfor; ?>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Cash Flow (Projected)</td>
                  <?php for ($i = 0; $i < 10; $i++) :; ?>
                    <td><?= rupiah($years[date("Y", time()) + $i]['cashflow']); ?></td>
                  <?php endfor; ?>
                </tr>
                <tr>
                  <td>Discount Factor</td>
                  <?php for ($i = 0; $i < 10; $i++) :; ?>
                    <td><?= $years[date("Y", time()) + $i]['discountFactor']; ?></td>
                  <?php endfor; ?>
                </tr>
              </tbody>
              <tfoot>
                <tr class="text-white bg-dark" style="font-size: 13px;">
                  <th>Discounted Value</th>
                  <?php for ($i = 0; $i < 10; $i++) :; ?>
                    <th><?= rupiah($years[date("Y", time()) + $i]['discountedValue']); ?></th>
                  <?php endfor; ?>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>