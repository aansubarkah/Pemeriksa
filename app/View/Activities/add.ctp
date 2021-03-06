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
echo $this->Form->create('Activity', array(
    "role" => "form"
));

echo $this->Form->input('file', array(
    'type' => 'file',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'file',
    'name' => 'files[]',
    'data-url' => Router::url('/evidences/upload.json', true),
    'placeholder' => 'Berkas untuk diunggah'
));
?>
<div class="form-group col-sm-9">
    <div id="progress" class="progress form-group">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
</div>

<?php
echo $this->Form->input('filename', array(
    'type' => 'hidden',
    'label' => false,
    'div' => 'form-group',
    'class' => 'form-control',
    'id' => 'filename',
    'value' => ''
));

echo $this->Form->input('name', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'name',
    'placeholder' => 'Nomor Surat'
));

echo $this->Form->input('description', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'description',
    'placeholder' => 'Perihal'
));

echo $this->Form->input('start', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'start',
    'placeholder' => 'Tanggal Mulai (Kosong berarti tanggal sekarang)'
));

echo $this->Form->input('end', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'end',
    'placeholder' => 'Tanggal Selesai (Kosong berarti tanggal sekarang)'
));
?>
<div class="form-group col-md-9">
    <div id="prefetch">
        <input id="addEmployees" type="text" placeholder="Pegawai (gunakan koma atau enter untuk menambahkan)"
               autocomplete="off">
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
echo $this->Form->input('exercise', array(
    'type' => 'checkbox',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'id' => 'exercise',
    'hiddenField' => false,
    'value' => false,
    'label' => '&nbsp;Diklat?'
));


$options = array(
    'label' => 'Simpan',
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'btnSave',
);

echo $this->Form->end($options);

echo $this->Html->css(array('datepicker', 'bootstrap-tagsinput', 'jquery-file-upload/jquery.fileupload'));
echo $this->Html->script(array('bootstrap-datepicker','locales/bootstrap-datepicker.id', 'typeahead.bundle.min', 'bootstrap-tagsinput.min', 'fileupload/vendor/jquery.ui.widget', 'fileupload/jquery.iframe-transport', 'fileupload/jquery.fileupload'));

echo $this->fetch('script');
echo $this->fetch('css');
?>
<script type="text/javascript">
    $(function () {
        $('#description').on('keyup', function (event) {
            var description = $(this).val();
            description = description.toLowerCase();
            console.log(description);
            if (description.indexOf('pemaparan') < 0) {
                if (description.indexOf('diklat') > -1) {
                    $('#exercise').prop('checked', true);
                }
                if (description.indexOf('pendidikan dan latihan') > -1) {
                    $('#exercise').prop('checked', true);
                }
                if (description.indexOf('pendidikan latihan') > -1) {
                    $('#exercise').prop('checked', true);
                }
            }
        });

        $('#start').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            language: 'id',
            weekStart: 1
        });

        $('#end').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            language: 'id',
            weekStart: 1
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

        $('#progress').hide();
        $('#files').hide();

        $('#file').fileupload({
            dataType: 'json',
            maxFileSize: 1000000000,
            add: function (e, data) {
                var uploadErrors = [];
                var acceptFileTypes =  /(\.|\/)(gif|jpe?g|png|txt|pdf|doc|docx|xls|xlsx|ppt|pptx|rar|zip|odt|tar|gz)$/i;
                if (data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
                    uploadErrors.push('Not an accepted file type');
                }
                if (data.originalFiles[0]['size'].length && data.originalFiles[0]['size'] > 1000000000) {
                    uploadErrors.push('Filesize is too big');
                }
                if (uploadErrors.length > 0) {
                    //alert(uploadErrors.join("\n"));
                    data.context = $('<p/>').text(uploadErrors.join("\n")).appendTo('#files');
                } else {
                    $('#progress').show();
                    $('#files').show();
                    $('#files').empty();
                    data.context = $('<p/>').text('Mengunggah...').appendTo('#files');
                    data.submit();
                }
            },
            done: function (e, data) {
                $('#progress').hide();
                $('#files').empty();
                $.each(data.result.files, function (index, file) {
                    $('#filename').val(file.name);
                    var textToDisplay = file.name + ' berhasil diunggah.';
                    $('<p/>').text(textToDisplay).appendTo('#files');
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disable', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');

        $('#btnSave').on('click', function (event) {
            var isNoEmpty = [];
            var exercise = 0;
            if ($('#exercise').is(':checked')) exercise = 1;

            var formData = {};
            formData.file = $('#filename').val();
            formData.name = $('#name').val();
            formData.description = $('#description').val();
            formData.exercise = exercise;
            formData.start = $('#start').val();
            formData.end = $('#end').val();
            formData.employees = $('#addEmployees').val();
            //var data = $('#addEmployees').tagsinput('items');

            formData.file.length < 1 ? isNoEmpty.push(' Berkas belum diunggah!') : true;
            formData.name.length < 1 ? isNoEmpty.push(' Nomor kosong!') : true;
            formData.description.length < 1 ? isNoEmpty.push(' Perihal kosong!') : true;
            formData.employees.length < 1 ? isNoEmpty.push(' Pegawai kosong!') : true;


            if (isNoEmpty.length < 1) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Router::url('/activities/added.json', true); ?>',
                    data: formData,
                    dataType: 'json',
                    encode: true
                })
                    .done(function (data) {
                        $('.modal-body').empty();
                        if (!data.success) {
                            if (data.errors) {
                                $('.modal-body').append(data.errors);
                            }
                        } else {
                            $('.modal-title').empty();
                            $('.modal-title').append('Berhasil');
                            $('.modal-body').append('Berhasil Menyimpan');
                            $('.modal-footer').empty();
                            $('.modal-footer').append(
                                '<a class="btn btn-default" href="<?php echo Router::url('/', true); ?>" role="button">Tutup</a>'
                            );

                        }
                        $('#myModal').modal();
                    });
            } else {
                $('.modal-body').empty();
                $('.modal-body').append(isNoEmpty);
                $('#myModal').modal();
            }

            event.preventDefault();
        });
    });
</script>