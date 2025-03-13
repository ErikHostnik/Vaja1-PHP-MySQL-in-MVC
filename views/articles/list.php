

<div class="container">
    <h3>Moje novice</h3>
    <?php if (empty($articles)): ?>
        <p>Nimate še nobene objavljene novice.</p>
    <?php else: ?>
        <?php foreach ($articles as $article): ?>
            <div class="article">
                <h4><?php echo $article->title; ?></h4>
                <p><?php echo $article->abstract; ?></p>
                <p>Objavljeno: <?php echo date_format(date_create($article->date), 'd. m. Y \ob H:i:s'); ?></p>
                <a href="/articles/show?id=<?php echo $article->id; ?>"><button>Preberi več</button></a>
                <a href="/articles/edit?id=<?php echo $article->id; ?>"><button>Uredi</button></a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>