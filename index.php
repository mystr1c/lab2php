<?php include 'foo.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-success mt-2" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i></button>
            <table class="table table-striped table-hover mt-2">
                <thead class="table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Text</th>
                    <th>Action</th>
                    <th>Reaction</th>
                </thead>
                <tbody>
                <?php foreach (array_reverse($result) as $res) { ?>
                    <tr>
                        <td><?php echo $res->id; ?></td>
                        <td><?php echo $res->name; ?></td>
                        <td><?php echo $res->text; ?></td>
                        <td><a href="?id=<?php echo $res->id; ?>" class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $res->id; ?>"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $res->id; ?>"><i class="fa fa-trash-alt"></i></a></td>
                            <td>
                                <form action="foo.php?id=<?php echo $res->id; ?>" class="vote-up" method = "post">
                                    <button class="btn btn-success fa fa-thumbs-up" type="submit" name = "like">
                                        <?php echo $res->likes; ?>
                                </form>
                                </button>
                                <form action="foo.php?id=<?php echo $res->id; ?>" class="vote-down" method = "post">
                                    <button class="btn btn-danger fa fa-thumbs-down" type="submit" name = "dislike">
                                        <?php echo $res->dislikes; ?>
                                </form>
                                </button>
                            </td>
                    </tr>
                        <!-- Modal edit-->
                        <div class="modal fade" id="edit<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Редактировать запись</h1>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="?id=<?php echo $res->id; ?>" method="post">
                                            <div class="form-group">
                                                <small>Имя</small>
                                                <input type="text" class="form-control" name="name" value="<?php echo $res->name; ?>">
                                            </div>
                                            <div class="form-group">
                                                <small>Text</small>
                                                <input type="text" class="form-control" name="text" value="<?php echo $res->text; ?>">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                        <button type="submit" class="btn btn-primary" name="edit">Сохранить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Modal delete-->
                    <div class="modal fade" id="delete<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Удалить запись №<?php echo $res->id; ?></h1>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <form action="?id=<?php echo $res->id; ?>" method="post">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                    <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal create-->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить запись</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <small>Имя</small>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <small>Text</small>
                        <input type="text" class="form-control" name="text">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>