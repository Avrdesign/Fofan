<div role="tabpanel" class="tab-pane" id="settings">
    <div class="row marginTop20PX">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Изменить инфо</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputTitle" class="col-sm-3 control-label">Заглавие</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputTitle" name="title" value="<?php echo $admin["info"]["title"];?>" placeholder="Заглавие">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSubTitle" class="col-sm-3 control-label">Подзаголовок</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputSubTitle" name="sub_title" value="<?php echo $admin["info"]["sub_title"];?>" placeholder="Подзаголовок">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="inputEmail3" name="email"  value="<?php echo $admin["info"]["email"];?>" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="button" class="btn btn-success" onclick="renameObject.changeInfo(this);">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Изменить пароль</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-3 control-label">Пароль</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Пароль">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNewPassword" class="col-sm-3 control-label">Новый пароль</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="new_password" id="inputNewPassword" placeholder="Новый пароль">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNewConfirmPassword" class="col-sm-3 control-label">Повторить пароль</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="confirm_password" id="inputNewConfirmPassword" placeholder="Повторить пароль">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="button" class="btn btn-success" onclick="renameObject.changePassword(this);">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>