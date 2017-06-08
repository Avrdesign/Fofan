var alertObject = new AlertObject();
var ajaxObject = new AjaxObject();
var deleteObject = new DeleteObject();
var renameObject = new RenameObject();
var saveObject = new SaveObject();
var searchObject = new SearchObject();
var itemViewSearch = new ItemView();
var bannerView = new BannersItem();


function BannersItem(){
    var self = this;
    var removeImage;
    var imgChange;

    self.showImage = function(element){
        var parent = element.parentNode;
        var inputFile = parent.getElementsByTagName('input')[0];
        inputFile.click();
    }

    self.showImageSrc = function(input) {
        if (input.files && input.files[0]) {
            var parent = input.parentNode;
            var img = parent.getElementsByTagName('img')[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                img.src =  e.target.result ;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    self.toRemove = function(element){
        var parent = element.parentNode;
        var inputName = parent.getElementsByTagName('input')[0].getAttribute('name');
        var arr = inputName.split('_');
        var position = arr[arr.length-1];

        var form = parent.parentNode.parentNode;
        var catId = (form.parentNode.parentNode).getAttribute('aria-labelledby');
        if(catId != 'all'){
            var arr = catId.split('_');
            catId = arr[arr.length-1];
        }
        console.log('catId = ' + catId);
        console.log('position = ' + position);
        removeImage = new FormData();
        removeImage.append('form','remove_banner');
        removeImage.append('cat_id',catId);
        removeImage.append('pos',position);
        imgChange = parent.getElementsByTagName('img')[0];
    }

    self.sendBanners = function(element){

        var form = element.parentNode;
        var catId = (form.parentNode.parentNode).getAttribute('aria-labelledby');
        if(catId != 'all'){
            var arr = catId.split('_');
            catId = arr[arr.length-1];
        }
        var formData = new FormData(form);
        formData.append('form','save_banners');
        formData.append('id',catId);
        ajaxObject.postData(
            'api/adminApi.php',
            formData,
            'json',
            function (data) {
                console.log(data);
                if(data["status"]){
                    alertObject.showAlert("success", 'Данные успешно сохранены');

                }else{
                    alertObject.showAlert("danger", 'Ошибка сервера');
                }
            },
            function (x, y, z) {
                alertObject.showAlert("danger", 'Ошибка сервера');
            }
        );
    }

    self.deleteBanner = function(element){
       if (removeImage){
           ajaxObject.postData(
               'api/adminApi.php',
               removeImage,
               'json',
               function (data) {
                   console.log(data);
                   if(data["status"]){
                       alertObject.showAlert("success", 'Данные успешно удалены');
                       if(imgChange){
                           imgChange.src = '../src/images/picture.png';
                       }
                   }else{
                       alertObject.showAlert("danger", 'Ошибка сервера');
                   }
               },
               function (x, y, z) {
                   alertObject.showAlert("danger", 'Ошибка сервера');
               }
           );
       }else{
           console.log("Error");
       }
    }

}

function SearchObject(){
    var self = this;
    var typing = false;
    var timer;

    self.searchItem = function(value) {
        typing = true;
        if (timer) {
            clearTimeout(timer);
        }
        if (value) {
            timer = setTimeout(function () {
                var form = new FormData();
                form.append('form', 'search_item');
                form.append('text', value);
                ajaxObject.postData(
                    'api/adminApi.php',
                    form,
                    'json',
                    function (data) {
                        if(data["status"]){
                            itemViewSearch.initSearchView(data["items"]);
                        }
                    },
                    function (x, y, z) {
                        alertObject.showAlert("danger", 'Ошибка сервера');
                    }
                );
            }, 1000);
        }
    }
}

function ItemView(){

    var self = this;
    var deleteItemValidation;
    var formData;
    var imgPath = "../src/images/";
    var parentView = document.getElementById('parentForSearchItems');

    self.initSearchView = function (items) {
        var inner = "";
        if (parentView){
            parentView.innerHTML = "";
            for(var i = 0; i < items.length; i++){
                var item = items[i]["item"];
                var category = items[i]["category"];
                inner += createView(category["id"], item[0], item[2]);
                parentView.innerHTML = inner;
            }
        }
    }

    self.createBannersView = function (cat_id, cat_name){
        return '<div class="panel panel-warning">'+
                    '<div class="panel-heading" role="tab" id="head_' + cat_name + '_' + cat_id+'">'+
                        '<h4 class="panel-title">'+
                            '<a role="button" data-toggle="collapse" data-parent="#accordion" href="#content_' + cat_name + '_' + cat_id+'" aria-expanded="false" aria-controls="' + cat_name + '_' + cat_id+'">'+
                                cat_name+
                            '</a>'+
                        '</h4>'+
                    '</div>'+
                    '<div id="content_' + cat_name + '_' + cat_id+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="' + cat_name + '_' + cat_id+'">'+
                        '<div class="panel-body panel-info ">'+
                            '<form class="row">'+
                                '<div class="form-group marginBottom20PX">'+
                                    '<label for="url_left" class="col-sm-2 control-label">Левый</label>'+
                                    '<div class="col-sm-5 marginBottom20PX">'+
                                        '<input type="text" class="form-control" id="url_left" name="url_left" placeholder="Ссылка на левый банер">'+
                                    '</div>'+
                                    '<div class="col-sm-5 marginBottom20PX">'+
                                        '<input type="file" accept="image/jpeg,image/png,image/gif" name="img_left" onchange="bannerView.showImageSrc(this);">'+
                                        '<img class="img-responsive" src="../src/images/picture.png" alt="">'+
                                        '<button type="button" class="btn btn-warning positionAbsoluteLeftTop" onclick="bannerView.showImage(this);">'+
                                            '<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'+
                                        '</button>'+
                                        '<button type="button" class="btn btn-danger positionAbsoluteLeftTopRemove" onclick="console.log(this);" data-toggle="modal" data-target=".remove-banner-modal-sm">'+
                                            '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>'+
                                        '</button>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group marginBottom20PX">'+
                                    '<label for="url_center" class="col-sm-2 control-label">Центр</label>'+
                                    '<div class="col-sm-5 marginBottom20PX">'+
                                        '<input type="text" class="form-control" id="url_center" name="url_center" placeholder="Ссылка на центральный банер">'+
                                    '</div>'+
                                    '<div class="col-sm-5 marginBottom20PX">'+
                                        '<input type="file" accept="image/jpeg,image/png,image/gif" name="img_center" onchange="bannerView.showImageSrc(this);">'+
                                        '<img class="img-responsive" src="../src/images/picture.png" alt="">'+
                                        '<button type="button" class="btn btn-warning positionAbsoluteLeftTop" onclick="bannerView.showImage(this);">'+
                                            '<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'+
                                        '</button>'+
                                        '<button type="button" class="btn btn-danger positionAbsoluteLeftTopRemove" onclick="console.log(this);" data-toggle="modal" data-target=".remove-banner-modal-sm">'+
                                            '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>'+
                                        '</button>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group marginBottom20PX">'+
                                        '<label for="url_right" class="col-sm-2 control-label">Правый</label>'+
                                        '<div class="col-sm-5 marginBottom20PX">'+
                                            '<input type="text" class="form-control" id="url_left" name="url_right" placeholder="Ссылка на правый банер">'+
                                        '</div>'+
                                        '<div class="col-sm-5 marginBottom20PX">'+
                                            '<input type="file" accept="image/jpeg,image/png,image/gif" name="img_right" onchange="bannerView.showImageSrc(this);">'+
                                            '<img class="img-responsive" src="../src/images/picture.png" alt="">'+
                                            '<button type="button" class="btn btn-warning positionAbsoluteLeftTop" onclick="bannerView.showImage(this);">'+
                                                '<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'+
                                            '</button>'+
                                            '<button type="button" class="btn btn-danger positionAbsoluteLeftTopRemove" onclick="console.log(this);" data-toggle="modal" data-target=".remove-banner-modal-sm">'+
                                                '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>'+
                                            '</button>'+
                                        '</div>'+
                                '</div>'+
                                '<button type="button" class="btn btn-success pull-right marginRight15PX" onclick="bannerView.sendBanners(this);">Сохрнить</button>'+
                            '</form>'+
                        '</div>'+
                    '</div>'+
            '</div>';
    }


    function createView(cat_id, img, title){
        return '<li class="list-group-item">'+
            '<form class="row">'+
                '<input type="hidden" name="cat_id" value="'+cat_id+'">'+
                '<input type="hidden" name="item_img" value="'+img+'">'+
                '<div class="form-group col-sm-5">'+
                    '<label for="exampleImg2">Картинка</label>'+
                    '<img class="img-responsive" src="'+imgPath+img+'" alt="">'+
                '</div>'+
                '<div class="form-group col-sm-5">'+
                    '<label for="exampleTextArea2">Заголовок</label>'+
                    '<textarea class="form-control" name="title" rows="5" maxlength="300" id="exampleTextArea2" placeholder="Заготовок">'+title+'</textarea>'+
                '</div>'+
                '<div class="form-group col-sm-1">'+
                    '<label for="exampleTextArea2">Сохранить</label>'+
                    '<button type="button" class="btn btn-success" onclick="itemViewSearch.saveItem(this.parentNode.parentNode);" data-toggle="modal" data-target=".save-item-modal-sm">'+
                        '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>'+
                    '</button>'+
                '</div>'+
                '<div class="form-group col-sm-1">'+
                    '<label for="exampleTextArea2">Удалить</label>'+
                    '<button type="button" class="btn btn-danger" onclick="itemViewSearch.deleteItem(this.parentNode.parentNode);" data-toggle="modal" data-target=".delete-item-modal-sm">'+
                        '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>'+
                    '</button>'+
                '</div>'+
            '</form>'+
        '</li>';
    }
    self.saveItem = function(form){
        formData = new FormData(form);
        formData.append('form','save_item');
    }
    self.deleteItem = function(form){
        formData = new FormData(form);
        deleteItemValidation = form.parentNode;
        formData.append('form','delete_item');
    }

    self.saveItemFlush = function(){
        if(formData){
            ajaxObject.postData(
                'api/adminApi.php',
                formData,
                'json',
                function (data) {
                    console.log(data);
                    if(data["status"]){
                        alertObject.showAlert("success", 'Данные успешно сохранены');
                    }else{
                        alertObject.showAlert("danger", 'Ошибка сервера');
                    }
                },
                function (x, y, z) {
                    alertObject.showAlert("danger", 'Ошибка сервера');
                }
            );
        }
    }

    self.deleteItemFlush = function(){
        if(formData){
            ajaxObject.postData(
                'api/adminApi.php',
                formData,
                'json',
                function (data) {
                    console.log(data);
                    if(data["status"]){
                        alertObject.showAlert("success", 'Данные успешно удалены');
                        deleteItemValidation.parentNode.removeChild(deleteItemValidation);
                    }else{
                        alertObject.showAlert("danger", 'Ошибка сервера');
                    }
                },
                function (x, y, z) {
                    alertObject.showAlert("danger", 'Ошибка сервера');
                }
            );
        }
    }
}

function SaveObject() {
    var self = this;
    var deleteItemValidation;
    var formData;

    self.saveValidateItem  = function (element){
        var form = element.parentNode.parentNode;
        deleteItemValidation = form.parentNode;
        formData = new FormData(form);
        formData.append('form','validation_item_save');
        var modal = document.getElementsByClassName('saveValidationObject')[0];
        modal.innerHTML = "Одобрить ?";
    }

    self.saveValidateItemFlush  = function (){
        if (formData){
            ajaxObject.postData(
                'api/adminApi.php',
                formData,
                'json',
                function(data){
                    if(data['status']){
                        alertObject.showAlert("success",'Картинка одобрена');
                        if (deleteItemValidation){
                            deleteItemValidation.parentNode.removeChild(deleteItemValidation);
                        }
                    }else{
                        alertObject.showAlert("danger",'Ошибка сервера');
                    }
                },
                function(x,y,z){
                    alertObject.showAlert("danger",'Ошибка сервера');
                }
            );
        }
    }

}
function DeleteObject(){
    var self = this;
    var deleteItem;
    var formData;

    self.delete = function(element){
        deleteItem = element.parentNode;
        var categoryId = deleteItem.getAttribute('data-id');
        var categoryName = element.parentNode.getElementsByClassName('category-name')[0].innerHTML;
        var modal = document.getElementsByClassName('deleteObject')[0];
        modal.innerHTML = "Вы уверен, что хотите удалить "+categoryName + " ?";
        modal.parentNode.setAttribute('data-id',categoryId);
    }

    self.deleteValidateItem  = function (element){
        var form = element.parentNode.parentNode;
        deleteItem = form.parentNode;
        formData = new FormData(form);
        formData.append('form','validation_item_remove');
        var modal = document.getElementsByClassName('deleteValidationObject')[0];
        modal.innerHTML = "Вы уверен, что хотите удалить эту картинку ?";
    }

    self.deleteValidateItemFlush  = function (){
        if (formData){
            ajaxObject.postData(
                'api/adminApi.php',
                formData,
                'json',
                function(data){
                    if(data['status']){
                        alertObject.showAlert("success",'Картинка удалена');
                        if (deleteItem){
                            deleteItem.parentNode.removeChild(deleteItem);
                        }
                    }else{
                        alertObject.showAlert("danger",'Ошибка сервера');
                    }
                },
                function(x,y,z){
                    alertObject.showAlert("danger",'Ошибка сервера');
                }
            );
        }
    }

    self.deleteFlush = function(element){
        var id = element.parentNode.parentNode.getAttribute('data-id');
        var form = new FormData();
            form.append('form','delete_category');
            form.append('id',id);
        ajaxObject.postData(
            'api/adminApi.php',
            form,
            'json',
            success,
            error
        );
    }

    function success(data){
        if(data['status']){
            alertObject.showAlert("success",data['message']);
            if (deleteItem){
                var id = 'head_' + data['category']['name'] + '_' + data['category']['id'];
                var tempContainer = document.getElementById(id).parentNode;
                deleteItem.parentNode.removeChild(deleteItem);
                tempContainer.parentNode.removeChild(tempContainer);
            }
        }else{
            alertObject.showAlert("danger",data['message']);
        }
    }

    function error(x,y,z){
        console.log(x);
        alertObject.showAlert("danger"," Ошибка сервера");
    }
}
function RenameObject(){
    var self = this;
    var renameItem;

    self.changePassword = function (element) {
        var form = element.parentNode.parentNode.parentNode;
        var password = document.getElementById('inputPassword');
        var newPassword = document.getElementById('inputNewPassword');
        var confirmPassword = document.getElementById('inputNewConfirmPassword');

        if(password.value == '' || newPassword.value == ''){
            alertObject.showAlert("danger",'Пароль не может быть пустым');
            return;
        }

        if(newPassword.value != confirmPassword.value){
            alertObject.showAlert("danger",'Пароли не совпадают');
            return;
        }

        var formData = new FormData(form);
        formData.append('form','change_password');
        ajaxObject.postData(
            "api/adminApi.php",
            formData,
            'json',
            function(data){
                var type = data['status'] ? "success" : "danger";
                alertObject.showAlert(type,data['message']);
            },
            function(x,y,z){
                alertObject.showAlert("danger"," Ошибка сервера");
            }
        );
    }

    self.changeInfo = function(element){
        var form = element.parentNode.parentNode.parentNode;
        var formData = new FormData(form);
        formData.append('form','change_info');
        ajaxObject.postData(
            "api/adminApi.php",
            formData,
            'json',
            function(data){
                var type = data['status'] ? "success" : "danger";
                alertObject.showAlert(type,data['message']);
                document.getElementById('emailUser').innerHTML = data['email'];
            },
            function(x,y,z){
                alertObject.showAlert("danger"," Ошибка сервера");
            }
        );
    }

    self.rename = function(element){
        var categoryId = element.parentNode.getAttribute('data-id');
        var parent = element.parentNode;
        renameItem = parent.getElementsByClassName('category-name')[0];
        var modalBody = document.getElementsByClassName('renameObject')[0];
        modalBody.parentNode.setAttribute('data-id',categoryId);
    }

    self.renameFlush = function(element){
        var id = element.parentNode.parentNode.getAttribute('data-id');
        var name = element.parentNode.parentNode.getElementsByTagName('input')[0].value;
        if (name.length == 0){
            alertObject.showAlert("danger",'Имя не должно быть пустым');
            return;
        }
        var form = new FormData();
        form.append('form','rename_category');
        form.append('id',id);
        form.append('name',name);
        ajaxObject.postData(
            'api/adminApi.php',
            form,
            'json',
            success,
            error
        );
    }

    function success(data){
        if(data['status']){
            alertObject.showAlert("success",data['message']);
            if (renameItem){
                renameItem.innerHTML = data["name"];
            }
        }else{
            alertObject.showAlert("danger",data['message']);
        }
    }

    function error(x,y,z){
        alertObject.showAlert("danger"," Ошибка сервера");
    }
}
function AlertObject() {
    var self = this;
    var view = document.createElement('div');
    view.setAttribute('role', 'alert');
    var button = document.createElement('button');
    button.setAttribute('class', 'close');
    button.setAttribute('type', 'button');
    button.setAttribute('data-dismiss', 'alert');
    button.setAttribute('aria-label', 'Close');
    var span = document.createElement('span');
    span.setAttribute('aria-hidden', 'true');
    span.innerHTML = '&times;';
    button.appendChild(span);
    var strong = document.createElement('strong');

    self.showAlert = function(status, message){
        view.innerHTML = '';
        view.setAttribute('class', 'alert-dismissible navbar-fixed-bottom container alert alert-' + status);
        view.appendChild(button);
        view.appendChild(strong);
        strong.innerHTML = status == 'success' ? 'Успешно! ' : 'Ошибка! ';
        view.innerHTML += message;
        document.body.appendChild(view);
    }
}
function AjaxObject(){

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
}

var buttonAddCategory = document.getElementById('add_category');
    buttonAddCategory.addEventListener('click',addCategory,false);

function addCategory(){
    var form = new FormData(this.parentNode.parentNode);
    form.append('form','add_category');
    ajaxObject.postData(
        'api/adminApi.php',
        form,
        'json',
        function(data){
            if(data['status']){
                alertObject.showAlert("success",data['message']);
                addItemToCategoryList(data['category']);
                document.getElementById('accordion').innerHTML += itemViewSearch.createBannersView(data['category']['id'],data['category']['name']);
            }else{
                alertObject.showAlert("danger",data['message']);
            }
        },
        function(x,y,z){
            alertObject.showAlert("danger"," Ошибка сервера");
        }
    );
}
function addItemToCategoryList(category){

    var categoryView = document.createElement('li');
        categoryView.setAttribute('class', 'list-group-item');
        categoryView.setAttribute('data-id', category['id']);


    var buttonRemove = document.createElement('button');
        buttonRemove.setAttribute('type', 'button');
        buttonRemove.setAttribute('class', 'btn btn-danger btn-xs pull-right marginLeft5PX');
        buttonRemove.setAttribute('onclick', 'deleteObject.delete(this)');
        buttonRemove.setAttribute('data-toggle', "modal");
        buttonRemove.setAttribute('data-target', ".delete-category-modal-sm");
    var spanButtonRemove = document.createElement('span');
        spanButtonRemove.setAttribute('class', 'glyphicon glyphicon-remove');
        spanButtonRemove.setAttribute('aria-hidden', true);
        buttonRemove.appendChild(spanButtonRemove);
        categoryView.appendChild(buttonRemove);

    var buttonRename = document.createElement('button');
        buttonRename.setAttribute('type', 'button');
        buttonRename.setAttribute('class', 'btn btn-warning btn-xs pull-right marginLeft5PX');
        buttonRename.setAttribute('onclick', 'renameObject.rename(this)');
        buttonRename.setAttribute('data-toggle', "modal");
        buttonRename.setAttribute('data-target', ".rename-category-modal-sm");
    var spanButtonRename = document.createElement('span');
        spanButtonRename.setAttribute('class', 'glyphicon glyphicon-pencil');
        spanButtonRename.setAttribute('aria-hidden', true);
        buttonRename.appendChild(spanButtonRename);
        categoryView.appendChild(buttonRename);

    var span = document.createElement('span');
        span.setAttribute('class', 'badge');
        span.innerHTML = '0';
        categoryView.appendChild(span);

    var spanName = document.createElement('span');
        spanName.setAttribute('class', 'category-name');
        spanName.innerHTML = category['name'];
        categoryView.appendChild(spanName);


    document.getElementById('categories').appendChild(categoryView);
}