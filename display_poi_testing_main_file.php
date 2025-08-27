<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rajpoi";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$districts = $conn->query("SELECT DISTINCT Districtname FROM District");
$categories = $conn->query("SELECT DISTINCT Categoryname, CategoryID FROM Category");
$subcategories = $conn->query("SELECT Subcategoryname FROM Subcategory");

$filterDistrict = $_GET['district'] ?? '';
$filterCategory = $_GET['category'] ?? '';
$filterSubcategory = $_GET['subcategory'] ?? '';
$searchLocation = $_GET['location'] ?? '';
$searchWebsite = $_GET['website'] ?? '';
$latitude = $_GET['latitude'] ?? '';
$longitude = $_GET['longitude'] ?? '';
$sortColumn = $_GET['sort'] ?? 'LocationName';
$sortOrder = $_GET['order'] ?? 'ASC';

function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371;
    $lat1 = deg2rad($lat1); $lon1 = deg2rad($lon1);
    $lat2 = deg2rad($lat2); $lon2 = deg2rad($lon2);
    $dLat = $lat2 - $lat1;
    $dLon = $lon2 - $lon1;
    $a = sin($dLat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dLon / 2) ** 2;
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    return round($earthRadius * $c, 2);
}

$sql = "SELECT POI.*, District.Districtname, Category.Categoryname, Subcategory.Subcategoryname
        FROM POI
        JOIN District ON POI.DistrictID = District.DistrictID
        JOIN Category ON POI.CategoryID = Category.CategoryID
        LEFT JOIN Subcategory ON POI.SubcategoryID = Subcategory.SubcategoryID
        WHERE 1";

if (!empty($filterDistrict)) {
    $sql .= " AND District.Districtname LIKE '%$filterDistrict%'";
}
if (!empty($filterCategory)) {
    $sql .= " AND Category.Categoryname LIKE '%$filterCategory%'";
}
if (!empty($filterSubcategory)) {
    $sql .= " AND Subcategory.Subcategoryname LIKE '%$filterSubcategory%'";
}
if (!empty($searchLocation)) {
    $sql .= " AND POI.LocationName LIKE '%$searchLocation%'";
}
if (!empty($searchWebsite)) {
    $sql .= " AND POI.Website LIKE '%$searchWebsite%'";
}
$sql .= " ORDER BY $sortColumn $sortOrder";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POI Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 1200px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: hidden;
        }
        h2 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .grid-item {
            display: flex;
            flex-direction: column;
        }
        .grid-item select, .grid-item input {
    width: calc(100% - 30px);  /* Reduces the width by 4 units for each side */
    padding: 10px;
    margin-top: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

        .table-wrapper {
            overflow-x: hidden;
            margin-top: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
            font-size: 13px;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.5s ease-out;
        }
        th, td {
            padding: 6px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        img {
            max-width: 70px;
            max-height: 70px;
            object-fit: cover;
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 100px;
            height: auto;
        }
    </style>
    <script>
        window.onload = function () {
            setTimeout(function () {
                var table = document.getElementById("poiTable");
                if (table && table.rows.length > 1) {
                    table.style.visibility = 'visible';
                    table.style.opacity = '1';
                }
            }, 500);
        };
        function autoSubmitForm() {
            document.getElementById('filterForm').submit();
        }
    </script>
</head>
<body>
<a href="index.php"><img src="logo111.png" alt="Logo" class="logo"></a>
<div class="container">
    <h2>Points of Interest in Rajasthan</h2>
    <form id="filterForm" method="GET">
        <div class="grid-container">
            <div class="grid-item">
                <label for="district">Select the District of Rajasthan you want to Visit:</label>
                <select name="district" id="district" onchange="autoSubmitForm()">
                    <option value="">All Districts</option>
                    <?php while ($row = $districts->fetch_assoc()) { ?>
                        <option value="<?= htmlspecialchars($row['Districtname']) ?>" <?= $filterDistrict == $row['Districtname'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($row['Districtname']) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="grid-item">
                <label for="location">Enter the Location Name you want to visit there:</label>
                <input type="text" name="location" id="location" value="<?= htmlspecialchars($searchLocation) ?>" onchange="autoSubmitForm()">
            </div>
            <div class="grid-item">
                <label for="latitude">Enter the Latitude of your current location:</label>
                <input type="text" name="latitude" id="latitude" value="<?= htmlspecialchars($latitude) ?>" onchange="autoSubmitForm()">
            </div>
            <div class="grid-item">
                <label for="longitude">Enter the Longitude of your current location:</label>
                <input type="text" name="longitude" id="longitude" value="<?= htmlspecialchars($longitude) ?>" onchange="autoSubmitForm()">
            </div>
            <div class="grid-item">
                <label for="category">Select the category you're interested in:</label>
                <select name="category" id="category" onchange="autoSubmitForm()">
                    <option value="">All Categories</option>
                    <?php while ($row = $categories->fetch_assoc()) { ?>
                        <option value="<?= htmlspecialchars($row['Categoryname']) ?>" <?= $filterCategory == $row['Categoryname'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($row['Categoryname']) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="grid-item">
                <label for="subcategory">Select the subcategory you're interested in:</label>
                <select name="subcategory" id="subcategory" onchange="autoSubmitForm()">
                    <option value="">All Subcategories</option>
                    <?php
                    $allSubcategories = $conn->query("SELECT Subcategoryname FROM Subcategory");
                    while ($row = $allSubcategories->fetch_assoc()) {
                        echo '<option value="' . htmlspecialchars($row['Subcategoryname']) . '" '
                            . ($filterSubcategory == $row['Subcategoryname'] ? 'selected' : '') . '>'
                            . htmlspecialchars($row['Subcategoryname']) . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </form>

    <div class="table-wrapper">
        <table id="poiTable">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Location</th>
                    <th>District</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Area</th>
                    <th>Postcode</th>
                    <th>Region</th>
                    <th>Language</th>
                    <th>Website</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Distance (km)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $distance = (!empty($latitude) && !empty($longitude)) ?
                            calculateDistance($latitude, $longitude, $row['Latitude'], $row['Longitude']) : '';
                        echo "<tr>
                                <td>" . ($row['Image'] ? '<img src="' . htmlspecialchars($row['Image']) . '">' : 'N/A') . "</td>
                                <td>" . htmlspecialchars($row['LocationName']) . "</td>
                                <td>" . htmlspecialchars($row['Districtname']) . "</td>
                                <td>" . htmlspecialchars($row['Categoryname']) . "</td>
                                <td>" . htmlspecialchars($row['Subcategoryname']) . "</td>
                                <td>" . htmlspecialchars($row['Area']) . "</td>
                                <td>" . htmlspecialchars($row['Postcode']) . "</td>
                                <td>" . htmlspecialchars($row['Region']) . "</td>
                                <td>" . htmlspecialchars($row['Language']) . "</td>
                                <td>" . ($row['Website'] ? '<a href="' . htmlspecialchars($row['Website']) . '" target="_blank">Visit</a>' : 'N/A') . "</td>
                                <td>" . htmlspecialchars($row['Latitude']) . "</td>
                                <td>" . htmlspecialchars($row['Longitude']) . "</td>
                                <td>" . $distance . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='13'>No results found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
<?php $conn->close(); ?>
