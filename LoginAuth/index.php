<?php include 'public_config.php';
session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Auth | Home Page</title>
    <link href="boostrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
include 'nav_bar.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Search On App</div>
                <div class="panel-body">
                    <form class="navbar-form" action="index.php" method="get">
                        <div class="form-group">
                            <input type="text" name="book_name" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>

            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Categories</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <?php
                        $get_cat=new MyPublic();
                        $cats=$get_cat->getCategory();
                        foreach ($cats as $cat):
                            ?>
                            <li class="list-group-item"><a href="index.php?cat_id=<?php echo $cat['id'] ?>"><?php echo $cat['cat_name']?></a> </li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Books</div>
                <div class="panel-body">
                    <?php
                    $book_name=$_GET['book_name'];
                    $cat_id=$_GET['cat_id'];

                    if($book_name){
                        $books=$get_cat->searchBooks($book_name);
                    }else{
                        $books=$get_cat->getBook($cat_id);
                    }
                    foreach ($books as $book):
                        ?>
                        <div class="col-md-4">
                            <div class="thumbnail">
                            <img src="book_covers/<?php echo $book['book_cover'] ?>" style="width: 150px; height: 150px;" class="img-circle">
                            <h3 class="text-center text-primary"> <?php echo $book['book_name'] ?></h3>
                            <p class="text-center"> Upload On: <?php echo date('d-M-Y',strtotime($book['create_at'])) ?></p>
                                <a class="btn btn-primary btn-block" href="book_files/<?php echo $book['book_file'] ?>">Download</a>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>

        </div>
</div>
</div>


<script src="boostrap/js/jQuery.js"></script>
<script src="boostrap/js/bootstrap.js"></script>
</body>
</html>