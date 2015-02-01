<?php
/**
 * @var View $this
 */
echo $this->element('typeahead_style');
?>
    <div class="page-header">
        <h1>Tambahkan Dokumen
            <small><?php echo $activity['Activity']['name']; ?></small>
        </h1>
    </div>
    <div>
        <p><?php echo $activity['Activity']['description']; ?></p>
    </div>
<?php
echo $this->Form->create('Evidence', array(
    "role" => "form"
));
?>
    <div class="form-group col-md-9">
        <div id="prefetch">
            <input id="addTypes" type="text" placeholder="Jenis Dokumen (mis. Surat Tugas, SP2P)"
                   autocomplete="off">
        </div>
    </div>
<?php
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
    'placeholder' => 'Nama Dokumen (mis. Slide Pemaparan. Boleh dikosongkan)'
));

$options = array(
    'label' => 'Simpan',
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'btnSave',
);

echo $this->Form->end($options);

echo $this->Html->css(array('bootstrap-tagsinput', 'jquery-file-upload/jquery.fileupload'));
echo $this->Html->script(array('typeahead.bundle.min', 'bootstrap-tagsinput.min', 'fileupload/vendor/jquery.ui.widget', 'fileupload/jquery.iframe-transport', 'fileupload/jquery.fileupload'));

echo $this->fetch('script');
echo $this->fetch('css');
?>

    <script type="text/javascript">
        $(function () {
            var tags = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                limit: 3,
                remote: {
                    url: '<?php echo Router::url('/types/lists.json?q=%QUERY', true); ?>',
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

            $('#addTypes').tagsinput({
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

            $('#progress').hide();
            $('#files').hide();

            $('#file').fileupload({
                dataType: 'json',
                maxFileSize: 1024,
                add: function (e, data) {
                    $('#progress').show();
                    $('#files').show();
                    $('#files').empty();
                    data.context = $('<p/>').text('Mengunggah...').appendTo('#files');
                    data.submit();
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

                var formData = {};
                formData.file = $('#filename').val();
                formData.name = $('#name').val();
                formData.description = $('#description').val();
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
<?php
/**
 * @todo
 * change tag input to typeahead suggest
 * add component to create a lists.json
 */