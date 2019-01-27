
function test() {
    var result_data;
    $.ajax({
        url: '/main/getData',
        dataType: 'json',
        async: false,
        success: function(data) {
            result_data = data;
        }
    });

    return result_data;
}


(function() {
/*
    var MyDateField = function(config) {
        jsGrid.Field.call(this, config);
    };

    MyDateField.prototype = new jsGrid.Field({

        css: "date-field",            // redefine general property 'css'
        align: "center",              // redefine general property 'align'

        myCustomProperty: "foo",      // custom property

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
    */

    var db = {

    loadData: function(filter) {
        console.log(filter);
        return $.grep(this.albums, function(album) {
            return (!filter.album_name || album.album_name.indexOf(filter.album_name) > -1)
                && (!filter.artist_name || album.artist_name.indexOf(filter.artist_name) > -1)
                && (!filter.storage_code || album.storage_code.indexOf(filter.storage_code) > -1)
                && (!filter.album_year || album.album_year.indexOf(filter.album_year) > -1)
                && (!filter.album_duration || album.album_duration.indexOf(filter.album_duration) > -1)
                && (!filter.purchase_price || album.purchase_price.indexOf(filter.purchase_price) > -1)
                && (!filter.buy_date || album.buy_date.indexOf(filter.buy_date) > -1)


                /*&& (filter.album_year === undefined || album.album_year === filter.album_year)*/
                /*&& (filter.album_duration === undefined || album.album_duration === filter.album_duration)*/
                /*&& (filter.buy_date === undefined || album.buy_date === filter.buy_date)*/
                /*&& (filter.purchase_price === undefined || filter.purchase_price === album.purchase_price)
                /*&& (filter.storage_code === undefined || album.storage_code === filter.storage_code)*/
        });
    },

    insertItem: function(insertingalbum) {
        this.albums.push(insertingalbum);
    },

    updateItem: function(updatingalbum) {

    },

    deleteItem: function(deletingalbum) {
        var albumIndex = $.inArray(deletingalbum, this.albums);
        this.albums.splice(albumIndex, 1);
    }

};

    window.db = db;
    db.albums = test();

}());
