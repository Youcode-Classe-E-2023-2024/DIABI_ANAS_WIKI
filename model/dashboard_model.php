<?php





function get_tags_and_count(object $pdo)
{
    $tableName = 'tags';

    // Fetch tags
    $query = "SELECT * FROM $tableName";
    $stmt = $pdo->query($query);
    $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch count
    $query = "SELECT COUNT(*) as rowCount FROM $tableName";
    $stmt = $pdo->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $rowCount = $result['rowCount'];

    return ['tags' => $tags, 'count' => $rowCount];
}


function get_articles_and_count(object $pdo)
{
    $tableName = 'articles';

    $query = "SELECT * FROM $tableName";
    $stmt = $pdo->query($query);
    $artcls = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $query = "SELECT COUNT(*) as rowCount FROM $tableName";
    $stmt = $pdo->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $rowCount = $result['rowCount'];


    return ['artcls' => $artcls, 'count' => $rowCount];
}

function get_categories_and_count(object $pdo)
{
    $tableName = 'categories';

    $query = "SELECT * FROM $tableName";
    $stmt = $pdo->query($query);
    $ctgrs = $stmt->fetchAll(PDO::FETCH_ASSOC);





    $query = "SELECT COUNT(*) as rowCount FROM $tableName";
    $stmt = $pdo->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $rowCount = $result['rowCount'];

    return ['ctgrs' => $ctgrs, 'count' => $rowCount];
}



function get_ctgr_name(object $pdo, string $id)
{
    $tableName = 'categories';
    $query = "SELECT name FROM $tableName WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $ctgname = $stmt->fetch(PDO::FETCH_ASSOC);

    return $ctgname['name'];
}

function get_ctgr_id(object $pdo, string $name)
{
    $tableName = 'categories';
    $query = "SELECT id FROM $tableName WHERE name = :name";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->execute();

    $ctgid = $stmt->fetch(PDO::FETCH_ASSOC);

    return $ctgid['id'];;
}
function get_tag_id(object $pdo, string $name)
{
    $tableName = 'tags';
    $query = "SELECT id FROM $tableName WHERE name = :name";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->execute();

    $tagid = $stmt->fetch(PDO::FETCH_ASSOC);

    return $tagid['id'];;
}





function set_tag(object $pdo, string $name)
{

    // SQL query with placeholders
    $query = "INSERT INTO tags (name) VALUES (:name)";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);


    // Bind parameters to the placeholders
    $stmt->bindParam(":name", $name);


    // Execute the prepared statement and handle errors
    if (!$stmt->execute()) {
        // Handle the error, e.g., log it or show a user-friendly message
        echo "Error: " . implode(" ", $stmt->errorInfo());
    }
}

function set_article(object $pdo, string $title, string $content, string $ctg)
{

    // SQL query with placeholders
    $query = "INSERT INTO articles (title, content, category_id) VALUES (:title, :content, :ctg)";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);

    // Bind parameters to the placeholders
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":content", $content);
    $stmt->bindParam(":ctg", $ctg);

    // Execute the prepared statement and handle errors
    if (!$stmt->execute()) {
        // Handle the error, e.g., log it or show a user-friendly message
        echo "Error: " . implode(" ", $stmt->errorInfo());
    }
}


function set_categorie(object $pdo, string $name)
{

    // SQL query with placeholders
    $query = "INSERT INTO categories (name) VALUES (:name)";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);

    // Bind parameters to the placeholders
    $stmt->bindParam(":name", $name);
    // Execute the prepared statement and handle errors
    if (!$stmt->execute()) {
        // Handle the error, e.g., log it or show a user-friendly message
        echo "Error: " . implode(" ", $stmt->errorInfo());
    }
}


function update_categorie(object $pdo, string $name, int $id)
{

    $query = "UPDATE categories SET name = :name WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":id", $id);

    if (!$stmt->execute()) {
        // Handle the error, e.g., log it or show a user-friendly message
        echo "Error: " . implode(" ", $stmt->errorInfo());
    }
}
function update_tag(object $pdo, string $name, int $id)
{

    $query = "UPDATE tags SET name = :name WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":id", $id);

    if (!$stmt->execute()) {
        // Handle the error, e.g., log it or show a user-friendly message
        echo "Error: " . implode(" ", $stmt->errorInfo());
    }
}
