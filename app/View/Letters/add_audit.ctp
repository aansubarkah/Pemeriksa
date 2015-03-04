<?php
/**
 * @var View $this
 */
//echo $this->element('typeahead_style');
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Terdapat Kesalahan</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php
echo $this->Form->create('Letter', array(
    "role" => "form",
    'id' => 'addAudit'
));

echo $this->Form->input('name', array(
    'type' => 'hidden',
    'label' => false,
    'div' => 'form-group',
    'class' => 'form-control',
    'id' => 'name',
    'value' => $letterNumberFormat . date('m') . '/' . date('Y')
));
?>
<div class="row">
    <div class="col-sm-9" align="center">
        <img src="/img/garuda.jpg" alt="Garuda" class="img-responsive" width="48" height="48">
    </div>
</div>
<div class="row">
    <div class="col-sm-9" align="center" style="border-bottom: 1px solid #000000; margin-left: 15px;">
        <strong>BADAN PEMERIKSA KEUANGAN REPUBLIK INDONESIA</strong><br>
        <strong>PERWAKILAN PROVINSI JAWA TIMUR</strong><br>

        <p>Jalan Raya Juanda Sidoarjo Jawa Timur Telepon (031) 8669244 Faksimil (031) 8669206</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-9" align="center">
        <strong><u>SURAT TUGAS</u></strong><br>

        <p>
            No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $letterNumberFormat; ?><span
                id="letterDate"><?php echo date('m') . '/' . date('Y'); ?></span></p>
    </div>
