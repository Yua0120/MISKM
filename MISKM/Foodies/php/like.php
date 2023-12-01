<div class="favorite">
  <?php if ($isFavorite) : ?>
    <a href="/seiran/src/usecase/favorite/DeleteFavoriteUseCase.php?id=<?php echo $book->getId() ?>">
        <img src="../../img/kuma.jpg" class="kuma-img">
        <?php echo $favoriteCount ?>
    </a>
  <?php else : ?>
    <a href="/seiran/src/usecase/favorite/InsertFavoriteUseCase.php?id=<?php echo $book->getId() ?>">
        <img src="../../img/kurokuma.jpg" class="kuma-img">
        <?php echo $favoriteCount ?>
    </a>
  <?php endif; ?>
</div>

