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
        // Function to get the calorie value from the database based on the username
        function get_calorie(object $pdo, string $username) {
            // SQL query to select the calorie column from the 'users' table where the username matches the given value
            $query = "SELECT calorie FROM users WHERE username = :username;";
            
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
        // Function to get the protein value from the database based on the username
        function get_protein(object $pdo, string $username) {
            // SQL query to select the protein column from the 'users' table where the username matches the given value
            $query = "SELECT protein FROM users WHERE username = :username;";
            
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
            $query = "SELECT max_carbs FROM users WHERE username = :username;";
            
            // Prepare the SQL statement to prevent SQL injection
            $stmt = $pdo->prepare($query);
            
            // Bind the provided username to the SQL statement
            $stmt->bindParam(":username", $username);
            
            // Execute the prepared statement
            $stmt->execute();
            
            // Fetch the resulting row as an associative array and return it
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        // Function to get the user's carbs from the database and append it to the session
        function set_user_carbs_to_session(object $pdo, string $username) {
            // Get the carbs value for the given username
            $carbs = get_carbs($pdo, $username);
            
            // Check if carbs is not null
            if ($carbs !== null) {
            // Append the carbs value to the session
            $_SESSION['carbs'] = $carbs['carbs'];
            }
        }

        // Function to get the carbs value from the database based on the username
        function get_carbs(object $pdo, string $username) {
            // SQL query to select the carbs column from the 'users' table where the username matches the given value
            $query = "SELECT carbs FROM users WHERE username = :username;";
            
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

        // Function to get the user's fat from the database and append it to the session
        function set_user_fat_to_session(object $pdo, string $username) {
            // Get the fat value for the given username
            $fat = get_fat($pdo, $username);
            
            // Check if fat is not null
            if ($fat !== null) {
                // Append the fat value to the session
                $_SESSION['fat'] = $fat['fat'];
            }
        }

        // Function to get the fat value from the database based on the username
        function get_fat(object $pdo, string $username) {
            // SQL query to select the fat column from the 'users' table where the username matches the given value
            $query = "SELECT fat FROM users WHERE username = :username;";
            
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

    }