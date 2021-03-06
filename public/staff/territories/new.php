<?php
require_once('../../../private/initialize.php');
$errors = array();
$territory = array(
  'name' => '',
  'state_id' => '',
  'position' => ''
);

if(is_post_request()) {

  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $territory['name'] = $_POST['name']; }
  if(isset($_POST['state_id'])) { $territory['state_id'] = $_POST['state_id']; }
  if(isset($_POST['position'])) { $territory['position'] = $_POST['position']; }

  $result = insert_territory($territory);
  if($result === true) {
    $new_id = db_insert_id($db);
    redirect_to('show.php?id=' . $new_id);
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: New Territory'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to State Details</a><br />

  <h1>New Territory</h1>

  <!-- TODO add form -->
  <form action="new.php" method="post">
    Name:<br />
    <input type="text" name="name" value="<?php echo $territory['name']; ?>" /><br />
    State Id:<br />
    <input type="text" name="state_id" value="<?php echo $territory['state_id']; ?>" /><br />
    Position:<br />
    <input type="text" name="position" value="<?php echo $territory['position']; ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Create"  />
  </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
