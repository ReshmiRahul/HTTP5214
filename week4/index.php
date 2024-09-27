<?php
// Function to retrieve user data from the API
function getUsers() {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
}

// Fetch user data
$users = getUsers();

// Include Bootstrap stylesheet
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <div class="row">';

// Iterate over users array and output each user card
foreach ($users as $user) {
    $userAddress = $user['address'];
    echo '<div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <h5 class="card-title">' . htmlspecialchars($user['name']) . '</h5>
                <p class="card-text">Email: ' . htmlspecialchars($user['email']) . '</p>
                <p>Address: ' . htmlspecialchars($userAddress['street']) . ', ' . htmlspecialchars($userAddress['suite']) . '</p>
                <p>City: ' . htmlspecialchars($userAddress['city']) . '</p>
                <p>ZIP: ' . htmlspecialchars($userAddress['zipcode']) . '</p>
                <a href="#" class="btn btn-primary">Visit Website</a>
            </div>
          </div>';
}

echo '    </div>
</div>

</body>
</html>';
?>

