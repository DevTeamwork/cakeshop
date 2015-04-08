$(function() {
    $('article').readmore({
        maxHeight: 250,
        moreLink: '<a href="#">->>อ่านทั้งหมด</a>',
        beforeToggle: function(trigger, element, expanded) {
            location.href = element.find(".link-column").attr("href");
        }

    });
});

