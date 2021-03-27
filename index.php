<?php
require_once "../CRUD_Operations/php/operation.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
// create button click
if (isset($_POST['create'])) {
    createData();
}
if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();

}
?>
    <main>
        <div class="container text-center">
            <h1 class="py-4 bg-dark text-light rounded"> <i class="fas fa-swatchbook"></i> Book Store</h1>
            <div class="d-flex justify-content-center">
               
<div class="row">

                <?php getStatus()?>

                <div class="col-md-12">

                <form action="" method="post" class="">

                    <!-- <div class="pt-2"><?php inputElement("<i class='fas fa-id-badge'></i>", "ID", "book_id");?></div> -->
                    <div class="pt-2"><?php inputElement("<i class='fas fa-book'></i>", "Book Name", "book_name");?></div>
                    <div class="row pt-2">
                        <div class="col"><?php inputElement("<i class='fas fa-people-carry'></i>", "Publisher", "book_publisher");?></div>
                        <div class="col"> <?php inputElement("<i class='fas fa-dollar-sign'></i>", "Price", "book_price");?></div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "dat-toggle='tooltip' data-placement='bottom' title='Create'");?>
                        <?php buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "dat-toggle='tooltip' data-placement='bottom' title='Read'");?>
                        <?php buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "dat-toggle='tooltip' data-placement='bottom' title='Update'");?>
                        <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>", "delete", "dat-toggle='tooltip' data-placement='bottom' title='Delete'");?>
                        <?php deleteBtn();?>
                    </div>
                </form>

                </div>

</div>

            </div>
            <!-- Bootstrap table -->
            <div class="d-flex table-data">
                <table class="table table-striped table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Book Name</th>
                            <th>Publisher</th>
                            <th>Book Price</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
$result = getData();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {?>
                                    <tr>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo '$' . $row['book_price']; ?></td>
                                   <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
                               </tr>

                        <?php
}
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="./php/main.js"></script>
</body>

</html>