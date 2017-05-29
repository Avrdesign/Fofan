/**
 * Created by alexandrzanko on 5/26/17.
 */
(function(){

    var URLS = {
        SEND_MESSAGE:"admin/api/sendMessage.php",
        SEND_ITEM:"admin/api/addItem.php"
    }

    var ERRORS ={
        LENGTH_NAME_ERROR:"Слишком короткое имя",
        EMPTY_URL_ERROR:"Url не должен быть пустым",
        ADDRESS_URL_ERROR:"Картинки по этому адресу не существует",
        LENGTH_MESSAGE_ERROR:"Слишком короткое сообщение",
        FILE_EMPTY_ERROR:"Выберите картинку",
        SERVER_ERROR:"Произошла ошибка сервера"
    }

    var sendMessageButton = document.getElementById("send_message");
    sendMessageButton.addEventListener('click',function(){

       var name = document.getElementById('message-name').value;
       var message = document.getElementById('message-text').value;
       var form = document.getElementById('send_message_form');

       if (name.length < 2) {
           showAlert(this.parentNode, ERRORS.LENGTH_NAME_ERROR, 0);
           return;
       }

       if (message.length < 5){
            showAlert(this.parentNode, ERRORS.LENGTH_MESSAGE_ERROR, 0);
            return;
       }

       var hash = {"name":name,"message":message};

       sendData(URLS.SEND_MESSAGE, hash, this.parentNode, form);

    }, false);

    var sendNewItemButton = document.getElementById("send_new_item");
    sendNewItemButton.addEventListener('click',function(){

        var parent = this.parentNode;
        var title = document.getElementById('add_item_title').value;
        var categoryId = document.getElementById('add_item_category').value;

        var hash = {"title":title,"category_id":categoryId};

        var form = document.getElementById('add_item_form_file');
        var radios = document.getElementsByName('radio_status');
        var imageType;
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                imageType = radios[i].value;
                break;
            }
        }

        if (imageType == "url"){
            var url = document.getElementById("add_item_form_url").value;
            if(url == ""){
                showAlert(parent, ERRORS.EMPTY_URL_ERROR, 0);
                return;
            }else{
                var img = new Image();
                img.onload = function(){
                    hash[imageType] = url;
                    sendData(URLS.SEND_ITEM, hash, parent, form);
                };
                img.onerror = function(){
                    showAlert(parent, ERRORS.ADDRESS_URL_ERROR, 0);
                };
                img.src = url;
            }
        }else{
            var form = document.getElementById("add_item_form_file");
            var inputFile = form.getElementsByTagName("input")[0];
            var fileObj = inputFile.files[0];
            if (fileObj){
                var formData = new FormData(form);
                formData.append('title', hash['title']);
                formData.append('category_id', hash['category_id']);

                uploadImage(URLS.SEND_ITEM, formData, this.parentNode,form);
            }else{
                showAlert(parent, ERRORS.FILE_EMPTY_ERROR, 0);
            }
        }

    }, false);


    function uploadImage(url,formData, element, form){
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(data){
                if (data["status"]){
                    showAlert(element, data["message"], 1);
                    if (form.reset){
                        form.reset();
                    }
                    clearInputsFromDiv();
                }else{
                    showAlert(element, ERRORS.SERVER_ERROR, 0);
                }
            },
            error: function(){
                showAlert(element, ERRORS.SERVER_ERROR, 0);
            }
        });
    }


    function sendData(url,hash, element, form){
        $.ajax({
            url: url,
            method:'POST',
            data:hash,
            dataType:'json',
            success:function(data){
                if(data["status"]){
                    showAlert(element, data["message"], 1);
                    if (form.reset){
                        form.reset();
                    }
                    clearInputsFromDiv();
                }else{
                    showAlert(element, ERRORS.SERVER_ERROR, 0);
                }
            },
            error: function(){
                showAlert(element, ERRORS.SERVER_ERROR, 0);
            }
        });
    }

    function clearInputsFromDiv(){
        var divBlock = document.getElementById('add_item_form');
        var inputs = divBlock.getElementsByTagName('input');
        for(var i = 0; i < inputs.length; i++){
            inputs[i].value = "";
        }
    }
    
    function showAlert(element, text, status) {
        var alert = document.getElementsByClassName('alertShow')[0];
        if (alert){
            alert.parentNode.removeChild(alert);
        }
        alert = document.createElement('div');
        alert.setAttribute('role','alert');
        var viewClass = status ? "alert alert-dismissible alert-success alertShow" : "alert alert-dismissible alert-danger alertShow";
        alert.setAttribute('class',viewClass);
        var button = document.createElement('button');
        button.setAttribute('class','close');
        button.setAttribute('data-dismiss','alert');
        button.setAttribute('aria-label','Close');
        button.setAttribute('type','button');
        var span = document.createElement('span');
        span.setAttribute('aria-hidden','true');
        span.innerHTML = '&times;';
        button.appendChild(span);
        var strong = document.createElement('strong');
        var type = status ? "Успешно! " : "Ошибка! ";
        strong.innerHTML = type;
        alert.appendChild(button);
        alert.appendChild(strong);
        alert.innerHTML += text;
        element.insertBefore(alert, element.firstChild);
    }

    $(document).ready(function () {
        $('#textSuccessful').fadeOut(200, function () {
        });

        $(".navbar-toggle").on("click", function () {
            $(this).toggleClass("active");
        });
    });

})();
