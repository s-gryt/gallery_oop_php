<?php
include 'includes/header.php';
if (!$session->is_signed_in()) {
    redirect("login.php");
}

if (empty($_GET['id'])) {
    redirect('photos.php');
}

$comments = Comment::find_the_comments($_GET['id']);


?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <?php include 'includes/top_nav.php'; ?>

        <?php include 'includes/side_nav.php'; ?>
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Comments
                    </h1>
                    <p class="bg-success"><?php echo $message; ?></p>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Body</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($comments

                            as $comment) : ?>
                            <tr>
                                <td><?php echo $comment->id; ?></td>
                                <td><?php echo $comment->author; ?>
                                </td>
                                <td><p><?php echo substr($comment->body, 0, 50);
                                        if (strlen($comment->body) > 50) {
                                            echo "...";
                                        } else {
                                            echo "";
                                        }
                                        ?></p></td>
                                <td>
                                    <div class="pictures_link">
                                        <a href="delete_photo_comment.php?id=<?php echo $comment->id ?>"
                                           class="btn btn-danger btn-sm">Delete</a>
                                </td>
                                <td>
                                    <a href="edit_comment.php?id=<?php echo $comment->id ?>" class="btn btn-primary
                                            btn-sm">Edit</a>
                    </div>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->


<?php
include 'includes/footer.php';
?>