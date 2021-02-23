<?php

class Crud {
        
    //private database object
    private $db;

    function __construct($conn) {
        //constructor to initialize private variable to the database connection
        $this->db = $conn;
    }

    public function insertAttendees ( $fname, $lname, $dob, $email, $contact, $specialty ) {
        try {
            //function to insert a new record into the attendees table
            $sql = "INSERT INTO attendees(first_name, last_name, date_birth, email_address, contact_number, specialty_id) VALUES (:fname, :lname, :dob, :email, :contact, :specialty)";
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specialty', $specialty);
            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendees () {
        try {
            $sql = "SELECT * FROM attendees a INNER JOIN specialties s ON a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editAttendee ( $id, $fname, $lname, $dob, $email, $contact, $specialty ) {
        try {
            $sql = "
                UPDATE `attendees` SET
                `first_name`=:fname,`last_name`=:lname,`date_birth`=:dob,`email_address`=:email,`contact_number`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id
            ";
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specialty', $specialty);
            // execute statement
            $stmt->execute();
            return true; 
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendeesDetails ( $id ) {
        try {
            $sql = "SELECT * FROM attendees a INNER JOIN specialties s ON a.specialty_id = s.specialty_id WHERE attendee_id = :id";
            $stmt = $this->db->prepare( $sql );
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteAttendee ( $id ) {
        try {
            $sql = "DELETE from attendees WHERE attendee_id = :id";
            $stmt = $this->db->prepare ($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function getSpecialties () {
        try {
        $sql = "SELECT * FROM specialties";
        $result = $this->db->query($sql);
        return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}