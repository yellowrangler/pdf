pdfApp.service('dialogService', function () {

    this.showDialogAlert = function (elm, title, msg, dclass) {
        var msgStr = "";

        msgStr = msgStr +"<div class='"+dclass+"'><br /><center><div style='padding:10px;word-wrap:break-word;'>"+msg;
        msgStr = msgStr +"</div></center></div>";

        elm.html(msgStr);

        elm.dialog({
            height: 300,
            title:title,
            width:800,
            draggable: true,
            open:function () {
                var closeBtn = $('.ui-dialog-titlebar-close');
                closeBtn.append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span><span class="ui-button-text">close</span>');
            },
            modal: true
        });
    };

});