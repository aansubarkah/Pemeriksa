<?php
/**
 * @var View $this
 */
echo $this->element('typeahead_style');
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
    'id' => 'addExpose'
));

echo $this->Form->input('start', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'start',
    'placeholder' => 'Tanggal Mulai (Jika dikosongkan sistem akan menggunakan tanggal hari ini)'
));

echo $this->Form->input('end', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'end',
    'placeholder' => 'Tanggal Selesai (Jika dikosongkan sistem akan menggunakan tanggal hari ini)'
));

echo $this->Form->input('date', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'date',
    'placeholder' => 'Tanggal SP2 (Jika dikosongkan sistem akan menggunakan Tanggal Mulai)'
));

echo $this->Form->input('description', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'description',
    'placeholder' => 'Kegiatan (mis. Pemaparan Hasil Diklat Pemeriksaan)'
));

?>
<div class="form-group col-md-9">
    <div id="prefetch">
        <input id="addPersonInCharge" type="text" placeholder="Pemapar (gunakan koma atau enter untuk menambahkan)"
               autocomplete="off" name="data[Letter][personInCharge]">
    </div>
</div>

<div class="form-group col-md-9">
    <div id="prefetch">
        <input id="addEmployees" type="text"
               placeholder="Peserta (gunakan koma atau enter untuk menambahkan, atau klik pada tombol unit kerja)"
               autocomplete="off" name="data[Letter][employees]">
    </div>
    <div>
        <?php
        foreach ($departements as $departement) {
            ?>
            <input class="btn btn-default btnSap" type="button"
                   value="+<?php echo $departement['Departement']['name']; ?>"
                   q="<?php echo $departement['Departement']['id']; ?>">
        <?php
        }
        ?>
        <input class="btn btn-default btnSap" type="button" value="+Semua" id="sapAll" q="All">
        <input class="btn btn-default" type="button" value="Bersihkan" id="sapClean">
    </div>
</div>

<?php
$options = array(
    'label' => 'Simpan',
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'btnSave',
    'type' => 'button'
);

echo $this->Form->end($options);

echo $this->Html->css(array('datepicker', 'bootstrap-tagsinput'));
echo $this->Html->script(array('bootstrap-datepicker', 'typeahead.bundle.min', 'bootstrap-tagsinput.min', 'jquery.validate.min', 'jquery.validate.custom.messages'));

echo $this->fetch('script');
echo $this->fetch('css');
?>
<script type="text/javascript">
    $(function () {
        $('#start').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        $('#end').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        $('#date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
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

        $('#addPersonInCharge').tagsinput({
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

        $('#addEmployees').tagsinput({
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

        $('.btnSap').on('click', function (event) {
            var id = $(this).attr('q');
            $.ajax({
                type: 'POST',
                url: '<?php echo Router::url('/DepartementsUsers/lists.json?q=', true); ?>' + id,
                dataType: 'json',
                encode: true
            })
                .done(function (data) {
                    data.forEach(function (elem) {
                        $('#addEmployees').tagsinput('add', {"value": elem.value, "text": elem.text});
                    });
                });
            event.preventDefault();
        });

        $('#sapClean').on('click', function (event) {
            $('#addEmployees').tagsinput('removeAll');
        });

        $('#btnSave').on('click', function (event) {
            var isNoEmpty = [];

            var formData = {};
            formData.inCharge = $('#addPersonInCharge').val();
            formData.employees = $('#addEmployees').val();

            formData.employees.length < 1 ? isNoEmpty.push(' Peserta kosong!') : true;
            formData.inCharge.length < 1 ? isNoEmpty.push(' Pemapar kosong!') : true;

            if (isNoEmpty.length < 1) {
                $('#addExpose').submit();
            } else {
                $('.modal-body').empty();
                $('.modal-body').append(isNoEmpty);
                $('#myModal').modal();
            }
            event.preventDefault();
        });

        $('#addExpose').validate({
            rules: {
                'data[Letter][date]': {
                    date: true
                },
                'data[Letter][start]': {
                    date: true
                },
                'data[Letter][end]': {
                    date: true
                },
                'data[Letter][description]': {
                    required: true,
                    minlength: 2,
                    remote: {
                        url: '<?php echo Router::url('/letters/isLetterNotExists.json', true); ?>',
                        type: 'post',
                        data: {
                            start: function () {
                                var start =  $('#start').val();
                                start.length === 0 ? start = "<?php echo date('Y-m-d'); ?>" : start = $('#start').val();
                                return start;
                            },
                            description: function () {
                                return $('#description').val();
                            }
                        }
                    }
                }
            },
            messages: {
                'data[Letter][description]': {
                    remote: 'Draft atau SP2 tersebut telah ada'
                }
            }
        });
    });
</script>