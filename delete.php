<?php
                    include 'connect.php';

                    // check if user click on delete button
                    if(isset($_GET['deleteid'])) {
                        
                        // ID of the row to be deleted get from param deleteid of url
                        $id = $_GET['deleteid'];
    
                         // Query to delete data from the table by ID
                        $sql = "DELETE FROM crud WHERE id = ?";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "i", $id);
    
                        // Execute the prepared statement
                        $result = mysqli_stmt_execute($stmt);
    
                        // Check if deletion was successful
                        if($result) {
                            echo "Data deleted successfully";
                            header('Location: display.php'); //redirect to display page
                        } else {
                            die("Data deletion failed: " . mysqli_error($conn));
                        }
    
                        // Close the prepared statement
                        mysqli_stmt_close($stmt);
                    }

                    // close connect
                    mysqli_close($conn);
                ?>