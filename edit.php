<?php
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    $results = $crud->getSpecialties();

    if ( !isset ( $_GET['id'] ) ) {
        include 'includes/errormessage.php';
        header( 'Location: viewrecords.php' );
    } else {
        $id = $_GET['id'];
        $attendee = $crud->getAttendeesDetails($id);
    
?>

<h1 class="text-center">Edit Record</h1>

    <form action="editattendee.php" method="post">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']; ?>">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" class="form-control" value="<?php echo $attendee['first_name']; ?>" id="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" class="form-control" value="<?php echo $attendee['last_name']; ?>" id="lastname">
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" name="dob" class="form-control" value="<?php echo $attendee['date_birth']; ?>" id="dob">
        </div>
        <div class="form-group">
            <label for="specialty">Area of Expertise</label>
            <select class="form-control" name="specialty" id="specialty">
                <?php while ( $row = $results->fetch(PDO::FETCH_ASSOC) ) { ?>
                <option value="<?php echo $row['specialty_id']; ?>"
                    <?php if($row['specialty_id'] == $attendee['specialty_id']) echo 'selected'; ?>>
                    <?php echo $row['specialty_name']; ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control" value="<?php echo $attendee['email_address']; ?>" id="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $attendee['contact_number']; ?>" id="phone" aria-describedby="phoneHelp">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
    </form>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>