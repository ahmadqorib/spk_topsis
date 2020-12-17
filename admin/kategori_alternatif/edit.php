<form action="" role="form" method="post">
    <div class="card-header">
        Edit
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Kategori Alternatif/Merek<b class="text-danger">*</b></label>
            <input type="text" name="kategori" required class="form-control" placeholder="Input kategori" value="<?php echo $edit['kategori'] ?>">
        </div>
    </div>
    <div class="card-footer">
    <a href="?page=kategori_alternatif" class="btn btn-danger">Batal</a>
    <button type="submit" class="btn btn-success" name="update">Edit</button>
    </div>
</form>