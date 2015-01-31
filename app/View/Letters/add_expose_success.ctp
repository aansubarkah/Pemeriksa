<?php
/**
 * @var View $this
 */
$fileLink = '/evidences/download/' . $fileId . '/draft';
echo $this->Html->link('Unduh Draft SP2', $fileLink);
echo '.';
?>
<p>
    Berhasil menyimpan Draft SP2 Ekspose. <?php echo $this->Html->link('Unduh Draft SP2', $fileLink); ?>. <span class="countdown">Halaman ini akan dialihkan pada 6 detik.</span>
</p>
<script>
    var count = 5;
    var text = 'Halaman ini akan dialihkan pada ';
    var countdown = setInterval(function () {
        $("span.countdown").html(text + count + " detik.");
        if (count == 0) {
            clearInterval(countdown);
            window.open('<?php echo Router::url('/letters/indexExpose', true); ?>', "_self");
        }
        count--;
    }, 1000);
</script>