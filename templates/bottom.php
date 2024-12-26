<?php require_once("sections/footer.php"); ?>

<a id="backTotop" href="#" class="to-top-icon">
  <i class="fas fa-chevron-up"></i>
</a>
</div>

<!-- JavaScript -->
<script src="<?= $baseURL ?>assets/ui/js/jquery.js"></script>
<script src="<?= $baseURL ?>assets/ui/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= $baseURL ?>assets/ui/vendors/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= $baseURL ?>assets/ui/vendors/countdown-date-loop-counter/loopcounter.js"></script>
<script src="<?= $baseURL ?>assets/ui/js/jquery.counterup.js"></script>
<script src="<?= $baseURL ?>assets/ui/vendors/modal-video/jquery-modal-video.min.js"></script>
<script src="<?= $baseURL ?>assets/ui/vendors/masonry/masonry.pkgd.min.js"></script>
<script src="<?= $baseURL ?>assets/ui/vendors/lightbox/dist/js/lightbox.min.js"></script>
<script src="<?= $baseURL ?>assets/ui/vendors/slick/slick.min.js"></script>
<script src="<?= $baseURL ?>assets/ui/js/jquery.slicknav.js"></script>
<script src="<?= $baseURL ?>assets/ui/js/custom.min.js"></script>

<script>
  const showMessage = (type, title, message) => {
    if (message) {
      Swal.fire({
        icon: type,
        title: title,
        text: message,
      });
    }
  };

  showMessage("success", "Berhasil Terkirim", $(".message-success").data("message-success"));
  showMessage("info", "For your information", $(".message-info").data("message-info"));
  showMessage("warning", "Peringatan!!", $(".message-warning").data("message-warning"));
  showMessage("error", "Kesalahan", $(".message-danger").data("message-danger"));
</script>

</body>

</html>