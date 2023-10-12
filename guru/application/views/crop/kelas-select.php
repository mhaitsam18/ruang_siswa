<div class="form-group row">
    <label class="col-lg-2 col-form-label">Kelas</label>
    <div class="col-lg-10">
        <select class="form-control custom-select" name="id_kelas">
            <option selected disabled value="">Pilih Kelas</option>
            <option value="All">Pilih Semua Kelas</option>                                        
            <?php foreach ($kelas as $key): ?>
                <option value="<?= $key->id_kelas ?>"><?= $key->kelas ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>