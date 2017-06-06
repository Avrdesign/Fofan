var alertObject = new AlertObject();
var ajaxObject = new AjaxObject();
var deleteObject = new DeleteObject();
var renameObject = new RenameObject();
var saveObject = new SaveObject();

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
                deleteItem.parentNode.removeChild(deleteItem);
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