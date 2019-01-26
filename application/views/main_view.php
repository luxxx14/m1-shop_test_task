
<div id="jsGrid"></div>

<div id="detailsDialog">
    <form id="detailsForm">
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
        <!--
        <div class="details-form-field">
            <label for="country">Страна:</label>
            <select id="country" name="country">
                <option value="">(Select)</option>
                <option value="1">United States</option>
                <option value="2">Canada</option>
                <option value="3">United Kingdom</option>
                <option value="4">France</option>
                <option value="5">Brazil</option>
                <option value="6">China</option>
                <option value="7">Russia</option>
            </select>
        </div>
        <div class="details-form-field">
            <label for="married">Is Married</label>
            <input id="married" name="married" type="checkbox" />
        </div>
        -->
        <div class="details-form-field">
            <button type="submit" id="save">Сохранить</button>
        </div>
    </form>
</div>


<script>
    $(function() {

        $("#jsGrid").jsGrid({
            height: "70%",
            width: "100%",
            editing: false,
            autoload: true,
            paging: true,
            filtering: false,
            sorting: true,
            pageNextText: 'Следующая',
            pagePrevText: 'Предыдущая',
            pageFirstText: 'Первая',
            pageLastText: 'Последняя',
            pagerFormat: 'Страницы: {first} {prev} {pages} {next} {last} &nbsp;&nbsp; {pageIndex} из {pageCount}',
            deleteConfirm: function(item) {
                return "Запись альбома \"" + item.Name + "\" будет удалена. Продолжить?";
            },
            rowClick: function(args) {
                showDetailsDialog("Изменить", args.item);
            },
            controller: db,
            fields: [
                { name: "album_name", type: "text", title: "Название альбома", width: 100 },
                { name: "artist_name", type: "", title: "Имя артиста", width: 100 },
                { name: "album_year", type: "number", title: "Год выпуска альбома", width: 120 },
                { name: "album_duration", type: "number", title: "Продолжительность альбома", width: 120 },
                { name: "buy_date", type: "date", title: "Дата покупки", width: 100 },
                { name: "purchase_price", type: "number", title: "Стоимость", width: 60 },
                { name: "storage_code", type: "text", title: "Код хранилища", width: 80 },
                //{ name: "Country", type: "select", title: "Страна", items: db.countries, valueField: "Id", textField: "Name" },
                //{ name: "Married", type: "checkbox", title: "Is Married", sorting: false },
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
                name: "required",
                age: { required: true, range: [18, 150] },
                address: { required: true, minlength: 10 },
                country: "required"
            },
            messages: {
                name: "Введите название",
                age: "Please enter valid age",
                address: "Please enter address (more than 10 chars)",
                country: "Please select country"
            },
            submitHandler: function() {
                formSubmitHandler();
            }
        });

        var formSubmitHandler = $.noop;

        var showDetailsDialog = function(dialogType, album) {
            $("#name").val(album.Name);
            $("#age").val(album.Age);
            $("#address").val(album.Address);
            $("#country").val(album.Country);
            $("#married").prop("checked", album.Married);

            formSubmitHandler = function() {
                savealbum(album, dialogType === "Add");
            };

            $("#detailsDialog").dialog("option", "title", dialogType)
                .dialog("open");
        };

        var savealbum = function(album, isNew) {
            $.extend(album, {
                Name: $("#name").val(),
                Age: parseInt($("#age").val(), 10),
                Address: $("#address").val(),
                Country: parseInt($("#country").val(), 10),
                Married: $("#married").is(":checked")
            });

            $("#jsGrid").jsGrid(isNew ? "insertItem" : "updateItem", album);

            $("#detailsDialog").dialog("close");
        };

    });
</script>