</div>
<div class="row">
    <div class="col-sm-9" style="text-align: justify;">
        <p>Berdasarkan Undang-undang Nomor 15 Tahun 2006, Badan Pemeriksa Keuangan Republik Indonesia memberi tugas
            kepada:</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-9">
        <table class="table table-striped">
            <thead>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Jumlah Hari</th>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="col-xs-10">
                        <div id="prefetch">
                            <input id="employeesPJ" type="text" placeholder=""
                                   autocomplete="off" name="data[Letter][employeesPJ]" class="employee required">
                        </div>
                    </div>
                </td>
                <td>Penanggung Jawab</td>
                <td>
                    <?php
                    echo $this->Form->input('daysPJ', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => 'col-xs-1',
                        'id' => 'daysPJ',
                        'style' => 'text-align: center;',
                        'maxlength' => 2,
                        'size' => 2,
                        'class' => 'required'
                    ));
                    ?>
                </td>
            </tr>
            <tr id="WPJ">
                <td>
                    <div class="col-xs-10">
                        <div id="prefetch">
                            <input id="employeesWPJ" type="text" placeholder=""
                                   autocomplete="off" name="data[Letter][employeesWPJ]" class="employee">
                        </div>
                    </div>
                </td>
                <td>Wakil Penanggung Jawab</td>
                <td>
                    <?php
                    echo $this->Form->input('daysWPJ', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => 'col-xs-1',
                        'id' => 'daysWPJ',
                        'style' => 'text-align: center;',
                        'maxlength' => 2,
                        'size' => 2
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-xs-10">
                        <div id="prefetch">
                            <input id="employeesPT" type="text" placeholder=""
                                   autocomplete="off" name="data[Letter][employeesPT]" class="employee required">
                        </div>
                    </div>
                </td>
                <td>Pengendali Teknis</td>
                <td>
                    <?php
                    echo $this->Form->input('daysPT', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => 'col-xs-1',
                        'id' => 'daysPT',
                        'style' => 'text-align: center;',
                        'maxlength' => 2,
                        'size' => 2,
                        'class' => 'required'
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-xs-10">
                        <div id="prefetch">
                            <input id="employeesKT" type="text" placeholder=""
                                   autocomplete="off" name="data[Letter][employeesKT]" class="employee required">
                        </div>
                    </div>
                </td>
                <td>Ketua Tim</td>
                <td>
                    <?php
                    echo $this->Form->input('daysKT', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => 'col-xs-1',
                        'id' => 'daysKT',
                        'style' => 'text-align: center;',
                        'maxlength' => 2,
                        'size' => 2,
                        'class' => 'required'
                    ));
                    ?>
                </td>
            </tr>
            <tr id="KSB">
                <td>
                    <div class="col-xs-10">
                        <div id="prefetch">
                            <input id="employeesKSB" type="text" placeholder=""
                                   autocomplete="off" name="data[Letter][employeesKSB]" class="employee">
                        </div>
                    </div>
                </td>
                <td>Ketua Sub Tim</td>
                <td>
                    <?php
                    echo $this->Form->input('daysKSB', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => 'col-xs-1',
                        'id' => 'daysKSB',
                        'style' => 'text-align: center;',
                        'maxlength' => 2,
                        'size' => 2
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-xs-10">
                        <div id="prefetch">
                            <input id="employeesAT" type="text" placeholder=""
                                   autocomplete="off" name="data[Letter][employeesAT]" class="employee required">
                        </div>
                    </div>
                </td>
                <td>Anggota Tim</td>
                <td>
                    <?php
                    /*echo $this->Form->input('daysAT', array(
                        'type' => 'text',
                        'div' => 'col-xs-1',
                        'label' => false,
                        'id' => 'daysAT',
                        'style' => 'text-align: center;',
                        'maxlength' => 2,
                        'size' => 2,
                        'class' => 'required'
                    ));*/
                    ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-sm-9" style="text-align: center;">
        <a href="#" class="btn btn-default" role="button" id="addWPJ">+Wakil PJ</a>
        <a href="#" class="btn btn-default" role="button" id="addKSB">+Kasub Tim</a>
    </div>
</div>
<div class="row" style="padding-top: 10px;">
    <div class="col-sm-9" style="text-align: justify;">
        <div class="col-sm-5">
            <p>Untuk melaksanakan:</p>
        </div>
        <div class="col-sm-7">
            <?php
            echo $this->Form->textarea('description', array(
                'label' => false,
                'class' => 'form-control required',
                'rows' => 4,
                'id' => 'description',
                'placeholder' => 'mis. Pemeriksaan Pendahuluan atas Laporan Keuangan Pemerintah Daerah (LKPD) Tahun Anggaran 2014 pada Pemerintah Kabupaten xyz di xyz'
            ));
            ?>
        </div>
    </div>
</div>
<div class="row" style="padding-top: 10px;">
    <div class="col-sm-9" style="text-align: justify;">
        <div class="col-sm-5">
            <p>Tujuan (digunakan dalam SPPD):</p>
        </div>
        <div class="col-sm-7">
            <?php
            echo $this->Form->select('entity_id', $entities, array(
                'id' => 'entity',
                'class' => 'required'
            ));
            ?>
        </div>
    </div>
</div>
<div class="row" style="padding-top: 10px;">
    <div class="col-sm-9" style="text-align: right;">
        <div class="col-sm-3 col-sm-offset-5">
            <?php echo $city . ','; ?>
        </div>
        <div class="col-sm-4">
            <?php
            echo $this->Form->input('date', array(
                'type' => 'text',
                'label' => false,
                'id' => 'date',
                'placeholder' => 'Tanggal',
                'class' => 'required'
            ));
            ?>
        </div>
    </div>
</div>
<div class="row" style="padding-top: 10px;">
    <div class="col-sm-9" style="text-align: center;">
        <div class="col-sm-4 col-sm-offset-7">
            <p style="font-weight: bold;">Kepala Perwakilan,</p>

            <p style="font-weight: bold;">
                <span style="text-decoration: underline;"><?php echo $master['Chief']['User']['name']; ?></span>
                <br>
                <?php echo $master['Chief']['User']['number']; ?>
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-9">
        <p>Tembusan Yth:</p>
        <ol>
            <li>Menteri Dalam Negeri di Jakarta;</li>
            <li>Anggota V BPK RI di Jakarta;</li>
            <li>Auditor Utama Keuangan Negara V BPK RI di Jakarta;</li>
            <li>Kepala Direktorat Utama Revbang BPK RI di Jakarta;</li>
            <li>Inspektur Utama BPK RI di Jakarta.</li>
        </ol>
    </div>
</div>
<?php
$options = array(
    'label' => 'Simpan',
    'div' => 'form-group col-md-9',
    'class' => 'form-control',
    'id' => 'btnSave',
    'type' => 'submit'
);

echo $this->Form->end($options);

echo $this->Html->css(array('datepicker', 'bootstrap-tagsinput', 'typeahead-style'));
echo $this->Html->script(array('bootstrap-datepicker', 'locales/bootstrap-datepicker.id', 'typeahead.bundle.min', 'bootstrap-tagsinput.min', 'jquery.validate.min', 'jquery.validate.custom.messages'));

echo $this->fetch('script');
echo $this->fetch('css');
?>
<script type="text/javascript">
    $(function () {
        $('#WPJ').hide();
        $('#KSB').hide();

        $('#addWPJ').on('click', function (event) {
            $('#employeesWPJ').tagsinput('removeAll');
            if ($('#WPJ').is(':visible')) {
                $('#WPJ').hide();
                $(this).html('+Wakil PJ');
                //remove validate class
                $('#employeesWPJ').removeClass('required');
                $('#daysWPJ').removeClass('required');
            } else {
                $('#WPJ').show();
                $(this).html('-Wakil PJ');
                //add validate class
                $('#employeesWPJ').addClass('required');
                $('#daysWPJ').addClass('required');
            }
            event.preventDefault();
        });

        $('#addKSB').on('click', function (event) {
            $('#employeesKSB').tagsinput('removeAll');
            if ($('#KSB').is(':visible')) {
                $('#KSB').hide();
                $(this).html('+Kasub Tim');
                //remove validate class
                $('#employeesKSB').removeClass('required');
                $('#daysKSB').removeClass('required');
            } else {
                $('#KSB').show();
                $(this).html('-Kasub Tim');
                //add validate class
                $('#employeesKSB').addClass('required');
                $('#daysKSB').addClass('required');
            }
            event.preventDefault();
        });

        $('#date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            language: 'id',
            weekStart: 1
        });

        $('#date').on('change', function () {
            var date = $(this).val();
            var dateArr = date.split('-');
            var dateLetter = dateArr[1] + '/' + dateArr[0];
            $('#letterDate').html();
            $('#letterDate').html(dateLetter);
            $('#name').val('<?php echo $letterNumberFormat; ?>' + dateLetter);
        });

        var tags = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            limit: 3,
            remote: {
                url: '<?php echo Router::url('/users/lists.json?q=%QUERY', true); ?>',
                filter: function (list) {
                    return $.map(list, function (tag) {
                        return {
                            text: tag.text,
                            value: tag.value
                        };
                    });
                }
            }
        });

        tags.initialize();

        $('.employee').tagsinput({
            itemValue: 'value',
            itemText: 'text',
            typeaheadjs: {
                name: 'tags',
                displayKey: 'text',
                minLength: 2,
                source: tags.ttAdapter()
            },
            tagClass: 'label label-default',
            freeInput: false
        });

        $('#addAudit').validate({
            ignore: [],
            rules: {}
        });
    });
</script>