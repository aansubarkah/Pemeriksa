<?php
/**
 * @var View $this
 */
$fileLink = '/evidences/download/file/' . $fileId . '/draft';
//echo $this->Html->link('Unduh Draft SP2', $fileLink);
//echo '.';
?>
<p>
    Berhasil menyimpan Draft SP2 Ekspose. <?php echo $this->Html->link('Unduh Draft SP2', $fileLink); ?>. Halaman ini
    akan dialihkan dalam <span class="countdown">6</span> detik.
</p>
<script>
    var count = 5;
    var countdown = setInterval(function () {
        $("span.countdown").html(count);
        if (count < 0) {
            clearInterval(countdown);
            window.open('<?php echo Router::url('/letters/indexExpose', true); ?>', "_self");
        }
        count--;
    }, 1000);
</script>