<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Слайд {{$item->sorter_field}}</h3>
        <button type="submit" class="btn btn-primary pull-right remove-flat-item" data-id="{{$item->id_field}}"
                data-block="slider">Удалить
        </button>
    </div>
    <div class="box-body">

        <div class="form-group">
            <label>Изображение</label>
            <div class="dropzone">
                <div class="file-input">
                    <div class="file-preview">
                        <div class="input-group file-caption-main">

                            <div class="file-preview-frame">
                                <div class="kv-file-content">
                                    <img src="{{$item->slide_field->link}}" class="kv-preview-data file-preview-image"
                                         title="{{$item->slide_field->alt}}" alt="{{$item->slide_field->alt}}">
                                </div>
                                <div class="file-thumbnail-footer">
                                    <div class="file-footer-caption"
                                         title="{{$item->slide_field->alt}}">{{$item->slide_field->name_field}}
                                        <br><samp>(425.24 KB)</samp></div>
                                    <div class="file-actions">
                                        <input type="text" class="form-control alt-text" data-block="slider"
                                               data-type="images" data-id="{{$item->id_field}}" data-name="alt"
                                               value="{{$item->slide_field->alt}}">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="input-group-btn">
                <button type="button" tabindex="500" title="Clear selected files"
                        class="btn btn-default fileinput-remove fileinput-remove-button"><i
                            class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">Очистить</span></button>
                <button type="button" tabindex="500" title="Abort ongoing upload"
                        class="btn btn-default hide fileinput-cancel fileinput-cancel-button"><i
                            class="glyphicon glyphicon-ban-circle"></i> <span class="hidden-xs">Cancel</span></button>
                <div tabindex="500" class="btn btn-primary btn-file">
                    <i class="glyphicon glyphicon-folder-open"></i>&nbsp;
                    <span class="hidden-xs">Выбрать изображение …</span>
                    <input type="file" class="form-control file"
                           data-block="slider"
                           data-name="slide"
                           data-type="image"
                           data-id="{{$item->id_field}}">
                </div>
            </div>
        </div>


    </div>
</div>