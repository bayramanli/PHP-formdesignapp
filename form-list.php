<?php require_once "header.php";
require_once "classes/database.php";
$db = new Database();
$sql = $db->read("forms", ["columns_name" => "id", "columns_sort" => "DESC"]);
$data["forms"] = $sql->fetchAll(PDO::FETCH_ASSOC);
$form_count = 1;
?>
<div class="container">
    <h2 class="text-center mt-5">Tasarlanan Form Listesi</h2>
    <div class="row">
        <div class="col-md-6">
            <div align="left">
                <a href="index.php" type="button" class="btn btn-primary">Anasayfaya Dön</a>
            </div>
        </div>
        <div class="col-md-6">
            <div align="right">
                <a href="form-design.php" type="button" class="btn btn-primary">Yeni Form Ekle</a>
            </div>
        </div>
    </div>
    <hr>
    <?php if (isset($_SESSION["messageManagement"])) : ?>
        <div class="alert alert-<?php echo $_SESSION["messageManagement"]["type"]; ?>" role="alert">
            <?php echo $_SESSION["messageManagement"]["message"]; ?>
        </div>
    <?php endif ?>
    <?php if (empty($data["forms"])) { ?>
        <div class="alert alert-warning" role="alert">
            Henüz form tasarlamadınız. Yeni form ekle butonuna tıklayarak, istediğiniz tasarımda form oluşturabilirsiniz.
        </div>
    <?php } else { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Form Adı</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["forms"] as $forms) : ?>
                    <tr>
                        <th scope="row"><?php echo $form_count; ?></th>
                        <td><?php echo $forms["form_name"]; ?></td>
                        <td>
                            <a href="form-update.php?id=<?php echo $forms["id"]; ?>" class="btn btn-primary">Formu Görüntüle ve Düzenle</a>
                            <a href="operation.php?action=delete&id=<?php echo $forms["id"]; ?>" class="btn btn-danger">Formu Sil</a>
                        </td>
                    </tr>
                <?php $form_count++;
                endforeach; ?>
            </tbody>
        </table>
    <?php } ?>
</div>

<?php require_once "footer.php"; ?>