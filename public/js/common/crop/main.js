(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // Node / CommonJS
        factory(require('jquery'));
    } else {
        factory(jQuery);
    }
})(function ($) {

    'use strict';

    var console = window.console || { log: function () {} };

    function CropAvatar($element) {



        this.$container = $element;
        this.$avatarView = this.$container.find('.avatar-view');
        this.$avatar = this.$container.find('img');
        this.$avatarModal = this.$container.find('#avatar-modal');
        this.$loading = this.$container.find('.loading');

        this.$avatarForm = this.$container.find('.avatar-form');
        this.$avatarUpload = this.$container.find('.avatar-upload');
        this.$avatarSrc = this.$container.find('.avatar-src');
        this.$avatarData = this.$container.find('.avatar-data');
        this.$avatarInput = this.$container.find('.avatar-input');
        this.$avatarSave = this.$container.find('.avatar-save');
        this.$avatarBtns = this.$container.find('.avatar-btns');

        this.$avatarWrapper = this.$container.find('.avatar-wrapper');
        this.$avatarPreview = this.$container.find('.avatar-preview');

        this.init();
        console.log(this);
    }

    CropAvatar.prototype = {
        constructor: CropAvatar,

        support: {
            fileList: !!$('<input type="file">').prop('files'),
            blobURLs: !!window.URL && URL.createObjectURL,
            formData: !!window.FormData
        },

        init: function () {
            this.support.datauri = this.support.fileList && this.support.blobURLs;

            if (!this.support.formData) {
                this.initIframe();
            }

            this.initTooltip();
            this.initModal();
            this.addListener();
            this.resizeBox();
        },

        addListener: function () {
            this.$avatarView.on('click', $.proxy(this.click, this));
            this.$avatarInput.on('change', $.proxy(this.change, this));
            this.$avatarForm.on('submit', $.proxy(this.submit, this));
            this.$avatarBtns.on('click', $.proxy(this.rotate, this));
        },

        initTooltip: function () {
            this.$avatarView.tooltip({
                placement: 'bottom'
            });
        },

        initModal: function () {
            this.$avatarModal.modal({
                show: false
            });
        },

        initPreview: function () {
            var url = this.$avatar.attr('src');

            this.$avatarPreview.empty().html('<img src="' + url + '">');
        },

        initIframe: function () {
            var target = 'upload-iframe-' + (new Date()).getTime(),
                $iframe = $('<iframe>').attr({
                    name: target,
                    src: ''
                }),
                _this = this;

            // Ready ifrmae
            $iframe.one('load', function () {

                // respond response
                $iframe.on('load', function () {
                    var data;

                    try {
                        data = $(this).contents().find('body').text();
                    } catch (e) {
                        console.log(e.message);
                    }

                    if (data) {
                        try {
                            data = $.parseJSON(data);
                        } catch (e) {
                            console.log(e.message);
                        }

                        _this.submitDone(data);
                    } else {
                        _this.submitFail('Image upload failed!');
                    }

                    _this.submitEnd();

                });
            });

            this.$iframe = $iframe;
            this.$avatarForm.attr('target', target).after($iframe.hide());
        },

        click: function () {
            this.$avatarModal.modal('show');
            this.initPreview();
        },

        change: function () {
            var files,
                file;

            if (this.support.datauri) {
                files = this.$avatarInput.prop('files');

                if (files.length > 0) {
                    file = files[0];

                    if (this.isImageFile(file)) {
                        if (this.url) {
                            URL.revokeObjectURL(this.url); // Revoke the old one
                        }

                        this.url = URL.createObjectURL(file);
                        this.startCropper();
                    }
                }
            } else {
                file = this.$avatarInput.val();

                if (this.isImageFile(file)) {
                    this.syncUpload();
                }
            }
        },

        submit: function () {
            if (!this.$avatarSrc.val() && !this.$avatarInput.val()) {
                return false;
            }

            if (this.support.formData) {
                this.ajaxUpload();
                return false;
            }
        },

        rotate: function (e) {
            var data;

            if (this.active) {
                data = $(e.target).data();

                if (data.method) {
                    this.$img.cropper(data.method, data.option);
                }
            }
        },

        isImageFile: function (file) {
            if (file.type) {
                return /^image\/\w+$/.test(file.type);
            } else {
                return /\.(jpg|jpeg|png|gif)$/.test(file);
            }
        },

        startCropper: function () {
            var _this = this;

            var aspect_ratio = $("#aspect_ratio");

            this.$img = $('<img src="' + this.url + '">');
            this.$avatarWrapper.empty().html(this.$img);
            this.$img.cropper({

                cropBoxResizable: true,
                aspectRatio: aspect_ratio.val() != 0 ? aspect_ratio.val():1,
                preview: this.$avatarPreview.selector,
                strict: false,
                crop: function (data) {

                    var json = [
                        '{"x":' + data.x,
                        '"y":' + data.y,
                        '"height":' + data.height,
                        '"width":' + data.width,
                        '"rotate":' + data.rotate + '}'
                    ].join();

                    _this.$avatarData.val(json);
                }
            });

            this.active = true;


        },

        stopCropper: function () {
            if (this.active) {
                this.$img.cropper('destroy');
                this.$img.remove();
                this.active = false;

            }
        },

        resizeBox : function () {

            var _this = this;
            var width        = $("#width");
            var height       = $("#height");
            var aspect_ratio = $("#aspect_ratio");

            aspect_ratio.val(parseInt(width.val())/parseInt(height.val()));

            width.bind('blur',function () {
                if(resetCrop())
                {
                    _this.startCropper();
                }
            });

            height.bind('blur',function () {
                if(resetCrop())
                {
                    _this.startCropper();
                }
            });


            function resetCrop() {


                if(parseInt(height.val()) > 2000 || parseInt(width.val()) > 2000)
                {
                    alert('图片尺寸不适合轮播图');
                    width.val('400');
                    height.val('300');
                    aspect_ratio.val(0.75);
                    return false;
                }

                if(parseInt(height.val()) == 0 || parseInt(width.val()) == 0)
                {
                    alert('图片比例不适合轮播图');
                    width.val('400');
                    height.val('300');
                    aspect_ratio.val(0.75);
                    return false;
                }

                var temp = parseInt(width.val())/parseInt(height.val());
                if(temp > 10 || temp < 0.1)
                {
                    alert('图片比例不适合轮播图');
                    width.val('400');
                    height.val('300');
                    aspect_ratio.val(0.75);
                    return false;
                }
                aspect_ratio.val(temp);

                return true;

            }


        },

        ajaxUpload: function () {
            var url = this.$avatarForm.attr('action'),
                data = new FormData(this.$avatarForm[0]),
                _this = this;

            $.ajax(url, {
                type: 'post',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,

                beforeSend: function () {
                    _this.submitStart();
                },

                success: function (data) {
                    _this.submitDone(data);
                },

                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    _this.submitFail(textStatus || errorThrown);
                },

                complete: function () {
                    _this.submitEnd();
                }
            });
        },

        syncUpload: function () {
            this.$avatarSave.click();
        },

        submitStart: function () {
            this.$loading.fadeIn();
        },

        submitDone: function (data) {
            console.log(data);

            if ($.isPlainObject(data) && data.state === 200) {
                if (data.result) {
                    this.url = data.result;

                    if (this.support.datauri || this.uploaded) {
                        this.uploaded = false;
                        this.cropDone();
                    } else {
                        this.uploaded = true;
                        this.$avatarSrc.val(this.url);
                        this.startCropper();
                    }

                    this.$avatarInput.val('');
                } else if (data.message) {
                    this.alert(data.message);
                }
            } else {
                this.alert('Failed to response');
            }
        },

        submitFail: function (msg) {
            this.alert(msg);
        },

        submitEnd: function () {
            this.$loading.fadeOut();
        },

        cropDone: function () {
            this.$avatarForm.get(0).reset();
            this.$avatar.attr('src', this.url);
            this.stopCropper();
            this.$avatarModal.modal('hide');
        },

        alert: function (msg) {
            var $alert = [
                '<div class="alert alert-danger avater-alert">',
                '<button type="button" class="close" data-dismiss="alert">&times;</button>',
                msg,
                '</div>'
            ].join('');

            this.$avatarUpload.after($alert);
        }
    };

    $(function () {



        return new CropAvatar($('#crop-avatar'));
    });

});
