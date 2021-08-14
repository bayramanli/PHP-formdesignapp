<?php require_once "header.php"; ?>
<div class="container">
    <h3 class="text-center mt-2">Form Tasarlama</h3>
    <div class="row">
        <div class="col-md-6">
            <div align="left">
                <a href="index.php" type="button" class="btn btn-secondary">Anasayfaya Dön</a>
            </div>
        </div>
        <div class="col-md-6">
            <div align="right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Formu Kaydet
                </button>
            </div>
        </div>
    </div>
    <div id="fb-editor"></div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Başlığı Giriniz.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Form Başlığı</span>
                        </div>
                        <input type="text" name="form_name" data-secim="formName" id="formName" class="form-control" placeholder="Form Başlığı" aria-label="Form Başlığı" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="saveData" type="button">Kaydet</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "footer.php"; ?>

<script>
    jQuery(function($) {
        //$(document.getElementById('fb-editor')).formBuilder();
        const fbEditor = document.getElementById("fb-editor");
        const formBuilder = $(fbEditor).formBuilder();

        //form verilerini alma
        document.getElementById("saveData").addEventListener("click", () => {
            console.log("formu kaydet butonuna tıklandı.");
            const result = formBuilder.actions.save();
            console.log("result:", result);

            var url = "operation.php";
            var data = {
                form_themplate: result,
                form_name: $("input[data-secim='formName']").val(),
                button_name: "saveForm"
            };
            $.post(url, data, function(response) {
                //alert(response);

                if (parseInt(response)) {
                    alertify.success('Form Başarılı bir şekilde eklendi.');
                    //window.location.reload();
                    window.location.href = "/formdesignapp/form-list.php";
                } else {
                    alertify.error('Form eklenirken bir hata oluştu. Lütfen daha sonra tekrar deneyiniz.');
                }
            });
        });
    });
</script>