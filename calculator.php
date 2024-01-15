<?php
    if (isset($_POST['calculate'])) {
        $first_number = $_POST['first_number'];
        $second_number = $_POST['second_number'];
        $operation = $_POST['operation'];
        $result = 0;

        switch ($operation) {
            case 'addition':
                $result = $first_number + $second_number;
                break;
            case 'subtraction':
                $result = $first_number - $second_number;
                break;
            case 'multiplication':
                $result = $first_number * $second_number;
                break;
            case 'division':
                if ($second_number == 0) {
                    echo "Error: Division by zero is not allowed.";
                } else {
                    $result = $first_number / $second_number;
                }
                break;
        }
    }
?>
<html>
<head>
    <title>Calculator</title>
</head>
 <style>
		.calculator-border {
            border: 2px solid #333;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
        }
        .calculator-form {
            display: grid;
            grid-template-columns: 1fr 1fr; 
            grid-gap: 10px;
			background-color: #bc4fe0;
        }
        label, input, select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        #result {
            grid-column: span 2; 
        }
    </style>
<body>
<div class="calculator-border">
    <h1>Simple Calculator</h1>
    <form method="post" action="">

        <label for="first_number">Enter the first number:</label>
        <input type="number" name="first_number" required value="<?php if (isset($_POST['first_number'])) echo $_POST['first_number']; ?>"><br><br>

        <label for="second_number">Enter the second number:</label>
        <input type="number" name="second_number" required value="<?php if (isset($_POST['second_number'])) echo $_POST['second_number']; ?>"><br><br>

        <label for="operation">Choose an operation:</label>
        <select name="operation">
            <option value="addition" <?php if (isset($_POST['operation']) && $_POST['operation'] == 'addition') echo 'selected'; ?>>Addition</option>
            <option value="subtraction" <?php if (isset($_POST['operation']) && $_POST['operation'] == 'subtraction') echo 'selected'; ?>>Subtraction</option>
            <option value="multiplication" <?php if (isset($_POST['operation']) && $_POST['operation'] == 'multiplication') echo 'selected'; ?>>Multiplication</option>
            <option value="division" <?php if (isset($_POST['operation']) && $_POST['operation'] == 'division') echo 'selected'; ?>>Division</option>
        </select><br><br>

        <label for="result">Your result:</label>
        <input type="text" name="result" value="<?php if (isset($result)) echo $result; ?>" readonly><br><br>

        <input type="submit" name="calculate" value="Calculate">
    </form>
</body>
</html>
