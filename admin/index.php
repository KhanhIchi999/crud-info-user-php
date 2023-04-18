

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap Sidebar Example with Active Effect</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .sidebar ul li:hover {
            background-color: #e9ecef;
        }

        .sidebar ul li a {
            color: #000;
            text-decoration: none;
        }

        .sidebar ul li.active {
            background-color: #007bff;
            color: #fff;
        }

        .sidebar ul li.active a {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <ul>
                    <li><a href="#" class="active">Trang chủ quản trị</a></li>
                    <li><a href="?page=user">Quản lý user</a></li>
                    <li><a href="#">Quản lý proxy</a></li>
                    <li><a href="#">Quản lý sản phẩm</a></li>
                    <li><a href="#">Quản lý server</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <h1>Content Area</h1>
                 <!-- Main Content -->
                <div class="col-md-9">
                    <h1>Main Content</h1>
                    <?php
                        // // Example variable
                        $page = $_GET['page'];
                        
                        // Switch case statement
                        switch ($page) {
                            case 'user':
                                include_once "user.php";
                                break;
                            case 'banana':
                                echo 'This is a banana.';
                                break;
                            case 'orange':
                                echo 'This is an orange.';
                                break;
                            default:
                                echo 'This is an unknown fruit.';
                                break;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Add click event listener to list items in sidebar
        document.addEventListener('DOMContentLoaded', function() {
            var listItems = document.querySelectorAll('.sidebar ul li');
            listItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    listItems.forEach(function(item) {
                        item.classList.remove('active');
                    });
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>
