var mQuickSidebar = function() {
    var topbarAside = $('#m_quick_sidebar');
    var topbarAsideTabs = $('#m_quick_sidebar_tabs');    
    var topbarAsideClose = $('.m_quick_sidebar_close_page');
    var topbarAsideToggle = $('#m_quick_sidebar_toggle');
    var topbarAsideContent = topbarAside.find('.m-quick-sidebar__content');

    var initSettings = function() { 
        // init dropdown tabbable content
        var init = function() {
            var settings = $('#m_quick_sidebar_tabs_settings');
            var height = mUtil.getViewPort().height - topbarAsideTabs.outerHeight(true) - 60;

            // init settings scrollable content
            settings.css('height', height);
            mApp.initScroller(settings, {});
        }

        init();

        // reinit on window resize
        mUtil.addResizeHandler(init);
    }

    var initOffcanvasTabs = function() {
        initSettings();
    }

    var initOffcanvas = function() {
        $('#m_quick_sidebar_toggle').click(function(e){
            $('#sidebar-overlay').show();
        });
        topbarAsideClose.click(function(e){
            $('#sidebar-overlay').hide();
        });
        topbarAside.mOffcanvas({
            class: 'm-quick-sidebar',
            overlay: false,  
            close: topbarAsideClose,
            toggle: topbarAsideToggle
        });   

        topbarAside.mOffcanvas().one('afterShow', function() {
            //setTimeout(function() {              
                topbarAsideContent.removeClass('m--hide');
                initOffcanvasTabs();
            //}, 1000);                         
        });
    }

    return {     
        init: function() {  
            initOffcanvas(); 
        }
    };
}();

$(document).ready(function() {
    mQuickSidebar.init();
});