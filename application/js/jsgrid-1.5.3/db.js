
(function() {



    var db = {

        loadData: function(filter) {
            return $.grep(this.albums, function(album) {
                return //(!filter.album_name || album.album_name.indexOf(filter.album_name) > -1)
                    //&& (!filter.artist_name || album.artist_name.indexOf(filter.artist_name) > -1)
                    //&& (!filter.storage_code || album.storage_code.indexOf(filter.storage_code) > -1)

                    /*&& *///(filter.album_year === undefined || album.album_year === filter.album_year)
                    //&& (filter.album_duration === undefined || album.album_duration === filter.album_duration)
                    //&& (filter.buy_date === undefined || album.buy_date === filter.buy_date)
                    //&& (filter.purchase_price === undefined || album.purchase_price === filter.purchase_price)
                    //&& (filter.storage_code === undefined || album.storage_code === filter.storage_code)
            });
        },

        insertItem: function(insertingalbum) {
            //console.log(insertingalbum);
            this.albums.push(insertingalbum);
        },

        updateItem: function(updatingalbum) { },

        deleteItem: function(deletingalbum) {
            var albumIndex = $.inArray(deletingalbum, this.albums);
            this.albums.splice(albumIndex, 1);
        }

    };

    window.db = db;

/*
    db.countries = [
        { Name: "", Id: 0 },
        { Name: "United States", Id: 1 },
        { Name: "Canada", Id: 2 },
        { Name: "United Kingdom", Id: 3 },
        { Name: "France", Id: 4 },
        { Name: "Brazil", Id: 5 },
        { Name: "China", Id: 6 },
        { Name: "Russia", Id: 7 }
    ];
    */

    //db.albums = 1;
    //

        /*
    [
        {
            id: 1,
            album_cover: 'test.jpg',
            album_name: 'test album',
            artist_name: 'test artist',
            album_year: 2000,
            album_duration: 80,
            buy_date: '2000-07-07',
            purchase_price: 2350,
            storage_code: '3:31:12'
        },
        {
            id: 2,
            album_cover: 'test2.jpg',
            album_name: 'Тестовый альбом',
            artist_name: 'Тестовый артист',
            album_year: 2008,
            album_duration: 60,
            buy_date: '2009-01-08',
            purchase_price: 1830,
            storage_code: '1:89:4'
        }
    ];*/

    $.ajax({
        url: '/main/getData',
        dataType: 'json',
        success: function(data) {
            // какие-то действия с полученными данными data
            //console.log(data);
            //return data;
            db.albums = data;
            //return test;
            //console.log(db.albums);
        }
    });
    
}());



console.log(db.albums);