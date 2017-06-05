<div role="tabpanel" class="tab-pane" id="validation">

    <div class="panel panel-default marginTop20PX">
        <div class="panel-heading">
            <h3 class="panel-title">Валидация картинок</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group">

                <?php foreach ($admin["validationItems"] as $item) {?>
                    <li class="list-group-item">
                        <form class="row">
                            <div class="form-group col-sm-4">
                                <label for="exampleImg2">Картинка</label>
                                <img class="img-responsive" src="<?php echo ADMIN_IMAGES_PATH.$item[0];?>" alt="">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="exampleTextArea2">Заголовок</label>
                                <textarea class="form-control" rows="5" maxlength="300" id="exampleTextArea2" placeholder="Заготовок"><?php echo $item[2];?></textarea>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="exampleTextArea2">Категория</label>
                                <select class="form-control">
                                    <?php foreach ($admin["categories"] as $category) {?>
                                        <option
                                            <?php
                                                if ($item[1] == $category["id"]) echo 'selected';
                                            ?>
                                                value="<?php echo $category["id"];?>">
                                            <?php echo $category["name"];?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="exampleTextArea2">Одобрить</label>
                                <button type="button" class="btn btn-success" onclick="console.log(this);" data-toggle="modal" data-target=".save-itemV-modal-sm">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="exampleTextArea2">Удалить</label>
                                <button type="button" class="btn btn-danger"  onclick="console.log(this);" data-toggle="modal" data-target=".delete-itemV-modal-sm">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade delete-itemV-modal-sm" tabindex="-1" role="dialog" aria-labelledby="deleteItemSmallModalLabel">
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

<div class="modal fade save-itemV-modal-sm" tabindex="-1" role="dialog" aria-labelledby="deleteSaveSmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="saveItemModalLabel">Одобрить картинку</h4>
            </div>
            <form>
                <div class="modal-body deleteObject">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="console.log(this);" >Одобрить</button>
                </div>
            </form>
        </div>
    </div>
</div>