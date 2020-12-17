<form action="" role="form" method="post">
    <div class="card-header">
        Edit
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Kode<b class="text-danger">*</b></label>
            <input type="text" name="kode" required class="form-control" placeholder="Input kode kriteria" value="<?php echo $edit['kode'] ?>">
        </div>
        <div class="form-group">
            <label>Kriteria<b class="text-danger">*</b></label>
            <select class="form-control select2bs4" name="kriteria" required style="width: 100%;">
                <option value=""></option>
                <?php foreach(Kriteria::labels() as $item => $kri){ ?>
                    <option value="<?php echo $kri ?> " <?php  if($edit['kriteria'] == $kri){ echo 'selected'; } ?>><?php echo $item ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nilai<b class="text-danger">*</b></label>
            <input type="text" name="nilai" required class="form-control" placeholder="Input nilai" value="<?php echo $edit['nilai'] ?>">
        </div>
        <div class="form-group">
            <label>Atribut<b class="text-danger">*</b></label>
            <!-- <input type="text" name="kriteria" required class="form-control" placeholder="Input kriteria" value=""> -->
            <select class="form-control select2bs4" name="atribut" required style="width: 100%;">
                <?php foreach(AtributeKriteria::labels() as $item => $kri){ ?>
                    <option value="<?php echo $kri ?> " <?php  if($edit['atribut'] == $kri){ echo 'selected'; } ?>><?php echo $item ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Keterangan<b class="text-danger small"> boleh kosong</b></label>
            <textarea name="keterangan" id="" cols="30" placeholder="Input keterangan" class="form-control"><?php echo $edit['keterangan'] ?></textarea>
        </div>
    </div>
    <div class="card-footer">
        <a href="?page=kriteria" class="btn btn-danger">Batal</a>
        <button type="submit" class="btn btn-success" name="update">Edit</button>
    </div>
</form>