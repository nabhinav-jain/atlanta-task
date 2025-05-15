<?php
require_once '../dbconnect.php'; 

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

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
if (isset($_FILES['logo_path']) && $_FILES['logo_path']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = __DIR__ . '/../images/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $fileTmp  = $_FILES['logo_path']['tmp_name'];
    $fileName = basename($_FILES['logo_path']['name']);
    $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($fileExt, $allowedExt)) {
        echo json_encode(['error' => 'Invalid image type']);
        exit;
    }

    $uniqueName = uniqid('logo_', true) . '.' . $fileExt;
    $targetPath = $uploadDir . $uniqueName;

    if (move_uploaded_file($fileTmp, $targetPath)) {
        $logoPath = '../images/' . $uniqueName; 
    } else {
        echo json_encode(['error' => 'Failed to move uploaded file']);
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
} else {
    echo json_encode(['error' => 'Database insert failed: ' . $stmt->error]);
}

$stmt->close();

