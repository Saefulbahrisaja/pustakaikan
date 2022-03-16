<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title><?= $title ?></title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <!-- AdminKit -->
    <link href="<?= base_url('theme/css/app.css') ?>" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-theme@0.1.0-beta.10/dist/select2-bootstrap.min.css" integrity="sha256-nbyata2PJRjImhByQzik2ot6gSHSU4Cqdz5bNYL2zcU=" crossorigin="anonymous">

    <?= $head ?>
</head>

<body>
    <div class="wrapper">
        <?= $sidebar ?>

        <div class="main">
            <?= $navbar ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <?= $content ?>
                </div>
            </main>

            <?= $footer ?>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <!-- AdminKit -->
    <script src="<?= base_url('theme/js/app.js') ?>"></script>

    <!-- DataTables -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Image Preview -->
    <script type="text/javascript" src="<?= base_url('assets/js/image-preview.js') ?>"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js" integrity="sha256-vjFnliBY8DzX9jsgU/z1/mOuQxk7erhiP0Iw35fVhTU=" crossorigin="anonymous"></script>

    <!-- Select2 Bootstrap Theme -->
    <script type="text/javascript">
        $.fn.select2.defaults.set("theme", "bootstrap");
    </script>

    <!-- AlphineJs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.7.0/cdn.min.js" integrity="sha512-snKy1ArwmuMarok87UQk7lVf2AmQ/Mw2Zv2ziPX0hpoAu/uGQSxf0AaqtQPgp0DJ51Kb7veRL4aNcIIBlk8YSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?= $tail ?>
</body>

</html>