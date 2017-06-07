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
                <input type="text" class="form-control" oninput="searchObject.searchItem(this.value);" placeholder="Поиск по заголовку ...">
            </div>

            <ul id="parentForSearchItems" class="list-group">

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
                        Вы уверены ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="itemViewSearch.deleteItemFlush();" >Удалить</button>
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
                        Вы уверены ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="itemViewSearch.saveItemFlush();" >Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>