
<div class="container">
    <h3>Uredi novico</h3>
    <form action="/articles/update" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($article->id) ?>">
        
        <div class="mb-3">
            <label for="title" class="form-label">Naslov</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($article->title) ?>">
        </div>
        
        <div class="mb-3">
            <label for="abstract" class="form-label">Povzetek</label>
            <input type="text" class="form-control" id="abstract" name="abstract" value="<?= htmlspecialchars($article->abstract) ?>">
        </div>
        
        <div class="mb-3">
            <label for="text" class="form-label">Vsebina</label>
            <textarea class="form-control" id="text" name="text"><?= htmlspecialchars($article->text) ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Shrani spremembe</button>
        <a href="/articles/list" class="btn btn-secondary">Nazaj</a>
    </form>
</div>