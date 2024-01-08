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
    
<button class="btn btn-success"><a href="includes\products_view.php" class="text-white">Products</a></button>
    <button class="btn btn-success"><a href="../index.php" class="text-white">home</a></button>
    <button class="btn btn-success"><a href="includes\users_view.php" class="text-white">users</a></button>

    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody id="users">
            </tbody>
        </table>
    </div>

    <script>
        const table = document.getElementById("users");
        let rows = "";
        fetch("https://jsonplaceholder.typicode.com/posts")
            .then(response => response.json())
            .then(data => {
                data.forEach((val, key) => {
                    rows += `
                        <tr id=${key}>
                            <td class="px-6 py-4 whitespace-nowrap">${val.title}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
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
            fetch(`https://jsonplaceholder.typicode.com/posts/${id}`, {
                    method: "DELETE"
                })
                .then(response => {
                    if (response.ok) {
                        alert("Post removed successfully");
                    }
                });
        }
    </script>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>