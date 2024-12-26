<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="<?= $data_utilities['keyword']?>">
<meta name="description" content="<?= $data_utilities['description']?>">
<meta name="author" content="<?= $data_utilities['author']?>">
<link rel="icon" type="image/png" href="<?= $baseURL ?>assets/img/<?= $data_utilities['logo']?>">
<title><?= $data_utilities['name_web']?> <?php if (isset($_SESSION['project_portal_wisata_kafe']['name_page'])) {
                          if (!empty($_SESSION['project_portal_wisata_kafe']['name_page'])) {
                            echo " - " . $_SESSION['project_portal_wisata_kafe']['name_page'];
                          }
                        } ?></title>
<link rel="stylesheet" href="<?= $baseURL ?>assets/ui/vendors/bootstrap/css/bootstrap.min.css" media="all">
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/ui/vendors/fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/ui/vendors/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/ui/vendors/modal-video/modal-video.min.css">
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/ui/vendors/lightbox/dist/css/lightbox.min.css">
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/ui/vendors/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/ui/vendors/slick/slick-theme.css">
<link
  href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&amp;family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&amp;display=swap"
  rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/ui/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<script src="<?= $baseURL ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>