<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Armstrong Number Checker</title>
</head>
<body>
    <h1>Armstrong Number Checker</h1>

    <form method="post">
        <label for="number">Enter a number:</label>
        <input type="number" id="number" name="number">
        <button type="submit" name="submit">Check</button>
    </form>

    <?php
    // Function to check if a number is Armstrong
    function isArmstrong($number) {
        // Calculate the number of digits in the number
        $numDigits = strlen((string)$number);

        // Initialize sum to store the result
        $sum = 0;

        // Temporary variable to store the original number
        $temp = $number;

        // Calculate sum of nth power of individual digits
        while ($temp > 0) {
            $digit = $temp % 10;
            $sum += pow($digit, $numDigits);
            $temp = (int)($temp / 10);
        }

        // Check if the number is Armstrong
        if ($number == $sum) {
            return true;
        } else {
            return false;
        }
    }

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Get the number from the form
        $number = $_POST['number'];

        // Check if the number is Armstrong
        if (isArmstrong($number)) {
            echo "<p>$number is an Armstrong number.</p>";
        } else {
            echo "<p>$number is not an Armstrong number.</p>";
        }
    }
    ?>
</body>
</html>
