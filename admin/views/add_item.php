<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Добавить картинку</h4>
            </div>
            <div class="modal-body">
                <div id="add_item_form">
                    <div class="form-group">
                        <label class="control-label">URL картинки</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" aria-label="..." name="radio_status" value="url" checked="checked">
                            </span>
                            <input id="add_item_form_url" type="text" class="form-control" aria-label="..." placeholder="URL картинки">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Загрузить файл</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" value="file" aria-label="..." name="radio_status">
                            </span>
                            <form id="add_item_form_file" enctype="multipart/form-data">
                                <input accept="image/jpeg,image/png,image/gif" type="file" name="image" class="form-control" aria-label="...">
                            </form>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Категория</label>
                        <select id="add_item_category" class="form-control" name="category">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add_item_title" class="control-label">Подпись (не более 300 символов)</label>
                        <textarea class="form-control" id="add_item_title" placeholder="Подпись" maxlength="300"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <button id="send_new_item" type="button" class="btn btn-success">Отправить</button>
            </div>
        </div>
    </div>
</div>