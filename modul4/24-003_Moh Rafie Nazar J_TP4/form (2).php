<?php
$errors = array();
if (isset($_POST['surname'])) {
    require 'validate inc (2).php';
    validateName($errors, $_POST, 'surname');
    if ($errors) {
        echo '<h3>Invalid, perbaiki error berikut:</h3>';
        foreach ($errors as $field => $error)
            echo "$field $error<br/>";
    } else {
        echo '<h3>Data valid! Form berhasil dikirim.</h3>';
    }
}
?>

<form method="post" action="form (2).php">
  <label for="surname">Surname:</label>
  <input type="text" name="surname" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>">
  <input type="submit" value="Kirim">
</form>