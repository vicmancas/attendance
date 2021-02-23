<?php
    $title = 'View Records';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    // Get all attendees
    $results = $crud->getAttendees();
?>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialty</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ( $row = $results->fetch( PDO::FETCH_ASSOC ) ) { ?>
        <tr>
            <td><?php echo $row['attendee_id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['specialty_name']; ?></td>
            <td>
                <a href="viewrecord.php?id=<?php echo $row['attendee_id']; ?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $row['attendee_id']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?';)" href="delete.php?id=<?php echo $row['attendee_id']; ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>