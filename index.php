<?php
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    $results = $crud->getSpecialties();
?>

<h1 class="text-center">Registration for IT Conference</h1>

<form action="success.php" method="post">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" class="form-control" id="firstname" required>
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" class="form-control" id="lastname" required>
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="text" name="dob" class="form-control" id="dob">
    </div>
    <div class="form-group">
        <label for="specialty">Area of Expertise</label>
        <select class="form-control" name="specialty" id="specialty">
            <?php while ( $row = $results->fetch(PDO::FETCH_ASSOC) ) { ?>
            <option value="<?php echo $row['specialty_id']; ?>"><?php echo $row['specialty_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="phone">Contact Number</label>
        <input type="text" name="phone" class="form-control" id="phone" aria-describedby="phoneHelp">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php require_once 'includes/footer.php'; ?>