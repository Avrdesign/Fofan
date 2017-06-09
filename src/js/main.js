/**
 * Created by alexandrzanko on 5/26/17.
 */
var ajaxObject = new AJAX_OBJECT();
var imagePath = "http://php.skotovod.com/src/images/";
var counterStep = 1;
var bannerCenter = document.getElementsByClassName('centerBanner')[0];
var parentActiveCategory = document.getElementsByClassName('data-categories')[0];
var activeCategory = parentActiveCategory.getElementsByClassName('active')[0].getAttribute('data-id');
window.addEventListener("scroll", addItems);
(function(){
    VK.init({apiId: 6067124, onlyWidgets: true});
    var vk_likes = document.getElementsByClassName('vkLike');
    for(var i = 0; i < vk_likes.length; i++){
        var id = vk_likes[i].getAttribute('id');
        VK.Widgets.Like(id, {type: 'mini', pageTitle: imagePath + id, pageDescription: imagePath + id}, id);
    }
})();

function addItemsToScreen(items){
    var parent = document.getElementById('content_items');
    for(var i = 0; i < items.length; i++){
        parent.innerHTML += getItemView(items[i]);
    }
    parent.appendChild(bannerCenter);

    var vk_likes = document.getElementsByClassName('vkLike');
    for(var i = 0; i < vk_likes.length; i++){
        var id = vk_likes[i].getAttribute('id');
        if (vk_likes[i].innerHTML == ""){
            VK.Widgets.Like(id, {type: 'mini', pageTitle: imagePath + id, pageDescription: imagePath + id}, id);
        }
    }
}

function getItemView(item){
    return '<div class="thumbnail backgroundColorBlack">'+
                '<img src="http://php.skotovod.com/zanko/src/images/'+item[0]+'" alt="...">'+
                '<div class="colorLightGray">'+
                    '<h4 class="text-center colorWhite">'+item[2]+'</h4>'+
                    '<div class="pull-right paddingLeftRight3PX">'+
                        '<span class="fontSize16PX">'+
                        '<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>'+
                            item[1] +
                        '</span>'+
                    '</div>'+
                    '<div id="'+item[0]+'" class="vkLike marginBottom15PX fontSize16PX paddingLeftRight3PX"></div>'+
                '</div>'+
            '</div>' ;
}


function addItems() {
    var toTop =
        document.body.scrollHeight - //полный размер с учётом прокрутки
        document.body.scrollTop - // текущая прокрутка
        window.innerHeight;  // текущий размер окна браузера

    if (toTop < 200) {
        window.removeEventListener("scroll", addItems);
        ajaxObject.getData('admin/api/addItemsToScreen.php',{"category_id":activeCategory,"step":counterStep},'json',
            function (data){
                if (data["status"]){
                    window.addEventListener("scroll", addItems);
                    counterStep++;
                    addItemsToScreen(data["items"]);
                }
            },
            function(x){
                console.log(x);
            }
        );
    }
};
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
    var sendNewItemButton = document.getElementById("send_new_item");

    addListenerForButtonsForm();
    
    function sendMessage(){
        removeListenerForButtonsForm();
        var parent = this.parentNode;
        var name = document.getElementById('message-name').value;
        var message = document.getElementById('message-text').value;
        var form = document.getElementById('send_message_form');

        if (name.length < 2) {
            showAlert(parent, ERRORS.LENGTH_NAME_ERROR, 0);
            addListenerForButtonsForm();
            return;
        }

        if (message.length < 5){
            showAlert(parent, ERRORS.LENGTH_MESSAGE_ERROR, 0);
            addListenerForButtonsForm();
            return;
        }
        sendData(URLS.SEND_MESSAGE, new FormData(form), parent, form);
    }

    function sendItem(){
        removeListenerForButtonsForm();
        var parent = this.parentNode;
        var form = document.getElementById('add_item_form');
        var radios = document.getElementsByName('radio_status');
        var formData = new FormData(form);
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
                addListenerForButtonsForm();
                return;
            }else{
                var img = new Image();
                img.onload = function(){
                    formData.append('type',imageType);
                    sendData(URLS.SEND_ITEM, formData, parent, form);
                };
                img.onerror = function(){
                    showAlert(parent, ERRORS.ADDRESS_URL_ERROR, 0);
                    addListenerForButtonsForm();
                };
                img.src = url;
            }
        }else{
            var inputFile = document.getElementById("input-file");
            var fileObj = inputFile.files[0];
            if (fileObj){
                formData.append('type',imageType);
                sendData(URLS.SEND_ITEM, formData, parent,form);
            }else{
                showAlert(parent, ERRORS.FILE_EMPTY_ERROR, 0);
                addListenerForButtonsForm();
            }
        }

    }

    function sendData(url,formData, element, form){
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(data){
                if (data["status"]){
                    showAlert(element, data["message"], 1);
                    if (form.reset){
                        form.reset();
                    }
                }else{
                    showAlert(element, ERRORS.SERVER_ERROR, 0);
                }
                addListenerForButtonsForm();
            },
            error: function(){
                showAlert(element, ERRORS.SERVER_ERROR, 0);
                addListenerForButtonsForm();
            }
        });
    }

    function addListenerForButtonsForm() {
        sendMessageButton.addEventListener('click', sendMessage, false);
        sendNewItemButton.addEventListener('click', sendItem, false);
    }

    function removeListenerForButtonsForm() {
        sendMessageButton.removeEventListener('click', sendMessage, false);
        sendNewItemButton.removeEventListener('click', sendItem, false);
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
function AJAX_OBJECT(){
    var self = this;

    self.postData = function(url,form,type,successFunction,errorFunction){
        $.ajax({
            url:url,
            data:form,
            method:'POST',
            dataType:type,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success:successFunction,
            error:errorFunction
        });
    }

    self.getData = function(url,data,type,successFunction,errorFunction){
        $.ajax({
            url:url,
            data:data,
            type:'GET',
            dataType:type,
            success:successFunction,
            error:errorFunction
        });
    }

}



