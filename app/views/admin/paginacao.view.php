<?php if ($totalPages > 1): ?>
    <div class="pagination-container">
        <style>
            .pagination span.dots {
                padding: 8px 12px;
                color: #383636;
                pointer-events: none;
            }
        </style>

        <ul class="pagination">
            <li>
                <a href="?page=<?= max(1, $currentPage - 1 ) ?>" class="<?= $currentPage <= 1 ? 'disabled' : ''?>">&laquo;</a>
            </li>
            
            <?php
                $start = max(2, $currentPage - 1);
                $end = min($totalPages - 1, $currentPage + 1);
            ?>

            <li>
                <a href="?page=1" class="<?= $currentPage == 1 ? 'active' : ''?>">1</a>
            </li>

            <?php if ($start > 2):?>
                <li><span class="dots">...</span></li>
            <?php endif; ?>

            <?php for ($i = $start; $i <= $end; $i++): ?>
                <li>
                    <a href="?page=<?= $i ?>" class="<?= $currentPage == $i ? 'active' : ''?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($end < $totalPages - 1):?>
                <li><span class="dots">...</span></li>
            <?php endif; ?>

            <li>
                <a href="?page= <?= $totalPages ?>" class="<?= $currentPage == $totalPages ? 'active' : ''?>"><?= $totalPages ?></a>
            </li>

            <li>
                <a href="?page=<?= min($totalPages, $currentPage + 1 ) ?>" class="<?= $currentPage >= $totalPages ? 'disabled' : ''?>">&raquo;</a>
            </li>
        </ul>
    </div>
<?php endif; ?>