@push('styles')
<style>
    .close {
        position: absolute;
        top: 0;
        right: 0;
        padding: 15px;
    }
    .mini-img {
        height : 50px
    }
</style>
@endpush
<!-- The Modal -->
<div class="modal fade" id="form-testimoni-modal"   data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <form action="" id="formFAQ" v-on:submit.prevent="submitForm()" enctype="multipart/form-data">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">@{{ !isEdit ? 'Tambah Testimoni' : 'Edit Testimoni' }}</h4>
                <button type="button" @click="reset" class="close text-right" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" v-model="testimoni.title" required>
                        </div>
                        <div class="form-group">
                            <label for="">Konten</label>
                            <div class="">
                                <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">

                                <div class="btn-group dropdown" dropdown>
                                    <a class="btn btn-default" dropdown-toggle data-toggle="dropdown" tooltip="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="#" data-edit="fontSize 5" style="font-size:24px">Huge</a></li>
                                    <li><a href="#" data-edit="fontSize 3" style="font-size:18px">Normal</a></li>
                                    <li><a href="#" data-edit="fontSize 1" style="font-size:14px">Small</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group" style="margin-bottom : 10px">
                                    <a class="btn btn-default" data-edit="bold" tooltip="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                    <a class="btn btn-default" data-edit="italic" tooltip="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                    <a class="btn btn-default" data-edit="strikethrough" tooltip="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                    <a class="btn btn-default" data-edit="underline" tooltip="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                </div>
                                <div class="btn-group" style="margin-bottom : 10px">
                                    <a class="btn btn-default" data-edit="insertunorderedlist" tooltip="Bullet list"><i class="fa fa-list-ul"></i></a>
                                    <a class="btn btn-default" data-edit="insertorderedlist" tooltip="Number list"><i class="fa fa-list-ol"></i></a>
                                    <a class="btn btn-default" data-edit="outdent" tooltip="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                    <a class="btn btn-default" data-edit="indent" tooltip="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                </div>
                                <div class="btn-group" style="margin-bottom : 10px">
                                    <a class="btn btn-default" data-edit="justifyleft" tooltip="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                    <a class="btn btn-default" data-edit="justifycenter" tooltip="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                    <a class="btn btn-default" data-edit="justifyright" tooltip="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                    <a class="btn btn-default" data-edit="justifyfull" tooltip="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                </div>
                                <div class="btn-group dropdown" dropdown  style="margin-bottom : 10px">
                                    <a class="btn btn-default" dropdown-toggle tooltip="Hyperlink"><i class="fa fa-link"></i></a>
                                    <div class="dropdown-menu">
                                    <div class="input-group m-l-xs m-r-xs">
                                        <input class="form-control input-sm" id="LinkInput" placeholder="URL" type="text" data-edit="createLink"/>
                                        <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="button">Add</button>
                                        </div>
                                    </div>
                                    </div>
                                    <a class="btn btn-default" data-edit="unlink" tooltip="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                                </div>

                                <div class="btn-group"  style="margin-bottom : 10px">
                                    <a class="btn btn-default" tooltip="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                    <input type="file" data-edit="insertImage" style="position:absolute; opacity:0; width:41px; height:34px" />
                                </div>
                                <div class="btn-group"  style="margin-bottom : 10px">
                                    <a class="btn btn-default" data-edit="undo" tooltip="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                    <a class="btn btn-default" data-edit="redo" tooltip="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                </div>
                                </div>
                                <div ui-jq="wysiwyg" class="form-control" style="overflow:scroll;height:200px;max-height:200px" id="inputJawaban">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" class="dropify"  :required="!isEdit" name="photo"  data-max-file-size="1M"  data-allowed-file-extensions="png jpg ico bmp" >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-addon" data-dismiss="modal" @click="reset()"><i class="fa fa-arrow-left"></i> Batal</button>
                <button type="submit" class="btn btn-primary btn-addon btn-save"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </form>

        </div>
    </div>
</div>
