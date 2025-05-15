<?php
header('Content-Type: application/json');

require_once '../dbconnect.php'; 
print_r($_REQUEST['logo_path']);
die;


function sanitize($conn, $key) {
    return mysqli_real_escape_string($conn, trim($_POST[$key] ?? ''));
}

$required = ['fullName', 'mobileNo', 'email', 'role', 'gender', 'status', 'marital_status'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        http_response_code(422);
        echo json_encode(['error' => "Missing field: $field"]);
        exit;
    }
}

$fullName     = sanitize($conn, 'fullName');
$mobileNo     = sanitize($conn, 'mobileNo');
$email        = sanitize($conn, 'email');
$address      = sanitize($conn, 'address');
$role         = sanitize($conn, 'role');
$designation  = sanitize($conn, 'desgination');
$gender       = sanitize($conn, 'gender');
$status       = sanitize($conn, 'status');
$dob          = sanitize($conn, 'dob');
$maritalInput = strtolower(trim($_POST['marital_status']));
$maritalStatus = $maritalInput === 'married' ? 1 : 0;

if (!preg_match('/^\d{10}$/', $mobileNo)) {
    echo json_encode(['error' => 'Mobile number must be exactly 10 digits']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['error' => 'Invalid email address']);
    exit;
}

$logoPath = null;



if (isset($_FILES['logo_path']) && is_uploaded_file($_FILES['logo_path']['tmp_name'])) {
    $uploadDir = __DIR__ . '/../images/';
    $fileName = uniqid('logo_') . '_' . basename($_FILES['logo_path']['name']);
    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['logo_path']['tmp_name'], $targetPath)) {
        $logoPath = '../images/' . $fileName;
    } else {
        echo json_encode(['error' => 'Failed to upload logo']);
        exit;
    }
}


$stmt = $conn->prepare("
    INSERT INTO users (name, mobile_no, email, address, role, designation, gender, logo_path, status, dob, marital_status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

if (!$stmt) {
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param(
    'ssssssssssi',
    $fullName,
    $mobileNo,
    $email,
    $address,
    $role,
    $designation,
    $gender,
    $logoPath,
    $status,
    $dob,
    $maritalStatus
);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'User added successfully']);
    exit;
} else {
    echo json_encode(['error' => 'Database insert failed: ' . $stmt->error]);
    exit;
}

$stmt->close();

