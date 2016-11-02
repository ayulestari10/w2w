 <h3>Multiple Upload File Codeigniter</h3>
<?php echo form_open_multipart('Admin/coba_upload'); ?>

<div class="form-group">
  <label for="judul">Judul</label>
  <input class="form-control" type="text" name="judul"/><br/>
</div>

<div class="form-group">
  <label for="isi">Isi</label>
  <textarea name="isi"></textarea>
</div>

<table border="1">
    <tr><td>File 1</td><td><?php echo form_upload('foto1'); ?></td></tr>
    <tr><td>File 2</td><td><?php echo form_upload('foto2'); ?></td></tr>
    <tr><td>File 3</td><td><?php echo form_upload('foto3'); ?></td></tr>
    <tr><td>File 4</td><td><?php echo form_upload('foto4'); ?></td></tr>
    <tr><td>File 5</td><td><?php echo form_upload('foto5'); ?></td></tr>
    <tr><td>File 6</td><td><?php echo form_upload('foto6'); ?></td></tr>
    <tr><td></td><td><?php echo form_submit('upload', 'upload file'); ?></td></tr>
</table>
<?php echo form_close() ?>