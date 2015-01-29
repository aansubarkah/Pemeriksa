<?php
/**
 * @var View $this
 */
?>
<div class="page-header">
    <h1>Tambahkan Penugasan</h1>
</div>
<?php
echo $this->Form->create('Activity', array(
    "role" => "form"
));
?>

<div id="prefetch">
    <input id="addTags" type="text" placeholder="Pegawai (gunakan koma atau enter untuk menambahkan)"
           autocomplete="off">
</div>

<?php
echo $this->Form->end();
echo $this->Html->css(array('datepicker3', 'bootstrap-tagsinput'));
echo $this->Html->script(array('bootstrap-datepicker', 'typeahead.bundle.min', 'bootstrap-tagsinput.min'));

echo $this->fetch('script');
echo $this->fetch('css');
?>

<style>
    .icon-github {
        background: no-repeat url('../img/github-16px.png');
        width: 16px;
        height: 16px;
    }

    /*.bootstrap-tagsinput { width: 100%; }*/

    .accordion {
        margin-bottom: -3px;
    }

    .accordion-group {
        border: none;
    }

    .twitter-typeahead .tt-query,
    .twitter-typeahead .tt-hint {
        margin-bottom: 0;
    }

    .twitter-typeahead .tt-hint {
        display: none;
    }

    .tt-dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        list-style: none;
        font-size: 14px;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        background-clip: padding-box;
    }

    .tt-suggestion > p {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.428571429;
        color: #333333;
        white-space: nowrap;
    }

    .tt-suggestion > p:hover,
    .tt-suggestion > p:focus,
    .tt-suggestion.tt-cursor p {
        color: #ffffff;
        text-decoration: none;
        outline: 0;
        background-color: #428bca;
    }
</style>
<script type="text/javascript">
    $(function () {
        var tags = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            limit: 10,
            remote: {
                url: '<?php echo Router::url('/users/lists.json?q=%QUERY', true); ?>',
                filter: function (list) {
                    return $.map(list, function (tag) {
                        return {name: tag};
                    });
                }
            }
        });

        tags.initialize();

        $('#addTags').tagsinput({
            typeaheadjs: {
                name: 'categories',
                displayKey: 'name',
                valueKey: 'name',
                source: tags.ttAdapter()
            },
            tagClass: 'label label-default'
        });
    });
</script>