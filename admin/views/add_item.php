<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Добавить картинку</h4>
            </div>
            <div class="modal-body">
                <form id="add_item_form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label">URL картинки</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" aria-label="..." name="radio_status" value="url" checked="checked">
                            </span>
                            <input id="add_item_form_url" name="url" type="text" class="form-control" aria-label="..." placeholder="URL картинки">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Загрузить файл</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" value="file" aria-label="..." name="radio_status">
                            </span>
                            <input id="input-file" accept="image/jpeg,image/png,image/gif" type="file" name="file" class="form-control" aria-label="...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Категория</label>
                        <select id="add_item_category" class="form-control" name="category">
                            <?php foreach ($categories as $category) {?>
                                <option value="<?php echo $category["id"];?>">
                                    <?php echo $category["name"];?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add_item_title" class="control-label">Подпись (не более 300 символов)</label>
                        <textarea class="form-control" id="add_item_title" placeholder="Подпись" maxlength="300" name="title"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <button id="send_new_item" type="button" class="btn btn-success">Отправить</button>
            </div>
        </div>
    </div>
</div>