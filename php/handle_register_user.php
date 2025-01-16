<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $ssn = $_POST['ssn'];
    $medicare = $_POST['medicare'];
    $medicaid = $_POST['medicaid'];
    $primary_doctor = $_POST['primary_doctor'];
    $pcp_id = $_POST['pcp_id'];
    $npi = $_POST['npi'];
    $medical_plan = $_POST['medical_plan'];

    try {
        $stmt = $conn->prepare("
            INSERT INTO users 
            (name, dob, address, phone, email, ssn, medicare, medicaid, primary_doctor, pcp_id, npi, medical_plan) 
            VALUES 
            (:name, :dob, :address, :phone, :email, :ssn, :medicare, :medicaid, :primary_doctor, :pcp_id, :npi, :medical_plan)
        ");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ssn', $ssn);
        $stmt->bindParam(':medicare', $medicare);
        $stmt->bindParam(':medicaid', $medicaid);
        $stmt->bindParam(':primary_doctor', $primary_doctor);
        $stmt->bindParam(':pcp_id', $pcp_id);
        $stmt->bindParam(':npi', $npi);
        $stmt->bindParam(':medical_plan', $medical_plan);

        if ($stmt->execute()) {
            echo "<script>alert('Usuario registrado exitosamente');</script>";
            echo "<script>window.location.href='../dashboard.php';</script>";
        } else {
            echo "<script>alert('Error al registrar usuario');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
