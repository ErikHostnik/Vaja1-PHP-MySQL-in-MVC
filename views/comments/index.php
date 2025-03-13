<div class="mt-4">
    <h4>Komentarji</h4>
    <?php if (empty($comments)): ?>
        <p>Ta novica se nima komentarjev...</p>
    <?php else: ?>
        <?php foreach ($comments as $comment): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text"><?php echo $comment->content;?></p>
                    <small class="text-muted">
                        Objavil: <?php echo $comment->user->username; ?>, <?php echo date_format(date_create($comment->date), 'd. m. Y \ob H:i:s'); ?>
                    </small>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>