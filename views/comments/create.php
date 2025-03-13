<div class="mt-4">
    <h4>Dodaj komentar</h4>
    <form action="/comments/store?article_id=<?php echo $article->id;?>" method="POST">
        <div class="mb-3">
            <label for="content" class="form-label">Vaš komentar</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Objavi komentar</button>
    </form>
</div>