<?php
use SLiMS\Config;
defined('INDEX_AUTH') or die('Direct access is not allowed!');

require SB . 'admin/default/session.inc.php';
require SB . 'admin/default/session_check.inc.php';
require SIMBIO . 'simbio_GUI/table/simbio_table.inc.php';
require SIMBIO . 'simbio_GUI/form_maker/simbio_form_table_AJAX.inc.php';

if (isset($_POST['saveData'])) {
    file_put_contents(__DIR__ . '/../config/twak-to-js.php', '<?php' . "\n" . 'return "' . addslashes($_POST['escape']['js']) . '";');
    toastr('Sukses menyimpan widget')->success();
    exit;
}

?>
<div class="menuBox">
    <div class="menuBoxInner biblioIcon">
        <div class="per_title">
            <h2><?php echo __('Konfigurasi Detail Widget'); ?></h2>
        </div>
    </div>
</div>
<?php
// create new instance
$form = new simbio_form_table_AJAX('mainForm', pluginUrl(reset: true), 'post');
$form->submit_button_attr = 'name="saveData" value="' . __('Save') . '" class="s-btn btn btn-default"';
// form table attributes
$form->table_attr = 'id="dataList" cellpadding="0" cellspacing="0"';
$form->table_header_attr = 'class="alterCell"';
$form->table_content_attr = 'class="alterCell2"';

$form->addTextField('textarea', 'escape[js]', __('Skrip Widget'), config('twak-to-js', ''), 'class="form-control" style="height: 289px;"');
echo $form->printOut();