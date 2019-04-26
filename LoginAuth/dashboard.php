<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Auth | dashboard</title>
    <link href="boostrap/css/bootstrap.css" rel="stylesheet">
    <link href="jqueryDT.css" rel="stylesheet">
</head>
<body>
<?php
include "auth.php";
include 'nav_bar.php';
include 'cat_config.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel panel-heading">BOOKS</div>
                <div class="panel panel-body">
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <td>Book Names</td>
                            <td>Book Covers</td>
                            <td>Book Files</td>
                            <td>Category</td>
                            <td>Date</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <?php

                        $books=new Category();
                        $book=$books->getBooks();
                        foreach ($book as $row):
                            ?>
                            <tr>
                                <td><?php echo $row['book_name'] ?></td>
                                <td><img src="book_covers/<?php echo $row['book_cover']?>" style="width: 50px; height: 30px" ?></td>
                                <td><a href="book_files/<?php echo $row['book_file'] ?>">Download</a> </td>
                                <td><?php echo $row['cat_name'] ?></td>
                                <td><?php echo date('d-m-y / h:i A',strtotime($row['created_at'])) ?></td>
                                <td><a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a> </td>
                                <td><a href="delete.php?book_name=<?php echo $row['book_name'] ?>"> Delete</a></td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </table>
                </div>


        </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Books Upload</div>
                <div class="panel panel-body">
            <form  action="post_books.php" method="post" enctype="multipart/form-data">
           <div class="form-group">
               <label for="book_name" class="control-label">Book Name</label>
               <input type="text" name="book_name" id="book_name" class="form-control">
           </div>
            <div class="form-group">
                <label for="book_cover" class="control-label">Book Cover</label>
                <input type="file" name="book_cover" id="book_cover" class="form-control" style="height: auto">
            </div>
                <div class="form-group">
                    <label for="book_file" class="control-label">Book File</label>
                    <input type="file" name="book_file" class="form-control" style="height: auto;">
                </div>
                <div class="form-group">
                    <select name="cat_id" id="cat_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php

                        $cat_row=new Category();
                        $cats=$cat_row->getCategory();
                        foreach ($cats as $cat):
                            ?>
                            <option value="<?php echo $cat['id'] ?>" ><?php echo $cat['cat_name']?></option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="boostrap/js/jQuery.js"></script>
<script src="boostrap/js/bootstrap.js"></script>
<script src="jqueryDT.js"></script>
<script>
    $("#myTable").dataTable();
</script>
</body>
</html>