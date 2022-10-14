$(document).ready(function () {
    setOnDeleteRowHandler();
    $(".js-add-row").click(function () {
        let rowIndex = $('#rowIndex').val();
        let newRowAdd =
            `<div class="row align-middle">
                <div class="col">
                    <label>Бренд</label>
                    <select class="form-control" NAME="ITEM[${rowIndex}][PROPERTY_VALUES][BRAND]">
                        ${window.selectOptions}
                    </select>
                </div>
                <div class="col">
                    <label>Наименование</label>
                    <input type="text" class="form-control" name="ITEM[${rowIndex}][NAME]">
                </div>
                <div class="col">
                    <label>Количество</label>
                    <input type="number" class="form-control" name="ITEM[${rowIndex}][PROPERTY_VALUES][COUNT]">
                </div>
                <div class="col">
                    <label>Фасовка</label>
                    <input type="text" class="form-control" name="ITEM[${rowIndex}][PROPERTY_VALUES][PACKAGING]">
                </div>
                <div class="col">
                    <label>Клиент</label>
                    <input type="text" class="form-control" name="ITEM[${rowIndex}][PROPERTY_VALUES][CLIENT]">
                </div>
                <div class="input-group-prepend col">
                    <button class="btn btn-danger js-delete-row" type="button">
                        <i class="bi bi-trash"></i>
                        -
                    </button>
                </div>
            </div>`;

        $('.items-list').append(newRowAdd);
        $('#rowIndex').val(++rowIndex)
        setOnDeleteRowHandler();
    });

    function setOnDeleteRowHandler() {
        $('.js-delete-row').on('click', function () {
            $(this).parents('.row').remove();
        })
    }

    $('.js-process-form').on('click', function (e) {
        const form = $('.request-form');
        let data = form.serialize();
        let action = form.attr('action');
        let type = form.attr('type');

        let errorDiv = form.find('.request-error');
        $.ajax({
            url: action,
            type: type,
            data: data + '&ajaxForm=Y',
            dataType: 'json',
            error: function() {
                console.log("ajax error");
            },
            success: function(response){
                if (response['success']) {
                    location.reload()
                } else {
                    errorDiv.html(response['error']);
                }
            }
        });
    });
})
        
    