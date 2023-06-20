<!DOCTYPE html>
<html>
<head>
    <title>Checkout Page</title>
</head>
<body>
    <h1>Checkout Page</h1>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Process the form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        // Validate the form data (you can add more validation as per your requirements)
        if (empty($name) || empty($email) || empty($address)) {
            echo '<p>Please fill in all the required fields.</p>';
        } else {
            // Display the order summary
            echo '<h2>Order Summary</h2>';
            echo '<p>Name: ' . $name . '</p>';
            echo '<p>Email: ' . $email . '</p>';
            echo '<p>Address: ' . $address . '</p>';

            // Process the payment or perform any other necessary actions
            // ...
        }
    }
    ?>

    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="address">Address:</label>
        <textarea name="address" id="address" required></textarea><br><br>

        <input type="submit" value="Place Order">
    </form>
</body>
</html>
