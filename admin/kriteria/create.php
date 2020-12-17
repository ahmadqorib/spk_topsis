<form action="" role="form" method="post">
    <div class="card-header">
        Tambah
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Kode<b class="text-danger">*</b></label>
            <input type="text" name="kode" required class="form-control" placeholder="Input kode kriteria" value="">
        </div>
        <div class="form-group">
            <label>Kriteria<b class="text-danger">*</b></label>
            <!-- <input type="text" name="kriteria" required class="form-control" placeholder="Input kriteria" value=""> -->
            <select class="form-control select2bs4" name="kriteria" required style="width: 100%;">
                <?php foreach(Kriteria::labels() as $item => $kri){ ?>
                    <option value="<?php echo $kri ?> "><?php echo $item ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nilai<b class="text-danger">*</b></label>
            <input type="text" name="nilai" required class="form-control" placeholder="Input nilai" value="">
        </div>
        <div class="form-group">
            <label>Atribut<b class="text-danger">*</b></label>
            <!-- <input type="text" name="kriteria" required class="form-control" placeholder="Input kriteria" value=""> -->
            <select class="form-control select2bs4" name="atribut" required style="width: 100%;">
                <?php foreach(AtributeKriteria::labels() as $item => $kri){ ?>
                    <option value="<?php echo $kri ?> "><?php echo $item ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Keterangan<b class="text-danger small"> boleh kosong</b></label>
            <textarea name="keterangan" id="" placeholder="Input keterangan" cols="30" class="form-control"></textarea>
        </div>
    </div>
    <div class="card-footer">
        <button type="reset" class="btn btn-danger">Batal</button>
        <button type="submit" class="btn btn-success" name="save">Simpan</button>
    </div>
</form>