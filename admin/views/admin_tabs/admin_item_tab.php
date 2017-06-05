<div role="tabpanel" class="tab-pane" id="item">
    <div class="panel panel-default marginTop20PX">
        <div class="panel-heading">
            <h3 class="panel-title">Изменить картинку</h3>
        </div>

        <div class="panel-body">
            <div class="input-group marginBottom15PX">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </div>
                <input type="text" class="form-control" placeholder="Поиск по заголовку ...">
            </div>

            <ul class="list-group">
                <li class="list-group-item">
                    <form class="row">
                        <div class="form-group col-sm-5">
                            <label for="exampleImg2">Картинка</label>
                            <img class="img-responsive" src="https://www.walldevil.com/wallpapers/w03/867046-black-cars-cars-porsche-porsche-carrera-gt-sports-cars-vehicles.jpg" alt="">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="exampleTextArea2">Заголовок</label>
                            <textarea class="form-control" rows="5" maxlength="300" id="exampleTextArea2" placeholder="Заготовок"></textarea>
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="exampleTextArea2">Сохранить</label>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".save-item-modal-sm">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="exampleTextArea2">Удалить</label>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".delete-item-modal-sm">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>
                </li>
            </ul>

        </div>

    </div>

    <div class="modal fade delete-item-modal-sm" tabindex="-1" role="dialog" aria-labelledby="deleteItemSmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="deleteItemModalLabel">Удаление картинки</h4>
                </div>
                <form>
                    <div class="modal-body deleteObject">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="console.log(this);" >Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade save-item-modal-sm" tabindex="-1" role="dialog" aria-labelledby="deleteSaveSmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="saveItemModalLabel">Сохранить картинку</h4>
                </div>
                <form>
                    <div class="modal-body deleteObject">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="console.log(this);" >Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>