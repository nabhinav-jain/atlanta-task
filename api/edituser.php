<?php
header('Content-Type: application/json');

require_once '../dbconnect.php'; 


function sanitize($conn, $key) {
    return mysqli_real_escape_string($conn, trim($_POST[$key] ?? ''));
}

$required = ['editfullName', 'editmobileNo', 'editemail', 'editrole', 'editgender', 'editstatus', 'editmarital_status'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        http_response_code(422);
        echo json_encode(['error' => "Missing field: $field"]);
        exit;
    }
}
$userid = sanitize($conn, 'userid');
$fullName     = sanitize($conn, 'editfullName');
$mobileNo     = sanitize($conn, 'editmobileNo');
$email        = sanitize($conn, 'editemail');
$address      = sanitize($conn, 'editaddress');
$role         = sanitize($conn, 'editrole');
$designation  = sanitize($conn, 'editdesgination');
$gender       = sanitize($conn, 'editgender');
$status       = sanitize($conn, 'editstatus');
$dob          = sanitize($conn, 'editdob');
$maritalInput = strtolower(trim($_POST['editmarital_status']));
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



$logoPath = null;
if (isset($_FILES['editlogo_path']) && is_uploaded_file($_FILES['editlogo_path']['tmp_name'])) {
    $rawData = file_get_contents($_FILES['logo_path']['tmp_name']);
    $mime    = $_FILES['logo_path']['type']; 
    $logoPath = 'data:' . $mime . ';base64,' . base64_encode($rawData);
}


$stmt = $conn->prepare("
    UPDATE users
    SET name = ?, 
        mobile_no = ?, 
        email = ?, 
        address = ?, 
        role = ?, 
        designation = ?, 
        gender = ?, 
        logo_path = ?, 
        status = ?, 
        dob = ?, 
        marital_status = ?
    WHERE id = ?
");

if (!$stmt) {
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param(
    'ssssssssssii',
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
    $maritalStatus,  
    $userId          
);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'User updated successfully']);
} else {
    echo json_encode(['error' => 'Database update failed: ' . $stmt->error]);
}

$stmt->close();