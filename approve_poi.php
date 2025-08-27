<?php
$conn = new mysqli("localhost", "root", "", "rajpoi");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id']) && isset($_POST['action'])) {
    $pendingID = intval($_POST['id']);
    $action = $_POST['action'];

    if ($action === 'approve') {
        // Fetch data from pending_poi
        $query = "SELECT * FROM pending_poi WHERE PendingPOIID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $pendingID);
        $stmt->execute();
        $result = $stmt->get_result();
        $poi = $result->fetch_assoc();

        if ($poi) {
            // Insert into POI table
            $insert = "INSERT INTO poi 
                (DistrictID, CategoryID, SubcategoryID, Latitude, Longitude, LocationName, Image, Area, Postcode, Region, Language, Website) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt2 = $conn->prepare($insert);
            $stmt2->bind_param(
                "iiiddsssssss",
                $poi['DistrictID'],
                $poi['CategoryID'],
                $poi['SubcategoryID'],
                $poi['Latitude'],
                $poi['Longitude'],
                $poi['LocationName'],
                $poi['Image'],
                $poi['Area'],
                $poi['Postcode'],
                $poi['Region'],
                $poi['Language'],
                $poi['Website']
            );
            $stmt2->execute();
        }

        // Update status
        $conn->query("UPDATE pending_poi SET Status = 'approved' WHERE PendingPOIID = $pendingID");
        echo "<script>alert('POI approved successfully.'); window.location.href='admin_verification.php';</script>";
    } elseif ($action === 'reject') {
        $conn->query("UPDATE pending_poi SET Status = 'rejected' WHERE PendingPOIID = $pendingID");
        echo "<script>alert('POI rejected successfully.'); window.location.href='admin_verification.php';</script>";
    } else {
        echo "Invalid action.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
