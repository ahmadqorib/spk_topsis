<form action="" role="form" method="post">
    <div class="card-header">
        Tambah
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Kriteria<b class="text-danger">*</b></label>
            <select class="form-control select2bs4" name="kriteria" required style="width: 100%;">
                <?php foreach($kriteria->getData() as $kri){ ?>
                    <option value="<?php echo $kri['id'] ?> "><?php echo Kriteria::label($kri['kriteria']) ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Keterangan Range<b class="text-danger">*</b></label>
            <input name="range" type="text" class="form-control" required placeholder="Input range keterangan">
        </div>
        <div class="form-group">
            <label>Nilai<b class="text-danger">*</b></label>
            <input type="text" name="nilai" required class="form-control" placeholder="Input nilai" value="">
        </div>
    </div>
    <div class="card-footer">
        <button type="reset" class="btn btn-danger">Batal</button>
        <button type="submit" class="btn btn-success" name="save">Simpan</button>
    </div>
</form>