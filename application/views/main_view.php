
<div id="jsGrid"></div>

<div id="detailsDialog">
    <form id="detailsForm">
        <input type="hidden" name="id" id="id" />
        <div class="details-form-field">
            <label for="album_name">Название альбома:</label>
            <input id="album_name" name="album_name" type="text" />
        </div>
        <div class="details-form-field">
            <label for="artist_name">Имя артиста:</label>
            <input id="artist_name" name="artist_name" type="text" />
        </div>
        <div class="details-form-field">
            <label for="album_year">Год выпуска альбома:</label>
            <input id="album_year" name="album_year" type="number" />
        </div>
        <div class="details-form-field">
            <label for="album_duration">Продолжительность альбома:</label>
            <input id="album_duration" name="album_duration" type="number" />
        </div>
        <div class="details-form-field">
            <label for="buy_date">Дата покупки:</label>
            <input id="buy_date" name="buy_date" type="date" />
        </div>
        <div class="details-form-field">
            <label for="purchase_price">Стоимость:</label>
            <input id="purchase_price" name="purchase_price" type="number" />
        </div>
        <div class="details-form-field">
            <label for="storage_code">Код хранилища:</label>
            <input id="storage_code" name="storage_code" type="text" />
        </div>
        <div class="details-form-field">
            <button type="submit" id="save">Сохранить</button>
        </div>
    </form>
</div>


<script>
    $(function() {

        var MyDateField = function(config) {
            jsGrid.Field.call(this, config);
        };

        MyDateField.prototype = new jsGrid.Field({

            /*css: "date-field",*/
            align: "center",

            sorter: function(date1, date2) {
                return new Date(date1) - new Date(date2);
            },

            itemTemplate: function(value) {
                return new Date(value).toDateString();
            },

            insertTemplate: function(value) {
                return this._insertPicker = $("<input>").datepicker({ defaultDate: new Date() });
            },

            editTemplate: function(value) {
                return this._editPicker = $("<input>").datepicker().datepicker("setDate", new Date(value));
            },

            insertValue: function() {
                return this._insertPicker.datepicker("getDate").toISOString();
            },

            editValue: function() {
                return this._editPicker.datepicker("getDate").toISOString();
            }
        });

        jsGrid.fields.date = MyDateField;


        $("#jsGrid").jsGrid({
            height: "70%",
            width: "100%",
            editing: true,
            autoload: true,
            paging: true,
            filtering: true,
            sorting: true,
            pageNextText: 'Следующая',
            pagePrevText: 'Предыдущая',
            pageFirstText: 'Первая',
            pageLastText: 'Последняя',
            pagerFormat: 'Страницы: {first} {prev} {pages} {next} {last} &nbsp;&nbsp; {pageIndex} из {pageCount}',
            deleteConfirm: function(item) {
                return "Запись альбома \"" + item.album_name + "\" будет удалена. Продолжить?";
            },
            rowClick: function(args) {
                showDetailsDialog("Изменить", args.item);
            },
            controller: db,
            fields: [
                { name: "id", type: "text", title: "ID", width: 10 },
                { name: "album_name", type: "text", title: "Название альбома", width: 100 },
                { name: "artist_name", type: "text", title: "Имя артиста", width: 100 },
                { name: "album_year", type: "number", title: "Год выпуска альбома", width: 120 },
                { name: "album_duration", type: "number", title: "Продолжительность альбома", width: 120 },
                { name: "buy_date", type: "date", title: "Дата покупки", width: 100 },
                { name: "purchase_price", type: "number", title: "Стоимость", width: 60 },
                { name: "storage_code", type: "text", title: "Код хранилища", width: 80 },
                {
                    type: "control",
                    modeSwitchButton: false,
                    editButton: false,
                    headerTemplate: function() {
                        return $("<button>").attr("type", "button").text("+")
                            .on("click", function () {
                                showDetailsDialog("Добавить", {});
                            });
                    }
                }
            ]
        });

        $("#detailsDialog").dialog({
            autoOpen: false,
            width: 400,
            close: function() {
                $("#detailsForm").validate().resetForm();
                $("#detailsForm").find(".error").removeClass("error");
            }
        });

        $("#detailsForm").validate({
            rules: {
                album_name: "required",
                artist_name: "required",
                album_year: { required: true, range: [1900, 2019] },
                album_duration: { required: true, range: [1, 240] },
                purchase_price: { required: true, range: [1, 99999] },
                storage_code: { required: true, minlength: 5 },
                buy_date: "required"
            },
            messages: {
                /*name: "Введите название",
                age: "Please enter valid age",
                address: "Please enter address (more than 10 chars)",
                country: "Please select country"*/
            },
            submitHandler: function() {
                formSubmitHandler();
            }
        });

        var formSubmitHandler = $.noop;

        var showDetailsDialog = function(dialogType, album) {
            $("#album_name").val(album.album_name);
            $("#artist_name").val(album.artist_name);
            $("#album_year").val(album.album_year);
            $("#album_duration").val(album.album_duration);
            $("#buy_date").val(album.buy_date);
            $("#purchase_price").val(album.purchase_price);
            $("#storage_code").val(album.storage_code);

            $("#id").val(album.id);

            formSubmitHandler = function() {
                savealbum(album, dialogType === "Добавить");
            };

            $("#detailsDialog").dialog("option", "title", dialogType)
                .dialog("open");
        };

        var savealbum = function(album, isNew) {
            $.extend(album, {
                album_name: $("#album_name").val(),
                artist_name: $("#artist_name").val(),
                album_year: $("#album_year").val(),
                album_duration: $("#album_duration").val(),
                buy_date: $("#buy_date").val(),
                purchase_price: $("#purchase_price").val(),
                storage_code: $("#storage_code").val(),
                id: $("#id").val()
            });

            $("#jsGrid").jsGrid(isNew ? "insertItem" : "updateItem", album);

            $("#detailsDialog").dialog("close");
        };

    });
</script>