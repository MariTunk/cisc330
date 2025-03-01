?php
header('Content-Type: application/json');

// Get POST data
$name = $_POST['email'] ?? '';
$email = $_POST['password'] ?? '';

// Create response
$response = array(
    'status' => 'success',
    'message' => "Thank you,Your email:$email has been updated."
);

// Send JSON response
echo json_encode($response);
?>
