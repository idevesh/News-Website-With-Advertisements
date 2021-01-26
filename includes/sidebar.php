


<div class="col-md-4">

    <div class="card mb-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <form name="search" action="search.php" method="post">
                <div class="input-group">
                    <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." autocomplete="off" required>
                    <span class="input-group-btn">
                         

                        <button class="btn btn-secondary" type="submit">Go!</button>

                    </span>
                </div>
            </form>
        </div>
    </div>

    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <?php
                        $query = mysqli_query($con, "select id,CategoryName from tblcategory");
                        while ($row = mysqli_fetch_array($query)) {
                            ?>

                            <li>
                                <a href="category.php?catid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['CategoryName']); ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="card my-4">
        <h5 class="card-header">Recent News</h5>
        <div class="card-body">
            <ul class="mb-0">
                <?php
                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId ORDER BY tblposts.id DESC limit 8");
                while ($row = mysqli_fetch_array($query)) {
                    ?>

                    <li>
                        <a href="news-details.php?title=<?php echo htmlentities($row['url'])?>&nid=<?php echo htmlentities($row['pid']) ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>