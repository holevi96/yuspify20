jQuery(document).ready(function(){
    var options = {
        animationDuration: 0.5,
        filter: 'all',
        callbacks: {
            onFilteringStart: function() { },
            onFilteringEnd: function() { },
            onShufflingStart: function() { },
            onShufflingEnd: function() { },
            onSortingStart: function() { },
            onSortingEnd: function() { }
        },
        delay: 0,
        delayMode: 'progressive',
        easing: 'ease-out',
        filterOutCss: {
            opacity: 0,
            transform: 'scale(0.5)'
        },
        filterInCss: {
            opacity: 1,
            transform: 'scale(1)'
        },
        layout: 'sameSize',
        selector: '.filtr-container',
        setupControls: false
    };

    var filterizd = jQuery('.filtr-container').filterizr(options);

    filterizd.filterizr('setOptions', options);

    jQuery('.cat-filter-button').click(function() {
        var filter_attr = jQuery(this).attr('data-filter');
        filterizd.filterizr('filter', filter_attr);
    });
});