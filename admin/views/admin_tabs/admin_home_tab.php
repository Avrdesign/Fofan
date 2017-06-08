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

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Баннеры для категорий</h3>
                </div>
                <div class="panel-body">
                    <div class="panel-group marginBottom0PX" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-success marginBottom15PX">
                            <div class="panel-heading" role="tab" id="head_all">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#content_all" aria-expanded="false" aria-controls="all">
                                        Все
                                    </a>
                                </h4>
                            </div>
                            <div id="content_all" class="panel-collapse collapse" role="tabpanel" aria-labelledby="all">
                                <div class="panel-body panel-info ">

                                    <form class="row">
                                        <div class="form-group marginBottom20PX">
                                            <label for="url_left" class="col-sm-2 control-label">Левый</label>
                                            <div class="col-sm-5 marginBottom20PX">
                                                <input type="text" class="form-control" id="url_left" name="url_left" value="<?php echo $admin["info"]['banners']['left']['url'];?>" placeholder="Ссылка на левый банер">
                                            </div>
                                            <div class="col-sm-5 marginBottom20PX">
                                                <input type="file" accept="image/jpeg,image/png,image/gif" name="img_left" onchange="bannerView.showImageSrc(this);" >
                                                <img class="img-responsive" src="../src/images/<?php echo $admin["info"]['banners']['left']['img'];?>" alt="">
                                                <button type="button" class="btn btn-warning positionAbsoluteLeftTop" onclick="bannerView.showImage(this);">
                                                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                                </button>
                                                <button type="button" class="btn btn-danger positionAbsoluteLeftTopRemove" onclick="bannerView.toRemove(this);" data-toggle="modal" data-target=".remove-banner-modal-sm">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group marginBottom20PX">
                                            <label for="url_center" class="col-sm-2 control-label">Центр</label>
                                            <div class="col-sm-5 marginBottom20PX">
                                                <input type="text" class="form-control" id="url_left" name="url_center" value="<?php echo $admin["info"]['banners']['center']['url'];?>" placeholder="Ссылка на центральный банер">
                                            </div>
                                            <div class="col-sm-5 marginBottom20PX">
                                                <input type="file" accept="image/jpeg,image/png,image/gif" name="img_center" onchange="bannerView.showImageSrc(this);">
                                                <img class="img-responsive" src="../src/images/<?php echo $admin["info"]['banners']['center']['img'];?>" alt="">
                                                <button type="button" class="btn btn-warning positionAbsoluteLeftTop" onclick="bannerView.showImage(this);">
                                                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                                </button>
                                                <button type="button" class="btn btn-danger positionAbsoluteLeftTopRemove" onclick="bannerView.toRemove(this);" data-toggle="modal" data-target=".remove-banner-modal-sm">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group marginBottom20PX">
                                            <label for="url_right" class="col-sm-2 control-label">Правый</label>
                                            <div class="col-sm-5 marginBottom20PX">
                                                <input type="text" class="form-control" id="url_right" name="url_right" value="<?php echo $admin["info"]['banners']['center']['url'];?>" placeholder="Ссылка на правый банер">
                                            </div>
                                            <div class="col-sm-5 marginBottom20PX">
                                                <input type="file" accept="image/jpeg,image/png,image/gif" name="img_right" onchange="bannerView.showImageSrc(this);">
                                                <img class="img-responsive" src="../src/images/<?php echo $admin["info"]['banners']['right']['img'];?>" alt="">
                                                <button type="button" class="btn btn-warning positionAbsoluteLeftTop" onclick="bannerView.showImage(this);">
                                                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                                </button>
                                                <button type="button" class="btn btn-danger positionAbsoluteLeftTopRemove" onclick="bannerView.toRemove(this);" data-toggle="modal" data-target=".remove-banner-modal-sm">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-success pull-right marginRight15PX" onclick="bannerView.sendBanners(this);">Сохрнить</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php foreach ($admin["categories"] as $category) {?>
                            <div class="panel panel-warning">
                                <div class="panel-heading" role="tab" id="head_<?php echo $category["name"]."_".$category["id"];?>">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#content_<?php echo $category["name"]."_".$category["id"];?>" aria-expanded="false" aria-controls="<?php echo $category["name"]."_".$category["id"];?>">
                                            <?php echo $category["name"];?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="content_<?php echo $category["name"]."_".$category["id"];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $category["name"]."_".$category["id"];?>">
                                    <div class="panel-body panel-info ">

                                        <form class="row">
                                            <div class="form-group marginBottom20PX">
                                                <label for="url_left" class="col-sm-2 control-label">Левый</label>
                                                <div class="col-sm-5 marginBottom20PX">
                                                    <input type="text" class="form-control" id="url_left" name="url_left" value="<?php echo $category["banners"]["left"]["url"];?>" placeholder="Ссылка на левый банер">
                                                </div>
                                                <div class="col-sm-5 marginBottom20PX">
                                                    <input type="file" accept="image/jpeg,image/png,image/gif" name="img_left" onchange="bannerView.showImageSrc(this);" >
                                                    <img class="img-responsive" src="../src/images/<?php echo $category["banners"]["left"]["img"];?>" alt="">
                                                    <button type="button" class="btn btn-warning positionAbsoluteLeftTop" onclick="bannerView.showImage(this);">
                                                        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger positionAbsoluteLeftTopRemove" onclick="bannerView.toRemove(this);" data-toggle="modal" data-target=".remove-banner-modal-sm">
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group marginBottom20PX">
                                                <label for="url_center" class="col-sm-2 control-label">Центр</label>
                                                <div class="col-sm-5 marginBottom20PX">
                                                    <input type="text" class="form-control" id="url_left" name="url_center" value="<?php echo $category["banners"]["center"]["url"];?>" placeholder="Ссылка на центральный банер">
                                                </div>
                                                <div class="col-sm-5 marginBottom20PX">
                                                    <input type="file" accept="image/jpeg,image/png,image/gif" name="img_center" onchange="bannerView.showImageSrc(this);">
                                                    <img class="img-responsive" src="../src/images/<?php echo $category["banners"]["center"]["img"];?>" alt="">
                                                    <button type="button" class="btn btn-warning positionAbsoluteLeftTop" onclick="bannerView.showImage(this);">
                                                        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger positionAbsoluteLeftTopRemove" onclick="bannerView.toRemove(this);" data-toggle="modal" data-target=".remove-banner-modal-sm">
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group marginBottom20PX">
                                                <label for="url_right" class="col-sm-2 control-label">Правый</label>
                                                <div class="col-sm-5 marginBottom20PX">
                                                    <input type="text" class="form-control" id="url_left" name="url_right" value="<?php echo $category["banners"]["right"]["url"];?>" placeholder="Ссылка на правый банер">
                                                </div>
                                                <div class="col-sm-5 marginBottom20PX">
                                                    <input type="file" accept="image/jpeg,image/png,image/gif" name="img_right" onchange="bannerView.showImageSrc(this);">
                                                    <img class="img-responsive" src="../src/images/<?php echo $category["banners"]["right"]["img"];?>" alt="">
                                                    <button type="button" class="btn btn-warning positionAbsoluteLeftTop" onclick="bannerView.showImage(this);">
                                                        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger positionAbsoluteLeftTopRemove" onclick="bannerView.toRemove(this);" data-toggle="modal" data-target=".remove-banner-modal-sm">
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-success pull-right marginRight15PX" onclick="bannerView.sendBanners(this);">Сохрнить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
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

    <div class="modal fade remove-banner-modal-sm" tabindex="-1" role="dialog" aria-labelledby="removeBannerSmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="removeBannerModalLabel">Удаление баннера</h4>
                </div>
                <form>
                    <div class="modal-body removeBannerObject">
                        Вы уверены, что хотите удалить баннер?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="bannerView.deleteBanner(this);">Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>