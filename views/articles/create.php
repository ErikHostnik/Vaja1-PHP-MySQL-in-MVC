<div class="container">
    <h3>Objavi novico</h3>
    <form action="/articles/store" method="POST" >
        <div class="mb-3">
            <label for="title" class="form-label">Naslov</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($_POST["title"]) ? $_POST["title"]: ""; ?>">
        </div>
        <div class="mb-3">
            <label for="abstract" class="form-label">Povzetek</label>
            <input type="text" class="form-control" id="abstract" name="abstract" value="<?php echo isset($_POST["abstract"]) ? $_POST["abstract"]: ""; ?>">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Vsebina</label>
            <textarea class="form-control" id="text" name="text"><?php echo isset($_POST["text"]) ? $_POST["text"]: ""; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="publish">Objavi</button>
    </form>
</div>