<div class="container ">
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php
            $totalPages = empty($totalPages)?1:$totalPages;
            $current_page = empty($current_page)?1:$current_page;

            for ($num = 1; $num <= $totalPages; $num++) {
                if ($num != $current_page) { ?>
                    <li class="page-item"><a class="page-link" href="?IDMonHoc=<?= $IDMonHoc ?>&?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a></li>
                <?php
                } else { ?>
                    <li class="page-item"><strong class="page-link"><?= $num ?></strong></li>
            <?php 
                }
            }
            ?>
<!-- 
            <li class="page-item"><a class="page-link" href="?per_page=4&page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="?per_page=4&page=3">3</a></li> -->
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>