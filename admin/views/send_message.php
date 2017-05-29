<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Написать нам</h4>
            </div>
            <div class="modal-body">
                <form id="send_message_form">
                    <div class="form-group">
                        <label for="message-name" class="control-label">Имя</label>
                        <input type="text" class="form-control" id="message-name" name="name" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Сообщение (не более 300 символов)</label>
                        <textarea class="form-control" id="message-text" name="message" placeholder="Сообщение" maxlength="300"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <button id="send_message" type="button" class="btn btn-success">Отправить</button>
            </div>
        </div>
    </div>
</div>