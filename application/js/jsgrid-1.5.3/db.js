
function getMainData() {
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


function insertItemData(data) {
    $.ajax({
        url: '/main/insertData',
        type: 'POST',
        data: data,
        dataType: 'text',
        async: false,
        success: function(data) {
            if (data > 0) {
                document.location.href = '/';
            }
        }
    });
}


function updateItemData(data) {
    $.ajax({
        url: '/main/updateData',
        type: 'POST',
        data: data,
        dataType: 'text',
        async: false,
        success: function(data) {
            if (data > 0) {
                document.location.href = '/';
            }
        }
    });
}


function deleteItem(itemId) {
    $.ajax({
        url: '/main/deleteData',
        type: 'POST',
        data: 'id='+itemId,
        dataType: 'text',
        async: false,
        success: function(data) {
            if (data > 0) {
                document.location.href = '/';
            }
        }
    });
}


(function() {

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
        });
    },

    insertItem: function(insertingalbum) {
        insertItemData(insertingalbum);
    },

    updateItem: function(updatingalbum) {
        updateItemData(updatingalbum);
    },

    deleteItem: function(deletingalbum) {
        deleteItem(deletingalbum.id);
    }

};

    window.db = db;
    db.albums = getMainData();

}());
