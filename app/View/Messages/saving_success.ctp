<?php
/**
 * @var View $this
 */
?>
<p>
    Berhasil menyimpan <?php echo $message; ?>. <?php echo $goToLink; ?>. Halaman ini
    akan dialihkan dalam <span class="countdown">6</span> detik.
</p>
<script>
    var count = 5;
    var countdown = setInterval(function () {
        $("span.countdown").html(count);
        if (count < 0) {
            clearInterval(countdown);
            window.open('<?php echo $redirectLink; ?>', "_self");
        }
        count--;
    }, 1000);
</script>