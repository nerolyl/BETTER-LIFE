    <?php
    require_once 'dbh.inc.php';
    require_once 'config_session.inc.php';
  // Function to get user data from the database based on the username
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

        // Function to get the user's sunday_nutrition from the database and append it to the session
        function set_user_sunday_nutrition_to_session(object $pdo, string $username) {
            // Get the sunday_nutrition value for the given username
            $sunday_nutrition = get_sunday_nutrition($pdo, $username);
            
            // Check if sunday_nutrition is not null
            if ($sunday_nutrition !== null) {
            // Append the sunday_nutrition value to the session
            $_SESSION['sunday_nutrition'] = $sunday_nutrition['sunday_nutrition'];
            }
        }

        // Function to get the sunday_nutrition value from the database based on the username
        function get_sunday_nutrition(object $pdo, string $username) {
            // SQL query to select the sunday_nutrition column from the 'users' table where the username matches the given value
            $query = "SELECT sunday_nutrition FROM users WHERE username = :username;";
            
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
        // Function to get the user's monday_nutrition from the database and append it to the session
        function set_user_monday_nutrition_to_session(object $pdo, string $username) {
            // Get the monday_nutrition value for the given username
            $monday_nutrition = get_monday_nutrition($pdo, $username);
            
            // Check if monday_nutrition is not null
            if ($monday_nutrition !== null) {
                // Append the monday_nutrition value to the session
                $_SESSION['monday_nutrition'] = $monday_nutrition['monday_nutrition'];
            }
        }
        
        // Function to get the monday_nutrition value from the database based on the username
        function get_monday_nutrition(object $pdo, string $username) {
            // SQL query to select the monday_nutrition column from the 'users' table where the username matches the given value
            $query = "SELECT monday_nutrition FROM users WHERE username = :username;";
            
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
        
        // Function to get the user's tuesday_nutrition from the database and append it to the session
        function set_user_tuesday_nutrition_to_session(object $pdo, string $username) {
            // Get the tuesday_nutrition value for the given username
            $tuesday_nutrition = get_tuesday_nutrition($pdo, $username);
            
            // Check if tuesday_nutrition is not null
            if ($tuesday_nutrition !== null) {
                // Append the tuesday_nutrition value to the session
                $_SESSION['tuesday_nutrition'] = $tuesday_nutrition['tuesday_nutrition'];
            }
        }
        
        // Function to get the tuesday_nutrition value from the database based on the username
        function get_tuesday_nutrition(object $pdo, string $username) {
            // SQL query to select the tuesday_nutrition column from the 'users' table where the username matches the given value
            $query = "SELECT tuesday_nutrition FROM users WHERE username = :username;";
            
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
        // Function to get the user's wednesday_nutrition from the database and append it to the session
        function set_user_wednesday_nutrition_to_session(object $pdo, string $username) {
            // Get the wednesday_nutrition value for the given username
            $wednesday_nutrition = get_wednesday_nutrition($pdo, $username);
            
            // Check if wednesday_nutrition is not null
            if ($wednesday_nutrition !== null) {
                // Append the wednesday_nutrition value to the session
                $_SESSION['wednesday_nutrition'] = $wednesday_nutrition['wednesday_nutrition'];
            }
        }

        // Function to get the wednesday_nutrition value from the database based on the username
        function get_wednesday_nutrition(object $pdo, string $username) {
            // SQL query to select the wednesday_nutrition column from the 'users' table where the username matches the given value
            $query = "SELECT wednesday_nutrition FROM users WHERE username = :username;";
            
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
        // Function to get the user's thursday_nutrition from the database and append it to the session
        function set_user_thursday_nutrition_to_session(object $pdo, string $username) {
            // Get the thursday_nutrition value for the given username
            $thursday_nutrition = get_thursday_nutrition($pdo, $username);
            
            // Check if thursday_nutrition is not null
            if ($thursday_nutrition !== null) {
            // Append the thursday_nutrition value to the session
            $_SESSION['thursday_nutrition'] = $thursday_nutrition['thursday_nutrition'];
            }
        }

        // Function to get the thursday_nutrition value from the database based on the username
        function get_thursday_nutrition(object $pdo, string $username) {
            // SQL query to select the thursday_nutrition column from the 'users' table where the username matches the given value
            $query = "SELECT thursday_nutrition FROM users WHERE username = :username;";
            
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

        // Function to get the user's friday_nutrition from the database and append it to the session
        function set_user_friday_nutrition_to_session(object $pdo, string $username) {
            // Get the friday_nutrition value for the given username
            $friday_nutrition = get_friday_nutrition($pdo, $username);
            
            // Check if friday_nutrition is not null
            if ($friday_nutrition !== null) {
            // Append the friday_nutrition value to the session
            $_SESSION['friday_nutrition'] = $friday_nutrition['friday_nutrition'];
            }
        }

        // Function to get the friday_nutrition value from the database based on the username
        function get_friday_nutrition(object $pdo, string $username) {
            // SQL query to select the friday_nutrition column from the 'users' table where the username matches the given value
            $query = "SELECT friday_nutrition FROM users WHERE username = :username;";
            
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

        // Function to get the user's saturday_nutrition from the database and append it to the session
        function set_user_saturday_nutrition_to_session(object $pdo, string $username) {
            // Get the saturday_nutrition value for the given username
            $saturday_nutrition = get_saturday_nutrition($pdo, $username);
            
            // Check if saturday_nutrition is not null
            if ($saturday_nutrition !== null) {
            // Append the saturday_nutrition value to the session
            $_SESSION['saturday_nutrition'] = $saturday_nutrition['saturday_nutrition'];
            }
        }

        // Function to get the saturday_nutrition value from the database based on the username
        function get_saturday_nutrition(object $pdo, string $username) {
            // SQL query to select the saturday_nutrition column from the 'users' table where the username matches the given value
            $query = "SELECT saturday_nutrition FROM users WHERE username = :username;";
            
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



