/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:
    config.language = 'th';
//	 config.uiColor = '#AADC6E';
//    config.readOnly = true;
    config.width = "100%";
    config.height = "500px";
    config.allowedContent = true;
    config.extraPlugins = 'simple-image-browser';
//    filebrowserUploadUrl: "index.php?r=Sites/upload";
//    config.toolbar = [
//        {name: 'document', items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']},
//        {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
//        {name: 'basicstyles', items: ['Bold', 'Italic']},
//        {name: 'insert', items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe']}
//        , {name: 'tools', items: ['Maximize', 'ShowBlocks']}
//        , '/', {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
//        {name: 'colors', items: ['TextColor', 'BGColor']}
//    ];
config.toolbarGroups = [
    { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
    { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
    { name: 'links' },
    { name: 'insert' },
//    { name: 'forms' },
    { name: 'tools' },
    { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
    { name: 'others' },
    '/',
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
    { name: 'styles' },
    { name: 'colors' },
    { name: 'about' }
];



};
