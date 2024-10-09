    <?php
    // Function to get user information from the database based on the username
    function get_user(object $pdo, string $username) {
        // SQL query to select all columns from the 'users' table where the username matches the given value
        $query = "SELECT * FROM users WHERE username = :username;";
        
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $pdo->prepare($query);
        
        // Bind the provided username to the SQL statement
        $stmt->bindParam(":username", $username);
        
        // Execute the prepared statement
        $stmt->execute();
        
        // Fetch the resulting row as an associative array and return it
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // Function to get the max_calorie value from the database based on the username
    function get_max_calorie(object $pdo, string $username) {
        // SQL query to select the max_calorie column from the 'users' table where the username matches the given value
        $query = "SELECT max_calorie FROM users WHERE username = :username;";
        
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $pdo->prepare($query);
        
        // Bind the provided username to the SQL statement
        $stmt->bindParam(":username", $username);
        
        // Execute the prepared statement
        $stmt->execute();
        
        // Fetch the resulting row as an associative array and return it
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    

    // Function to get the max_protein value from the database based on the username
    function get_max_protein(object $pdo, string $username) {
        // SQL query to select the max_protein column from the 'users' table where the username matches the given value
        $query = "SELECT max_protein FROM users WHERE username = :username;";
        
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $pdo->prepare($query);
        
        // Bind the provided username to the SQL statement
        $stmt->bindParam(":username", $username);
        
        // Execute the prepared statement
        $stmt->execute();
        
        // Fetch the resulting row as an associative array and return it
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    // Function to get the user's max_carbs from the database and append it to the session
    function set_user_max_carbs_to_session(object $pdo, string $username) {
        // Get the max_carbs value for the given username
        $max_carbs = get_max_carbs($pdo, $username);
        
        // Check if max_carbs is not null
        if ($max_carbs !== null) {
            // Append the max_carbs value to the session
            $_SESSION['max_carbs'] = $max_carbs['max_carbs'];
        }
    }

    // Function to get the max_carbs value from the database based on the username
    function get_max_carbs(object $pdo, string $username) {
        // SQL query to select the max_carbs column from the 'users' table where the username matches the given value
        $query = "SELECT max_   carbs FROM users WHERE username = :username;";
        
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $pdo->prepare($query);
        
        // Bind the provided username to the SQL statement
        $stmt->bindParam(":username", $username);
        
        // Execute the prepared statement
        $stmt->execute();
        
        // Fetch the resulting row as an associative array and return it
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
