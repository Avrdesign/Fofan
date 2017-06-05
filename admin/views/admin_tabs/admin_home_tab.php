<div role="tabpanel" class="tab-pane active" id="home">
    <div class="row marginTop20PX">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Категории
                        <a href="#" class="pull-right fontSize12PX" data-toggle="modal" data-target=".add-category-modal-sm">
                            Добавить категорию
                        </a>
                    </h3>

                </div>
                <div class="panel-body">
                    <ul id="categories" class="list-group">
                        <li class="list-group-item">
                            <span class="badge"><?php echo $admin["count"];?></span>
                            Все
                        </li>
                        <?php foreach ($admin["categories"] as $category) {?>
                            <li class="list-group-item" data-id="<?php echo $category["id"];?>">
                                <button type="button" class="btn btn-danger btn-xs pull-right marginLeft5PX" onclick="deleteObject.delete(this);" data-toggle="modal" data-target=".delete-category-modal-sm">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-warning btn-xs pull-right marginLeft5PX" onclick="renameObject.rename(this);" data-toggle="modal" data-target=".rename-category-modal-sm">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </button>
                                <span class="badge marginTop2PX"><?php echo $category["count"];?></span>
                                <span class="category-name"><?php echo $category["name"];?></span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    <div class="modal fade add-category-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Создание категории</h4>
                </div>
                <form>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Название:</label>
                                <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Название">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button id="add_category" type="button" class="btn btn-success" data-dismiss="modal">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade rename-category-modal-sm" tabindex="-1" role="dialog" aria-labelledby="renameSmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Переименовать категорию</h4>
                </div>
                <form>
                    <div class="modal-body renameObject">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Название:</label>
                            <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Название">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="renameObject.renameFlush(this);">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade delete-category-modal-sm" tabindex="-1" role="dialog" aria-labelledby="deleteSmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="deleteModalLabel">Удаление категории</h4>
                </div>
                <form>
                    <div class="modal-body deleteObject">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteObject.deleteFlush(this);" >Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>