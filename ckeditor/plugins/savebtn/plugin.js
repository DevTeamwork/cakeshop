

CKEDITOR.plugins.add('savebtn', {
    icons: 'savebtn',
    init: function (editor) {
        editor.addCommand('savecontent', {

            exec: function (editor) {

                //get the text from ckeditor you want to save
                var data = editor.getData();
                //get the current url
                var page = document.URL;
                //get the current pk
                var iid = editor.container.data("id");
                //get the table 
                var table = editor.container.data("table");
                //get the column
                var col = editor.container.data("column");
                //get the column
                var pk = editor.container.data("pk");
                //path to the ajaxloader gif
                loading_icon = CKEDITOR.basePath + 'plugins/savebtn/icons/loader.gif';

                //css style for setting the standard save icon. We need this when the request is completed.
                normal_icon = $('.cke_button__savebtn_icon').css('background-image');

                //replace the standard save icon with the ajaxloader icon. We do this with css.
                $('.cke_button__savebtn_icon').css("background-image", "url(" + loading_icon + ")");

                //Now we are ready to post to the server...
                $.ajax({
                    url: editor.config.saveSubmitURL,//the url to post at... configured in config.js
                    type: 'POST',
                    data: { sValue: data, id: editor.name, page: page, sID: iid, sTable: table, sColumn: col, iColumn: pk },//editor.name contains the id of the current editable html tag
                })
                .done(function (response) {
                    console.log("success", response);
                    //alert('id: '+editor.name+' \nurl: '+page+' \ntext: '+data);

                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                    $('.cke_button__savebtn_icon').css("background-image", normal_icon);
                });


            }
        });


        //add the save button to the toolbar

        editor.ui.addButton('savebtn', {
            label: 'Save',
            command: 'savecontent',
            toolbar: 'insert'
        });


    }
});