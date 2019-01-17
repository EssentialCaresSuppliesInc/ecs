<?php if ($error) { ?>
<<<<<<< HEAD
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php } ?>
<?php if ($success) { ?>
<div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
  <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
<?php } ?>
<table class="table table-bordered">
  <thead>
    <tr>
      <td class="text-left"><?php echo $column_date_added; ?></td>
      <td class="text-left"><?php echo $column_comment; ?></td>
      <td class="text-left"><?php echo $column_status; ?></td>
      <td class="text-left"><?php echo $column_notify; ?></td>
=======
<div class="warning"><?php echo $error; ?></div>
<?php } ?>
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>
<table class="list">
  <thead>
    <tr>
      <td class="left"><b><?php echo $column_date_added; ?></b></td>
      <td class="left"><b><?php echo $column_comment; ?></b></td>
      <td class="left"><b><?php echo $column_status; ?></b></td>
      <td class="left"><b><?php echo $column_notify; ?></b></td>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
    </tr>
  </thead>
  <tbody>
    <?php if ($histories) { ?>
    <?php foreach ($histories as $history) { ?>
    <tr>
<<<<<<< HEAD
      <td class="text-left"><?php echo $history['date_added']; ?></td>
      <td class="text-left"><?php echo $history['comment']; ?></td>
      <td class="text-left"><?php echo $history['status']; ?></td>
      <td class="text-left"><?php echo $history['notify']; ?></td>
=======
      <td class="left"><?php echo $history['date_added']; ?></td>
      <td class="left"><?php echo $history['comment']; ?></td>
      <td class="left"><?php echo $history['status']; ?></td>
      <td class="left"><?php echo $history['notify']; ?></td>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
    </tr>
    <?php } ?>
    <?php } else { ?>
    <tr>
<<<<<<< HEAD
      <td class="text-center" colspan="4"><?php echo $text_no_results; ?></td>
=======
      <td class="center" colspan="4"><?php echo $text_no_results; ?></td>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
    </tr>
    <?php } ?>
  </tbody>
</table>
<<<<<<< HEAD
<div class="row">
  <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
  <div class="col-sm-6 text-right"><?php echo $results; ?></div>
</div>
=======
<div class="pagination"><?php echo $pagination; ?></div>
>>>>>>> 5569f784842ef4dcee370d4c545c2704a8d47f19
