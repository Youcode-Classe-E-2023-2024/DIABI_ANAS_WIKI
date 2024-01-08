<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="users">
            </tbody>
        </table>
    </div>

    <script>
        const table = document.getElementById("users");
        let rows = "";
        fetch("https://jsonplaceholder.typicode.com/users")
            .then(response => response.json())
            .then(data => {
                data.forEach((val, key) => {
                    rows += `
                        <tr id=${key}>
                            <td>${val.name}</td>
                            <td>${val.email}</td>
                            <td>${val.username}</td>
                            <td>${val.phone}</td>
                            <td>
                                <button class="btn btn-primary" onclick="handleEdit(${key})">Edit</button>
                                <button class="btn btn-danger ml-2" onclick="handleDelete(${key})">Delete</button>
                            </td>
                        </tr>
                    `;
                });
                table.innerHTML = rows;
            });

        function handleDelete(id) {
            document.getElementById(id).style.display = "none";
            fetch(`https://jsonplaceholder.typicode.com/users/${id}`, {
                method: "DELETE"
            })
            .then(response => {
                if (response.ok) {
                    alert("User removed successfully");
                }
            });
        }
    </script>
        <button class="btn btn-success"><a href="includes\products_view.php" class="text-white">Products</a></button>
        <button class="btn btn-success"><a href="../index.php" class="text-white">Home</a></button>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
