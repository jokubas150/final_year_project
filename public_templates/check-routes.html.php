<!-- Override the the css file -->

<head>
    <link rel="icon" href="sport-car.png"> <!-- Icon from https://www.flaticon.com/free-icon/sport-car_1300302?term=car&page=1&position=78&origin=tag&related_id=1300302 created by Freepik - Flaticon  -->
    <link rel="stylesheet" href="style/check-routes.css">
    <script src="https://kit.fontawesome.com/4196309b32.js" crossorigin="anonymous"></script>
</head>


<?php
if (isset($_SESSION['user'])){ 
    $role = $_SESSION['user']['member_type'];
    $email = $_SESSION['user']['email'];
    $memberID = $_SESSION['user']['id'];
}
?>

<div class="check-routes-outter">
    
        <?php if (isset($_SESSION['user']) && ($role == "admin" or "member")) { ?>
            <div class="div-add-post">
                <form>
                    <a class="btn-add-post" type="submit" name="add-post" href="add_post.php"><i class="fa-solid fa-plus" style="color: #ffffff;"></i>Add Post</a>
                </form>
            </div>

        <?php } ?>
        <?php if (empty($routes)) { ?>
            <style>
                footer {
                    bottom: 0;
                    position: fixed;
                    width: 100%;
                }
            </style>
            <p class="no-posts-message"><?php echo "No post yet. Add your post Now!"; ?></p>
        <?php } ?>


    <div class="route-posts">
        <?php foreach ($routes as $route) : ?>
            <div class="route-card-content">
                <div class="route-buttons">
                    <?php if (isset($_SESSION['user']) && ($memberID == $route['member_id'] or $role == "admin")) { ?>
                        <form method="post" action="delete-post.php">
                            <input type="hidden" name="post_id" value="<?= $route['post_id'] ?>">
                            <button type="submit" class="btn-delete-post" value="Delete">Delete Post</button>
                        </form>
                    <?php }

                    if (isset($_SESSION['user']['id']) && ($memberID == $route['member_id'])){ ?>
                        <form method="post" action="edit-post.php?post_id=<?=$route['post_id']?>">
                            <input type="hidden" name="post_id" value="">
                            <button type="submit" class="btn-edit-car">Edit</button>
                        </form>
                    <?php }?>
                </div>

                <img src="<?php echo $route['image'] ?>" alt="Image of a route">
                <div class="route-card-body">
                    <p><strong>By </strong> <?php echo htmlspecialchars($route['first_name'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p><strong>Journey From </strong> <?php echo htmlspecialchars($route['going_from'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p><strong>Journey To </strong> <?php echo htmlspecialchars($route['going_to'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p><strong>Extra Message </strong> <?php echo htmlspecialchars($route['post_message'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p><strong>Date Posted </strong> <?php echo htmlspecialchars($route['date_posted'], ENT_QUOTES, 'UTF-8') ?></p>

                    <div class="comment-outter">
                        <div class="comments">
                            <h3>Comments</h3>
                            <?php $comments = getPostByComment($pdo, $route['post_id']); ?>
                            <!-- loop through comments -->
                            <?php foreach ($comments as $i => $comment) : ?>
                                <div class="comment-text">
                                    <h4>By <?php echo $comment['first_name'] ?> </h4>

                                    <?php if (empty($comment['comment'])) { ?>
                                        <p>No comments yet. Leave your comment!</p>
                                    <?php } ?>
                                    
                                    <p class="comments-text"> <?php echo htmlspecialchars($comment['comment'], ENT_QUOTES, 'UTF-8') ?></p>
                                    
                                    <!-- show delete button for comments -->
                                    <?php if (isset($_SESSION['user']) && ($memberID == $comment['member_id'] or $role == "admin")) { ?>
                                        <form action="delete-comment.php" method="post" class="delete-comment">
                                            <input type="hidden" name="cmmt_id" value="<?= $comment['comment_id'] ?>">
                                            <button type="submit" class="btn-delete-comment" value="Delete">Delete</button>
                                        </form>
                                    <?php } ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <form action="" method="post" class="form-add-comment">
                            <div class="submit-comment">
                                <input type="hidden" name="rout_ID" value="<?= $route['post_id'] ?>">
                                <input type="text" name="input-comment" placeholder="Leave a comment here">
                                <?php if (isset($_SESSION['user'])) { ?><button name="submit-comment" type="submit">Add Review</button> <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>


</div>