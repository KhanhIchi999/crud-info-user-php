
<div class="container my-5">

    <a href="addUser.php" role="button" class="btn btn-primary">Add a user</a>
    <h2 class="text-center">List users</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

                    include '../connectDB.php';

                     // Query to fetch data from the table
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);

                    // Check if data is available
                    if (mysqli_num_rows($result) > 0) {
                        
                        // Loop through each row
                        while($row = mysqli_fetch_assoc($result)) {

                            // Access data using column names
                            $name = $row["name"];
                            $email = $row["email"];
                            $password = $row["password"];
                            $mobile = $row["mobile"];
                            $id = $row["id"];

                            echo '<tr>
                                <th scope="row">' . $id . '</th>
                                <td> ' . $name . '</td>
                                <td> ' . $email . '</td>
                                <td> ' . $password . '</td>
                                <td> ' . $mobile . '</td>
                                <td>
                                    <a href="deleteUser.php?deleteid='.$id.'" role="button" class="btn btn-danger">Delete</a>
                                    <a href="editUser.php?editid='.$id.'" role="button" class="btn btn-success">Edit</a>
                                </td>
                            </tr>';
                        }
                    } else {
                        echo "No data available";
                    }

                    // Close database connection
                    mysqli_close($conn);
                ?>
        </tbody>
    </table>
</div>