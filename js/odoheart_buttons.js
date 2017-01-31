(function() {
    tinymce.create('tinymce.plugins.odoheart', {

        init : function(ed, url) {
  
            ed.addButton('odoheart', {
                title : 'Odoheart',
                cmd : 'odoheart',
                image : '../wp-content/themes/hlportfolio/img/well.png',
                type: 'menubutton',
                menu: [
            {
                text: 'Choice color and nomber percent heart',
                onclick: function(t) {
                    ed.windowManager.open({
                        title  : 'Insert Color',
                        width  : 500,
                        height : 500,
                        body   : [
                            {
                                type    : 'colorpicker',
                                class   : 'colorpicker',
                                name    : 'color',
                                value   : ''
                            },
                            { 
                                label   : 'The number value is should be from 0 to 100.',
                                type    : 'textbox',
                                class   : 'textbox',
                                name    : 'text',
                                value   : ''
                            },
                        ],
                        onsubmit: function(e) {
                                    if (e.data.text !== null) {
                                        e.data.text = parseInt(e.data.text);
                                    if (e.data.text >= 0 && e.data.text <= 100) {
                                    shortcode = '[odoheart data-percent="' + e.data.text +  '" data-color="' + e.data.color + '"]';
                                    ed.execCommand('mceInsertContent', 0, shortcode);
                                    }
                                    else {
                                        alert("The number value is invalid. It should be from 0 to 100.");
                                        return false;
                                    }
                                    }
                            
                        }
                    })

                    var windows = ed.windowManager.getWindows()[0];
                    var $el = jQuery( windows.$el[0] );

                    /* check if wpColorPicker available */
                    if( typeof jQuery.wp === 'object' && typeof jQuery.wp.wpColorPicker === 'function' ) {
                        $el.find( '.mce-colorpicker' ).wpColorPicker();
                }

            }
        }]
            });
        },
    });
    // Register plugin
    tinymce.PluginManager.add( 'odoheart', tinymce.plugins.odoheart );
})();