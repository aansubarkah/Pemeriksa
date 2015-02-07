<?php
/**
 * @var View $this
 */
?>
<p>
    Berhasil menambahkan Dokumen pada Kegiatan <?php echo $activity['Activity']['description']; ?>. Halaman ini
    akan dialihkan dalam <span class="countdown">6</span> detik.
</p>
<script>
    var count = 5;
    var countdown = setInterval(function () {
        $("span.countdown").html(count);
        if (count < 0) {
            clearInterval(countdown);
            window.open('<?php echo Router::url('/activities/view/', true) . $activity['Activity']['id']; ?>', "_self");
        }
        count--;
    }, 1000);
</script>