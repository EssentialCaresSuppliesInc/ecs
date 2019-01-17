<<<<<<< HEAD
<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <td class="text-right"><?php echo $column_order_id; ?></td>
        <td class="text-left"><?php echo $column_customer; ?></td>
        <td class="text-right"><?php echo $column_amount; ?></td>
        <td class="text-left"><?php echo $column_date_added; ?></td>
      </tr>
    </thead>
    <tbody>
      <?php if ($histories) { ?>
      <?php foreach ($histories as $history) { ?>
      <tr>
        <td class="text-right"><?php echo $history['order_id']; ?></td>
        <td class="text-left"><?php echo $history['customer']; ?></td>
        <td class="text-right"><?php echo $history['amount']; ?></td>
        <td class="text-left"><?php echo $history['date_added']; ?></td>
      </tr>
      <?php } ?>
      <?php } else { ?>
      <tr>
        <td class="text-center" colspan="4"><?php echo $text_no_results; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<div class="row">
  <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
  <div class="col-sm-6 text-right"><?php echo $results; ?></div>
</div>
=======
<table class="list">
  <thead>
    <tr>
      <td class="right"><b><?php echo $column_order_id; ?></b></td>
      <td class="left"><b><?php echo $column_customer; ?></b></td>
      <td class="right"><b><?php echo $column_amount; ?></b></td>
      <td class="left"><b><?php echo $column_date_added; ?></b></td>
    </tr>
  </thead>
  <tbody>
    <?php if ($histories) { ?>
    <?php foreach ($histories as $history) { ?>
    <tr>
      <td class="right"><?php echo $history['order_id']; ?></td>
      <td class="left"><?php echo $history['customer']; ?></td>
      <td class="right"><?php echo $history['amount']; ?></td>
      <td class="left"><?php echo $history['date_added']; ?></td>
    </tr>
    <?php } ?>
    <?php } else { ?>
    <tr>
      <td class="center" colspan="4"><?php echo $text_no_results; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<div class="pagination"><?php echo $pagination; ?></div>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
